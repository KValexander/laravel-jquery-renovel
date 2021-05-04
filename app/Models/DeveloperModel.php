<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeveloperModel extends Model
{
    use HasFactory;
    protected $table = "developers";
    protected $primaryKey = "developer_id";

    public function novels() {
    	return $this->hasMany("App\Models\NovelModel", "developer_id");
    }

    public function country() {
    	return $this->hasOne("App\Models\DCountryModel", "d_country_id");
    }
}
