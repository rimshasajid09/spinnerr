<?php

namespace App\Models\Spatie;


use Cviebrock\EloquentSluggable\Sluggable;
use Spatie\Permission\Models\Role as BaseRoles;
use App\Traits\ModelTrait;

/**
 * Class Role
 * @package App\Models\Spatie
 * @method static Role type($type)
 */
class Role extends BaseRoles
{
    use ModelTrait, Sluggable;

    protected $search_fields=[
      'pretty_name',
      'name'
    ];

    public function sluggable()
    {
        return [
            'name' => [
                'source'       => ['pretty_name'],
                'uniqueSuffix' => null,
                'separator'    => '-',
            ]
        ];
    }

    public function getRouteKeyName()
    {
        return 'name';
    }


    /**
     * @param $type
     * @return mixed
     */
    public function scopeType($q, $type)
    {
        return $q->where('type', '=', $type);
    }
}
