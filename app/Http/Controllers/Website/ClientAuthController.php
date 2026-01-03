<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\InquiryMaster;
use App\Models\InquiryDetail;
use App\Models\Inventory;
use App\Models\TravelFlight;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Client;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Stripe\Checkout\Session;
use Stripe\Stripe;

class ClientAuthController extends Controller
{
    public function showLogin()
    {
        return view('website.pages.client.login');
    }

    public function showRegister()
    {
        return view('website.pages.client.register');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Find client by email
        $client = Client::where('email', $request->email)->first();

        // If email not found
        if (!$client) {
            return back()->with('error', 'Invalid email or password.');
        }

        // Check password
        if (!Hash::check($request->password, $client->password)) {
            return back()->with('error', 'Invalid email or password.');
        }

        session()->forget('traveler_id');
        session()->forget('traveler_name');
        session()->forget('traveler_data');

        // Store client session
        session([
            'client_id' => $client->id,
            'client_name' => $client->full_name,
            'client_data' => $client,
        ]);

        // session(['client_id' => $user->id]);

        return redirect()->route('client.dashboard')
            ->with('success', 'Welcome back, ' . $client->full_name . ' 👋');
    }

    public function register(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'email' => 'required|email|unique:clients,email',
            'mobile_number' => 'required|string|max:20',
            'mobile_number_2' => 'nullable|string|max:20',
            'active' => 'nullable|string|max:20',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'password' => 'nullable|string|min:6',
            'passport_expiry' => 'nullable|date',
            'passport_no' => 'nullable|string|max:50',
            'ID_number' => 'nullable|string|max:50',
            'profession' => 'nullable|string|max:100',
            'gender' => 'nullable|in:male,female',
            'create_by' => 'nullable|in:male,female',
            'passport_pic' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handle file uploads
        if ($request->hasFile('passport_pic')) {
            $validated['passport_pic'] = $request->file('passport_pic')->store('clients/passports', 'public');
        }
        if ($request->hasFile('profile_image')) {
            $validated['profile_image'] = $request->file('profile_image')->store('clients/profiles', 'public');
        }

        // Add system fields
        // $validated['create_by'] = auth()->id();   // Logged-in user ID
        $validated['active'] = $request->input('active', 1); // default to Active

        Client::create($validated);

        return redirect()->route('client.login')
            ->with('success', 'Account created successfully. Please login.');
    }

    public function dashboard()
    {
        return view('website.pages.client.dashboard');
    }

    public function inquiries()
    {
        $clientId = session('client_id');

        $inquiries = InquiryMaster::where('client_id', $clientId)->with(['details', 'client', 'traveler', 'travelFlight'])->latest()->paginate(15);
        return view('website.pages.client.inquiries.index', compact('inquiries'));
    }


    public function createInquiry(Request $request, $flight_id = null)
    {
        // Load dropdown data
        $clients = \App\Models\Client::select('id', 'full_name')->get(); // adjust field name as in your clients table
        $travelers = \App\Models\Traveler::select('id', 'full_name')->get();
        $flights = \App\Models\TravelFlight::select('id', 'pnr_no')->get();
        $items = Inventory::where('active', 1)->get();
        $flight = null;
        $selectedFlightId = null;
        $selectedTravelerId = null;

        if ($flight_id) {
            $flight = TravelFlight::with('traveler')->find($flight_id);

            if ($flight) {
                $selectedFlightId = $flight->id;
                $selectedTravelerId = $flight->traveler_id;   // AUTO SELECT TRAVELER
            }
        }
        return view('website.pages.client.inquiries.create', compact('clients', 'travelers', 'flights', 'items', 'selectedFlightId', 'selectedTravelerId'));
    }


    public function storeInquiry(Request $request)
    {
        $request->validate([
            'client_id' => 'nullable|integer',
            'traveler_id' => 'nullable|integer',
            'travel_flight_id' => 'nullable|integer',
            'entry_date' => 'nullable|date',
            'status' => 'nullable|string',
            'contact_no' => 'nullable|string',
            'details' => 'nullable|array',
            'details.*.item_id' => 'nullable|integer',
            'details.*.qty' => 'nullable|integer',
            'details.*.rate' => 'nullable|numeric',
        ]);

        DB::transaction(function () use ($request) {
            $master = InquiryMaster::create($request->only([
                'client_id',
                'travel_flight_id',
                'entry_date',
                'status',
                'remarks',
                'active',
                'delivery_address',
                'contact_person',
                'contact_no',
                'Qrcode',
                'traveler_id'
            ]));

            $details = $request->input('details', []);
            foreach ($details as $d) {
                if (empty($d['item_id']) && empty($d['description'])) continue;
                InquiryDetail::create([
                    'inquiry_master_id' => $master->id,
                    'item_id' => $d['item_id'] ?? null,
                    'description' => $d['description'] ?? null,
                    'qty' => $d['qty'] ?? 1,
                    'unit' => $d['unit'] ?? null,
                    'rate' => $d['rate'] ?? 0,
                    'amount' => $d['amount'] ?? (($d['qty'] ?? 1) * ($d['rate'] ?? 0)),
                ]);
            }
        });

        return redirect()->route('client.inquiries')->with('success', 'Inquiry created.');
    }

    public function editInquiry($id)
    {
        $inquiry = InquiryMaster::with('details')->findOrFail($id);
        $clients = \App\Models\Client::select('id', 'full_name')->get();
        $travelers = \App\Models\Traveler::select('id', 'full_name')->get();
        $flights = \App\Models\TravelFlight::select('id', 'pnr_no')->get();
        $items = Inventory::where('active', 1)->get();
        return view('website.pages.client.inquiries.edit', compact('inquiry', 'clients', 'travelers', 'flights', 'items'));
    }

    public function updateInquiry(Request $request, $id)
    {
        $request->validate([
            'client_id' => 'nullable|integer',
            'traveler_id' => 'nullable|integer',
            'travel_flight_id' => 'nullable|integer',
            'entry_date' => 'nullable|date',
            'details' => 'nullable|array',
        ]);

        DB::transaction(function () use ($request, $id) {
            $master = InquiryMaster::findOrFail($id);
            $master->update($request->only([
                'client_id',
                'travel_flight_id',
                'entry_date',
                'status',
                'remarks',
                'active',
                'delivery_address',
                'contact_person',
                'contact_no',
                'Qrcode',
                'traveler_id'
            ]));

            // remove old details and insert new ones
            InquiryDetail::where('inquiry_master_id', $master->id)->delete();

            $details = $request->input('details', []);
            foreach ($details as $d) {
                if (empty($d['item_id']) && empty($d['description'])) continue;
                InquiryDetail::create([
                    'inquiry_master_id' => $master->id,
                    'item_id' => $d['item_id'] ?? null,
                    'description' => $d['description'] ?? null,
                    'qty' => $d['qty'] ?? 1,
                    'unit' => $d['unit'] ?? null,
                    'rate' => $d['rate'] ?? 0,
                    'amount' => $d['amount'] ?? (($d['qty'] ?? 1) * ($d['rate'] ?? 0)),
                ]);
            }
        });

        return redirect()->route('client.inquiries')->with('success', 'Inquiry updated.');
    }
    public function deleteInquiry($id)
    {

        $master = InquiryMaster::findOrFail($id);
        $master->delete_by = session('client_id');         // kisne delete kiya
        $master->deleted_at = now();                // kab delete hua
        $master->save();

        return redirect()->route('client.inquiries')
            ->with('success', 'Inquiry deleted successfully.');
    }

    public function deposit($id)
    {
        $inq = InquiryMaster::with(['client', 'traveler', 'travelFlight', 'details'])->findOrFail($id);
        $totalAmount = $inq->details->sum('amount');
        $items = Inventory::where('active', 1)->get();

        return view('website.pages.client.inquiries.deposit', compact('inq', 'totalAmount', 'items'));
    }

    public function checkout($id)
    {
        $inq = InquiryMaster::findOrFail($id);
        $totalAmount = $inq->details->sum('amount');

        if ($inq->status !== 'Accepted') {
            return back()->with('error', 'Inquiry not accepted yet.');
        }

        Stripe::setApiKey(config('services.stripe.secret'));

        $session = Session::create([
            'payment_method_types' => ['card'],
            'mode' => 'payment',
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => 'Delivery Deposit for Inquiry #' . $inq->id,
                    ],
                    'unit_amount' => $totalAmount * 100, // Stripe uses cents
                ],
                'quantity' => 1,
            ]],
            'success_url' => route('client.inquiries.success') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('client.inquiries.cancel'),
            'metadata' => [
                'inquiry_id' => $inq->id,
            ],
        ]);

        return redirect($session->url);
    }

    public function paymentSuccess(Request $request)
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        $session = Session::retrieve($request->session_id);

        if ($session->payment_status !== 'paid') {
            return redirect()->route('client.inquiries')->with('error', 'Payment not confirmed.');
        }

        $inq = InquiryMaster::findOrFail($session->metadata->inquiry_id);

        if ($inq->status === 'Deposit') {
            return redirect()->route('client.inquiries')->with('success', 'Already paid.');
        }

        $inq->status = 'Deposit';
        $inq->ucode = strtoupper(Str::random(6));
        $inq->save();

        return redirect()->route('client.inquiries')->with('success', 'Payment successful. Your delivery code is: ' . $inq->ucode);
    }

    public function paymentCancel()
    {
        return redirect()->route('client.inquiries')->with('error', 'Payment cancelled.');
    }

    // public function pay($id)
    // {
    //     return
    //         $inq = InquiryMaster::findOrFail($id);

    //     $inq->status = 'Deposit';
    //     $inq->ucode = strtoupper(Str::random(6));
    //     $inq->save();

    //     return redirect()->route('client.inquiries.index')->with('success', 'Payment successful');
    // }



    public function logout()
    {
        session()->forget('client_id');
        session()->forget('client_name');
        session()->forget('client_data');
        return redirect()->route('client.login')
            ->with('success', 'Logged out successfully.');

        // return redirect()->route('website.pages.client.login');
    }
}
