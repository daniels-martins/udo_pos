<?php

namespace App\Http\Controllers;

use Faker\Factory;
use App\Models\User;
use App\Models\Product;
use App\Models\Customer;
use App\Models\ProdType;
use Illuminate\Http\Request;
use App\Models\StoreWarehouse;
use App\Models\MeasurementScale;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use Prophecy\Doubler\Generator\Node\ReturnTypeNode;

class TinkerController extends Controller
{

    public function test()
    {
        //  a shrt way to set all values to sth
        // foreach (Product::all() as $value) {
        //     $value->price = random_int(200, 50000);
        //     $value->save();
        // }
        // dd(Product::all()->take(5));

        $product = Product::take(5)->get();
        foreach ($product as   $value) {
            $newItemInCart = Cart::add($value, 1);
        }
        // dd(Cart::content());
        // dd($newItemInCart);
        return view('tinker');
    }

    public function try()
    {
        // dd('new');
        $allStores = StoreWarehouse::all();
        $allproducts_id  = Product::get('id');
        $allproducts  = Product::get();
        $all_bosses = User::all();
        $clients_id = Customer::get('id');
            

            
        // return Auth::user()->products;
        // return User::where('id', 14)->first()->products;
        return User::where('id', 13)->first()->clients;
        
    } //method


    public function tinker()
    {
        // nethod 1, going the normal route
        // $measurement = MeasurementScale::all();
        // $count = count($measurement);

        // $randomProd = ['capacitor', 'fan', 'wire', 'coil', 'copper'];
        // for ($i=0; $i < $count; $i++) { 
        //     $measurement[$i]->products()->create([
        //         'name' => $randomProd[$i]
        //         ]
        //     );
        // }
        // dd($count, $measurement[1]->products->first());
        // dd($count, Product::latest()->first()->measurement_scale);

        // method two going the abnormal route also works
        // $randomProd = Product::find(4);
        // $randomProd->measurement_scale()->create([
        //     'identity' => 'bits'
        // ]);
        // dd($randomProd);

        $new_item = ProdType::first();
        // dd($new_item->name);
        $all_products = json_encode(array_values(Product::pluck('name')->toArray()));
        // dd($all_products);
        return view('tinker');
        // View::share('all_products', $all_products);

    } //method

    public function index()
    {
        $dataSet = [
            "Lionel Messi",
            "Cristiano Ronaldo",
            "Xavi",
            "'Andres Iniesta",
            "Zlatan Ibrahimovic",
            "Radamel Falcao",
            "Robin van Persie",
            "Andrea Pirlo",
            "Yaya Toure",
            "Edinson Cavani",
            "Sergio Aguero",
            "Iker Casilla'",
            "Neymar	",
            "Riyad Mahrez	",
            "Sergio Busquets",
            "Xabi Alonso",
            "Thiago Silva",
            "Mesut Ozil",
            "David Silva",
            "Bastian Schweinsteiger",
            "Gianluigi Buffo'",
            "Luis Suarez",
            "Sergio Ramos",
            "Vincent Kompany",
            "Gerard Pique",
            "Philipp Lahm",
            "Willian",
            "Marco Reus",
            "Franck Ribery",
            "Manuel Neue'",
            "Ashley Cole",
            "Wayne Rooney",
            "Juan Mata",
            "Thomas Muller",
            "Mario Götze",
            "Karim Benzema",
            "Cesc Fabregas",
            "Oscar	",
            "Fernandinho	",
            "Javier Mascherano",
            "Gareth Bale",
            "Javier Zanetti",
            "Daniele De Rossi",
            "Dani Alves	",
            "Petr Cech",
            "Mats Hummels",
            "Carles Puyol	",
            "Angel Di Maria",
            "Carlos Tevez	",
            "Didier Drogba	",
            "Giorgio Chiellini	",
            "Marcelo	",
            "Stephan El Shaarawy",
            "Toni Kroos	",
            "Samuel Eto’o	",
            "Jordi Alba	",
            "Mario Gomez	",
            "Arturo Vidal	",
            "Eden Hazard	",
            "James Rodriguez	",
            "Marouane Fellaini	",
            "Ramires",
            "David Villa	",
            "Klaas Jan Huntelaar",
            "Nemanja Vidic	",
            "Joe Hart",
            "Arjen Robben	",
            "Mario Balotelli	",
            "Mathieu Valbuenad	",
            "Pierre-Emerick Aubameyang",
            "Robert Lewandowski	",
            "Hernanes	",
            "Pedro	",
            "Santi Cazorla",
            "Christian Eriksen	",
            "Ezequiel Lavezzi",
            "Joao Moutinho",
            "Mario Mandžukić",
            "Patrice Evra",
            "David Luiz",
            "Luka Modric",
            "Victor Wanyama	",
            "Mapou Yanga-M'Biwa",
            "Hulk",
            "Darijo Srna",
            "Emmanuel Mayuka",
            "John Terry",
            "Kwadwo Asamoah",
            "Leonardo Bonucci",
            "Javier Pastore",
            "Henrikh Mkhitaryan",
            "Moussa Dembele",
            "Hatem Ben Arfa	",
            "Samir Nasri",
            "Shinji Kagawa",
            "Wesley Sneijder",
            "Pepe	",
            "Marek Hamsik",
            "Javi Martinez",
            "Diego Forlan",
            "Paulinho",
        ];
        $dataSet = [
            'capacitor', 'radiator', 'fan', 'luminous', 'air conditioner', 'copper', 'zinc', 'overload', 'relay', 'ac installation kit', 'thread tape', 'black tape', 'charging valve', 'handsaw', 'riveting pin', '3_8 dryer',
            // capacitor items note that all of them will have capacitor in their tags, so that they can be grouped by a single search
            'capacitor 30UF', '35UF',

        ];
        $percArray = array();
        $search_res = [];
        // $searchFor = ucfirst('mare');
        if (request()->has('searchfor')) {
            $searchFor = strval(request('searchfor'));
        }
        foreach ($dataSet as $data) {
            $result = similar_text(strtolower($searchFor), strtolower($data), $perc);
            if ($perc >= 35) {
                $search_res[floor($perc) . '%'] = $data;
                // $percArray[] = $perc;
            }
        };
        krsort($search_res);
        echo '<br> this is what we found from: ' . $searchFor . ' ' . $perc . '<br>';
        echo 'search results';
        print_r(array_values($search_res));
        echo '<br>';
        echo '<br>';

        return view('tinker');
    }
}
