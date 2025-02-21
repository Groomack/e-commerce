<?php

namespace Database\Seeders;

use Illuminate\Support\Arr;
use App\Models\Category;
use App\Models\Color;
use App\Models\Tag;
use App\Models\Product;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Category::factory()->count(10)->create();
        $colors = Color::factory()->count(20)->create();
        $tags = Tag::factory()->count(20)->create();
        $products = Product::factory()->count(40)->create();
        
        foreach ($products as $item) {
            $tagsIds = $tags->random(5)->pluck('id');
            $colorsIds = $colors->random(3)->pluck('id');
            $item->tags()->attach($tagsIds);
            $item->colors()->attach($colorsIds);
        }
    }
}
