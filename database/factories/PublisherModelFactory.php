<?php

namespace Database\Factories;

use App\Models\PublisherModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class PublisherModelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PublisherModel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "user_id" => mt_rand(1, 9),
            "title" => $this->faker->text(30),
            "year_foundation" => mt_rand(1, 99),
            "description" => $this->faker->text(300),
            "d_country_id" => mt_rand(1, 9),
        ];
    }
}
