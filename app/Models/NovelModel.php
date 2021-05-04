<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NovelModel extends Model
{
    use HasFactory;

    protected $table = "novels";
    protected $primaryKey = "novel_id";

    protected $fillable = [
        "novel_id",
        "user_id",
        "developer_id",
        "publisher_id",
        "title",
        "original_title",
        "alternative_title",
        "year_release",
        "description",
        "d_type_id",
        "d_duration_id",
        "d_platgorm_id",
        "age_rating",
        "d_country_id",
        "d_language_id",
        "status",
        "delete_marker"
    ];

    // Получение разработчика новеллы
    public function developer() {
        return $this->belongsTo("App\Models\DeveloperModel", "developer_id");
    }

    // Получение издателя новеллы
    public function publisher() {
        return $this->belongsTo("App\Models\PublisherModel", "publisher_id");
    }

    // Получение персонажей новеллы
    public function characters() {
    	return $this->hasMany("App\Models\CharacterModel", "novel_id");
    }

    // Получение комментариев новеллы
    public function comments() {
    	return $this->hasMany("App\Models\CommentModel", "novel_id");
    }

    // Получение изображений новеллы
    public function images() {
    	return $this->hasMany("App\Models\ImageModel", "novel_id");
    }

    // Получение рейтинга новеллы
    public function ratings() {
    	return $this->hasMany("App\Models\RatingModel", "novel_id");
    }

    // Получение жанров новеллы
    public function genres() {
    	return $this->belongsToMany("App\Models\DGenreModel", "App\Models\GenreModel", "novel_id", "d_genre_id");
    }

    // Получение тегов новеллы
    public function tags() {
    	return $this->belongsToMany("App\Models\DTagModel", "App\Models\TagModel", "novel_id", "d_tag_id");
    }

    // Получение платформы новеллы
    public function platform() {
    	return $this->hasOne("App\Models\DPlatformModel", "d_platform_id");
    }

    // Получение языка новеллы
    public function language() {
    	return $this->hasOne("App\Models\DLanguageModel", "d_language_id");
    }

    // Получение страны новеллы
    public function country() {
    	return $this->hasOne("App\Models\DCountryModel", "d_country_id");
    }

    // Получение типа новеллы
    public function type() {
    	return $this->hasOne("App\Models\DTypeModel", "d_type_id");
    }

    // Получение продолжительности новеллы
    public function duration() {
    	return $this->hasOne("App\Models\DDurationModel", "d_duration_id");
    }
}
