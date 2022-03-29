<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{

    use ThrottlesLogins;

    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function login(Request $request)
    {
        $this->validateLogin($request);

        $credentials = $request->only('email', 'password');

        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request))
        {
            $this->fireLockoutEvent($request);

            $this->sendLockoutResponse($request);
        }

        if ($token = $this->guard()->attempt($credentials))
        {
            $this->clearLoginAttempts($request);
            return $this->respondWithToken($token);
        }


        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse();
    }

    /**
     * @param Request $request
     * @throws ValidationException
     */
    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->username() => 'required|string',
            'password'        => 'required|string',
        ]);
    }

    protected function respondWithToken($token)
    {
        return response()->json(
            [
                'token'      => $token,
                'token_type' => 'bearer',
                'user'       => $this->guard()->user()
            ]);
    }

    /**
     * Get the failed login response instance.
     *
     * @throws ValidationException
     */
    protected function sendFailedLoginResponse()
    {
        throw ValidationException::withMessages(
            [
                'email' => [trans('auth.failed')],
            ]);
    }

    protected function username()
    {
        return 'email';
    }

    protected function guard()
    {
        return auth()->guard('admin');
    }
}
