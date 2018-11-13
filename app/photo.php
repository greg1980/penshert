<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class photo extends Model
{

    Protected $uploads ='/uploads/files/';

    protected $fillable = ['file'];

    public function getFileAttribute($photo){
    	return $this->uploads . $photo;
    }

   
}
