@extends('layouts.menu')

@section('contenido')
<div class="row">
    <h1 class="light-green-text text-darken-3">Nuevo producto</h1>
</div>

<div class="row">
    <form class="col s8" method="post" action="{{url('productos')}}">
      @csrf
       <div class="row">
           <div class="input-field col s8">
           <input placeholder="Nombre del producto" id="nombre" name="nombre" type="text">
           <label class="light-green-text text-darken-3" for="nombre">Nombre del producto</label>
           </div>
       </div>

       <div class="row">
          <div class="input-field col s8">
            <textarea name="desc" id="desc" class="materialize-textarea"></textarea>
            <label class="light-green-text text-darken-3" for="desc">Descripción del producto</label>
          </div>
       </div>

       <div class="row">
           <div class="input-field col s8">
               <input placeholder="Precio del producto" id="precio" name="precio" type="text">
               <label class="light-green-text text-darken-3" for="precio">Precio del producto</label>
           </div>
       </div>

       <div class="row">
         <div class="col s8 input-field">
           <select name="marca" id="marca">
              @foreach($marcas as $marca)
                <option value="{{$marca->id}}">{{ $marca->nombre }}</option>
              @endforeach
           </select>
           <label class="light-green-text text-darken-3" for="Marca">Marca</label>
           </div>
       </div>

       <div class="row">
         <div class="col s8 input-field">
           <select name="categoria" id="categoria">
              @foreach($categorias as $categoria)
                <option value="{{$categoria->id}}" >{{ $categoria->nombre }}</option>
              @endforeach
           </select>
           <label class="light-green-text text-darken-3" for="categoria">Categoria</label>
         </div>
       </div>

<div class="row">
       <div class="file-field input-field col s8">
      <div class="btn green lighten-3">
        <span>Imagen del producto</span>
        <input type="file" name="imagen">
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text">
      </div>
    </div>
    </div>
    

    <div class="row">
        <button class="waves-effect waves-light green lighten-3 btn " type="submit" name="action">Guardar</button>
    </div>
    </form>

</div>
@endsection