<?php

namespace Database\Factories;

use App\Models\DTypeModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class DTypeModelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DTypeModel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "type" => $this->faker->text(30)
        ];
    }
}
