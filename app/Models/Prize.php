<?php

namespace App\Models;


use Cviebrock\EloquentSluggable\Sluggable;

class Prize extends Model
{
    use Sluggable;
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => ['name'],
                'separator' => '-'
            ]
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function winners()
    {
        return $this->belongsToMany(User::class,'spin_outcomes')->withPivot(['rotation'])->withTimestamps();
    }

    public function scopeFindByWedgeNumber($q, $w)
    {
        return $q->where('wedge',$w);
    }

}
