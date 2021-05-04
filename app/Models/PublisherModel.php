<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublisherModel extends Model
{
    use HasFactory;
    protected $table = "publishers";
    protected $primaryKey = "publisher_id";

    public function novels() {
    	return $this->hasMany("App\Models\NovelModel", "publisher_id");
    }

    public function country() {
    	return $this->hasOne("App\Models\DCountryModel", "d_country_id");
    }
}
