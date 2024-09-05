@extends('layout.app')

@section('head')
      @include('layout.tableHead')
@endsection

@section('js')
    @include('layout.tableJs')
    @include('scripts.validaciones')
@endsection

@section('titulo')
  Buscar Pacientes
@endsection

@section('contenido')
<div class="row">
  <div class="col-md-2">
  </div>
  <div class="col-md-8">
      <div class="card">
          <div class="card-body">

            <div class="row">
                <div class="col-md-10">
                  <h5 class="card-title">Pacientes</h5>
                  <p class="card-title-desc">En esta seccion se puede buscar a todos los pacientes que estan registrados en el sistema.
                  </p>
                </div>
                <div class="col-md-2">
                  <button type="button" class="btn btn-primary waves-effect waves-light"
                  data-bs-toggle="modal" data-animation="bounce"
                  data-bs-target=".addNewPacienteModal">Agregar Paciente</button>                  
                </div>
                @include('modals.PacienteModals')
            </div>

            <form action="" method="POST" role="form" autocomplete="off">
              @csrf
              <div class="mb-0">
                  <div class="row">

                      <div class="col-lg-2">
                          
                      </div>
                      <div class="col-lg-8">                                
                        <input type="text" class="form-control"  name="txtBuscar" id="txtBuscar" placeholder="Texto a buscar" 
                        required>
                      </div>
                      <div class="col-lg-1">
                       
                      </div>
                      <div class="col-lg-1">
                        <button type="submit" id="botoncrear" class="btn btn-primary "><i class="fas fa-search"></i></button>
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

         

 

