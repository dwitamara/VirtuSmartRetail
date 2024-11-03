<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class JurnalsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $akuns = DB::table('akun')->pluck('id_akun')->toArray();

        foreach (range(1, 20) as $index) {
            DB::table('jurnal')->insert([
                'id_akun' => $faker->randomElement($akuns),
                'tanggal_jurnal' => $faker->date(),
                'debet' => $faker->numberBetween(10000, 100000),
                'kredit' => $faker->numberBetween(10000, 100000),
                'keterangan' => $faker->sentence,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
