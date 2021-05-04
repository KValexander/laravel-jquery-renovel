<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookmarkModel extends Model
{
    use HasFactory;
    protected $table = "bookmarks";
    protected $primaryKey = "d_bookmark_id";
}
