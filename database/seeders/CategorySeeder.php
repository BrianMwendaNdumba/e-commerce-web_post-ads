<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Freelancer services',
            'Properties',
            'Health and beauty',
            'Vehicles',
            'Jobs',
            'Fashion',
            'Sports',
            'Gaming'
        ];
        foreach ($categories as $category) {
            Category::create([
                'title' => $category,
                'slug' => Str::slug($category)
            ]);
        }
    }
}
