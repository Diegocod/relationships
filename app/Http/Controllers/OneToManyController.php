<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;

class OneToManyController extends Controller
{
    
    public function oneToMany()
    {

        //$country = Country::where('name', 'Brasil')->first();
        $keySearch = 'a';
        $countries = Country::where('name', 'LIKE', "%{$keySearch}%")->with('states')->get();
        //with() retorna todos as informações vinculadas pelo relacionamento.


        foreach($countries as $country) {

            echo "<b>{$country->name}</b>";

            $states = $country->states;

            foreach ($states as $state){
                echo "<br> {$state->initials} - {$state->name}";
            }

            echo '<hr>';
        }


    }

    public function manyToOne()
    {
        $stateName = 'Pequim';

        $state = State::where('name', $stateName)->first();

        echo "<b> {$state->name} </b>";

        $country = $state->country;

        echo "<br> País: {$country->name}"; 


    }


    
}
