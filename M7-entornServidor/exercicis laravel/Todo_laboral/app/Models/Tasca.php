<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tasca extends Model
{
    protected $table = 'tasques';

 //

    protected $fillable = [
        'titol',
        'descripcio',
        'prioritat',
        'stat',
        'category_id',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'category_id');
    }

    public function treballadors()
    {
        return $this->belongsToMany(Treballador::class, 'tasca_treballador', 'tasca_id', 'treballador_dni');
    }
}
