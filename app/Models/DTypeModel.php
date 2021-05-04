<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DTypeModel extends Model
{
    use HasFactory;
    protected $table = "d_types";
    protected $primaryKey = "d_type_id";
}
