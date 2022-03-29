<?php

use App\Models\Prize;
use Illuminate\Database\Seeder;

class PrizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $prizes = [
            [
                'name'            => 'Ski Dubai Voucher',
                'total_giveaways' => 40,
                'wedge'           => 1,
            ],
            [
                'name'            => 'Magic Planet Voucher',
                'total_giveaways' => 40,
                'wedge'           => 3,
            ],
            [
                'name'            => 'Dreamscape VR Session',
                'total_giveaways' => 40,
                'wedge'           => 5,
            ],
            [
                'name'            => 'iFly Voucher',
                'total_giveaways' => 40,
                'wedge'           => 7,
            ],
            [
                'name'            => 'Vox Cinema Tickets',
                'total_giveaways' => 40,
                'wedge'           => 9,
            ],

        ];

        foreach ( $prizes as $data)
            (new Prize())->persist($data);
    }
}
