<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SearchContoller extends Controller
{
    public function index()
    {
        $query = request('q');
        // return response()->json([
        //    $query
        // ]);
        $res = Product::where('name', 'like', "%$query%")
            ->orWhere('name', 'sounds like', "%$query%")
            ->get();
        $res2 = Product::search($query)->get();

        $res = $res->merge($res2)->take(7)->toArray();
        if (request()->header('Content-Type') == 'application/json') {
            return response()->json($res);
        }
        return view('admin.layout.dashboard'); //with data of course

    }

    public function direct()
    {
        $query = request('q');
        // return response()->json([
        //    $query
        // ]);
        // using sql (not so good)
        $res = Product::where('name', 'like', "%$query%")
            ->orWhere('name', 'sounds like', "%$query%")
            ->get();
        // using advanced php search via library
        $res2 = Product::search($query)->get();

        // using raw php (manageable, you just gotta spell it well)
        $all_products = Product::all();

        // declare a variable to hold the results.
        $search_res = [];
        if (request()->has('searchfor')) {
            $searchFor = strval(request('searchfor'));
        }
        foreach ($all_products as $data) {
            // comparison should only be done in lower case
            $result = similar_text(strtolower($searchFor), strtolower($data), $perc);

            // if the percentage score of similarity is upto 35%, then we wanna display it to d user
            if ($perc >= 35) {
                // the reason for using the $perc value in the key of each data 'matched', is so that we can sort our results in the view. Listing the most appropriate ones before the less appropriate ones 
                $search_res[floor($perc) . '%'] = $data;
            }
        };
        
        krsort($search_res);// this is where we sort the array
        $php_res = $search_res;

        // ==============================================================================
        $mysql_res = $res->merge($res2)->take(7)->toArray();
        // response for ajax calls
        if (request()->header('Content-Type') == 'application/json') {
            return response()->json($mysql_res);
            // return response()->json($php_res);
        }
        // response for html calls.
        return view('admin.layout.dashboard'); //with data of course
    }


    public function faster(Request $request)
    {
        // $all_products = auth()->user()->products;
        $all_products = Auth::user()->products;
        $search_res = [];
        if (request()->has('q')) $searchFor = strval(request('q')) ?? '';
        foreach ($all_products as $product) {
            $result = similar_text(strtolower($searchFor), strtolower($product->name), $perc);
            if ($perc >= 35) $search_res[floor($perc) . '%'] = $product;
        };
        krsort($search_res);
        

        // after sorting it based on percentage, we will now make it an indexed array,
        // so that js can traverse it and we achieve this feat by returning only the values in the array,
        // invariably, we automatically rid the array keys away.
        return response()->json(array_values($search_res));
    }
}
