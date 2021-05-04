<?php

namespace Database\Factories;

use App\Models\CommentModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentModelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CommentModel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "user_id" => mt_rand(1, 9),
            "novel_id" => mt_rand(1, 9),
            "content" => $this->faker->text(300),
        ];
    }
}
