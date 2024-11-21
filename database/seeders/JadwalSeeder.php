<?php

namespace Database\Seeders;

use App\Models\Karyawan;
use App\Models\Shift;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class JadwalSeeder extends Seeder
{
    /**
     * Jalankan seeder untuk tabel jadwal.
     *
     * @return void
     */
    public function run()
    {
        // Mengambil beberapa karyawan dan shift secara acak
        $karyawans = Karyawan::all();  // Mengambil semua karyawan
        $shifts = Shift::all();  // Mengambil semua shift
        $faker = Faker::create();

        foreach ($karyawans as $karyawan) {
            // Membuat 5 jadwal acak untuk setiap karyawan
            foreach (range(1, 5) as $index) {
                DB::table('jadwal')->insert([
                    'id_karyawan' => $karyawan->id_karyawan,  // ID karyawan acak
                    'id_shift' => $shifts->random()->id_shift,  // ID shift acak
                    'tanggal' => $faker->date(),  // Tanggal acak
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
