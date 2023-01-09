<?php

namespace Database\Seeders;

use App\Models\Companies;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
// use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;
// use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Uuid;


date_default_timezone_set("Asia/Jakarta");

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $id = \Ramsey\Uuid\Uuid::uuid4()->toString();

        DB::table('users')->insert([
            'id' => $id,
            'name' => 'Admin',
            'qr_code' => Str::random(20),
            // 'address' => 'Jl. Mencintaimu No.2 Kampung Gaga',
            // 'provinsi' => '31',
            // 'kabupaten' => '3174',
            // 'kecamatan' => '3174080',
            'email' => 'admin@blockchain.com',
            'phone' => '081278238080',
            // 'rekening_type' => '2',
            // 'rekening' => '5373893839',
            'gender' => '1',
            // 'postal_code' => '78456',
            'role' => '1',
            'date' => Carbon::parse('2000-01-01'),
            'date_string' => Carbon::parse('2000-01-01')->format('dmY'),
            'avatar' => '/images/default-avatar.svg',
            'password' => Hash::make('admin123'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        Companies::create([
            
            'user_id' => $id,
            'qr_code_perusahaan' => Str::random(16),
            'company_name' => 'Mcdonald Sdn. Bhd.',
            'company_location' => 'Kuala Lumpur',
            
        ]);
        
        // DB::table('users')->insert([
        //     'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
        //     'name' => 'Supervisor',
        //     'nik' => '3173087626743673',
        //     'address' => 'Jl. Mencintaimu No.3 Kampung Gaga',
        //     'provinsi' => '31',
        //     'kabupaten' => '3174',
        //     'kecamatan' => '3174080',
        //     'email' => 'supervisor@kopti.com',
        //     'phone' => '081278238081',
        //     'rekening_type' => '2',
        //     'rekening' => '5373893840',
        //     'gender' => '2',
        //     'postal_code' => '78457',
        //     'role' => '2',
        //     'date' => Carbon::parse('2000-01-01'),
        //     'date_string' => Carbon::parse('2000-01-01')->format('dmY'),
        //     'avatar' => '/images/default-avatar.svg',
        //     'password' => Hash::make('supervisor123'),
        //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        // ]);

        // DB::table('users')->insert([
        //     'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
        //     'name' => 'Member',
        //     'nik' => '3173087626743675',
        //     'address' => 'Jl. Mencintaimu No.5 Kampung Gaga',
        //     'provinsi' => '31',
        //     'kabupaten' => '3174',
        //     'kecamatan' => '3174080',
        //     'email' => 'member@kopti.com',
        //     'phone' => '081278238087',
        //     'rekening_type' => '2',
        //     'rekening' => '5373893846',
        //     'gender' => '1',
        //     'postal_code' => '78459',
        //     'role' => '0',
        //     'date' => Carbon::parse('2000-01-01'),
        //     'date_string' => Carbon::parse('2000-01-01')->format('dmY'),
        //     'avatar' => '/images/default-avatar.svg',
        //     'password' => Hash::make('member123'),
        //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        // ]);
        // DB::table('produks')->insert([
        //     'nama' => 'Tempe',
        //     'harga' => 5000,
        //     'harga_member' => 3000
        // ]);

        // DB::table('produks')->insert([
        //     'nama' => 'Tahu',
        //     'harga' => 5000,
        //     'harga_member' => 3000
        // ]);

        // DB::table('stocks')->insert([
        //     'produk_id' => 1,
        //     'user_id' => $id,
        //     'jumlah_barang' => 500
        // ]);

        // DB::table('stocks')->insert([
        //     'produk_id' => 2,
        //     'user_id' => $id,
        //     'jumlah_barang' => 500
        // ]);
    }
}
