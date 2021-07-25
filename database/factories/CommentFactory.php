<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\News;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'news_id' => News::factory(),
            'commenter' => $this->faker->name(),
            'body'=>$this->faker->sentence(),
            'is_approved'=>$this->faker->boolean(),
            'is_visible'=>$this->faker->boolean(),
        ];
    }
}
