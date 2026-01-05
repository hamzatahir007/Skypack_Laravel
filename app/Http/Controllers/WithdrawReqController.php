<?php

namespace App\Http\Controllers;

use App\Models\InquiryMaster;
use App\Models\Inventory;
use App\Models\TravelFlight;
use App\Models\WithdrawRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class WithdrawReqController extends Controller
{
    public function index()
    {
        $withdrawrequest = WithdrawRequest::with(['traveler', 'inquiry_master.travelFlight'])
            ->latest()
            ->paginate(15);

        return view('withdrawRequest.index', compact('withdrawrequest'));
    }

    public function edit($id)
    {
        $inquiry = InquiryMaster::with('details')->findOrFail($id);
        $clients = \App\Models\Client::select('id', 'full_name')->get();
        $travelers = \App\Models\Traveler::select('id', 'full_name')->get();
        $flights = \App\Models\TravelFlight::select('id', 'pnr_no')->get();
        $widthreq = WithdrawRequest::where('inquiry_master_id', $id)->latest()->first();
        $items = Inventory::where('active', 1)->get();

        // 🔹 Traveler linked with inquiry
        $traveler = \App\Models\Traveler::with('bankAccount')
            ->where('id', $inquiry->traveler_id)
            ->first();

        $bankAccount = $traveler?->bankAccount;

        return view('withdrawRequest.edit', compact(
            'inquiry',
            'clients',
            'travelers',
            'flights',
            'items',
            'widthreq',
            'traveler',
            'bankAccount'
        ));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'inquirystatus' => 'required|in:Pending,Completed',
            'status'     => 'required|in:Pending,Completed',
            'screenshot' => 'nullable|file|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        DB::beginTransaction();
        try {

            // 1️⃣ Update InquiryMaster status only
            $inquiry = InquiryMaster::findOrFail($id);
            $inquiry->update([
                'status' => $request->inquirystatus
            ]);

            // 2️⃣ Get related withdraw request
            $withdraw = WithdrawRequest::where('inquiry_master_id', $id)->latest()->first();

            if ($withdraw) {

                // 3️⃣ Handle screenshot update
                if ($request->hasFile('screenshot')) {

                    if ($withdraw->screenshot && Storage::disk('public')->exists($withdraw->screenshot)) {
                        Storage::disk('public')->delete($withdraw->screenshot);
                    }

                    $withdraw->screenshot = $request->file('screenshot')->store('withdraw_screenshots', 'public');
                }

                // 4️⃣ Update withdraw status
                $withdraw->status = $request->status;
                $withdraw->save();
            }

            DB::commit();

            return redirect()
                ->route('withdrawRequest.index')
                ->with('success', 'Withdraw request updated successfully.');
        } catch (\Throwable $e) {

            DB::rollBack();

            return back()->with('error', 'Update failed: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $master = WithdrawRequest::findOrFail($id);
        // $detial = InquiryDetail::findOrFail($id);
        $master->delete_by = auth()->id();         // kisne delete kiya
        $master->deleted_at = now();                // kab delete hua
        $master->save();

        return back()->with('success', 'Withdraw Request deleted.');
    }
}
