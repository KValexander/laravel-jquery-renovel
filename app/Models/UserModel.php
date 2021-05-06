<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;

    protected $table = "users";
    protected $primaryKey = "user_id";

    protected $fillable = [
        "user_id",
        "username",
        "email",
        "login",
        "title",
        "password",
        "remember_token",
        "d_role_id",
        "user_status",
        "about",
        "online",
        "status",
        "ban",
        "delete_marker"
    ];

    // Получение комментариев пользователя
    public function comments() {
    	return $this->hasMany("App\Models\CommentModel", "user_id");
    }

    // Получение роли пользователя
    public function role() {
    	return $this->belongsTo("App\Models\DRoleModel", "d_role_id");
    }

    // Получение новел добавленных в закладки
    public function b_novels() {
    	return $this->belongsToMany("App\Models\NovelModel", "App\Models\BookmarkNovel", "user_id", "novel_id");
    }

    // Получение поставленного рейтинга к новелам
    public function r_novels() {
    	return $this->belongsToMany("App\Models\NovelModel", "App\Models\RatingModel", "user_id", "novel_id");
    }
}
