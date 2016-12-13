<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    //

    protected $fillable = ['white','black'];

    public function games(){
        $this->hasMany('App/User');
    }


    public function getMoves(){
        return explode($this->moves,',');
    }

    public function makeMove($move){
        $this->moves += ', '+$move;
    }
}

