<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PurchaseOrderItemsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $purchaseOrders = DB::table('purchase_orders')->pluck('id_po')->toArray();

        foreach (range(1, 20) as $index) {
            DB::table('purchase_order_items')->insert([
                'id_po' => $faker->randomElement($purchaseOrders),
                'nama_barang' => $faker->word,
                'deskripsi_barang' => $faker->sentence,
                'jumlah' => $faker->numberBetween(1, 100),
                'harga_perkiraan' => $faker->numberBetween(10000, 100000),
                'total_harga' => $faker->numberBetween(100000, 1000000),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
