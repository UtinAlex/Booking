<?php

namespace App\Modules\Booking\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    /**
     * Атрибуты, которые должны быть преобразованы в дату
     *
     * @var array
     */
    protected $dates = ['start_time','end_time'];

    protected $fillable = [
        'user_id',
        'resources_id',
        'start_time',
        'end_time',
    ];
}
