<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class TransaksiPenjualansTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $pelanggans = DB::table('pelanggan')->pluck('id_pelanggan')->toArray();

        foreach (range(1, 20) as $index) {
            DB::table('transaksi_penjualan')->insert([
                'id_pelanggan' => $faker->randomElement($pelanggans),
                'tanggal_penjualan' => $faker->date(),
                'total_harga' => $faker->numberBetween(100000, 1000000),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
