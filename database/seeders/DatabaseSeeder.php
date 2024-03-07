<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Book;
use App\Models\Review;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //Create 33 books good rate
        Book::factory(33)->create()->each(function ($book) {
            //Generate random reviews
            $numReviews = random_int(5, 30);

            //Generate reviews and create
            Review::factory()->count($numReviews)
                ->good()
                ->for($book)
                ->create();
        });

        //Create 33 books average rate
        Book::factory(33)->create()->each(function ($book) {
            //Generate random reviews
            $numReviews = random_int(5, 30);

            //Generate reviews and create
            Review::factory()->count($numReviews)
                ->average()
                ->for($book)
                ->create();
        });

        //Create 33 books with bad rate
        Book::factory(33)->create()->each(function ($book) {
            //Generate random reviews
            $numReviews = random_int(5, 30);

            //Generate reviews and create
            Review::factory()->count($numReviews)
                ->bad()
                ->for($book)
                ->create();
        });
    }
}
