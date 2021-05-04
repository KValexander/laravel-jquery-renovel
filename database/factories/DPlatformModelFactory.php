<?php

namespace Database\Factories;

use App\Models\DPlatformModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class DPlatformModelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DPlatformModel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "platform" => $this->faker->text(30)
        ];
    }
}
