<?php

namespace Database\Seeders;

use App\Models\Laptop;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LaptopSeeder extends Seeder
{
    public function run(): void
    {
        $laptops =  [
            [
                'id' => 'tt1746090',
                'nama' => 'Apple MacBook Pro:',
                'deskripsi' => 'MacBook Pro adalah laptop unggulan dari Apple, menampilkan desain yang tipis, bodi dari bahan berkualitas tinggi, dan layar Retina yang tajam. Ditenagai oleh prosesor kinerja tinggi, MacBook Pro dikenal karena keandalan dan kecepatannya, menjadi pilihan utama untuk pengguna kreatif dan profesional.',
                'tahun' => 2020,
                'category_id' => 1,
                'brand' => 'Apple',
                'foto_sampul' => 'apple.jpg',
            ],
            [
                'id' => 'tt0944947',
                'nama' => 'Dell XPS 13',
                'deskripsi' => 'Dell XPS 13 adalah laptop ultrabook yang menonjol dengan desain bezel-tipisnya, menghadirkan layar InfinityEdge yang memukau. Ditenagai oleh prosesor Intel Core terbaru, XPS 13 memberikan kombinasi sempurna antara portabilitas, daya tahan baterai, dan kinerja tinggi.',
                'tahun' => 2018,
                'category_id' => 1,
                'brand' => 'Dell',
                'foto_sampul' => 'dell.jpg',
            ],
            [
                'id' => 'tt0111161',
                'nama' => 'HP Spectre x360',
                'deskripsi' => ' HP Spectre x360 adalah laptop 2-in-1 yang memukau dengan desain premium dan konsep engsel 360 derajat yang memungkinkan penggunaan sebagai laptop atau tablet. Dilengkapi dengan layar OLED yang tajam, Spectre x360 menyajikan pengalaman multimedia yang luar biasa.',
                'tahun' => 2016,
                'category_id' => 2,
                'brand' => 'HP',
                'foto_sampul' => 'HP.jpg',
            ],
            [
                'id' => 'tt0109830',
                'nama' => 'Lenovo ThinkPad X1 Carbon',
                'deskripsi' => 'ThinkPad X1 Carbon adalah laptop bisnis ultrabook dari Lenovo yang menonjol dengan keandalan dan ketahanan. Dilengkapi dengan keyboard ergonomis, layar berkualitas tinggi, dan fitur keamanan canggih, X1 Carbon adalah pilihan utama untuk para profesional yang mobile.',
                'tahun' => 2023,
                'category_id' => 2,
                'brand' => 'Lenovo',
                'foto_sampul' => 'lenovo.jpg',
            ],
            [
                'id' => 'tt0108778',
                'nama' => 'Asus ROG Zephyrus G14',
                'deskripsi' => 'ROG Zephyrus G14 adalah laptop gaming kompak dan bertenaga tinggi dari Asus. Ditenagai oleh prosesor AMD Ryzen dan GPU NVIDIA GeForce, Zephyrus G14 menyajikan kinerja grafis luar biasa dalam desain yang ringkas dan ringan, membuatnya ideal untuk gaming on-the-go.',
                'tahun' => 2022,
                'category_id' => 1,
                'brand' => 'Asus',
                'foto_sampul' => 'asus.jpg',
            ],
            [
                'id' => 'tt0109831',
                'nama' => 'Acer Predator Helios 300',
                'deskripsi' => 'Acer Predator Helios 300 adalah laptop gaming dari Acer yang menawarkan kinerja tinggi dengan harga terjangkau. Ditenagai oleh prosesor Intel Core i7 dan GPU NVIDIA GeForce GTX atau RTX, Helios 300 hadir dengan layar dengan refresh rate tinggi untuk pengalaman gaming yang halus.',
                'tahun' => 2020,
                'category_id' => 1,
                'brand' => 'Acer',
                'foto_sampul' => 'acer.jpg',
            ],
            [
                'id' => 'tt1234567',
                'nama' => 'Samsung Galaxy Book Flex',
                'deskripsi' => 'Galaxy Book Flex adalah laptop 2-in-1 dari Samsung dengan desain tipis dan ringan. Fitur utama dari laptop ini adalah layar QLED yang cerah dan warna yang hidup, serta kemampuan untuk berfungsi sebagai tablet atau laptop sesuai kebutuhan.',
                'tahun' => 2024,
                'category_id' => 1,
                'brand' => 'Samsung',
                'foto_sampul' => 'samsung.jpg',
            ]
        ];
        foreach ($laptops as $laptop) {
            Laptop::create([
                'id' => $laptop['id'],
                'nama' => $laptop['nama'],
                'deskripsi' => $laptop['deskripsi'],
                'tahun' => $laptop['tahun'],
                'category_id' => $laptop['category_id'],
                'brand' => $laptop['brand'],
                'foto_sampul' => $laptop['foto_sampul'],
            ]);
        }

    }
}
