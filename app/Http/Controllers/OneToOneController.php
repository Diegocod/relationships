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
        
        //$location = $country->location;//Obtém por meio de atributo. Retorna a relação com location em um array que tem apenas um elemento
    

        $location = $country->location()->get()->first();

        //dd($location); //exibe a localização do país

    }

    public function oneToOneInverse()
    {
        $latitude = 456;
        $longitude = 654;

        $location = Location::where('latitude', $latitude)->where('longitude', $longitude)->first();

        $country = $location->country;

        dd($country->name); //exibe o nome do país
    }


    public function oneToOneInsert()
    {
        $dataForm = [ //simulando dados vindos do formulário
            'name' => 'França',
            'latitude' => '98',
            'longitude' => '48' 
        ];

        $country = Country::create($dataForm);

        $location = $country->location()->create($dataForm);




        /*
        $dataForm['country_id'] = $country->id;
        $location = Location::create($dataForm);
        */
    
        /*
        $location = new Location;
        $location->latitude = $dataForm['latitude'];
        $location->longitude = $dataForm['longitude'];
        $location->country_id = $country->id;
        $saveLocation = $location->save();
        */



    }


}
