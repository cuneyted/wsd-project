<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use Illuminate\Database\Seeder;

class RestaurantSeeder extends Seeder
{
    public function run(): void
    {
        Restaurant::truncate();

        $restaurants = [
            ['name' => 'Warsaw Pizza Center', 'latitude' => 52.2297, 'longitude' => 21.0122, 'category' => 'pizza', 'rating' => 4.5, 'album_number' => '78745'],
            ['name' => 'Warsaw Sushi Point', 'latitude' => 52.2305, 'longitude' => 21.0108, 'category' => 'sushi', 'rating' => 4.7, 'album_number' => '78745'],
            ['name' => 'Warsaw Vegan House', 'latitude' => 52.2278, 'longitude' => 21.0014, 'category' => 'vegan', 'rating' => 4.2, 'album_number' => '78745'],
            ['name' => 'Krakow Burger Spot', 'latitude' => 50.0647, 'longitude' => 19.9450, 'category' => 'burger', 'rating' => 4.3, 'album_number' => '78745'],
            ['name' => 'Krakow Sushi Bar', 'latitude' => 50.0619, 'longitude' => 19.9368, 'category' => 'sushi', 'rating' => 4.6, 'album_number' => '78745'],
            ['name' => 'Katowice Pizza Hub', 'latitude' => 50.2649, 'longitude' => 19.0238, 'category' => 'pizza', 'rating' => 4.1, 'album_number' => '78745'],
            ['name' => 'Katowice Vegan Bowl', 'latitude' => 50.2599, 'longitude' => 19.0215, 'category' => 'vegan', 'rating' => 4.4, 'album_number' => '78745'],
            ['name' => 'Gdansk Burger Club', 'latitude' => 54.3520, 'longitude' => 18.6466, 'category' => 'burger', 'rating' => 4.0, 'album_number' => '78745'],
            ['name' => 'Gdansk Sushi Wave', 'latitude' => 54.3475, 'longitude' => 18.6453, 'category' => 'sushi', 'rating' => 4.8, 'album_number' => '78745'],
            ['name' => 'Wroclaw Pizza Town', 'latitude' => 51.1079, 'longitude' => 17.0385, 'category' => 'pizza', 'rating' => 4.3, 'album_number' => '78745'],
        ];

        foreach ($restaurants as $restaurant) {
            Restaurant::create($restaurant);
        }
    }
}
