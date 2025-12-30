<?php

namespace App\Http\Controllers;

use App\Models\InquiryMaster;
use App\Models\InquiryDetail;
use App\Models\Inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InquiryController extends Controller
{
    public function index()
    {
        $inquiries = InquiryMaster::with(['details','client','traveler','travelFlight'])->latest()->paginate(15);
        return view('inquiries.index', compact('inquiries'));
    }

    public function create()
    {
        // Load dropdown data
        $clients = \App\Models\Client::select('id','full_name')->get(); // adjust field name as in your clients table
        $travelers = \App\Models\Traveler::select('id','full_name')->get();
        $flights = \App\Models\TravelFlight::select('id','pnr_no')->get();
        $items = Inventory::where('active', 1)->get();

        return view('inquiries.create', compact('clients','travelers','flights','items'));
    }

    public function store(Request $request)
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
                'client_id','travel_flight_id','entry_date','status','remarks','active',
                'delivery_address','contact_person','contact_no','Qrcode','traveler_id'
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

        return redirect()->route('inquiries.index')->with('success', 'Inquiry created.');
    }

    public function edit($id)
    {
        $inquiry = InquiryMaster::with('details')->findOrFail($id);
        $clients = \App\Models\Client::select('id','full_name')->get();
        $travelers = \App\Models\Traveler::select('id','full_name')->get();
        $flights = \App\Models\TravelFlight::select('id','pnr_no')->get();
        $items = Inventory::where('active', 1)->get();

        return view('inquiries.edit', compact('inquiry','clients','travelers','flights','items'));
    }

    public function update(Request $request, $id)
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
                'client_id','travel_flight_id','entry_date','status','remarks','active',
                'delivery_address','contact_person','contact_no','Qrcode','traveler_id'
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

        return redirect()->route('inquiries.index')->with('success', 'Inquiry updated.');
    }

    public function destroy($id)
    {
        $master = InquiryMaster::findOrFail($id);
        // $detial = InquiryDetail::findOrFail($id);
         $master->delete_by = auth()->id();         // kisne delete kiya
    $master->deleted_at = now();                // kab delete hua
    $master->save();
        // $master->delete();
        return back()->with('success', 'Inquiry deleted.');
    }
}
