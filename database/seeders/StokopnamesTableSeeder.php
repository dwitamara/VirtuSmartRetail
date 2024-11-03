<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class StokopnamesTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $produks = DB::table('produk')->pluck('id_produk')->toArray();

        foreach (range(1, 20) as $index) {
            $jumlah_sebenarnya = $faker->numberBetween(10, 100);
            $stok = DB::table('produk')->where('id_produk', $produks[$index % count($produks)])->value('stok');
            $selisih = $jumlah_sebenarnya - $stok;

            DB::table('stokopname')->insert([
                'id_produk' => $faker->randomElement($produks),
                'tanggal_opname' => $faker->date(),
                'jumlah_sebenarnya' => $jumlah_sebenarnya,
                'selisih' => $selisih,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
