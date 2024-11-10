<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\RolesTableSeeder;
use Database\Seeders\ShiftsTableSeeder;
use Database\Seeders\KaryawansTableSeeder;
use Database\Seeders\PelangganTableSeeder;
use Database\Seeders\TransaksiPenjualansTableSeeder;
use Database\Seeders\DetailPenjualanTableSeeder;
use Database\Seeders\ProduksTableSeeder;
use Database\Seeders\SuppliersTableSeeder;
use Database\Seeders\StokopnamesTableSeeder;
use Database\Seeders\PurchaseOrdersTableSeeder;
use Database\Seeders\PurchaseOrderItemsTableSeeder;
use Database\Seeders\PembayaransTableSeeder;
use Database\Seeders\PenerimaanBarangsTableSeeder;
use Database\Seeders\PenerimaanBarangItemsTableSeeder;
use Database\Seeders\ReturBarangsTableSeeder;
use Database\Seeders\ReturBarangItemsTableSeeder;
use Database\Seeders\PengembalianBarangKeSuppliersTableSeeder;
use Database\Seeders\AkunsTableSeeder;
use Database\Seeders\JurnalsTableSeeder;
use Database\Seeders\HutangsTableSeeder;
use Database\Seeders\JadwalSeeder;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $this->call([
            RolesTableSeeder::class,
            ProduksTableSeeder::class,
            ShiftsTableSeeder::class,
            SuppliersTableSeeder::class,
            KaryawansTableSeeder::class,
            PelangganTableSeeder::class,
            TransaksiPenjualansTableSeeder::class,
            DetailPenjualanTableSeeder::class,
            StokopnamesTableSeeder::class,
            PurchaseOrdersTableSeeder::class,
            PurchaseOrderItemsTableSeeder::class,
            PembayaransTableSeeder::class,
            PenerimaanBarangsTableSeeder::class,
            PenerimaanBarangItemsTableSeeder::class,
            ReturBarangsTableSeeder::class,
            ReturBarangItemsTableSeeder::class,
            PengembalianBarangKeSuppliersTableSeeder::class,
            AkunsTableSeeder::class,
            JurnalsTableSeeder::class,
            HutangsTableSeeder::class,
            JadwalSeeder::class,
        ]);
    }
}
