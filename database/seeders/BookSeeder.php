<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::create([
            "name"=> "Tiếng Anh 2",
            "quantity"=> "23",
            "price"=>"23000000",
            "description"=>"Day la sach tieng anh",
            "author"=>"Tran Ha"
        ]);
    }
}
