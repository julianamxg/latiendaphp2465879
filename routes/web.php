<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//primera ruta
//get: se permiten mortrar por el navegador 
//:: metodos estaticos 
// parametros 1. nombre de la ruta
Route::get('hola', 
       function(){
        echo "Hola mi primera ruta en php";
            }
        );

//ruta paises
Route::get('paises' , function(){
    $paises=[
        "Colombia" => [
            "Capital" => "Bogotá",
            "Moneda" => "Peso",
            "Poblacion" => 51.6,
            "Ciudades" =>[
                "Medellin",
                "Cali",
                "Barranquilla"
            ]
        ] ,
        "Perú"  => [
            "Capital" => "Lima",
            "Moneda" => "Sol",
            "Poblacion" => 32.97,
            "Ciudades" =>[
                "Trujillo",
                "Cusco",
                "Tacna"
            ]
        ] ,
        "Paraguay" => [
            "Capital" => "Asunción",
            "Moneda" => "Guaraní paraguayo",
            "Poblacion" => 7.133,
            "Ciudades" =>[
                "Luque",
                "San Lorenzo",
                "Ciudad del Este"
            ]
        ] 
    ];
//echo "<pre>";
   // var_dump($paises);
   // echo "</pre>";

   //mostrar la vista de paises
   return view('paises')->with("paises", $paises);

});

Route::get('prueba', function(){
    return view('productos.new');
});