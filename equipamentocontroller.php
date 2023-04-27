<?php

//namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Equipamentocontroller;

//class Equipamentocontroller extends Controller

    public function index()
{

       echo "Controller recebe dados aqui";

    

Route::get('/', 'Equipamentocontroller@index');

//Route::get('/', [EQUIPAMENTOCONTROLLER::class, 'index']);

    }

