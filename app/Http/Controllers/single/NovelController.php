<?php

namespace App\Http\Controllers\single;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Подключение моделей
use App\Models\DeveloperModel;
use App\Models\PublisherModel;
use App\Models\DGenreModel;
use App\Models\DTagModel;
use App\Models\DTypeModel;
use App\Models\DDurationModel;
use App\Models\DPlatformModel;
use App\Models\DCountryModel;
use App\Models\DLanguageModel;

class NovelController extends Controller
{
    // Функция получения и передачи всех данных для добавления новеллы
    public function novel_directory(Request $request) {
    	return response()->json($data = [
    		"data" => [
		    	"developers" => DeveloperModel::all(),
		    	"publishers" => PublisherModel::all(),
		    	"d_genres" => DGenreModel::all(),
		    	"d_tags" => DTagModel::all(),
		    	"d_types" => DTypeModel::all(),
		    	"d_durations" => DDurationModel::all(),
		    	"d_platform" => DPlatformModel::all(),
		    	"d_country" => DCountryModel::all(),
		    	"d_languages" => DLanguageModel::all(),
    		]
    	], 200);
    }
}
