<?php

namespace Database\Factories;

use App\Models\DDurationModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class DDurationModelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DDurationModel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "duration" => $this->faker->text(30)
        ];
    }
}
