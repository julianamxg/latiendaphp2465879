<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //mostrar variable session 'cart'
       return view('cart.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //estructurar la info del produc en un arreglo
        $producto =[
            [
            "nombre" => $request->prod_nom,
            "id" => $request->prod_id,
            "cantidad" => $request->cantidad,
            "precio" => $request->precio
            ]
        ];

        if (!session('cart')) {
            $auxiliar[] = $producto;
           session(['cart' => $auxiliar]);
        }else {
            //existe la variable session
            //extraer el contenido de la session cart
            $auxiliar = session('cart');
            //agregar nuevo item al arreglo
            $auxiliar[] =$producto;
            session(['cart' => $auxiliar]);
        }

       return redirect('productos')
       ->with('mensajito', 'Producto añadido al carrito');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        session()->forget('cart');
        return redirect('cart')->with('mensaje', 'Producto eliminado');
    }
}
