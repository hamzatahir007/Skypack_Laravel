<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\TravelerBankAccount;
use Illuminate\Http\Request;

class TravelerBankAccountController extends Controller
{
    public function index()
    {
        $account = TravelerBankAccount::where('traveler_id', session('traveler_id'))->first();
        return view('website.pages.traveler.bank.index', compact('account'));
    }

    public function create()
    {
        $exists = TravelerBankAccount::where('traveler_id', session('traveler_id'))->exists();

        if ($exists) {
            return redirect()->route('traveler.bank.index')->with('error', 'You can only add one bank account.');
        }

        return view('website.pages.traveler.bank.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'bank_name' => 'required',
            'account_title' => 'required',
            'account_number' => 'required',
            'iban' => 'nullable',
            'swift_code' => 'nullable',
        ]);

        TravelerBankAccount::create([
            'traveler_id' => session('traveler_id'),
            ...$request->only(['bank_name','account_title','account_number','iban','swift_code']),
        ]);

        return redirect()->route('traveler.bank.index')->with('success', 'Bank account added successfully.');
    }

    public function edit(TravelerBankAccount $account)
    {
        $this->authorizeAccount($account);
        return view('website.pages.traveler.bank.edit', compact('account'));
    }

    public function update(Request $request, TravelerBankAccount $account)
    {
        $this->authorizeAccount($account);

        $request->validate([
            'bank_name' => 'required',
            'account_title' => 'required',
            'account_number' => 'required',
            'iban' => 'nullable',
            'swift_code' => 'nullable',
        ]);

        $account->update($request->only(['bank_name','account_title','account_number','iban','swift_code']));

        return redirect()->route('traveler.bank.index')->with('success', 'Bank account updated.');
    }

    private function authorizeAccount($account)
    {
        if ($account->traveler_id != session('traveler_id')) {
            abort(403);
        }
    }
}
