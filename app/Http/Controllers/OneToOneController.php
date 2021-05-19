<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Location;

class OneToOneController extends Controller
{
    
    public function oneToOne()
    {
        $country = Country::where('name', 'Brasil')->get()->first();

        //$location = $country->location;//retorna a relação com location em uma collection

        $location = $country->location()->get()->first();

        dd($location);

    }




}
