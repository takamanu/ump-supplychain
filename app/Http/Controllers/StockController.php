<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Http\Requests\StoreStockRequest;
use App\Http\Requests\UpdateStockRequest;
use Illuminate\Http\Request;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return auth()->user()->id;

        $stocks = Stock::all();

        return view('persediaan.stock', [
            'stocks' => $stocks
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('persediaan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStockRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validatedData = $request->validate([
        //     'nama' => 'required|max:255|unique:stocks',
        //     'harga' => 'required',
        //     'harga_member' => '',
        //     'stok' => 'required'
        // ]);
        Stock::create([
            'user_id' => auth()->user()->id, 
            'components_name' => $request->components_name,
            'components_value' => $request->components_value,
        ]);

        return redirect('/persediaan')->with('success', 'Komponen berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function show(Stock $stock, $id)
    {
        $stock = Stock::find($id);

        return view('persediaan.show', [
            'stock' => $stock
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function edit(Stock $stock, $id)
    {
        $stock = Stock::all()->where('id', $id);
        $stock_id = $id - 1;
        $stock = $stock[$stock_id];

        return view('persediaan.edit', [
            'stock' => $stock
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStockRequest  $request
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStockRequest $request, Stock $stock, $id)
    {
        $validatedData = $request->validate([
            'jumlah_barang' => 'required'
        ]);

        $validatedData['produk_id'] = $id;
        $validatedData['user_id'] = auth()->user()->id;
        
        Stock::where('id', $id)->update($validatedData);

        return redirect('/persediaan')->with('success', 'Stok produk berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stock $stock, $id)
    {
        // Stock::destroy($stock->id);

        Stock::where('id', $id)->update(['jumlah_barang' => 0]);

        return redirect('/persediaan')->with('success', 'Stock telah berhasil dihapus');
    }
}