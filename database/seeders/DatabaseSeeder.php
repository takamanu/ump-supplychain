<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Stock;
use App\Models\Produk;
use App\Models\Transaksi;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Produk::create([
            'nama' => 'Tempe',
            'harga' => 5000,
            'harga_member' => 3000
        ]);
        
        Produk::create([
            'nama' => 'Tahu',
            'harga' => 5000,
            'harga_member' => 3000
        ]);

        
        
    }
}
