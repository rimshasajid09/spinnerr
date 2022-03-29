<?php

namespace App\Http\Controllers\Frontend;

use App;
use App\Http\Controllers\Controller;
use App\Mail\Frontend\UserRegisteredEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Mail;

class RegisterController extends Controller
{

    public function __construct()
    {
        if(request()->get('lang')==='ar')
            App::setLocale('ar');
    }
    public function index()
    {
        return view('frontend.register.index');
    }


    public function store(Request $request)
    {

        if ($request->has('verify'))
        {
            $this->validate($request, [
                'barcode' => 'required|exists:products',
            ], $this->messages());
            return 'success';
        }

        $this->validate($request, $this->rules(), $this->messages());

        $data = $request->only(
            [
                'first_name',
                'surname',
                'barcode',
                'country_code',
                'phone',
                'email',
            ]);

        $data['hash'] = User::generateToken();
        $user         = new User();
        $user->persist($data);

        Mail::to($user)->send(new UserRegisteredEmail($user));


        $redirect = route('frontend.thank-you.index', ['eut' => $user->hash]);
        return compact('redirect');
    }

    public function get()
    {
        $trans =  trans('register');
        return compact('trans');
    }
    private function rules()
    {
        return [
            'barcode'      => 'required|exists:products',
            'first_name'   => 'required',
            'surname'      => 'required',
            'email'        => 'required|email|confirmed',
            'country_code' => 'required|integer',
            'phone'        => 'required|regex:/^[0-9]{9,10}$/',
            'promotion'    => 'required',
            'age'          => 'required',
            'privacy'      => 'required',
            // 'validate'     => 'required',
        ];
    }

    private function messages()
    {
        return [

            'promotion.required' => 'Please accept the promotion terms and conditions',
            'age.required'       => 'Please confirm your are over 18+.',
            'privacy.required'   => 'Please confirm you have read, understood and agreed to the T&Cs.',
        ];
    }


}