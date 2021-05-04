<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DTagModel extends Model
{
    use HasFactory;
    protected $table = "d_tags";
    protected $primaryKey = "d_tag_id";
}
