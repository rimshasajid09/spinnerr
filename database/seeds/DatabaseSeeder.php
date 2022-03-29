<?php

use App\Models\Admin;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(PermissionsSeeder::class);
        $admin = new Admin();

        $data = [
            'first_name' => 'Admin',
            'last_name'  => 'Energizer',
            'email'      => 'admin@winwithenergizer.com',
            'password'   => bcrypt('manager')
        ];

        $admin->persist($data);
        $admin->assignRole('super-admin');
        
        $this->call
        ([
//             AdminsSeeder::class,
             PrizeSeeder::class,
             ProductsSeeder::class,
         ]);


    }
}
