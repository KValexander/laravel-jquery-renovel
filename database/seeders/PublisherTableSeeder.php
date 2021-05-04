<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PublisherModel;

class PublisherTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	PublisherModel::factory()->count(9)->create();
    }
}
