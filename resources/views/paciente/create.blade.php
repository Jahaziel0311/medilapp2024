@extends('layout.app')

@section('head')
      @include('layout.tableHead')
@endsection

@section('js')
    @include('layout.tableJs')
    @include('scripts.validaciones')
    <script>
       
        var app_url ='{{env('APP_URL')}}'; 
        function validar(){           
          const url = app_url+'/consultar/'+document.getElementById('txtCedula').value;
          fetch(url)
            .then(respuesta => respuesta.json() )
            .then(respuesta => {let cedula=respuesta.cedula ;
                if (cedula == document.getElementById('txtCedula').value ){
                    document.getElementById('AlertaCedula').innerHTML ='Este paciente ya existe';                    
                    document.getElementById("txtCedula").className = "form-control is-invalid";

                    
                    
                }
                else{
                    document.getElementById('AlertaCedula').innerHTML =""
                    document.getElementById("txtCedula").className = "form-control is-valid";
                    
                    
                }
                if(document.getElementById("txtCedula").className == "form-control is-invalid"){
                    document.getElementById("botoncrear").disabled =true;
                }else{
                    document.getElementById("botoncrear").disabled =false;
                    
                }
            });
          
        }
        
    </script>

@endsection

@section('titulo')
    Crear Paciente
@endsection

@section('contenido')
<div class="row">
    <div class="col-md-2">

    </div>
    <div class="col-md-8">
        <div class="text-center">
            <h1>Crear Paciente</h1>
        </div>
      <div class="card">
          <div class="card-body">

            
            <form action="{{route('paciente.insert')}}" method="POST" role="form" class="form-horizontal" autocomplete="off">
                @csrf
                <div class="mb-0">
                    <div class="row">

                        <div class="col-lg-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Cédula</span>
                                <input type="text"  class="form-control" name="txtCedula" id="txtCedula" placeholder="Ejemplo:8-888-8888"  onfocusout="validar()"
                                value="{{old ('txtcedula')}}" required>
                                <div class="invalid-feedback" id="AlertaCedula"></div>
                                
                            </div>
                        </div>
                        <div class="col-lg-6">                                
                            <div class="form-check col-md-6">
                                <input type="radio" class="form-check-input" name="txtsexo" id="radio1" value="m" <?php if(old('txtsexo')=="m"){echo 'checked="checked"';}?> checked>
                                <label class="form-check-label" for="radio1">Masculino</label>
                            </div>
                            <div class="form-check col-md-6">
                                <input type="radio" class="form-check-input" name="txtsexo" id="radio2" value="f" <?php if(old('txtsexo')=="f"){echo 'checked="checked"';}?>>
                                <label class="form-check-label" for="radio2">Femenino</label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Nombre</span>
                                <input type="text"  class="form-control" id="inputnombre" placeholder="Ejemplo:Juan" name="txtnombre"
                                value="{{old ('txtnombre')}}" required>     
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Apellido</span>
                                <input type="text"  class="form-control" id="inputapellido" placeholder="Ejemplo:Perez" name="txtapellido"
                                value="{{old ('txtapellido')}}" required >  
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Fecha de Nacimiento</span>
                                
                                <input class="form-control" type="date"  id="inputfecnac" name="txtfecnac" date-format="dd-mm-yyyy"
                                value="{{old ('txtfecnac')}}" required>
                                
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Telefono</span>
                                <input type="text"  class="form-control" id="inputtelefono" placeholder="Ejemplo:66666666" name="txttelefono" 
                                value="{{old ('txttelefono')}}" >  
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Correo</span>
                                <input type="email"  class="form-control" placeholder="Ejemplo:juan@gmail.com" 
                                 name="txtemail" value="{{old ('txtemail')}}" >  
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <textarea class="form-control" id="exampleFormControlTextarea1"
                                    placeholder="Comentario" name="txtComentario" rows="2">{{old ('txtComentario')}}</textarea>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            
                        </div>
                        <div class="col-lg-3">
                            <a href="{{route('paciente.busqueda')}}" class="btn btn-danger  w-lg"><i class="fas fa-times"></i> Cancelar</a>
                        </div>
                        <div class="col-lg-3">
                            
                            <button type="submit" id="botoncrear" class="btn btn-info w-lg">Agregar Paciente</button>
                            
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




