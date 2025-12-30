<?php

namespace App\Http\Controllers;

use App\Models\Traveler;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class TravelerController extends Controller
{
    /**
     * Apply auth middleware.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the travelers.
     */
    public function index() : View
    {
        return view('travelers.index', [
            'travelers' => Traveler::latest()->paginate(10) // adjust pagination as needed
        ]);
    }

    /**
     * Show the form for creating a new traveler.
     */
    public function create() : View
    {
        return view('travelers.create');
    }

    /**
     * Store a newly created traveler in storage.
     */
    public function store(Request $request) : RedirectResponse
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
            'passport_pic' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handle file uploads
        if ($request->hasFile('passport_pic')) {
            $validated['passport_pic'] = $request->file('passport_pic')->store('travelers/passports', 'public');
        }
        if ($request->hasFile('profile_image')) {
            $validated['profile_image'] = $request->file('profile_image')->store('travelers/profiles', 'public');
        }

         // Add system fields
    $validated['create_by'] = auth()->id();   // Logged-in user ID
$validated['active'] = $request->input('active', 1); // default to Active

        Traveler::create($validated);

        return redirect()->route('travelers.index')
                         ->with('success', 'traveler created successfully.');
    }

    /**
     * Show the form for editing the specified traveler.
     */
    public function edit(Traveler $traveler) : View
    {
        return view('travelers.edit', compact('traveler'));
    }

    /**
     * Update the specified traveler in storage.
     */
    public function update(Request $request, Traveler $traveler) : RedirectResponse
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'email' => 'required|email|unique:travelers,email,' . $traveler->id,
            'mobile_number' => 'required|string|max:20',
            'mobile_number_2' => 'nullable|string|max:20',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'active' => 'nullable|string|max:20',
            'password' => 'nullable|string|min:6',
            'passport_expiry' => 'nullable|date',
            'passport_no' => 'nullable|string|max:50',
            'ID_number' => 'nullable|string|max:50',
            'profession' => 'nullable|string|max:100',
            'gender' => 'nullable|in:male,female',
            'passport_pic' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handle file uploads
        if ($request->hasFile('passport_pic')) {
            $validated['passport_pic'] = $request->file('passport_pic')->store('travelers/passports', 'public');
        }
        if ($request->hasFile('profile_image')) {
            $validated['profile_image'] = $request->file('profile_image')->store('travelers/profiles', 'public');
        }

        $validated['update_by'] = auth()->id();   // Logged-in user ID
        $traveler->update($validated);

        return redirect()->route('travelers.index')
                         ->with('success', 'traveler updated successfully.');
    }

    /**
     * Remove the specified traveler from storage.
     */
    public function destroy(Traveler $traveler) : RedirectResponse
    {
         $traveler->delete_by = auth()->id();         // kisne delete kiya
    $traveler->deleted_at = now();                // kab delete hua
    $traveler->save();
//         $traveler->delete();
// $traveler->delete_by = auth()->id();         // kisne delete kiya
//     $traveler->save();

    // $traveler->deleted_at = now();                // kab delete hua
   
        return redirect()->route('travelers.index')
                         ->with('success', 'traveler deleted successfully.');
    }
}
