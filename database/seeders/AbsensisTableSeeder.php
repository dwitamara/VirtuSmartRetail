<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class AbsensisTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $karyawans = DB::table('karyawan')->pluck('id_karyawan')->toArray();

        foreach (range(1, 20) as $index) {
            DB::table('absensi')->insert([
                'id_karyawan' => $faker->randomElement($karyawans),
                'tanggal' => $faker->date(),
                'jam_masuk' => $faker->time(),
                'jam_keluar' => $faker->time(),
                'status_hadir' => $faker->randomElement(['Hadir', 'Izin', 'Sakit', 'Alpa']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
