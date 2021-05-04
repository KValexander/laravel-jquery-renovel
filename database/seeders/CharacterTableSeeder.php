<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CharacterModel;

class CharacterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	CharacterModel::factory()->count(9)->create();
    }
}
