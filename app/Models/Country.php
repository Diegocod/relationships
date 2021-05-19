<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    public function location(){ //esse método retorna um relacionamento de um para um
        /*
        por convenção o eloquente presume que tenha um country_id "dentro do model" Location,
        então não precisamos informar o nome da chave estrangeira no parametro
        */

        return $this->hasOne(Location::class); 
        
    }
}
