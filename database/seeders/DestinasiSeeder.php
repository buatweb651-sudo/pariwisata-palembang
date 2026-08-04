<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Destinasi;

class DestinasiSeeder extends Seeder
{
    public function run(): void
    {
        Destinasi::truncate();
 
        Destinasi::create([
        'nama' => 'Pulau Kemaro',
        'deskripsi' => 'Pulau kecil di tengah Sungai Musi yang terkenal dengan legenda cinta, pagoda, kelenteng, serta menjadi lokasi perayaan Cap Go Meh.',
        'gambar' => 'plb 1.jpg',
        'jam_buka' => '08:00:00',
        'jam_tutup' => '18:00:00',
        'lokasi' => 'Pulau Kemaro, Kelurahan 1 Ilir, Kecamatan Ilir Timur II, Kota Palembang, Provinsi Sumatera Selatan,',
        ]);

        Destinasi::create([
        'nama' => 'Benteng Kuto Besak',
        'deskripsi' => 'Benteng peninggalan Kesultanan Palembang yang menjadi ikon kota dan menawarkan pemandangan Sungai Musi serta Jembatan Ampera',
        'gambar' => 'plb 2.jpg',
        'jam_buka' => '07:00:00',
        'jam_tutup' => '18:00:00',
        'lokasi' => 'Jl. Sultan Mahmud Badaruddin, 19 llir, Kecamatan Bukit Kecil',
        ]);

        Destinasi::create([
        'nama' => 'Sentra Kuliner Palembang',
        'deskripsi' => 'Pusat wisata kuliner yang menyediakan berbagai makanan khas Palembang, seperti pempek, tekwan, model, dan hidangan tradisional lainnya.',
        'gambar' => 'plb 3.jpg',
        'jam_buka' => '10:00:00',
        'jam_tutup' => '22:00:00',
        'lokasi' => 'Jl. Dr. AK Gani No. 3, Kelurahan 19 llir, Kecamatan Bukit Kecil,',
        ]);

 
    }

}
