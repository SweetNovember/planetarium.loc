<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed header
 * @property mixed message
 * @property mixed create_date
 * @property mixed user_id
 * @property mixed theme_id
 */
class News extends Model
{
    //
    protected $fillable = [
        'header', 'message','create_date','user_id','theme_id'
    ];
}
