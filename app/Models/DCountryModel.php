<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DCountryModel extends Model
{
    use HasFactory;
    protected $table = "d_country";
    protected $primaryKey = "d_country_id";
}
