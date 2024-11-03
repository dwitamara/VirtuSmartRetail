<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PenggajiansTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $karyawans = DB::table('karyawan')->pluck('id_karyawan')->toArray();

        foreach (range(1, 20) as $index) {
            $gaji_pokok = $faker->numberBetween(3000000, 10000000);
            $potongan = $faker->numberBetween(100000, 500000);
            $tunjangan = $faker->numberBetween(500000, 2000000);
            $total_gaji = $gaji_pokok - $potongan + $tunjangan;

            DB::table('penggajian')->insert([
                'id_karyawan' => $faker->randomElement($karyawans),
                'gaji_bulan' => $faker->date(),
                'potongan' => $potongan,
                'tunjangan' => $tunjangan,
                'total_gaji' => $total_gaji,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
