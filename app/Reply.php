<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $fillable = [
        'reply_text', 'topic_id', 'user_id',
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function topic() {
        return $this->belongsTo('App\Topic');
    }
}
