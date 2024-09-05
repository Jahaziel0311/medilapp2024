@extends('layout.app')

@section('head')
      @include('layout.tableHead')
@endsection

@section('js')
    @include('layout.tableJs')
    @include('scripts.validaciones')
@endsection

@section('titulo')
    Roles
@endsection

@section('contenido')
<div class="row">
  <div class="col-md-12">
      <div class="card">
          <div class="card-body">

            <div class="row">
                <div class="col-md-6">
                  <h5 class="card-title">Roles</h5>
                  <p class="card-title-desc">Este listado muestra todos los roles que estan registrados en el sistema.
                  </p>
                </div>
                <div class="col-md-3">
                  @include('mensajes.alertas')
                </div>
                @if(Auth::user()->accesoRuta('/rol/create'))
                  <div class="col-md-3">
                    <div class="row">
                      <div class="col-md-8">
                        <button type="button" class="btn btn-primary waves-effect waves-light"
                          data-bs-toggle="modal" data-animation="bounce"
                          data-bs-target=".addNewRolModal">
                          Agregar Rol
                        </button>
                        @include('modals.RolModals')  
                      </div>
                      
                    </div>
                    
                                
                  </div>
                @endif
                
                
            </div>

              
              <div class="table-responsive">
                  <table id="dataTable" class="table table-bordered">
                      <thead>
                          <tr>
                            <th>Id</th>
                            <th>Nombre rol</th>        
                            <th>Acciones</th>
                          </tr>
                      </thead>


                      <tbody>
                        @foreach ($resultado as $fila)
                          <tr style="font-size: 100%;">
                            <td>{{$fila->id}}</td>
                            <td>{{$fila->nombre_rol}}</td>                            
                            <td>
                              
                              

                              @if (Auth::user()->accesoRuta('/rol/update'))
                                <button type="button" class="btn btn-success btn-sm"
                                  data-bs-toggle="modal" data-animation="bounce"
                                  data-bs-target=".editarRolModal{{$fila->id}}" title="Editar Rol">
                                  <i id="iconoBoton" class="fas fa-user-edit"></i>
                                </button>  
                                @include('modals.editarRolModals')
                              @endif

                              @if (Auth::user()->accesoRuta('/rol/delete'))
                                @if($fila->estado_rol == 1)

                                  <a class="btn btn-danger btn-sm btnIcono" title="Eliminar rol" href="{{route('rol.delete', ['id'=> $fila->id] )}}" onclick="
                                    return confirm('Desea eliminar este rol del sistema?')"><i id="iconoBoton" class="fas fa-trash-alt"></i></a>
                                
                                @else
                                  
                                  <a class="btn btn-warning btn-sm btnIcono" title="Desbloquear rol" href="{{route('rol.desbloquear', ['id'=> $fila->id] )}}" onclick="
                                    return confirm('Desea desbloquear este rol del sistema?')"><i id="iconoBotonW" class="fas fa-shield-alt"></i></a>
                                
                                @endif 
                               
                              @endif
                              
                            </td>
                          </tr>
                        @endforeach

                      </tbody>
                  </table>
              </div>
          </div>
      </div>
  </div>
  <!-- end col -->
</div>
<!-- end row -->
@endsection



