<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, rand(30,35))->create()->each(function ($user){
            if(rand(0,2))
                return;
            $d = [
                'user_id' => $user->id,
                'prize_id' => !rand(0,5) ? rand(1,5) : null,
                'rotation' => rand(1000,2000)
            ];

            $outcome = new \App\Models\SpinOutcome();
            $outcome->persist($d);
        });
    }
}
