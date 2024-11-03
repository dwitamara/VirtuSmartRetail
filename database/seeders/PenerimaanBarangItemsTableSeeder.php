<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PenerimaanBarangItemsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $penerimaanBarangs = DB::table('penerimaan_barang')->pluck('id_penerimaan')->toArray();
        $purchaseOrderItems = DB::table('purchase_order_items')->pluck('id_item_po')->toArray();

        foreach (range(1, 20) as $index) {
            DB::table('penerimaan_barang_items')->insert([
                'id_penerimaan' => $faker->randomElement($penerimaanBarangs),
                'id_item_po' => $faker->randomElement($purchaseOrderItems),
                'jumlah_diterima' => $faker->numberBetween(1, 100),
                'kondisi' => $faker->randomElement(['baik', 'rusak', 'hilang']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
