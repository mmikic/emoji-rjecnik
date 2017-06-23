<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Definition extends Model
{

    protected $fillable = ['emoji_id', 'semantic', 'pragmatic'];

    public $hidden = ['created_at', 'updated_at', 'id'];

    public function emoji()
    {

        return $this->belongsTo('App\Emoji');

    }

}
