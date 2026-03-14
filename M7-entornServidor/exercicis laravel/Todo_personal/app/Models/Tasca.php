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
}
