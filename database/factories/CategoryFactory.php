<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
      
        $title = $this->faker->unique()->words(2, true); 

        return [
            'title' => ucfirst($title),
            'slug' => Str::slug($title),
            'short_description' => $this->faker->sentence(10),  
            'image' => 'categories_image.png',  
            'sort' => $this->faker->numberBetween(1, 100),     
            'is_active' => $this->faker->boolean(80),        
        ];
    }
}
