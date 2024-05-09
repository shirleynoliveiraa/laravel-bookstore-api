<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Store::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required|string',
            'active' => 'boolean',
        ]);

        return Store::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $store = Store::find($id);

        if(!$store) {
            return response()->json(['message' => 'Store not found'], 404);
        }
        return $store;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Store $store)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required|string',
            'active' => 'boolean',
        ]);

        $store->update($request->all());

        return $store;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Store $store)
    {
        $store->delete();

        return response()->json(null, 204);
    }
}
