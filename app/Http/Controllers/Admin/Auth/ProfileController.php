<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Route;
use stdClass;

class ProfileController extends Controller
{
    public function me(Request $request)
    {


        $user = auth('admin')->user()->load('roles.permissions');

        return compact('user');
    }

    public function routes(Request $request)
    {
        $routes = Route::getRoutes();
        $routes = collect($routes->getRoutesByName());
        $routes->transform(function ($item) {
            $data      = new StdClass();
            $data->uri = $item->uri;
            return $data;
        });

        return compact('routes');
    }

    public function edit()
    {
        $admin = auth('admin')->user();

        return compact('admin');
    }


    public function update(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name'  => 'required',
            'email'      => 'required|email',
            'password' => 'nullable|confirmed',
        ]);

        $data = [
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'email' => $request->get('email'),
        ];

        $request->get('password') ? $data['password'] = bcrypt($request->get('password')) : null;

        $user = auth('admin')->user();
        $user->persist($data);

        $user->load('roles.permissions');

        return compact('user');

    }
}
