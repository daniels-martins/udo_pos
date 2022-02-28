<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Prophecy\Doubler\Generator\Node\ReturnTypeNode;

class TinkerController extends Controller
{



    public function tinker()
    {
        // $random = Product::inRandomOrder()->get()->take(70);
        // foreach ($random as $val) {
        //     $val->status  = 0;
        //     $val->save();
        // }
        // dd($random);

        return view('tinker');
    }


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
