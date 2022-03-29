<?php

namespace App\Http\Controllers\Admin;

use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use App\Models\Prize;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        $paginator             = $this->getQuery($request)->paginate();
        $users                 = User::all();


        $stats                 = $users->groupBy('status_text')->map(function ($g) {
            return count($g);
        })
        ;
        $stats['participants'] = $users->count();


        $prizes = Prize::all();
        return compact('paginator', 'stats', 'prizes');
    }

    public function show(User $user)
    {
        $user->load('outcome.prize');
        return compact('user');
    }

    public function csv(Request $request)
    {
        $users = $this->getQuery($request)->get();
        return (new UsersExport($users))->download('report.csv');
    }

    private function getQuery(Request $request)
    {
        $search         = $request->get('search');
        $status         = $request->get('status');
        $dates          = ['from' => $request->get('date_from'), 'to' => $request->get('date_to')];
        $orderBy        = $request->get('sortBy') ?? 'id';
        $orderDirection = str_to_bool($request->get('descending')) ? 'desc' : 'asc';
        return User::search($search)
                   ->createdBetween($dates)
                   ->status($status)
                   ->orderBy($orderBy, $orderDirection)
                   ->with('outcome.prize')
            ;
    }
}
