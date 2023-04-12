<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    protected $table = 'comment';
    public function User()
    {
     return $this->hasOne( 'App\User', 'id', 'user_id' );
    }

}

