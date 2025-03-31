<?php

namespace App\Modules\Resources\Models;

use Illuminate\Database\Eloquent\Model;

class Resources extends Model
{
    protected $fillable = [
        'name',
        'type',
        'description',
    ];
}
