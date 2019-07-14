<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proker extends Model
{
    public function jenis(){
		return $this->belongsTo('App\Jenis','jenis_id');
    }
    public function klaster(){
		return $this->belongsTo('App\Klaster','klaster_id');
    }
    public function user(){
		return $this->belongsTo('App\User','user_id');
	}
}

