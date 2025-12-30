<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ClientController extends Controller
{
    /**
     * Apply auth middleware.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the clients.
     */
    public function index() : View
    {
        return view('clients.index', [
            'clients' => Client::latest()->paginate(10) // adjust pagination as needed
        ]);
    }

    /**
     * Show the form for creating a new client.
     */
    public function create() : View
    {
        return view('clients.create');
    }

    /**
     * Store a newly created client in storage.
     */
    public function store(Request $request) : RedirectResponse
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
    $validated['create_by'] = auth()->id();   // Logged-in user ID
$validated['active'] = $request->input('active', 1); // default to Active

        Client::create($validated);

        return redirect()->route('clients.index')
                         ->with('success', 'Client created successfully.');
    }

    /**
     * Show the form for editing the specified client.
     */
    public function edit(Client $client) : View
    {
        return view('clients.edit', compact('client'));
    }

    /**
     * Update the specified client in storage.
     */
    public function update(Request $request, Client $client) : RedirectResponse
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'email' => 'required|email|unique:clients,email,' . $client->id,
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
            $validated['passport_pic'] = $request->file('passport_pic')->store('clients/passports', 'public');
        }
        if ($request->hasFile('profile_image')) {
            $validated['profile_image'] = $request->file('profile_image')->store('clients/profiles', 'public');
        }

        $validated['update_by'] = auth()->id();   // Logged-in user ID
        $client->update($validated);

        return redirect()->route('clients.index')
                         ->with('success', 'Client updated successfully.');
    }

    /**
     * Remove the specified client from storage.
     */
    public function destroy(Client $client) : RedirectResponse
    {
         $client->delete_by = auth()->id();         // kisne delete kiya
    $client->deleted_at = now();                // kab delete hua
    $client->save();
//         $client->delete();
// $client->delete_by = auth()->id();         // kisne delete kiya
//     $client->save();

    // $client->deleted_at = now();                // kab delete hua
   
        return redirect()->route('clients.index')
                         ->with('success', 'Client deleted successfully.');
    }
}
