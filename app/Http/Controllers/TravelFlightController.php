<?php

namespace App\Http\Controllers;

use App\Models\TravelFlight;
use App\Models\City;
use App\Models\Country;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Traveler;

class TravelFlightController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('travel_flights.index', [
            'flights' => TravelFlight::latest()->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('travel_flights.create', [
            'travelers' => Traveler::all(),
            'countries' => Country::all(),
            'cities' => City::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
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

        $validated['create_by'] = auth()->id();
        // Remove empty tags
        $validated['restrictions'] = array_values(
            array_filter($request->restrictions ?? [])
        );


        TravelFlight::create($validated);

        return redirect()->route('travel_flights.index')
            ->with('success', 'Flight added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TravelFlight $travel_flight)
    {
        return view('travel_flights.edit', [
            'travel_flight' => $travel_flight,
            'travelers' => Traveler::all(),
            'cities' => City::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  TravelFlight $travel_flight)
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

        $validated['update_by'] = auth()->id();
        // Clean restrictions (remove empty values)
        $validated['restrictions'] = array_values(
            array_filter($request->restrictions ?? [])
        );
        $travel_flight->update($validated);

        return redirect()->route('travel_flights.index')
            ->with('success', 'Flight updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TravelFlight $travel_flight)
    {
        $travel_flight->delete_by = auth()->id();
        $travel_flight->deleted_at = now();
        $travel_flight->save();

        return redirect()->route('travel_flights.index')
            ->with('success', 'Flight deleted successfully.');
    }
}
