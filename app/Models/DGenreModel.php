<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DGenreModel extends Model
{
    use HasFactory;
    protected $table = "d_genres";
    protected $primaryKey = "d_genre_id";
}
