<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Almacen_Producto extends Model
{
    use HasFactory;
    protected $fillable=['id','sucursal_id','almacen_id','producto_id','Stock'];
    public function sucursal(){
        return $this->belongsTo("App\Models\Sucursal");
    }
    public function almacen(){
        return $this->belongsTo("App\Models\Almacen");
    }
    public function producto(){
        return $this->belongsTo("App\Models\Producto");
    }
}
