<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ProduksTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 20) as $index) {
            DB::table('produk')->insert([
                'nama_produk' => $faker->word,
                'kategori' => $faker->word,
                'stok' => $faker->numberBetween(10, 100),
                'harga_beli' => $faker->numberBetween(5000, 50000),
                'harga_jual' => $faker->numberBetween(10000, 100000),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
