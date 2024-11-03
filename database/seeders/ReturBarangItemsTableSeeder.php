<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ReturBarangItemsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $returBarangs = DB::table('retur_barang')->pluck('id_retur')->toArray();
        $purchaseOrderItems = DB::table('purchase_order_items')->pluck('id_item_po')->toArray();

        foreach (range(1, 20) as $index) {
            DB::table('retur_barang_items')->insert([
                'id_retur' => $faker->randomElement($returBarangs),
                'id_item_po' => $faker->randomElement($purchaseOrderItems),
                'jumlah_diretur' => $faker->numberBetween(1, 100),
                'kondisi_barang' => $faker->randomElement(['rusak', 'tidak sesuai', 'lainnya']),
                'catatan' => $faker->sentence,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
