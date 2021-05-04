<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DLanguageModel extends Model
{
    use HasFactory;
    protected $table = "d_languages";
    protected $primaryKey = "d_language_id";
}
