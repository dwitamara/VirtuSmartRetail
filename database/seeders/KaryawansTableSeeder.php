<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class KaryawansTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $roles = DB::table('role')->pluck('id_role')->toArray();

        foreach (range(1, 20) as $index) {
            DB::table('karyawan')->insert([
                'nama' => $faker->name,
                'posisi' => $faker->jobTitle,
                'gaji_pokok' => $faker->numberBetween(3000000, 9000000),
                'username' => $faker->unique()->userName,
                'password' => Hash::make('password123'),
                'email' => $faker->unique()->safeEmail,
                'id_role' => $faker->randomElement($roles),
                'remember_token' => Str::random(10),
                'status' => $faker->randomElement(['aktif', 'nonaktif']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
