<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PengembalianBarangKeSuppliersTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $returBarangs = DB::table('retur_barang')->pluck('id_retur')->toArray();

        foreach (range(1, 20) as $index) {
            DB::table('pengembalian_barang_ke_supplier')->insert([
                'id_retur' => $faker->randomElement($returBarangs),
                'tanggal_pengembalian' => $faker->date(),
                'dikirim_oleh' => $faker->numberBetween(1, 10),
                'status_pengiriman' => $faker->randomElement(['pending', 'dikirim', 'diterima_supplier']),
                'catatan' => $faker->sentence,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
