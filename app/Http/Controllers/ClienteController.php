<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function cliente()
    {
      return view('clientes.bcliente');
    }
    public function rcliente()
    {
      return view('clientes.Rcliente');
    }
    public function ecliente($id){
      return view('clientes.Ecliente', ['id' => $id]);
    }
}
