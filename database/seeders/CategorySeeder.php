<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $all_users = User::all();
        $categoryNames = [
            'bags', 'shoes', 'shirts', 'resistors', 'fans', 'capacitors', 'books'
        ];
        foreach ($categoryNames as $catName) {
            foreach ($all_users as $key => $owner) {
                $new_cat  = new Category();
                $new_cat->name = $catName;
                $new_cat->save();
                $owner->categories()->save($new_cat);
            }
            // $catkey++;
        }
    }
}
