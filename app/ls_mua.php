<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ls_mua extends Model
{
    protected $table = 'ls_mua';
    public function files()
    {
     return $this->hasOne( 'App\files', 'id', 'file_id' );
    }

}

