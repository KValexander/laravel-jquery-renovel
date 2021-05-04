<?php

namespace Database\Factories;

use App\Models\DLanguageModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class DLanguageModelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DLanguageModel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "language" => $this->faker->text(30)
        ];
    }
}
