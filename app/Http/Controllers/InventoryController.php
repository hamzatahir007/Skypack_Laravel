<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
        $inventory = Inventory::latest()->paginate(15);
        return view('inventory.index', compact('inventory'));
    }

    public function create()
    {
        return view('inventory.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'rate' => 'nullable|numeric',
            'unit' => 'nullable|string',
        ]);

        Inventory::create($request->only([
            'name','under','isgroup','level','description','active','rate','unit','brand','model','size','keyfield'
        ]));

        return redirect()->route('inventory.index')->with('success','Inventory item created.');
    }

    public function edit($id)
    {
        $inventory = Inventory::findOrFail($id);
        return view('inventory.edit', compact('inventory'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'rate' => 'nullable|numeric',
            'unit' => 'nullable|string',
        ]);

        $item = Inventory::findOrFail($id);
        $item->update($request->only([
            'name','under','isgroup','level','description','active','rate','unit','brand','model','size','keyfield'
        ]));

        return redirect()->route('inventory.index')->with('success','Inventory item updated.');
    }

    public function destroy($id)
    {
        Inventory::findOrFail($id)->delete();
        return back()->with('success','Inventory item deleted.');
    }
}
