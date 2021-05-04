<?php

namespace Database\Factories;

use App\Models\BookmarkModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookmarkModelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BookmarkModel::class;

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
            "type" => $this->faker->text(30),
        ];
    }
}
