<?php

namespace Database\Seeders;

use App\Models\Company00;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $newCoy = new Company();
        $newCoy->name = 'Izu and Sons Ltd.';
        $newCoy->head_office = '92 Lawanson Road, Surulere, Lagos 110-060';
        $newCoy->phone =  '0802-551-8860, 0816-971-2273';
        $newCoy->logo =  'none';
        $newCoy->user_id =  '2';
        $newCoy->email =  'izunna@gmail.com';
        $newCoy->save();
        // $newCoy->ceo_name = 'Iheanacho Henry Izunna .';

        $newCoy = new Company();
        $newCoy->name = 'Dani POS.';
        $newCoy->head_office = '23 Mushin Road, Ilasamaja, Lagos 101-020';
        $newCoy->phone =  '0812-322-2903, 0704-506-3380';
        $newCoy->logo =  'none';
        $newCoy->user_id =  '1';
        $newCoy->email =  'danielsmrtns@gmail.com';

        $newCoy->save();
    }
}
