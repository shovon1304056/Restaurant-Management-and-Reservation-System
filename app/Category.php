<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = ['name','slug','created_at','updated_at'];

    public function items()
    {
        return $this->hasMany('App\Item');
    }
}
