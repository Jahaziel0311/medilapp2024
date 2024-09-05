@extends('layout.app')

@section('head')
      @include('layout.tableHead')
@endsection

@section('js')
    @include('layout.tableJs')
    @include('scripts.validaciones')
@endsection

@section('titulo')
    Medico
@endsection

@section('contenido')
<div class="row">
  <div class="col-md-12">
      <div class="card">
          <div class="card-body">

            <div class="row">
                <div class="col-md-6">
                  <h5 class="card-title">Medicos</h5>
                  <p class="card-title-desc">Este listado muestra todos los medicos que estan registrados en el sistema.
                  </p>
                </div>
                <div class="col-md-3">
                  @include('mensajes.alertas')
                </div>
                
                <div class="col-md-3">
                  <div class="row">
                    <div class="col-md-8">
                      <button type="button" class="btn btn-primary waves-effect waves-light"
                        data-bs-toggle="modal" data-animation="bounce"
                        data-bs-target=".addNewMedicoModal">
                        Agregar Medico
                      </button>
                      @include('modals.MedicoModals')  
                    </div>
                    
                  </div>
                   
                               
                </div>
                
                
                
            </div>

              
              <div class="table-responsive">
                  <table id="dataTable" class="table table-bordered">
                      <thead>
                          <tr>
                            <th>Id</th>
                            <th>Numero de Registro</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Telefono</th>
                            <th>Acciones</th>
                          </tr>
                      </thead>


                      <tbody>
                        @foreach ($resultado as $fila)
                          <tr style="font-size: 100%;">
                            <td>{{$fila->id}}</td>
                            <td>{{ $fila->numero_registro }}</td>
                            <td>{{ $fila->nombre_medico }}</td>
                            <td>{{ $fila->email_medico }}</td>
                            <td>{{ $fila->telefono_medico }}</td>
                            <td>
                              
                              

                              @if (Auth::user()->accesoRuta('/medico/update'))
                                <button type="button" class="btn btn-success btn-sm"
                                  data-bs-toggle="modal" data-animation="bounce"
                                  data-bs-target=".editarMedicoModal{{$fila->id}}">
                                  <i id="iconoBoton" class="fas fa-user-edit"></i>
                                </button>  
                                @include('modals.editarMedicoModals')
                              @endif

                              @if (Auth::user()->accesoRuta('/medico/delete'))
                                @if($fila->estado_medico == 1)

                                  <a class="btn btn-danger btn-sm btnIcono" title="Eliminar medico" href="{{route('medico.delete', ['id'=> $fila->id] )}}" onclick="
                                    return confirm('Desea eliminar este medico del sistema?')"><i id="iconoBoton" class="fas fa-user-times"></i></a>
                                
                                @else
                                  
                                  <a class="btn btn-warning btn-sm btnIcono" title="Desbloquear medico" href="{{route('medico.desbloquear', ['id'=> $fila->id] )}}" onclick="
                                    return confirm('Desea desbloquear este medico del sistema?')"><i id="iconoBotonW" class="fas fa-user-shield"></i></a>
                                
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



