@extends('layouts.menu')

@section('contenido')

<link rel="stylesheet" href="../css/index.css">
    <div class="row">
        <h1>Catalogo de productos</h1>
    </div>
    @if(session('mensajito'))
<div class="row">
    <strong>
        {{session('mensajito')}}
        <a class="light-green-text text-lighten-3" href="{{route('cart.index')}}">Ir al carrito</a>
    
</div>
@endif

    @foreach($productos as $producto)
    <div class="row">
        <div class="col s9 m20">
            <div class="card">
                <div class="card-image">
                    @if($producto->imagen === null)
                    <img src="{{ asset('img/nodisponible.jpg') }}" alt="">
                    @else
                    <img src="{{ asset('img/'.$producto->imagen) }}" alt="">
                    
                    @endif
                    <span class="card-title">{{ $producto->nombre }}</span>
                    
                </div>
                <div class="card-content">
                    <p>{{ $producto->desc }}</p>
                </div>
                <div class="card-action">
                    <a class="light-green-text text-lighten-3" href="{{ route('productos.show', $producto->id) }}">Ver detalles</a>
                </div>
            </div>
        </div>
        <style>
    .card{
        display:flex;
        width:60%;
    }
    .card:hover{
        cursor:pointer;
        
    }

    

    .card-action a{
        @extend light-green lighten-3;
    }
</style>
    </div>
    @endforeach
    
    

@endsection

