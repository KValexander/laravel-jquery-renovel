<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserModel;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	UserModel::factory()->count(9)->create();
    }
}
