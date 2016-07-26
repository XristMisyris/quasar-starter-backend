<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Joke extends Model
{
    protected $fillable = ['body', 'created_by'];

    public function user(){
        return $this->belongsTo('App\User', 'created_by');
    }
}
