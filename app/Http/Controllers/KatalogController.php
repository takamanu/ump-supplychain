<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KatalogController extends Controller
{
    public function index() {
        return view('produk.produk');
    }

    public function create() {
        return view('katalog.create');
    }
}
