<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasPermissions;

class Permission extends Model
{
    use HasFactory,HasPermissions;

    protected $fillable = [
        'name',
        'guard_name',
    ];
}
