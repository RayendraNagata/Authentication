<?php

namespace Database\Seeders;

use App\Models\Buku; // Pastikan model sesuai dengan yang Anda gunakan
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            Buku::create([
                'judul' => $faker->sentence(3), // Menghasilkan judul dengan 3 kata
                'penulis' => $faker->name(),
                'harga' => $faker->numberBetween(10000, 50000),
                'tgl_terbit' => $faker->date(),
            ]);
        }
    }
}
