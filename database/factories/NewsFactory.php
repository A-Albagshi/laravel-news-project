<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\News;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class NewsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = News::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'category_id' => Category::factory(),
            'title' => $this->faker->sentence(),
            'slug' => $this->faker->slug(),
            'content' => '<p>' . implode('</p><p>', $this->faker->paragraphs(6)) . '</p>',
            'published_at' => now(),
            'number_of_visitor' => 0,
            'thumbnail' => 'posts/thumbnails/UxFvdgzmYALnflLjB6vhtHI1taJXIc1BxptXjH1m.png'
        ];
    }
}
