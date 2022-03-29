<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Utm;
use Illuminate\Http\Request;

class TrafficController extends Controller
{
    public function index(Request $request)
    {

        $search         = $request->get('search');
        $orderBy        = $request->get('sortBy') ?? 'id';
        $orderDirection = str_to_bool($request->get('descending')) ? 'desc' : 'asc';
        $paginator      = Utm::search($search)->orderBy($orderBy, $orderDirection)->paginate();

        $traffic = Utm::selectRaw('source, count(id) as count')->groupBy('source')->get();

        return compact('paginator','traffic');
    }
}
