<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exhibition extends Model
{
    // protected $table ='job';
    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'slug'; 
    }

    public function exhibitor()
    {
        // One To Many (inverse)
        return $this->belongsTo('App\Exhibitor');
    }

    public function users(){
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function favorites(){
        return $this->belongsToMany(Exhibition::class, 'favourites', 'exhibition_id', 'user_id')->withTimestamps();
    }
}
