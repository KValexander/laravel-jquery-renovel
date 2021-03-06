<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CharacterModel extends Model
{
    use HasFactory;
    protected $table = "characters";
    protected $primaryKey = "character_id";
}
