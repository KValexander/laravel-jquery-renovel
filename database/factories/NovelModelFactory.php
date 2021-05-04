<?php

namespace Database\Factories;

use App\Models\NovelModel;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class NovelModelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = NovelModel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "user_id" => mt_rand(1, 9),
            "developer_id" => mt_rand(1, 9),
            "publisher_id" => mt_rand(1, 9),
            "title" => $this->faker->text(20),
            "year_release" => mt_rand(1, 99),
            "description" => $this->faker->text(300),
            "d_type_id" => mt_rand(1, 9),
            "d_duration_id" => mt_rand(1, 9),
            "d_platform_id" => mt_rand(1, 9),
            "age_rating" => $this->faker->text(5),
            "d_country_id" => mt_rand(1, 9),
            "d_language_id" => mt_rand(1, 9),
        ];
    }
}
