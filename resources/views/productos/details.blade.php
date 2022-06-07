@extends('layouts.menu')
@section('contenido')
<div class="row">
    <h1>{{ $producto->nombre }}</h1>
</div>
<div class="row">
    <div class="col s8">
        <div class="card">
        <div class="card-image">
                    @if($producto->imagen === null)
                    <img src="{{ asset('img/nodisponible.jpg') }}" alt="">
                    @else
                    <img src="{{ asset('img/'.$producto->imagen) }}" alt="">
                    
                    @endif
                    </div>
        </div>
   
        <h3>Marca: {{$producto->marca->nombre}}</h3>
        <ul>
            <li>Precio: US {{$producto->precio}}</li>
            <li>Descripción: {{$producto->desc}}</li>
        </ul>

    </div>
    <div class="col s4">
        <div class="row">
            <h3>Añadir al carrito</h3>
        </div>
    <form action="{{route ('cart.store')}}" method="post">
        @csrf
        <input type="hidden" name="prod_id" value="{{$producto->id}}">
        <div class="row">
            <div class="row">
                <div class="col s4 input-field">
                    <select name="cantidad" id="cantidad">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                    <label for="cantidad">Cantidad</label>
                </div>
                
            </div>
        </div>

        <div class="row">
        <button class="waves-effect waves-light green lighten-3 btn " type="submit" name="action">Añadir</button>
    </div>
    </form>

    </div>
    <style>
    .card{
       
        width:60%;
    }
    </style>
</div>
@endsection