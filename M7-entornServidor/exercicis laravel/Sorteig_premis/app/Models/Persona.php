<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
     protected $table = 'persones'; // Nom de la taula 

   protected $primaryKey = 'dni';  // Clau primària personalitzada 

   public $incrementing = false;  // La clau primària NO és un enter autoincremental

   protected $keyType = 'string';   // El tipus de la clau primària 

     protected $fillable = [  // Camps 

    'dni', 'nom', 'cognom1', 'cognom2', 'telefon', 'correu'

    ];
}
