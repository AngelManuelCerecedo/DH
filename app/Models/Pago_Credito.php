<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago_Credito extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'Abono', 'credito_id'];
    public function Credito(){
        return $this->hasMany("App\Models\Credito");
    }
}
