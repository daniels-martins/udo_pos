<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Employee;
use PharIo\Manifest\Email;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $owners  =  User::all()->take(2);
        $employeeNames = ['isaac', 'newton', 'gabriel', 'navas', 'peniur', 'foden', 'phillip', 'john', 'hope', 'faith', 'margareth', 'jacob', 'ben', 'peter', 'paul', 'saul', 'ram'];
        foreach ($owners as $owner) {
        foreach ($employeeNames as $name) {
        // create new employee
            $new_employee  = new Employee();
            $new_employee->username = $name;
            $new_employee->store_warehouse_id = '';
            // $new_employee->save();

            // attach new employee
            $owner->employees()->save($new_employee);
        }
        }
        
    }
}
