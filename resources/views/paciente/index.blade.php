@extends('layout.app')

@section('head')
      @include('layout.tableHead')
@endsection

@section('js')
    @include('layout.tableJs')
    @include('scripts.validaciones')
@endsection

@section('titulo')
    Pacientes
@endsection

@section('contenido')
<div class="row">
  <div class="col-md-12">
      <div class="card">
          <div class="card-body">

            <div class="row">
                <div class="col-md-4">
                  <h5 class="card-title">Pacientes</h5>
                  <p class="card-title-desc">Este listado muestra todos los pacientes que estan registrados en el sistema.
                  </p>
                </div>
                <div class="col-md-3">
                  @include('mensajes.alertas')
                </div>
                <div class="col-md-2">

                </div>
                <div class="col-md-3">
                  <div class="row">
                    <div class="col-md-8">
                      <button type="button" class="btn btn-primary waves-effect waves-light"
                        data-bs-toggle="modal" data-animation="bounce"
                        data-bs-target=".addNewPacienteModal">
                        Agregar Paciente
                      </button>
                      @include('modals.PacienteModals')  
                    </div>
                    <div class="col-md-4">
                      @if(Route::is('paciente.buscado') )
                        <div class="p-2">
                          <a href="{{route('paciente.busqueda')}}" type="button" class="btn btn-secondary waves-effect waves-light btn-icon-split">
                            <span class="icon text-white-50">
                              <i class="fas fa-chevron-left"></i>
                              
                            </span>
                            <span class="text">
                              Atras
                            </span>
                          </a>
                        </div>
                      @endif  

                    </div>
                  </div>
                   
                               
                </div>
                
                
            </div>

              
              <div class="table-responsive">
                  <table id="dataTable" class="table table-bordered">
                      <thead>
                          <tr>
                            <th>ID</th>
                            <th>Cédula</th>
                            <th>Nombre</th>
                            <th>Sexo</th>
                            <th>Edad</th>
                            <th>Telefono</th>
                            <th>Email</th>
                            <th>Acciones</th>
                          </tr>
                      </thead>


                      <tbody>
                        @foreach ($resultado as $fila)
                          <tr style="font-size: 100%;">
                            <td>{{$fila->id}}</td>
                            <td>{{$fila->identificacion_paciente}}</td>
                            <td>{{$fila->nombre_paciente}} {{$fila->apellido_paciente}}</td>
                            <td>@if($fila->sexo_paciente=="m")M @else F @endif</td>
                            <td>{{\Carbon\Carbon::parse($fila->fecha_nacimiento_paciente)->age}}</td>
                            <td>{{$fila->telefono_paciente}}</td>
                            <td><p style="font-size: 90%;">{{$fila->email_paciente}}</p></td>
                            <td>
                              
                              @if (Auth::user()->accesoRuta('/orden_laboratorio/create'))                        
                                <a class="btn btn-info btn-sm btnIcono" title="Crear Orden" href="{{route('orden_laboratorio.create2', ['id'=> $fila->id] )}}" class=""><i id="iconoBoton" class="fas fa-file-medical"></i></a>
                                
                              @endif  

                              @if (Auth::user()->accesoRuta('/paciente/update'))
                                <button type="button" class="btn btn-success btn-sm"
                                  data-bs-toggle="modal" data-animation="bounce"
                                  data-bs-target=".editarPacienteModal{{$fila->id}}">
                                  <i id="iconoBoton" class="fas fa-user-edit"></i>
                                </button>  
                                @include('modals.editarPacienteModals')
                              @endif

                              @if (Auth::user()->accesoRuta('/paciente/delete'))
                                @if($fila->estado_paciente == 1)

                                  <a class="btn btn-danger btn-sm btnIcono" title="Eliminar paciente" href="{{route('paciente.delete', ['id'=> $fila->id] )}}" onclick="
                                    return confirm('Desea eliminar este paciente del sistema?')"><i id="iconoBoton" class="fas fa-user-times"></i></a>
                                
                                @else
                                  
                                  <a class="btn btn-warning btn-sm btnIcono" title="Desbloquear paciente" href="{{route('paciente.desbloquear', ['id'=> $fila->id] )}}" onclick="
                                    return confirm('Desea desbloquear este paciente del sistema?')"><i id="iconoBotonW" class="fas fa-user-shield"></i></a>
                                
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



