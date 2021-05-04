<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DDurationModel extends Model
{
    use HasFactory;
    protected $table = "d_durations";
    protected $primaryKey = "d_duration_id";
}
