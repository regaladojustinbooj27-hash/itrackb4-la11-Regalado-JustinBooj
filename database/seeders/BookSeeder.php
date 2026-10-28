<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Genre;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        // Lookup rows first, each held in a variable
        $historical = Genre::create(['name' => 'Historical Fiction']);
        $tragedy    = Genre::create(['name' => 'Tragedy']);
        $romance    = Genre::create(['name' => 'Romance']);
        $drama      = Genre::create(['name' => 'Drama']);
        $dystopian  = Genre::create(['name' => 'Dystopian']);

        // Then the books, each pointing at a real genre row
        Book::create([
            'title' => 'War and Peace',
            'author' => 'Leo Tolstoy',
            'year' => 1869,
            'is_available' => true,
            'genre_id' => $historical->id,
        ]);

        Book::create([
            'title' => 'The Great Gatsby',
            'author' => 'F. Scott Fitzgerald',
            'year' => 1925,
            'is_available' => true,
            'genre_id' => $tragedy->id,
        ]);

        Book::create([
            'title' => 'Pride and Prejudice',
            'author' => 'Jane Austen',
            'year' => 1813,
            'is_available' => false,
            'genre_id' => $romance->id,
        ]);

        Book::create([
            'title' => 'To Kill a Mockingbird',
            'author' => 'Harper Lee',
            'year' => 1960,
            'is_available' => true,
            'genre_id' => $drama->id,
        ]);

        Book::create([
            'title' => '1984',
            'author' => 'George Orwell',
            'year' => 1949,
            'is_available' => true,
            'genre_id' => $dystopian->id,
        ]);

        Book::create([
            'title' => 'Animal Farm',
            'author' => 'George Orwell',
            'year' => 1945,
            'is_available' => false,
            'genre_id' => $dystopian->id,
        ]);
    }
}