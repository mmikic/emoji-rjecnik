<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emoji extends Model
{

    public $table = 'emojis';
    public $timestamps = false;

    protected $fillable = ['name', 'unicode'];

    public function definitions()
    {

        return $this->hasMany('App\Definition');

    }

}
