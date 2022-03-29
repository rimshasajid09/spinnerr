<?php

use App\Models\Spatie\Permission;
use App\Models\Spatie\Role;
use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $items = [
            [
                'Super Admin',
                'admin',
                'admin'
            ],
        ];
        foreach ($items as $item)
        {
            $data = [
                'pretty_name' => $item[0],
                'guard_name'  => $item[1],
                'type'        => $item[2],
            ];
            $role = new Role();
            $role->persist($data);
        }


        $permissions = [

            ['admins.index', 'View admins', 'Admins', 'admin'],
            ['admins.create', 'Create admins', 'Admins', 'admin'],
            ['admins.edit', 'Edit admins', 'Admins', 'admin'],
            ['admins.destroy', 'Remove admins', 'Admins', 'admin'],

            ['roles.index', 'View roles', 'Roles', 'admin'],
            ['roles.create', 'Create role', 'Roles', 'admin'],
            ['roles.edit', 'Edit role', 'Roles', 'admin'],
            ['roles.destroy', 'Remove role', 'Roles', 'admin'],


        ];
        foreach ($permissions as $permission)
        {
            $data = [
                'name'        => $permission[0],
                'pretty_name' => $permission[1],
                'module'      => $permission[2],
                'guard_name'  => $permission[3],
            ];
            (new Permission())->persist($data);
        }


    }
}
