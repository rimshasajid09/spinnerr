<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use Schema;


/**
 * Trait ModelTrait
 * @package App\Traits
 * @method void|static search($query)
 */
trait ModelTrait
{

    public function persist($data, $save = true)
    {
        foreach ($data as $key => $value)
        {
            $this->$key = $value;
        }

        if ($save)
        {
            $this->save();
        }

        return $this;
    }

    /**
     * @param $query
     * @param $s
     *
     * @return mixed
     */
    public function scopeSearch(Builder $query, $s)
    {
        if (!$s || $s == '')
        {
            return $query;
        }
        if ($this->search_fields)
        {
            $column = $this->search_fields;
        }
        else
        {
            $column = Schema::getColumnListing($this->getTable());
        }
        foreach ($column as $key => $c)
        {
            if ($key)
                $query->orWhere($c, 'LIKE', '%' . $s . '%');
            else
                $query->where($c, 'LIKE', '%' . $s . '%');

        }

        return $query;

    }

    public function scopeStatus($q, $s)
    {
        if (!is_null($s) && $s == '1' || $s == '0')
        {
            $q->where('active', $s);
        }

        return $q;
    }

}