<?php

namespace App\Models;

use App\Traits\ModelTrait;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable, ModelTrait, Sluggable;

    protected $appends = [
        'name',
        'phone_number',
        'status',
        'status_text',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function sluggable()
    {
        return [
            'slug' => [
                'source'    => ['first_name', 'surname'],
                'separator' => '.'
            ]
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopeFindByUserToken($q, $t)
    {
        if ($t)
            $q->where('hash', $t);
    }


    public static function generateToken()
    {
        return uniqid(sha1(time()));
    }

    public function getNameAttribute()
    {
        return trim($this->first_name . ' ' . $this->surname);
    }

    public function getPhoneNumberAttribute()
    {
        return trim($this->country_code . ' ' . $this->phone);
    }

    public function getSpinAlreadyUsedAttribute()
    {
        return $this->outcome !== null;
    }

    public function getStatusAttribute()
    {
        if ($this->spinAlreadyUsed)
        {
            return $this->hasWonPrize ? 2 : 1;
        }

        return 0;
    }

    public function getStatusTextAttribute()
    {
        return [
                   'Dropout',
                   'Non-Winner',
                   'Winner'
               ][$this->status];
    }

    public function getHasWonPrizeAttribute()
    {
        return $this->outcome->prize !== null;
    }


    public function outcome()
    {
        return $this->hasOne(SpinOutcome::class);
    }

    public function scopeCreatedBetween($q, $dates)
    {
        if ($dates)
        {
            if ($dates['from'])
                $q->whereDate('created_at', '>=', $dates['from']);
            if ($dates['to'])
                $q->whereDate('created_at', '<=', $dates['to']);
        }
    }

    public function scopeStatus($q, $status)
    {
        if($status===null)
            return;

        if($status==2)
            $q->doesntHave('outcome');
        elseif ($status==1)
            $q->whereHas('outcome',function ($query){
               return $query->where('prize_id',null);
            });

        elseif ($status==0)
            return $q->whereHas('outcome',function ($query){
                return $query->whereNotNull('prize_id');
            });
    }
}
