<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PembayaransTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $purchaseOrders = DB::table('purchase_orders')->pluck('id_po')->toArray();

        foreach (range(1, 20) as $index) {
            DB::table('pembayaran')->insert([
                'id_po' => $faker->randomElement($purchaseOrders),
                'tanggal_pembayaran' => $faker->date(),
                'jumlah_dibayar' => $faker->numberBetween(100000, 1000000),
                'status_pembayaran' => $faker->randomElement(['pending', 'selesai']),
                'disetujui_oleh' => $faker->numberBetween(1, 10),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
