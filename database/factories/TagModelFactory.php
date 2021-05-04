<?php

namespace Database\Factories;

use App\Models\TagModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class TagModelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TagModel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "novel_id" => mt_rand(1, 9),
            "d_tag_id" => mt_rand(1, 9)
        ];
    }
}
