<?php

namespace Database\Factories;

use App\Models\DRoleModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class DRoleModelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DRoleModel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "role" => $this->faker->text(30),
            "code" => $this->faker->text(30),
        ];
    }
}
