<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Credito extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'Total', 'venta_id'];
    public function Venta(){
        return $this->hasMany("App\Models\Venta");
    }
    public function Pago_Credito(){
        return $this->belongsTo("App\Models\Pago_Credito");
    }
}
