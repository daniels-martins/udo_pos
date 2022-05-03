<?php

namespace App\Listeners;

use App\Models\User;
use App\Events\RegisteredEmployee;
use Illuminate\Support\Facades\Hash;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Traits\Tappable;

class CreateUserModelForNewEmployee
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  App\Events\RegisteredEmployee $event
     * @return void
     */
    public function handle(RegisteredEmployee $event)
    {
        $username = $event->employee->username;

        // dd($username);
        
        $password = $event->password ?? Hash::make('12345678');

        $newEmployeeUserModel = new User();
        $newEmployeeUserModel->username = $username;
        $newEmployeeUserModel->password  = Hash::make($password);

        // this is what makes the difference
        // 1. use some owner identifying info to save an employee in the users table
        // eg. owner_id that is different from their own personal id on the users table, is_admin = 0, 
        



    }
}
