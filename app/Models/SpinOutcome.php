<?php

namespace App\Models;


class SpinOutcome extends Model
{

    protected $appends = [
        'status',
        'won'
    ];

    public function getWonAttribute()
    {
        return $this->prize_id!==null;
    }
    public function getStatusAttribute()
    {
        return $this->won ? 'Won' : 'Lost';
    }
    public function prize()
    {
        return $this->belongsTo(Prize::class);
    }

    public static function generateInvoiceNumber()
    {

    }
}
