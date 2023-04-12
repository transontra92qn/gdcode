<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class danhmuc extends Model
{
    protected $table = 'danhmuc';
    public function files()
    {
     return $this->hasMany( 'App\files', 'danhmuc_id', 'id' );
    }
}
