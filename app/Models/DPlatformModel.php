<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DPlatformModel extends Model
{
    use HasFactory;
    protected $table = "d_platforms";
    protected $primaryKey = "d_platform_id";
}
