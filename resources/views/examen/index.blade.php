@extends('layout.app')

@section('head')
      @include('layout.tableHead')
@endsection

@section('js')
    @include('layout.tableJs')
    @include('scripts.validaciones')
@endsection

@section('titulo')
    Examenes
@endsection

@section('contenido')
<div class="row">
  <div class="col-md-12">
      <div class="card">
          <div class="card-body">

            <div class="row">
                <div class="col-md-6">
                  <h5 class="card-title">Examenes</h5>
                  <p class="card-title-desc">Este listado muestra todos los examenes que estan registrados en el sistema.
                  </p>
                </div>
                <div class="col-md-3">
                  @include('mensajes.alertas')
                </div>
                @if(Auth::user()->accesoRuta('/examen/create'))
                  <div class="col-md-3">
                    <div class="row">
                      <div class="col-md-8">
                        <a href="{{route('examen.crear')}}" class="btn btn-primary waves-effect waves-light">
                          Agregar Examen
                        </a>
                        
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
                            <th>Nombre</th>                            
                            <th>Tipo de Examen</th>
                            <th class="text-center">Caracteristicas</th>                                                          
                            <th>Acciones</th>   
                          </tr>
                      </thead>


                      <tbody>
                        @foreach ($resultado as $fila)
                          <tr style="font-size: 100%;">
                            <td>{{$fila->id}}</td>
                            <td>{{ $fila->nombre_examen }}</td>                                   
                            <td>{{ $fila->tipo_examen->nombre_tipo_examen}}</td>
                            <td class="text-center">
                                {{$fila->caracteristica_examen->count()}}
                            </td>                           
                            <td>
                              
                              

                              @if (Auth::user()->accesoRuta('/examen/update'))
                                <button type="button" class="btn btn-success btn-sm"
                                  data-bs-toggle="modal" data-animation="bounce"
                                  data-bs-target=".editarExamenModal{{$fila->id}}" title="Editar Examen">
                                  <i id="iconoBoton" class="fas fa-user-edit"></i>
                                </button>  
                                {{-- @include('modals.editarExamenModals') --}}
                              @endif

                              @if (Auth::user()->accesoRuta('/examen/delete'))
                                @if($fila->estado_examen == 1)

                                  <a class="btn btn-danger btn-sm btnIcono" title="Eliminar examen" href="{{route('examen.delete', ['id'=> $fila->id] )}}" onclick="
                                    return confirm('Desea eliminar este examen del sistema?')"><i id="iconoBoton" class="fas fa-trash-alt"></i></a>
                                
                                @else
                                  
                                  <a class="btn btn-warning btn-sm btnIcono" title="Desbloquear examen" href="{{route('examen.desbloquear', ['id'=> $fila->id] )}}" onclick="
                                    return confirm('Desea desbloquear este examen del sistema?')"><i id="iconoBotonW" class="fas fa-shield-alt"></i></a>
                                
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



