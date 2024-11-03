<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PurchaseOrdersTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 20) as $index) {
            DB::table('purchase_orders')->insert([
                'no_po' => $faker->unique()->numerify('PO###'),
                'dibuat_oleh' => $faker->numberBetween(1, 10),
                'waktu_dibuat' => $faker->dateTime(),
                'status' => $faker->randomElement(['pending', 'disetujui', 'selesai', 'dibatalkan']),
                'waktu_disetujui' => $faker->optional()->dateTime(),
                'waktu_selesai' => $faker->optional()->dateTime(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
