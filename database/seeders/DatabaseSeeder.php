<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Blogs;
use App\Models\Category;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'Admin User',
            'email' => 'test@gmail.com',
            'password' => Hash::make('test123'), 
        ]);

        $categories = Category::factory(38)->create();
        $blogs = Blogs::factory()->count(58)->create();
        $blogs->each(function ($blog) use ($categories) {
            $randomCategoryIds = $categories->random(rand(4, 28))->pluck('id');
            $blog->categories()->attach($randomCategoryIds);
        });

    }
}
