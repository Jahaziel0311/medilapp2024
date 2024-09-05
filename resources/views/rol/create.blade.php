@extends('layout.app')

@section('js')
  
    @include('scripts.validaciones')


@endsection

@section('titulo')
    Crear Rol
@endsection

@section('contenido')
<div class="row">
    <div class="col-md-2">

    </div>
    <div class="col-md-8">
        <div class="text-center">
            <h1>Crear Rol</h1>
        </div>
      <div class="card">
          <div class="card-body">

            
            <form action="{{route('rol.insert')}}" method="POST" role="form" class="form-horizontal" autocomplete="off">
                @csrf
                <div class="mb-0">
                    <div class="row">

                        <div class="col-lg-12">                                
                            <div class="input-group mb-3">
                                <span class="input-group-text">Nombre del Rol</span>
                                <input type="text"  class="form-control" placeholder="Ejemplo: Recepcionista" name="txtNombre" required>
                                                         
                            </div>
                        </div>                                                                             
                        
                        
                        <div class="col-lg-4 offset-8">
                            
                            <button type="submit" id="btnCrearModal" class="btn btn-info w-lg">Agregar Rol</button>
                        </div>
                    </div>
                </div>
            </form>
              
              
          </div>
      </div>
  </div>
  <!-- end col -->
</div>
<!-- end row -->
@endsection




