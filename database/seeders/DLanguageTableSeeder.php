<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DLanguageModel;

class DLanguageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DLanguageModel::factory()->count(9)->create();
    }
}
