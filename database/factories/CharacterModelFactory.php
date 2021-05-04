<?php

namespace Database\Factories;

use App\Models\CharacterModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class CharacterModelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CharacterModel::class;

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
            "name" => $this->faker->name(30),
            "original_name" => $this->faker->name(30),
            "role_in_story" => $this->faker->text(10),
            "gender" => $this->faker->text(10),
            "description" => $this->faker->text(300),
        ];
    }
}
