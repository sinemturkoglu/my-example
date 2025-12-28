<?php

namespace Database\Factories;
use App\Models\Blogs;
use App\Models\BlogCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BlogCategory>
 */
class BlogCategoryFactory extends Factory
{
    protected $model = BlogCategory::class;
    protected static $blogIds;

    public function definition(): array
    {
        if (! self::$blogIds) {
            self::$blogIds = Blogs::pluck('id')->toArray();
        }

        return [
            'blog_id' => $this->faker->randomElement(self::$blogIds),
            'category_id' => $this->faker->numberBetween(1, 20),
        ];
    }
}
