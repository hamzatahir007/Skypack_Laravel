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
use App\Models\Message;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Stripe\Checkout\Session;
use Stripe\Stripe;

class MessageController extends Controller
{
    private function sessionUser()
    {
        if (session()->has('client_id')) return ['id' => session('client_id'), 'type' => 'client'];
        if (session()->has('traveler_id')) return ['id' => session('traveler_id'), 'type' => 'traveler'];
        abort(403);
    }
    public function thread($inquiryId, $flightId)
    {
        $me = $this->sessionUser();

        $messages = Message::where('inquiry_id', $inquiryId)
            ->where('travel_flight_id', $flightId)
            ->where(function ($q) use ($me) {
                $q->where(function ($s) use ($me) {
                    $s->where('sender_id', $me['id'])->where('sender_type', $me['type']);
                })->orWhere(function ($r) use ($me) {
                    $r->where('receiver_id', $me['id'])->where('receiver_type', $me['type']);
                });
            })
            ->latest()->get();

        return view('website.pages.messages.thread', compact('messages', 'inquiryId', 'flightId'));
    }


    public function create($inquiryId, $flightId)
    {
        $inquiry = InquiryMaster::findOrFail($inquiryId);
        return view('website.pages.messages.create', compact('inquiry', 'flightId'));
    }

    public function store(Request $request)
    {
        $me = $this->sessionUser();

        $request->validate([
            'inquiry_id' => 'required',
            'travel_flight_id' => 'required',
            'title' => 'required',
            'description' => 'required',
        ]);

        $path = $request->hasFile('image')
            ? $request->file('image')->store('messages', 'public')
            : null;

        Message::create([
            'inquiry_id' => $request->inquiry_id,
            'travel_flight_id' => $request->travel_flight_id,
            'sender_id' => $me['id'],
            'sender_type' => $me['type'],
            'receiver_id' => $request->receiver_id,
            'receiver_type' => $request->receiver_type,
            'title' => $request->title,
            'description' => $request->description,
            'image' => $path,
        ]);

        if (session()->has('client_id'))  return redirect()->route('client.messages.thread', [$request->inquiry_id, $request->travel_flight_id]);

        if (session()->has('traveler_id'))  return redirect()->route('traveler.messages.thread', [$request->inquiry_id, $request->travel_flight_id]);
    }

    public function show(Message $message)
    {
        $me = $this->sessionUser();

        abort_if(
            !(
                ($message->sender_id == $me['id'] && $message->sender_type == $me['type']) ||
                ($message->receiver_id == $me['id'] && $message->receiver_type == $me['type'])
            ),
            403
        );

        if (!$message->read_at && $message->receiver_id == $me['id']) {
            $message->update(['read_at' => now()]);
        }

        return view('website.pages.messages.show', compact('message'));
    }

    public function destroy(Message $message)
    {
        $me = $this->sessionUser();

        abort_if(
            !(
                ($message->sender_id == $me['id'] && $message->sender_type == $me['type']) ||
                ($message->receiver_id == $me['id'] && $message->receiver_type == $me['type'])
            ),
            403
        );

        $message->delete();
        return back()->with('success', 'Message deleted');
    }
}
