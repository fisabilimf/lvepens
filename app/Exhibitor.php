<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exhibitor extends Model
{
    protected $guarded = [];
    public function exhibitions()
    {
        // One to many
        return $this->hasMany('App\Exhibition');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
