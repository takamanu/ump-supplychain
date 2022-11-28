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

        $transaksis = Transaksi::where('penjual', $user)->orWhere('pembeli', $user)->get();
        $pembelis = User::all();
        $penjuals = User::all();
        // return $transaksis;

        foreach($transaksis as $transaksi) {
            foreach($pembelis as $pembeli) {
                if($transaksi->pembeli === $pembeli->id) {
                    $transaksi['pembeli'] = $pembeli->name;
                }
            }
        }

        foreach($transaksis as $transaksi) {
            foreach($penjuals as $penjual) {
                if($transaksi->penjual === $penjual->id) {
                    $transaksi['penjual'] = $penjual->name;
                }
            }
        }

        $incomes = Transaksi::where('penjual', $user)->get();
        
        foreach($incomes as $income) {
            foreach($pembelis as $pembeli) {
                if($income->pembeli === $pembeli->id) {
                    $income['pembeli'] = $pembeli->name;
                }
            }
        }

        foreach($incomes as $income) {
            foreach($penjuals as $penjual) {
                if($income->penjual === $penjual->id) {
                    $income['penjual'] = $penjual->name;
                }
            }
        }

        $expenses = Transaksi::where('pembeli', $user)->get();

        foreach($expenses as $expense) {
            foreach($pembelis as $pembeli) {
                if($expense->pembeli === $pembeli->id) {
                    $expense['pembeli'] = $pembeli->name;
                }
            }
        }

        foreach($expenses as $expense) {
            foreach($penjuals as $penjual) {
                if($expense->penjual === $penjual->id) {
                    $expense['penjual'] = $penjual->name;
                }
            }
        }

        return view('transaksi.bisnis', [
            'transactions' => $transaksis,
            'incomes' => $incomes,
            'expenses' => $expenses,
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
            'bank_id' => 'required'
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

        Transaksi::create($validatedData);

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
        $pembeli = User::where('id', $transaksi->pembeli)->get();
        $penjual = User::where('id', $transaksi->penjual)->get();

        if($transaksi['pembeli'] === auth()->user()->id) {
            $transaksi['pembeli'] = auth()->user()->name;
        } else {
            $transaksi['pembeli'] = $pembeli[0]->name;
        }
        
        if($transaksi['penjual'] === auth()->user()->id) {
            $transaksi['penjual'] = auth()->user()->name;
        } else {
            $transaksi['penjual'] = $penjual[0]->name;
        }
        
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
        return view('transaksi.edit', [
            'transaksi' => $transaksi,
            'products' => Produk::all(),
            // 'users' => User::all(),
            'users' => User::all(),
            'banks' => Bank::all()
        ]);
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
        $validatedData = $request->validate([
            'pembeli' => 'required',
            'produk_id' => 'required',
            'jumlah_transaksi' => 'required',
            'bank_id' => 'required'
        ]);

        $validatedData['penjual'] = auth()->user()->id;
        
        // $validatedData['user_id'] = auth()->user()->id;
        
        $produk = Produk::where('id', $validatedData['produk_id'])->get('harga');
        $validatedData['total_harga'] = $validatedData['jumlah_transaksi'] * $produk[0]->harga;
        
        $jumlahBefore = Transaksi::where('id', $transaksi->id)->get();
        $jumlahBefore = $jumlahBefore[0]->jumlah_transaksi;

        $stock = Stock::where('user_id', $validatedData['penjual'])->where('produk_id', $validatedData['produk_id'])->get();
        $stock = $stock[0]->jumlah_barang;
        $stock = $stock + $jumlahBefore;

        if($stock < $validatedData['jumlah_transaksi']) {
            return redirect('/transaksi')->with('fail', 'Stock tidak mencukupi. Silahkan tambah stock produk anda.');
        }

        Transaksi::where('id', $transaksi->id)->update($validatedData);

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

        return redirect('/transaksi')->with('success', 'Transaksi telah berhasil diubah');
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
