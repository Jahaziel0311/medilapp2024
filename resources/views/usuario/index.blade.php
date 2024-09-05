@extends('layout.app')

@section('head')
      @include('layout.tableHead')
@endsection

@section('js')
    @include('layout.tableJs')
    @include('scripts.validaciones')
    @include('scripts.usuario')
@endsection

@section('titulo')
    Usuarios
@endsection

@section('contenido')
<div class="row">
  <div class="col-md-12">
      <div class="card">
          <div class="card-body">

            <div class="row">
                <div class="col-md-6">
                  <h5 class="card-title">Usuarios</h5>
                  <p class="card-title-desc">Este listado muestra todos los usuarios que estan registrados en el sistema.
                  </p>
                </div>
                <div class="col-md-3">
                  
                </div>
                @if(Auth::user()->accesoRuta('/usuario/create'))
                  <div class="col-md-3">
                    <div class="row">
                      <div class="col-md-8">
                        <button type="button" class="btn btn-primary waves-effect waves-light"
                          data-bs-toggle="modal" data-animation="bounce"
                          data-bs-target=".addNewUsuarioModal">
                          Agregar Usuario
                        </button>
                        @include('modals.UsuarioModals') 
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
                            <th>Usuario</th>
                            <th>Rol</th>
                            <th>Estado</th>
                            <th>Email</th>
                            <th>Acciones</th>
                          </tr>
                      </thead>


                      <tbody>
                        @foreach ($resultado as $fila)
                          <tr style="font-size: 100%;">
                            <td>{{$fila->id}}</td>
                            <td>{{$fila->nombre_usuario}}</td>  
                            <td>{{$fila->rol->nombre_rol}}</td>
                            <td>  
                              @if($fila->estado_usuario == 1)
                                Activo
                              @else 
                                Bloqueado
                              @endif   
                            </td> 
                            <td>{{$fila->email_usuario}}</td>                      
                            <td>
                              
                              

                              @if (Auth::user()->accesoRuta('/usuario/update'))
                                <button type="button" class="btn btn-success btn-sm"
                                  data-bs-toggle="modal" data-animation="bounce"
                                  data-bs-target=".editarUsuarioModal{{$fila->id}}" title="Editar Usuario">
                                  <i id="iconoBoton" class="fas fa-user-edit"></i>
                                </button>  
                                @include('modals.editarUsuarioModals')
                              @endif

                              @if (Auth::user()->accesoRuta('/usuario/delete'))
                                @if($fila->estado_usuario == 1)

                                  <a class="btn btn-danger btn-sm btnIcono" title="Eliminar usuario" href="{{route('usuario.delete', ['id'=> $fila->id] )}}" onclick="
                                    return confirm('Desea eliminar este usuario del sistema?')"><i id="iconoBoton" class="fas fa-trash-alt"></i></a>
                                
                                @else
                                  
                                  <a class="btn btn-warning btn-sm btnIcono" title="Desbloquear usuario" href="{{route('usuario.desbloquear', ['id'=> $fila->id] )}}" onclick="
                                    return confirm('Desea desbloquear este usuario del sistema?')"><i id="iconoBotonW" class="fas fa-shield-alt"></i></a>
                                
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



