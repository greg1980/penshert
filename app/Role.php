<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * @var array for the tables in role
     */
    protected $fillables = [

        'name'
        ];
}
