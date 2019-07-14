<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Logbook extends Model
{
    public function jenis(){
		return $this->belongsTo('App\Jenis','jenis_id');
    }
    public function proker(){
		return $this->belongsTo('App\Proker','proker_id');
    }
    public function user(){
		return $this->belongsTo('App\User','user_id');
	}
}
