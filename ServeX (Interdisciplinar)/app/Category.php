<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

    protected $guarded = [];
    protected $primaryKey = 'id';

    public function technicalities() {
        return $this->belongsToMany('App\Technicality');
    }

}
