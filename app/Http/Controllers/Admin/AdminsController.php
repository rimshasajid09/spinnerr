<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Spatie\Role;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AdminsController extends Controller
{
    public function index(Request $request)
    {
        $search         = $request->get('search');
        $orderBy        = $request->get('sortBy') ?? 'id';
        $orderDirection = str_to_bool($request->get('descending')) ? 'desc' : 'asc';
        $paginator      = Admin::search($search)->orderBy($orderBy, $orderDirection)->paginate();

        return compact('paginator');
    }


    public function create(Request $request)
    {
        $roles = Role::all();

        return compact('roles');
    }

    /**
     * @param Request $request
     * @return array
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'first_name' => 'required',
                'last_name'  => 'required',
                'email'      => 'required|email|unique:admins,email',
                'password'   => 'required|min:6',
            ]);

        $admin            = new Admin();
        $data             = $request->only(['first_name', 'last_name', 'email']);
        $data['password'] = bcrypt($request->get('password'));

        $admin->persist($data);

        $roles = collect($request->get('roles'))->pluck('id');
        $admin->roles()->sync($roles);
        $admin->load('roles');

        return compact('admin');
    }

    public function edit(Request $request, Admin $admin)
    {
        $roles = Role::all();
        $model = $admin->load('roles');
        return compact('model','roles');
    }

    /**
     * @param Request $request
     * @param Admin $admin
     * @return array
     * @throws ValidationException
     */
    public function update(Request $request, Admin $admin)
    {
        $this->validate(
            $request,
            [
                'first_name' => 'required',
                'last_name'  => 'required',
                'email'      => 'required|email|unique:admins,email,' . $admin->id,
                'password'   => 'nullable|min:6',
            ]);

        $data = $request->only(['first_name', 'last_name', 'email']);
        $request->get('password') ? $data['password'] = bcrypt($request->get('password')) : null;

        $admin->persist($data);
        $roles = collect($request->get('roles'))->pluck('id');
        $admin->roles()->sync($roles);
        $admin->load('roles');

        return compact('admin');
    }

    /**
     * @param Admin $admin
     * @throws Exception
     */
    public function destroy(Admin $admin)
    {
        $admin->delete();

        return;
    }

}
