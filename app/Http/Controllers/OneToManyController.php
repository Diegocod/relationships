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
                echo "<br> {$state->initials} - {$state->name}: ";
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

    public function oneToManyTwo()
    {

        //$country = Country::where('name', 'Brasil')->first();
        $keySearch = 'a';
        $countries = Country::where('name', 'LIKE', "%{$keySearch}%")->with('states')->get();
        //with() retorna todos as informações vinculadas pelo relacionamento.

        foreach($countries as $country) {

            echo "<b>{$country->name}</b>";

            $states = $country->states;
            

            foreach ($states as $state){
                echo "<br> {$state->initials} - {$state->name}: ";
                
                foreach($state->cities as $city) {//obtém as cidades (cities) por meio de atributo
                    echo "{$city->name}, ";
                }
            }

            echo '<hr>';
        }


    }

    public function oneToManyInsert()
    {
         //supondo que está vindo os dados de um formuláro para adicionar estado ao brasil.
        $dataForm = [
            'name' => 'Ceará',
            'initials' => 'CE'
        ];
        $country = Country::find(1);//Recuperando o Brasil

        $insertState = $country->states()->create($dataForm);
        dd($insertState);


    }


    public function oneToManyInsertTwo()
    {
         //supondo que está vindo os dados de um formuláro para adicionar estado ao brasil.
        $dataForm = [
            'name' => 'Bahia',
            'initials' => 'BA',
            'country_id' => '1'
        ];
        

        $insertState = State::create($dataForm);
        dd($insertState);


    }



    
}
