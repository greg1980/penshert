<?php

namespace App;
use App\Photo;
use App\User;
use App\category;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = [

        'category_id',
        'photo_id',
        'title',
        'body'


    ];

    /**
     * User relationship model
     */
    public function user(){

        return $this->belongsTo('App\user');
    }


    /**
     * photo relationship model
     */
    public function photo(){
        return $this->belongsTo('App\photo');
    }


    /**
     * category relationship model
     */
    public function category(){
        return $this->belongsTo('App\Category');
    }

}
