<?php

namespace App\Models;



class Utm extends Model
{


    public function getSourceAttribute($v)
    {
        if(!$v)
            $v='No UTM';

        return $v;
    }

    public function scopeFindByIp($q, $ip)
    {
        return $q->where('ip',$ip);
    }
}
