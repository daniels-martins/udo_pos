<?php

namespace App\Http\Requests\Auth;

use App\Models\User;
use App\Models\Employee;
use Illuminate\Support\Str;
use PhpParser\Builder\Function_;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => ['required', 'string'],
            'password' => ['required', 'string'],
        ];
    }

    /**
     * Attempt to authenticate the request's credentials.
     *
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function authenticate()
    {
        $this->ensureIsNotRateLimited();

        /**
         * @var $user_input refers to the username, email or employee_nickname
         */
        $user_input = $this->email;
        $fieldType = filter_var($user_input, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $login_credentials = [$fieldType => $user_input, 'password' => $this->password];

        // if (! Auth::attempt($this->only('email', 'password'), $this->boolean('remember'))){}

        ########################################################
        ########################DEFAULT########################
        ########################################################

        if ($fieldType == 'email') {
            // use default || normal auth (web guard auth)
            $this->defaultAuth($login_credentials);
        }

        #######################################################
        ########LOGIN WITH USERNAME (OWNER OR EMPLOYEE) #######
        #######################################################


        if ($fieldType == 'username') {
            // now lets determine if the username belongs to an owner or employee
            $ownerFound = User::where('username', $user_input)->first();
            $employeeFound = Employee::where('username', $user_input)->first();
            if ($ownerFound) $this->defaultAuth($login_credentials);
            if ($employeeFound) {
                // dd('dddddd',$ownerFound, $employeeFound);

                $this->employeeAuth($login_credentials, $employeeFound);
            }
        }

        // default must be done after every successful authentication.
        RateLimiter::clear($this->throttleKey());
    }

    /**
     * Ensure the login request is not rate limited.
     *
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function ensureIsNotRateLimited()
    {
        if (!RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the rate limiting throttle key for the request.
     *
     * @return string
     */
    public function throttleKey()
    {
        return Str::lower($this->input('email')) . '|' . $this->ip();
    }

    

    // My user defined methods {udo}

    public function defaultAuth(array $login_credentials = null)
    {
        if (!Auth::attempt($login_credentials, $this->boolean('remember'))) {
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'email' => trans('auth.failed'),
            ]);
        }
    }

    public function employeeAuth (Array $login_credentials = null, $employee){
        // manual auth
        // $successful = Hash::check($login_credentials['password'], $employee->password);
       
        if (!Auth::guard('emp')->attempt($login_credentials, $this->boolean('remember'))) {
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'email' => trans('auth.failed'),
            ]);
        }else{
            $this->session()->regenerate();
            // dd(redirect()->intended('dashboard'));
            return redirect()->intended('dashboard');
        }
    }


}
