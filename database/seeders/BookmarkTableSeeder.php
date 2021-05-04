<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BookmarkModel;

class BookmarkTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	BookmarkModel::factory()->count(9)->create();
    }
}
