@extends('layout.app')

@section('js')  
    @include('scripts.validaciones')


@endsection

@section('titulo')
    Crear Pantalla
@endsection

@section('contenido')
<div class="row">
    <div class="col-md-2">

    </div>
    <div class="col-md-8">
        <div class="text-center">
            <h1>Crear Pantalla</h1>
        </div>
      <div class="card">
          <div class="card-body">

            
            <form action="{{route('pantalla.insert')}}" method="POST" role="form" class="form-horizontal" autocomplete="off">
                @csrf
                <div class="mb-0">
                    <div class="row">

                        <div class="col-lg-6">                                
                            <div class="input-group mb-3">
                                <span class="input-group-text">Nombre del Pantalla</span>
                                <input type="text"  class="form-control" placeholder="Ejemplo: Crear Usuario" name="txtNombre" required>
                                                         
                            </div>
                        </div>    
                        <div class="col-lg-6">                                
                            <div class="input-group mb-3">
                                <span class="input-group-text">URL</span>
                                <input type="text"  class="form-control" placeholder="Ejemplo: /usuario/create" name="txtUrl" required>
                                                         
                            </div>
                        </div>                                                                            
                        <div class="col-lg-6">
                            
                            <div class="input-group mb-3">                                    
                                <div class="col-sm-12">
                                    <select class="form-select" name="txtPadre" id="" value="" required>

                                        <option>Asignar a</option>
                                        <option value="0">Raiz</option>
                                        @foreach ($pantallas_padre as $padre)
                                            <option value="{{$padre->id}}">{{$padre->nombre_pantalla}}</option>
                                        @endforeach 
                                        
                                        
                                    </select>
                                </div>
                            </div>
                            
                        </div>

                        <div class="col-lg-6">
                            
                            <div class="checkbox my-2">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="txtEstado" id="" value="1" checked
                                        id="customCheck3" data-parsley-multiple="groups"
                                        data-parsley-mincheck="2">
                                    <label class="form-check-label"
                                        for="customCheck3">Mostrar en el Menu?</label>
                                </div>
                            </div>
                            
                        </div>                                                                            
                        
                        
                        <div class="col-lg-4 offset-8">
                            
                            <button type="submit" id="btnCrearModal" class="btn btn-info w-lg">Agregar Pantalla</button>
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




