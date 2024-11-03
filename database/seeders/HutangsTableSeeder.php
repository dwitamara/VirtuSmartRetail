<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class HutangsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $suppliers = DB::table('supplier')->pluck('id_supplier')->toArray();

        foreach (range(1, 20) as $index) {
            DB::table('hutang')->insert([
                'id_supplier' => $faker->randomElement($suppliers),
                'tanggal_hutang' => $faker->date(),
                'jumlah_hutang' => $faker->numberBetween(100000, 1000000),
                'status' => $faker->randomElement(['Lunas', 'Belum Lunas']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
