<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Produk;
use App\Models\Stock;
use App\Models\User;
use App\Models\Bank;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $date = Carbon::now();
        $bulan = $date->format('F');

        // $masuk = \DB::select('SELECT SUM(total_harga) FROM transaksis WHERE jenis_transaksi = "Pembelian"');
        // $keluar = \DB::select('SELECT SUM(total_harga) FROM transaksis WHERE jenis_transaksi = "Penjualan"');
        $masuk = DB::table('transaksis')->where('penjual', auth()->user()->id)->whereMonth('created_at', Carbon::now()->month)->get()->sum('total_harga');
        $keluar = DB::table('transaksis')->where('pembeli', auth()->user()->id)->whereMonth('created_at', Carbon::now()->month)->get()->sum('total_harga');
        
        $saldo = $masuk - $keluar;

        // Selanjutnya tambahkan user_id
            // Transaksi::where('user_id', auth()->user()->id)->get();
        
        $user = auth()->user()->id;

        return view('transaksi.bisnis', [
            'transactions' => Transaksi::where('penjual', $user)->orWhere('pembeli', $user)->get(),
            'incomes' => Transaksi::where('penjual', $user)->get(),
            'expenses' => Transaksi::where('pembeli', $user)->get(),
            'bulan' => $bulan,
            'saldo' => $saldo
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('transaksi.create', [
            'products' => Produk::all(),
            // 'users' => User::all(),
            'users' => User::all(),
            'banks' => Bank::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'pembeli' => 'required',
            'produk_id' => 'required',
            'jumlah_transaksi' => 'required',
            'metode_pembayaran' => 'required'
        ]);

        $validatedData['penjual'] = auth()->user()->id;
        
        // $validatedData['user_id'] = auth()->user()->id;
        
        $produk = Produk::where('id', $validatedData['produk_id'])->get('harga');
        $validatedData['total_harga'] = $validatedData['jumlah_transaksi'] * $produk[0]->harga;
        
        $stock = Stock::where('user_id', $validatedData['penjual'])->where('produk_id', $validatedData['produk_id'])->get();
        $stock = $stock[0]->jumlah_barang;

        if($stock < $validatedData['jumlah_transaksi']) {
            return redirect('/transaksi')->with('fail', 'Stock tidak mencukupi. Silahkan tambah stock produk anda.');
        }

        // Transaksi::create($validatedData);

        $stock = $stock - $validatedData['jumlah_transaksi'];

        $stockPembeli = Stock::where('user_id', $validatedData['pembeli'])->where('produk_id', $validatedData['produk_id'])->get();
        $stockPembeli = $stockPembeli[0]->jumlah_barang;
        $stockPembeli = $stockPembeli + $validatedData['jumlah_transaksi'];
        

        if($validatedData['jumlah_transaksi'] >= 500) {
            User::where('id', $validatedData['pembeli'])->update(['role' => 2]);
        }

        Stock::where('user_id', $validatedData['penjual'])->where('produk_id', $validatedData['produk_id'])->update(['jumlah_barang' => $stock]);
        Stock::where('user_id', $validatedData['pembeli'])->where('produk_id', $validatedData['produk_id'])->update(['jumlah_barang' => $stockPembeli]);
        $stock = Stock::where('user_id', $validatedData['penjual'])->where('produk_id', $validatedData['produk_id'])->get();

        return redirect('/transaksi')->with('success', 'Transaksi telah berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        // return $transaksi;

        return view('transaksi.show', [
            'transaksi' => $transaksi
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        Transaksi::destroy($transaksi->id);

        return redirect('/transaksi')->with('success', 'Data telah berhasil dihapus!');
    }
}
