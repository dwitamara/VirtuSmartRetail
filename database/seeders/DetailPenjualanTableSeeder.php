<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DetailPenjualanTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $penjualans = DB::table('transaksi_penjualan')->pluck('id_penjualan')->toArray();
        $produks = DB::table('produk')->pluck('id_produk')->toArray();

        foreach (range(1, 20) as $index) {
            DB::table('detail_penjualan')->insert([
                'id_penjualan' => $faker->randomElement($penjualans),
                'id_produk' => $faker->randomElement($produks),
                'jumlah' => $faker->numberBetween(1, 10),
                'harga_satuan' => $faker->numberBetween(10000, 100000),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
