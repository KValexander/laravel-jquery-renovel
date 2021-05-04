<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DRoleModel extends Model
{
    use HasFactory;
    protected $table = "d_role";
    protected $primaryKey = "d_role_id";
}
