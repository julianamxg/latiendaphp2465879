<?php

namespace App\Http\Controllers;


use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Marca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        echo "Aqui va a ir el catalogo de productos";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $marcas = Marca::all();
        $categorias = Categoria::all();
        return view('productos.new')
        ->with('marcas', $marcas)
        ->with('categorias', $categorias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        //Definir reglas de validación
        $reglas = [
           "nombre" => 'required|alpha',
           "desc" => 'required|min:10|max:30',
           "precio" => 'required|numeric',
           "marca" => 'required',
           "categoria" => 'required'
        ];
        //Mensajes personalizados por regla
        $mensajes =[
            "required" => "Campo obligatorio",
            "numeric" => "Solo puede ingresar números",
            "alpha" => "Solo se puede ingresar letras",
            "min" => "Ingresa minimo 10 caracteres",
            "max" => "Ingresa maximo 30 caracteres"
        ];
        //Crear el objeto
        $v= Validator::make($r->all(), $reglas, $mensajes);
        
     
      if($v->fails()){
         //validación fallida
         //mostrar mensajes de validación
         return redirect('productos/create')
                          ->withErrors($v)
                          ->withInput();

      }else {
         //validación correcta

         //Crear entidad de producto
        $p = new Producto;
        $p->nombre = $r->nombre;
        $p->desc = $r->desc;
        $p->precio = $r->precio;
        $p->marca_id = $r->marca;
        $p->categoria_id = $r->categoria;
        //grabar el nuevo producto 
        $p->save();
        //redireccionar a la ruta : create
        return redirect('productos/create')
                    ->with('mensaje' , 'Producto registrado');
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show($producto)
    {
        echo "Aqui va la información del producto cuyo id es: $producto";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit($producto)
    {
        echo "Aqui va a ir el formulario de edición del producto cuyo id es: $producto";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        //
    }
}
