<?php

namespace App\Http\Controllers\Auth;

use App\Models\Agen;
use App\Models\User;
use App\Models\Stock;
use App\Models\Produk;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Carbon;


date_default_timezone_set('Asia/Jakarta');

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/agen';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'nik' => ['required', 'string', 'min:16', 'max:16', 'unique:users'],
            'address' => ['sometimes', 'string'],
            'provinsi' => ['required', 'integer'],
            'kabupaten' => ['required', 'integer'],
            'kecamatan' => ['required', 'integer'],
            // 'added_by' => ['required', 'string'],
            'postal_code' => ['sometimes', 'integer', 'digits_between:4,6'],
            'phone' => ['required', 'string', 'min:10', 'max:13'],
            'rekening_type' => ['sometimes', 'integer'],
            'rekening' => ['required', 'string'],
            'gender' => ['required', 'integer'],
            'role' => ['required', 'integer'],
            'date' => ['required', 'date'],
            // 'date_string' => ['required', 'string'],
            // 'password' => ['sometimes', 'string', 'min:8', 'confirmed'],
            'avatar' => ['sometimes', 'image', 'mimes:jpg,jpeg,bmp,svg,png', 'max:5000'],
            
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        if(request()->has('avatar')){
            $avataruploaded = request()->file('avatar');
            $avatarname = time() . '.' . $avataruploaded->getClientOriginalExtension();
            $avatarpath = public_path('/images/');
            $avataruploaded->move($avatarpath, $avatarname);
            User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make('user123'),
                'avatar' => '/images/' . $avatarname,
            ]);
        } else {
            $get_date_pass = request()->get('date');
            $pass_date = Carbon::parse($get_date_pass)->format('dmY');
            // $date_pass = Carbon::createFromFormat('Y-m-d', request()->get('date'))->format('dmY');
            User::create([
                // 'name' => $data['name'],
                // 'email' => $data['email'],
                // 'nik' => $data['nik'],
                // 'address' => $data['address'],
                // 'provinsi' => $data['provinsi'],
                // 'kabupaten' => $data['kabupaten'],
                // 'kecamatan' => $data['kecamatan'],
                // 'postal_code' => $data['postal_code'],
                // 'phone' => $data['phone'],
                // 'rekening' => $data['rekening'],
                // 'rekening_type' => $data['rekening_type'],
                // // 'gender' => $data['gender'],
                // 'password' => Hash::make('user123'),
                'name' => $data['name'],
                'email' => $data['email'],
                'nik' => $data['nik'],
                'address' => $data['address'],
                'provinsi' => $data['provinsi'],
                'kabupaten' => $data['kabupaten'],
                'kecamatan' => $data['kecamatan'],
                'postal_code' => $data['postal_code'],
                'phone' => $data['phone'],
                'rekening_type' => $data['rekening_type'],
                'rekening' => $data['rekening'],
                'role' => $data['role'],
                'date' => $data['date'],
                'date_string' => Carbon::parse($get_date_pass)->format('dmY'),
                // 'added_by' => $data['added_by'],
                'gender' => $data['gender'],
                'password' => Hash::make($pass_date),
                
                
            ]);
        }

        $products = Produk::all();
        $idBaru = User::latest('id')->first();
        
        foreach($products as $product) {
            $stock = [
                'produk_id' => $product->id,
                'user_id' => $idBaru->id,
                'jumlah_barang' => 0
            ];


            Stock::create($stock);
        }

        // Agen::create($input);
        return redirect('agen')->with('flash_message', 'Users Added!');
    }
}
