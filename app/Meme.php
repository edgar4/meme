<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meme extends Model
{
    protected $fillable = [
        'user_id', 'meme',
    ];

    //
    public function user()
    {
        return $this->hasOne('App\User', 'id');
    }
}
