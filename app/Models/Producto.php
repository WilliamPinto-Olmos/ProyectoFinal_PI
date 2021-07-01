<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'descripcion', 'precio', 'stock', 'img', 'provedor_id'];

    public function provedor()
    {
        return $this->belongsTo(Provedor::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('cantidadProducto')->withTimestamps();
    }
}
