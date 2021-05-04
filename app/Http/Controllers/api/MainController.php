<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Подключение моделей
use App\Models\NovelModel;

// Подключение ресурсов
use App\Http\Resources\MainResource;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Получение 6 последних новелл
        $novels = NovelModel::orderBy("updated_at", "DESC")->get();
        // Массив
        $novel = array();
        // Получение всех данных для новеллы
        for ($i=0; $i < count($novels); $i++) {
            // Вынесем id новеллы в отдельную переменную
            $novel_id = $novels[$i]->novel_id;
            // Получение разработчика
            $developer = NovelModel::find($novel_id)->developer()->first();
            // Получение издателя
            $publisher = NovelModel::find($novel_id)->publisher()->first();
            // Получение жанров
            $genres = NovelModel::find($novel_id)->genres()->select("genre")->get();
            // Получение тегов
            $tags = NovelModel::find($novel_id)->tags()->select("tag")->get();
            // Получение платформы
            $platform = NovelModel::find($novel_id)->platform()->select("platform")->first();
            // Получение продолжительности
            $duration = NovelModel::find($novel_id)->duration()->select("duration")->first();
            // Получение типа
            $type = NovelModel::find($novel_id)->type()->select("type")->first();
            // Получение языка
            $language = NovelModel::find($novel_id)->language()->select("language")->first();
            // Получение страны
            $country = NovelModel::find($novel_id)->country()->select("country")->first();
            // Получение персонажей
            $characters = NovelModel::find($novel_id)->characters()->select("name")->get();
            // Получение комментариев
            $comments = NovelModel::find($novel_id)->comments()->select("content")->get();
            // Получение рейтинга
            $ratings = NovelModel::find($novel_id)->ratings()->select("rating")->get();

            // Очистка данных от лишнего
            for ($j = 0; $j < count($genres); $j++) unset($genres[$j]->pivot);
            for ($j = 0; $j < count($tags); $j++) unset($tags[$j]->pivot);

            // Добавление всей информации в массив
            $novel[] = (object)[
                "novel" => $novels[$i],
                "developer" => $developer,
                "publisher" => $publisher,
                "genres" => $genres,
                "tags" => $tags,
                "platform" => $platform,
                "duration" => $duration,
                "type" => $type,
                "language" => $language,
                "country" => $country,
                "characters" => $characters,
                "comments" => $comments,
                "ratings" => $ratings,
            ];
        }

        // Возвращение данных напрямую
        // return response()->json($novel, 200);

        // Возвращение данных с помощью resource
        return MainResource::collection($novel);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Вынесем id новеллы в отдельную переменную
        $novel_id = $id;
        // Получение данных новеллы
        $novel = NovelModel::find($id);
        // Получение разработчика
        $developer = NovelModel::find($novel_id)->developer()->first();
        // Получение издателя
        $publisher = NovelModel::find($novel_id)->publisher()->first();
        // Получение жанров
        $genres = NovelModel::find($novel_id)->genres()->select("genre")->get();
        // Получение тегов
        $tags = NovelModel::find($novel_id)->tags()->select("tag")->get();
        // Получение платформы
        $platform = NovelModel::find($novel_id)->platform()->select("platform")->first();
        // Получение продолжительности
        $duration = NovelModel::find($novel_id)->duration()->select("duration")->first();
        // Получение типа
        $type = NovelModel::find($novel_id)->type()->select("type")->first();
        // Получение языка
        $language = NovelModel::find($novel_id)->language()->select("language")->first();
        // Получение страны
        $country = NovelModel::find($novel_id)->country()->select("country")->first();
        // Получение персонажей
        $characters = NovelModel::find($novel_id)->characters()->select("name")->get();
        // Получение комментариев
        $comments = NovelModel::find($novel_id)->comments()->select("content")->get();
        // Получение рейтинга
        $ratings = NovelModel::find($novel_id)->ratings()->select("rating")->get();

        // Очистка данных от лишнего
        for ($j = 0; $j < count($genres); $j++) unset($genres[$j]->pivot);
        for ($j = 0; $j < count($tags); $j++) unset($tags[$j]->pivot);

        // Добавление всей информации в массив
        $novels[] = (object)[
            "novel" => $novel,
            "developer" => $developer,
            "publisher" => $publisher,
            "genres" => $genres,
            "tags" => $tags,
            "platform" => $platform,
            "duration" => $duration,
            "type" => $type,
            "language" => $language,
            "country" => $country,
            "characters" => $characters,
            "comments" => $comments,
            "ratings" => $ratings,
        ];

        // Возвращение данных напрямую
        // return response()->json($novels, 200);

        // Возвращение данных с помощью resource
        return MainResource::collection($novels);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
