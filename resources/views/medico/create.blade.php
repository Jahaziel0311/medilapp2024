@extends('layout.app')

@section('head')
      @include('layout.tableHead')
@endsection

@section('js')
    @include('layout.tableJs')
    @include('scripts.validaciones')


@endsection

@section('titulo')
    Crear Médico
@endsection

@section('contenido')
<div class="row">
    <div class="col-md-2">

    </div>
    <div class="col-md-8">
        <div class="text-center">
            <h1>Crear Médico</h1>
        </div>
      <div class="card">
          <div class="card-body">

            
            <form action="{{route('medico.insert')}}" method="POST" role="form" class="form-horizontal" autocomplete="off">
                @csrf
                <div class="mb-0">
                    <div class="row">

                        <div class="col-lg-6">                                
                            <div class="input-group mb-3">
                                <span class="input-group-text">Registro del Médico</span>
                                <input type="text"  class="form-control" name="txtNumero" id="txtRegistro2" placeholder="Ingrese el numero de registro del Medico"  onfocusout="validarRegistro2()"
                                value="{{old ('txtNumero')}}" required>
                                <div class="invalid-feedback" id="AlertaRegistro2"></div>
                                <div class="invalid-feedback" id="AlertaMedico2"></div>
                                
                            </div>
                        </div>  

                        <div class="col-lg-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Nombre del Doctor</span>
                                <input type="text"  class="form-control" name="txtNombre" placeholder="Ejemplo:Juan" 
                                value="{{old ('txtNombre')}}" required> 
                            </div>
                        </div>
                        
                        <div class="col-lg-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Correo</span>
                                <input type="email"  class="form-control" placeholder="Ejemplo:juan@gmail.com" 
                                 name="txtEmail" value="{{old ('txtEmail')}}" >  
                            </div>
                        </div>   
                        <div class="col-lg-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Telefono</span>
                                <input type="text"  class="form-control" id="inputtelefono" placeholder="Ejemplo:66666666" name="txtTelefono" 
                                value="{{old ('txtTelefono')}}" >  
                            </div>
                        </div>                                                 
                        
                        <div class="col-lg-6">
                            
                        </div>
                        <div class="col-lg-3">
                            <a href="{{route('medico.index')}}" class="btn btn-danger  w-lg"><i class="fas fa-times"></i> Cancelar</a>
                        </div>
                        <div class="col-lg-3">
                            
                            <button type="submit" id="botoncrear" class="btn btn-info w-lg">Agregar Médico</button>
                            
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




