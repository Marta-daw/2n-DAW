<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Premi extends Model
{
    //
      protected $table = 'premis'; // Nom de la taula 

   protected $primaryKey = 'nom';  // Clau primària personalitzada 

   public $incrementing = false;  // La clau primària NO és un enter autoincremental

   protected $keyType = 'string';   // El tipus de la clau primària 

     protected $fillable = [  // Camps 

    'nom', 'valor'

    ];
}
