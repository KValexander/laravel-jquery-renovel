<?php

namespace Database\Factories;

use App\Models\UserModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserModelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserModel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "username" => $this->faker->name(30),
            "email" => $this->faker->text(30). "@". mt_rand(1, 999),
            "login" => $this->faker->text(30),
            "password" => $this->faker->text(30),
            "d_role_id" => mt_rand(1, 9),
        ];
    }
}
