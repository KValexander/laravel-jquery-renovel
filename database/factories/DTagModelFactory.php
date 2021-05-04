<?php

namespace Database\Factories;

use App\Models\DTagModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class DTagModelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DTagModel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "tag" => $this->faker->text(30)
        ];
    }
}
