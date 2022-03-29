<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Roles\CreateRequest;
use App\Http\Requests\Admin\Roles\UpdateRequest;
use App\Models\Spatie\Permission;
use App\Models\Spatie\Role;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function index(Request $request)
    {
        $paginator = Role::type('admin')->search($request->get('search'))->paginate();

        return compact('paginator');
    }

    public function create(Request $request)
    {
        $permissions = Permission::where('guard_name', 'admin')->get();

        $permissions = $permissions->groupBy('module')->toArray();

        return compact('permissions');
    }

    /**
     * @param CreateRequest $request
     * @return array
     */
    public function store(CreateRequest $request)
    {
        $data = [
            'pretty_name' => $request->get('pretty_name'),
            'guard_name'  => 'admin',
            'type'        => 'admin',

        ];
        $role = new Role();
        $role->persist($data);
        $role->syncPermissions($request->get('permissions'));

        return compact('role');
    }

    public function edit( Role $role )
    {
        $role->load('permissions');
        $role->permissions->transform( function ( $item ) {
            return $item->id;
        } );

        $permissions = Permission::where('guard_name', 'admin')->get();

        $permissions = $permissions->groupBy('module')->toArray();

        $model = $role;
        return compact( 'model', 'permissions' );
    }

    public function update( UpdateRequest $request, Role $role )
    {
        $role->pretty_name = $request->get( 'pretty_name' );
        $role->save();
        $role->permissions()->sync( $request->get( 'permissions' ) );

        return compact( 'role' );
    }

    public function destroy(Request $request, Role $role)
    {
        $role->delete();
    }
}
