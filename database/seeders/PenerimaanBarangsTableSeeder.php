<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PenerimaanBarangsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $purchaseOrders = DB::table('purchase_orders')->pluck('id_po')->toArray();

        foreach (range(1, 20) as $index) {
            DB::table('penerimaan_barang')->insert([
                'id_po' => $faker->randomElement($purchaseOrders),
                'tanggal_terima' => $faker->date(),
                'diterima_oleh' => $faker->numberBetween(1, 10),
                'status' => $faker->randomElement(['selesai', 'sebagian', 'rusak', 'pending']),
                'catatan' => $faker->sentence,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
