<?php

namespace ioliga\Models\Campeonato;

use Illuminate\Database\Eloquent\Model;
use ioliga\User;
class Arbitro extends Model
{
       protected $table='arbitro';
        public function user()
    {
    	return $this->belongsTo(User::class,'users_id');
    }
}
