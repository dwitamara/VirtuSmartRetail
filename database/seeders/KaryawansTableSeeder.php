<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class KaryawansTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $roles = DB::table('role')->pluck('id_role')->toArray();
        $shifts = DB::table('shifts')->pluck('id_shift')->toArray();

        foreach (range(1, 20) as $index) {
            DB::table('karyawan')->insert([
                'nama' => $faker->name,
                'posisi' => $faker->jobTitle,
                'gaji_pokok' => $faker->numberBetween(3000000, 9000000),
                'id_shift' => $faker->randomElement($shifts),
                'username' => $faker->unique()->userName,
                'password' => Hash::make('password123'),
                'email' => $faker->unique()->safeEmail,
                'id_role' => $faker->randomElement($roles),
                'status' => $faker->randomElement(['aktif', 'nonaktif']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
