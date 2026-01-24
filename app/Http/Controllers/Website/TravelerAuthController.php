<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Traveler;
use App\Models\City;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use App\Models\TravelFlight;
use App\Models\InquiryMaster;
use App\Models\InquiryDetail;
use App\Mail\InquiryStatusMail;
use App\Models\Inventory;
use App\Models\WithdrawRequest;
use Illuminate\Support\Facades\Mail;


class TravelerAuthController extends Controller
{
    public function showLogin()
    {
        return view('website.pages.traveler.login');
    }

    public function showRegister()
    {
        return view('website.pages.traveler.register');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Find client by email
        $traveler = Traveler::where('email', $request->email)->first();

        // If email not found
        if (!$traveler) {
            return back()->with('error', 'Invalid email or password.');
        }

        // Check password
        if (!Hash::check($request->password, $traveler->password)) {
            return back()->with('error', 'Invalid email or password.');
        }

        session()->forget('client_id');
        session()->forget('client_name');
        session()->forget('client_data');


        // Store traveler session
        session([
            'traveler_id' => $traveler->id,
            'traveler_name' => $traveler->full_name,
            'traveler_data' => $traveler,
        ]);


        return redirect()->route('traveler.dashboard')
            ->with('success', 'Welcome back, ' . $traveler->full_name . ' 👋');
    }

    public function register(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'email' => 'required|email|unique:travelers,email',
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

        Traveler::create($validated);

        return redirect()->route('traveler.login')
            ->with('success', 'Account created successfully. Please login.');
    }

    public function dashboard()
    {
        return view('website.pages.traveler.dashboard');
    }


    public function flights()
    {
        $travelerId = session('traveler_id');
        return view('website.pages.traveler.travel_flights.index', [
            'flights' => TravelFlight::where('create_by', $travelerId)
                ->latest()->paginate(10)
        ]);
    }


    public function createFlight()
    {
        return view('website.pages.traveler.travel_flights.create', [
            'travelers' => Traveler::all(),
            'cities' => City::all()
        ]);
    }


    public function storeFlight(Request $request)
    {
        $validated = $request->validate([
            'traveler_id' => 'required|exists:travelers,id',
            'pnr_no' => 'nullable|string|max:50',
            'flight_date' => 'nullable|date',
            'origin' => 'nullable|string|max:255',
            'origin_date_time' => 'nullable|date',
            'destination' => 'nullable|string|max:255',
            'destination_date_time' => 'nullable|date',
            'status' => 'nullable|string|max:50',
            'active' => 'nullable|boolean',
            'ticket_pic' => 'nullable|image|max:2048',
            'weight' => 'nullable|numeric',
            'rate_per_unit' => 'nullable|numeric',
            'description' => 'nullable|string',
            'restrictions' => 'nullable|array',
        ]);

        if ($request->hasFile('ticket_pic')) {
            $validated['ticket_pic'] = $request->file('ticket_pic')->store('flights/tickets', 'public');
        }

        // Auto calculate total
        $validated['total'] = ($request->weight * $request->rate_per_unit);

        $validated['create_by'] = session('traveler_id');

        // Remove empty tags
        $data['restrictions'] = array_values(
            array_filter($request->restrictions ?? [])
        );

        TravelFlight::create($validated);

        return redirect()->route('traveler.flights')
            ->with('success', 'Flight added successfully.');
    }

    public function editFlight(TravelFlight $travel_flight)
    {
        return view('website.pages.traveler.travel_flights.edit', [
            'travel_flight' => $travel_flight,
            'travelers' => Traveler::all(),
            'cities' => City::all()

        ]);
    }

    public function updateFlight(Request $request,  TravelFlight $travel_flight)
    {
        $validated = $request->validate([
            'traveler_id' => 'required|exists:travelers,id',
            'pnr_no' => 'nullable|string|max:50',
            'flight_date' => 'nullable|date',
            'origin' => 'nullable|string|max:255',
            'origin_date_time' => 'nullable|date',
            'destination' => 'nullable|string|max:255',
            'destination_date_time' => 'nullable|date',
            'status' => 'nullable|string|max:50',
            'active' => 'nullable|boolean',
            'ticket_pic' => 'nullable|image|max:2048',
            'weight' => 'nullable|numeric',
            'rate_per_unit' => 'nullable|numeric',
             'description' => 'nullable|string',
            'restrictions' => 'nullable|array',
        ]);

        if ($request->hasFile('ticket_pic')) {
            $validated['ticket_pic'] = $request->file('ticket_pic')->store('flights/tickets', 'public');
        }

        $validated['total'] = ($request->weight * $request->rate_per_unit);

        $validated['update_by'] = session('traveler_id');
         // Remove empty tags
        $data['restrictions'] = array_values(
            array_filter($request->restrictions ?? [])
        );

        $travel_flight->update($validated);

        return redirect()->route('traveler.flights')
            ->with('success', 'Flight updated successfully.');
    }
    public function deleteFlight(TravelFlight $travel_flight)
    {
        $travel_flight->delete_by = session('traveler_id');;
        $travel_flight->deleted_at = now();
        $travel_flight->save();

        return redirect()->route('traveler.flights')
            ->with('success', 'Flight deleted successfully.');
    }
    public function flightInquiries($id)
    {
        $travelerId = session('traveler_id');

        // Verify flight belongs to logged-in traveler
        $flight = TravelFlight::where('id', $id)
            ->where('traveler_id', $travelerId)
            ->firstOrFail();

        // Get inquiries for this flight
        $inquiries = InquiryMaster::where('travel_flight_id', $id)
            ->with(['details', 'client', 'traveler', 'travelFlight'])
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('website.pages.traveler.travel_flights.inquiries', compact('flight', 'inquiries'));
    }
    public function acceptInquiry($id)
    {
        $inq = InquiryMaster::findOrFail($id);
        $inq->status = 'Accepted';
        $inq->save();

        // optional email/send notification
        // if ($inq->client && $inq->client->email) {
        //     Mail::to($inq->client->email)->send(new InquiryStatusMail($inq));
        // }
        return back()->with('success', 'Inquiry Accepted');
    }

    public function rejectInquiry($id)
    {
        $inq = InquiryMaster::findOrFail($id);
        $inq->status = 'Rejected';
        $inq->save();

        // optional email/send notification
        if ($inq->client && $inq->client->email) {
            Mail::to($inq->client->email)->send(new InquiryStatusMail($inq));
        }
        return back()->with('success', 'Inquiry Rejected');
    }

    public function verifyCode(Request $req, $id)
    {
        $inq = InquiryMaster::findOrFail($id);

        if ($req->code === $inq->ucode) {
            $inq->status = 'Delivered';
            // $inq->delivered_at = now();
            $inq->save();
            return back()->with('success', 'Delivery confirmed');
        }

        return back()->with('error', 'Invalid Code');
    }

    public function withdrawCreate($inquiryId)
    {
        $inquiry = InquiryMaster::with('details', 'travelFlight', 'traveler')->findOrFail($inquiryId);
        $items = Inventory::where('active', 1)->get();

        $widthreq = WithdrawRequest::where('inquiry_master_id', $inquiryId)
            ->where('traveler_id', session('traveler_id'))
            ->exists();


        return view('website.pages.traveler.travel_flights.withdraw', compact('inquiry', 'items', 'widthreq'));
    }

    public function withdrawDetail($id)
    {
        $inquiry = InquiryMaster::with('details')->findOrFail($id);
        $clients = \App\Models\Client::select('id', 'full_name')->get();
        $travelers = \App\Models\Traveler::select('id', 'full_name')->get();
        $flights = \App\Models\TravelFlight::select('id', 'pnr_no')->get();
        $widthreq = WithdrawRequest::where('inquiry_master_id', $id)->latest()->first();
        $items = Inventory::where('active', 1)->get();

        return view('website.pages.traveler.travel_flights.withdrawDetail',  compact('inquiry', 'clients', 'travelers', 'flights', 'items', 'widthreq'));
    }

    public function storeWithdraw(Request $request)
    {
        $request->validate([
            'inquiry_master_id' => 'required|exists:inquiry_master,id',
            'amount' => 'required|numeric|min:1',
        ]);

        $widthreq = WithdrawRequest::where('inquiry_master_id', $request->inquiry_master_id)
            ->where('traveler_id', session('traveler_id'))
            ->exists();

        if ($widthreq) {
            return  redirect()->back()->with('error', 'Already requested.');
        }

        WithdrawRequest::create([
            'inquiry_master_id' => $request->inquiry_master_id,
            'traveler_id' => session('traveler_id'),
            'amount' => $request->amount,
        ]);

        // return redirect()->route('traveler.inquiries')->with('success', 'Withdraw request sent successfully: ' . $inq->id);
        return redirect()->back()->with('success', 'Withdraw request sent successfully.');
    }



    public function logout()
    {
        session()->forget('traveler_id');
        session()->forget('traveler_name');
        session()->forget('traveler_data');
        return redirect()->route('traveler.login')
            ->with('success', 'Logged out successfully.');


        // return redirect()->route('website.pages.client.login');
    }
}
