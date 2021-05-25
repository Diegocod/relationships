<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $fillable = ['name'];


    public function location(){ //esse método retorna um relacionamento de um para um
        /*
        por convenção o eloquente presume que tenha um country_id "dentro do model" Location,
        então não precisamos informar o nome da chave estrangeira no parametro
        */

        return $this->hasOne(Location::class); 
        
    }


    public function states()//nome no plural pois retornará muitos (não é obrigado)
    {
        return  $this->hasMany(State::class); 
        /*o laravel infere que existe uma foreign key chamada 'country_id' na tabela
        states
        e a local key (chave originadora da estrangeira) se chama 'id'
        */

    }


}
