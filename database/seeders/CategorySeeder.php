<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'nama_kategori' => 'Spek Dewa',
                'keterangan' => 'Spesifikasi Tinggi'
            ],
            [
                'nama_kategori' => 'Spek Lumayan',
                'keterangan' => 'Spesifikasi Lumayan'
            ],
            [
                'nama_kategori' => 'Spek Biasa',
                'keterangan' => 'Spefikasi Biasa Saja'
            ]
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
