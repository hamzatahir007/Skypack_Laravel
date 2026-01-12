<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\InquiryMaster;
use App\Models\InquiryDetail;
use App\Models\Inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Client;
use App\Models\City;
use App\Models\Country;
use App\Models\TravelFlight;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;

class IndexAuthController extends Controller
{

    public function dashboard(Request $request)
    {
        // Load cities with their country for dropdown (used in header)
        $cities = City::with('country')->orderBy('name')->get(); // small result set, used only for dropdown

        $countries = Country::withCount('cities')
            ->withCount('travelFlights') // if relationship exists
            ->get();

        //     $countries = Country::with('cities')->get();

        // foreach ($countries as $country) {
        //     $country->flights_count = TravelFlight::whereIn('origin', $country->cities->pluck('id'))
        //         ->orWhereIn('destination', $country->cities->pluck('id'))
        //         ->count();
        // }

        // Base query for flights — eager load to avoid N+1
        $query = TravelFlight::query()
            ->with(['traveler:id,full_name', 'cityOrigin:id,name,country_id', 'cityDestination:id,name,country_id'])
            ->whereNull('deleted_at');

        // Filters: pickup (origin), dropoff (destination), flight_date
        if ($request->filled('pickup')) {
            $query->where('origin', $request->input('pickup'));
        }

        if ($request->filled('dropoff')) {
            $query->where('destination', $request->input('dropoff'));
        }

        if ($request->filled('flight_date')) {
            // If you used date only; adjust if you need date-time range
            $query->whereDate('flight_date', $request->input('flight_date'));
        }

        // Sort: show featured first (if you have a flag), otherwise recent
        // assuming you have a 'is_featured' boolean column — else remove that clause
        $flights = (clone $query)
            // ->orderByDesc('is_featured')      // featured first (optional)
            ->orderByDesc('flight_date')
            ->paginate(12)
            ->withQueryString();

        // Popular (top results) — you can customize logic (e.g., by views or is_featured)
        $popularFlights = (clone $query)
            ->orderByDesc('flight_date')
            ->limit(8)
            ->get();

        // Flag to tell blade to scroll to popular section after search
        $scrollToPopular = $request->filled('pickup') || $request->filled('dropoff') || $request->filled('flight_date');

        return view('website.index', compact('cities', 'flights', 'popularFlights', 'scrollToPopular', 'countries'));

        // return view('website.index');
    }

    public function show($id)
    {
        // Eager load relations to avoid N+1
        $flight = TravelFlight::with([
            'traveler:id,full_name',
            'cityOrigin:id,name,country_id',
            'cityDestination:id,name,country_id'
        ])->whereNull('deleted_at')->findOrFail($id);

        // Optional: format data or compute derived fields if needed
        // e.g. formatted date strings will be handled in blade using optional(...)

        return view('website.pages.flightDetails', compact('flight'));
    }
}
