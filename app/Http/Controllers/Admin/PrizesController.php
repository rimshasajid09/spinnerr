<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Prize;
use App\Models\User;
use Illuminate\Http\Request;

class PrizesController extends Controller
{
    public function index(Request $request)
    {
        $search         = $request->get('search');
        $orderBy        = $request->get('sortBy') ?? 'id';
        $orderDirection = str_to_bool($request->get('descending')) ? 'desc' : 'asc';
        $paginator      = Prize::search($search)
                                ->withCount('winners')
                               ->orderBy($orderBy, $orderDirection)
                               ->paginate()
        ;
        return compact('paginator');
    }


    public function show(Prize $prize)
    {
        $prize->load('winners')->loadCount('winners');
        return compact('prize');
    }
}
