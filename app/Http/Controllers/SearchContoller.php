<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SearchContoller extends Controller
{
    public function search()
    {
         $query = request('q');
         $res=Product::where('name', "%$query%");
        $res->
    }
    
    
    
}
