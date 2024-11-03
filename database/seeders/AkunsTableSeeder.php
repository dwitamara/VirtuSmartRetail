<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class AkunsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 20) as $index) {
            DB::table('akun')->insert([
                'nama_akun' => $faker->word,
                'tipe' => $faker->randomElement(['Asset', 'Kewajiban', 'Ekuitas', 'Pendapatan', 'Beban']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
