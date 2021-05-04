<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DDurationModel;

class DDurationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DDurationModel::factory()->count(9)->create();
    }
}
