<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\InventoryImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $inventories = DB::table('inventories')
            ->select('inventories.id', 'inventories.name', 'inventories.description')
            ->get();

        $inventoryImages = DB::table('inventory_images')
            ->select('inventory_images.id', 'inventory_images.image', 'inventory_images.inventory_id')
            ->get();

        // group inventoryimages by invoetory id foreach
        $inventoryImagesGrouped = [];
        foreach ($inventoryImages as $inventoryImage) {
            $inventoryImagesGrouped[$inventoryImage->inventory_id][] = $inventoryImage;
        }

        foreach ($inventories as $inventory) {
            $inventory->images = $inventoryImagesGrouped[$inventory->id] ?? [];
        }
        // dd($inventories);


        return view('inventory', ['inventories' => $inventories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function post(Request $request)
    {
        if ($request->inputTitle === 'edit') {
            return $this->update($request);
        } else {
            return $this->store($request);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inventory = new Inventory();
        $inventory->name = $request->name;
        $inventory->description = $request->description;
        $inventory->save();

        $name = $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('public', $name);

        $inventoryImage = new InventoryImage();
        $inventoryImage->image = $name;
        $inventoryImage->inventory_id = $inventory->id;
        $inventoryImage->save();

        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function show(Inventory $inventory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function edit(Inventory $inventory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $inventory = Inventory::find($request->id);
        $inventory->name = $request->name;
        $inventory->description = $request->description;
        $inventory->save();

        if ($request->hasFile('image')) {
            $name = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public', $name);

            $inventoryImage = new InventoryImage();
            $inventoryImage->image = $name;
            $inventoryImage->inventory_id = $inventory->id;
            $inventoryImage->save();
        }

        return redirect()->back()->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        DB::table('inventories')->where('id', $request->id)->delete();

        return redirect()->back()->with('success', 'Barang berhasil dihapus');
    }
}
