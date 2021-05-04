<?php

namespace Database\Factories;

use App\Models\RatingModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class RatingModelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RatingModel::class;

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
            "rating" => mt_rand(1, 10)
        ];
    }
}
