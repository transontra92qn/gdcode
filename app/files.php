<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class files extends Model
{
    protected $table = 'files';
    public function hinhanhchitiet()
    {
     return $this->hasMany( 'App\hinhanhchitiet', 'file_id', 'id' );
    }
    public function comment()
    {
     return $this->hasMany( 'App\comment', 'file_id', 'id' );
    }
    public function ls_mua()
    {
     return $this->hasMany( 'App\ls_mua', 'file_id', 'id' );
    }
    public function danhmuc()
    {
     return $this->hasOne( 'App\danhmuc', 'id', 'danhmuc_id' );
    }
    public function User()
    {
     return $this->hasOne( 'App\User', 'id', 'user_id' );
    }

}

