<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Agen;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;
use App\Models\Bank;

date_default_timezone_set('Asia/Jakarta');

class AgenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        // return view('user.index', [
        //     'users' => DB::table('users')->paginate(15)
        // ]);
        $cari = $request->query('cari');
        if(!empty($cari)){
            if (auth()->user()->role == '1'){
                $dataagen = Agen::where('name','like',"%".$cari."%")
                ->sortable()
                ->paginate(5);
            } elseif (auth()->user()->role == '2') {
                $dataagen = Agen::where('name','like',"%".$cari."%")
                ->whereNot('role', '1')
                ->sortable()
                ->paginate(5);
            } else {
                $dataagen = Agen::where('name','like',"%".$cari."%")
                ->where('role', '0')
                ->sortable()
                ->paginate(5);
            }
        } else {
            if (auth()->user()->role == '1'){
                $dataagen = Agen::sortable()->paginate(5);
            } elseif (auth()->user()->role == '2') {
                $dataagen = Agen::whereNot('role', '1')
                ->sortable()->paginate(5);
            }else {
                $dataagen = Agen::where('role', '0')->sortable()->paginate(5);
            }
        }
        return view('agen.index')->with([
            'agen' => $dataagen,
            'cari' => $cari,
        ]);

        if (auth()->user()->role == '1'){
            $dataagen = Agen::paginate(5);
        } elseif (auth()->user()->role == '2') {
            $dataagen = Agen::whereNot('role', '1')
            ->paginate(5);
        } else {
            $dataagen = Agen::where('role', '0')->paginate(5);
        }
        
        $dataagen = Agen::where('role', '0')->paginate(5);
        return view ('agen.index')->with([
            'agen' => $dataagen,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provinces = Province::all();
        $banks = Bank::all();
        // $regencies = Regency::all();
        // $districts = District::all();
        // $villages = Village::all();
        
        // $regencies = Regency::where('name', 'LIKE', $provinces);
        // $districts = District::where('name', 'LIKE', $regencies)
        return view('agen.create', compact('provinces', 'banks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

        // $waktu = date('H:i');
        // $request->created_at = $waktu;
        // $request->updated_at = $waktu;

        Agen::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->newPassword),
        ]);

        // Agen::create($input);
        return redirect('agen')->with('flash_message', 'Users Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $agen = Agen::find($id);
        $select = $agen->provinsi;
        $select2 = $agen->kabupaten;
        $select3 = $agen->kecamatan;
        $select4 = $agen->rekening_type;
        $provinces = Province::where('id', 'like', "%$select%")->first();
        $regencies = Regency::where('id', 'like', "%$select2%")->first();
        $districts = District::where('id', 'like', "%$select3%")->first();
        $banks = Bank::where('id', 'like', "%$select4%")->first();
        // $provinces = Province::find($id);
        
        // $coba = $provinces->select
        // $regencies = Regency::all();
        // $districts = District::all();
        return view('agen.show', compact('provinces','regencies', 'districts', 'banks', 'agen', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $agen = Agen::find($id);
        return view('agen.edit')->with('agen', $agen);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $agen = Agen::find($id);
        $input = $request->all();
        $agen->update($input);
        return redirect('agen')->with('flash_message', 'Users Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Agen::destroy($id);
        return redirect('agen')->with('status', 'Pengguna berhasil dihapus!');
    }

    // public function form(){
    //     $provinces = Province::all();
    //     $regencies = Regency::all();
    //     $districts = District::all();
    //     $villages = Village::all();
    //     return view('agen.create', compact('provinces','regencies','districts','villages'));
    // }
    public function getkabupaten(Request $request){
        $id_provinsi = $request->id_provinsi;
        $kabupatens = Regency::where('province_id', $id_provinsi)->get();
        foreach($kabupatens as $kabupaten){
            echo "<option value='$kabupaten->id'>$kabupaten->name</option>";
        }
    }

    public function getkecamatan(Request $request){
        $id_kabupaten = $request->id_kabupaten;
        $kecamatans = District::where('regency_id', $id_kabupaten)->get();
        foreach($kecamatans as $kecamatan){
            echo "<option value='$kecamatan->id'>$kecamatan->name</option>";
        }
    }
}
