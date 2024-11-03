<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('role')->insert([
            ['role_name' => 'HRD', 'description' => 'Human Resources Department'],
            ['role_name' => 'Inventaris', 'description' => 'Inventory Management'],
            ['role_name' => 'Admin', 'description' => 'Administrator role'],
            ['role_name' => 'Keuangan', 'description' => 'Finance Department'],
            ['role_name' => 'Penjualan', 'description' => 'Sale Department'],
        ]);
    }
}
