<?php

namespace Database\Factories;

use App\Models\DGenreModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class DGenreModelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DGenreModel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "genre" => $this->faker->text(30)
        ];
    }
}
