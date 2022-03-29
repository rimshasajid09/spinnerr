<?php

namespace App\Console;

use App\Models\Prize;
use App\Models\SpinOutcome;
use Cache;
use Carbon\Carbon;
use Exception;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Log;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();
//        $schedule->call(function () {
//            $cutoff = 12;
//            for ($i = 0, $seconds = Carbon::now()->second; $seconds < 59; $i++, $seconds = Carbon::now()->second)
//            {
//                $all_winning_wedges = [1, 3, 5, 7, 9];
//                $cache_prizes       = array_values(Cache::get('prizesAlreadyGiven', []));
//                $winning_wedges     = array_values(array_diff($all_winning_wedges, $cache_prizes));
//
//                if(!count($winning_wedges))
//                    break;
//
//                $seconds = $cutoff - 1 - $seconds%$cutoff;
//
//                $rand             = rand(0, $seconds);
//                $should_win_prize = $rand === $seconds && !Cache::has('prizeAlreadyGiven');
//
//                if ($should_win_prize)
//                {
//                    $idx  = rand(0, count($winning_wedges) - 1);
//                    $next = $winning_wedges[$idx];
//                    $prize = Prize::findByWedgeNumber($next)->first();
//
//                    $data = [
//                        'user_id'  => 1,
//                        'prize_id' => $prize->id,
//                        'rotation' => rand(1, 10000)
//                    ];
//
//                    if ($prize)
//                    {
//                        $prizesAlreadyGiven   = Cache::get('prizesAlreadyGiven', []);
//                        $prizesAlreadyGiven[] = $next;
//                        Cache::put('prizesAlreadyGiven', $prizesAlreadyGiven, 60 - Carbon::now()->second);
//                        Cache::put('prizeAlreadyGiven', true, ($cutoff - Carbon::now()->second % $cutoff));
//                    }
//                    (new SpinOutcome())->persist($data);
//                }
//                else
//                {
//
//                    $data = [
//                        'user_id'  => rand(1, 10000),
//                        'prize_id' => null,
//                        'rotation' => rand(1, 10000)
//                    ];
//
//                    (new SpinOutcome())->persist($data);
//                }
//
//            }
//        })->everyMinute()
        ;
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }

    public function _run()
    {
        $cutoff = 12;
        for ($i = 0, $seconds = Carbon::now()->second; $seconds < 59; $i++, $seconds = Carbon::now()->second)
        {
            $all_winning_wedges = [1, 3, 5, 7, 9];
            $cache_prizes       = array_values(Cache::get('prizesAlreadyGiven', []));
            $winning_wedges     = array_values(array_diff($all_winning_wedges, $cache_prizes));

            $seconds = $cutoff - 1 - $seconds;

            $rand             = rand(0, $seconds);
            $should_win_prize = $rand === $seconds && !Cache::has('prizeAlreadyGiven');

            if ($should_win_prize)
            {
                $idx = rand(0, count($winning_wedges) - 1);
                try
                {

                    $next = $winning_wedges[$idx];
                } catch (Exception $e)
                {

                }
                $prize = Prize::findByWedgeNumber($next)->first();

                $data = [
                    'user_id'  => 1,
                    'prize_id' => $prize->id,
                    'rotation' => rand(1, 10000)
                ];

                if ($prize)
                {
                    $prizesAlreadyGiven   = Cache::get('prizesAlreadyGiven', []);
                    $prizesAlreadyGiven[] = $next;
                    Cache::put('prizesAlreadyGiven', $prizesAlreadyGiven, 60 - $seconds);
                    Cache::put('prizeAlreadyGiven', true, ($cutoff - Carbon::now()->second % $cutoff));
                }
                (new SpinOutcome())->persist($data);
            }
            else
            {

                $data = [
                    'user_id'  => rand(1, 10000),
                    'prize_id' => null,
                    'rotation' => rand(1, 10000)
                ];

                (new SpinOutcome())->persist($data);
            }

        }
    }
}
