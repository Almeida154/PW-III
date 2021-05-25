<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Technicality extends Model {

    protected $guarded = [];
    protected $primaryKey = 'id';

    public function categories() {
        return $this->belongsToMany('App\Category');
    }
    
}