<?php

namespace App\Models\Spatie;

use App\Traits\ModelTrait;
use Spatie\Permission\Models\Permission as BasePermission;

class Permission extends BasePermission
{
    use ModelTrait;
}