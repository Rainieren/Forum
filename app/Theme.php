<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    protected $fillable = [
        'theme_title', 'theme_description', 'user_id',
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function topics() {
        return $this->hasMany('App\Topic');
    }

    public function lastTopic()
    {
        return $this->hasOne(Topic::class)->latest();
    }



}
