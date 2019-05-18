<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Log
 * @package App
 */
class Log extends Model
{
    protected $fillable = [
        'activity', 'ip', 'agent'
    ];
}
