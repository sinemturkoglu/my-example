<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Blogs;

use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogsFactory extends Factory
{
    protected $model = Blogs::class;

    public function definition(): array
    {
        $title = $this->faker->unique()->sentence(4);

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'content' => $this->faker->paragraphs(5, true),
            'sort' => $this->faker->numberBetween(1, 100),
            'is_active' => $this->faker->boolean(80),
        ];
    }
}
