<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Treballador extends Model
{
    protected $table = 'treballadors';
    //

    protected $primaryKey = 'dni';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'dni',
        'nom',
        'cognoms1',
        'cognoms2',
        'correu',
        'telefon',
    ];

    public function tasques()
    {
        return $this->belongsToMany(Tasca::class, 'tasca_treballador', 'treballador_dni', 'tasca_id');
    }
}
