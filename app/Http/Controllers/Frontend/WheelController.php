<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\Frontend\WinnerEmail;
use App\Models\Prize;
use App\Models\SpinOutcome;
use App\Models\User;
use Cache;
use Carbon\Carbon;
use Illuminate\Http\Request;


class WheelController extends Controller
{
    public function index(Request $request)
    {
        $user = User::findByUserToken($request->get('eut'))->first();
        if ($user->spinAlreadyUsed)
        {
            flash()->error('You have already played your spin');
            return redirect()->route('frontend.register.index');
        }
        return view('frontend.wheel.index');
    }

    public function get(Request $request)
    {

//        TODO
        $cutoff             = 60;
        $all_winning_wedges = [1, 3, 5, 7, 9];
        $cache_prizes       = array_values(Cache::get('prizesAlreadyGiven', []));
        $winning_wedges     = array_values(array_diff($all_winning_wedges, $cache_prizes));
        $losing_wedges      = [0, 2, 4, 6, 8];
        $seconds            = Carbon::now()->second;

        $seconds = $cutoff - 1 - ($seconds % $cutoff);


        $rand             = rand(0, $seconds);
        $should_win_prize = $rand === $seconds || Cache::has('prizeAlreadyGiven');

        if ($should_win_prize)
        {

            $next                 = $winning_wedges[rand(0, count($winning_wedges) - 1)];
            $prizesAlreadyGiven   = Cache::get('prizesAlreadyGiven', []);
            $prizesAlreadyGiven[] = $next;
            Cache::put('prizesAlreadyGiven', $prizesAlreadyGiven, 60 - $seconds);
            Cache::put('prizeAlreadyGiven', true, ($cutoff - Carbon::now()->second % $cutoff));
        }
        else
        {
            $next = $losing_wedges[rand(0, count($losing_wedges) - 1)];
        }
        $_user_identifier = uniqid($next);
        $user = User::findByUserToken($request->get('eut'))->first();
        return compact('_user_identifier','user');
    }

    public function result(Request $request)
    {
        $user  = User::findByUserToken($request->get('eut'))->first();
        $prize = Prize::findByWedgeNumber($request->get('outcome'))->first();
        $data  = [
            'user_id'  => $user->id,
            'prize_id' => $prize ? $prize->id : null,
            'rotation' => $request->get('rotation')
        ];

        if ($prize)
        {
            Cache::put('prizeAlreadyGiven', true, (15 - Carbon::now()->second % 15));
        }
        $outcome = new SpinOutcome();
        ($outcome)->persist($data);
        if($outcome->prize_id)
        {
            \Mail::to($user)->send(new WinnerEmail($user));
        }


        return 'success';
    }

    public function winner(Request $request)
    {
        $user = User::findByUserToken($request->get('eut'))->with('outcome.prize')->first();

        if (!$user->hasWonPrize)
        {
            flash()->error('You are not eligible for any prize');
            return redirect()->route('frontend.register.index');
        }

        return view('frontend.winner.index', compact('user'));

    }
}
