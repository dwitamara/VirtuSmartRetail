<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShiftsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('shifts')->insert([
            ['nama_shift' => 'Pagi', 'jam_mulai' => '07:00:00', 'jam_selesai' => '15:00:00'],
            ['nama_shift' => 'Sore', 'jam_mulai' => '15:00:00', 'jam_selesai' => '23:00:00'],
            ['nama_shift' => 'Malam', 'jam_mulai' => '23:00:00', 'jam_selesai' => '07:00:00'],
        ]);
    }
}
