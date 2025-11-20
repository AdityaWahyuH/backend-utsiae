<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $books = [
            [
                'judul' => 'Laskar Pelangi',
                'pengarang' => 'Andrea Hirata',
                'penerbit' => 'Bentang Pustaka',
                'tahun_terbit' => 2005,
                'jumlah_halaman' => 529,
                'kategori' => 'Fiksi',
                'isbn' => '979-3062-79-7',
                'status' => 'Tersedia'
            ],
            [
                'judul' => 'Bumi Manusia',
                'pengarang' => 'Pramoedya Ananta Toer',
                'penerbit' => 'Hasta Mitra',
                'tahun_terbit' => 1980,
                'jumlah_halaman' => 535,
                'kategori' => 'Fiksi',
                'isbn' => '979-9731-23-X',
                'status' => 'Dipinjam'
            ],
            [
                'judul' => 'Filosofi Teras',
                'pengarang' => 'Henry Manampiring',
                'penerbit' => 'Kompas',
                'tahun_terbit' => 2018,
                'jumlah_halaman' => 346,
                'kategori' => 'Non-Fiksi',
                'isbn' => '978-602-412-518-9',
                'status' => 'Tersedia'
            ]
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}