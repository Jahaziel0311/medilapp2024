@extends('layout.app')

@section('head')
      @include('layout.tableHead')
@endsection

@section('js')
    @include('layout.tableJs')
    @include('scripts.validaciones')
@endsection

@section('titulo')
    Pantallas
@endsection

@section('contenido')
<div class="row">
  <div class="col-md-12">
      <div class="card">
          <div class="card-body">

            <div class="row">
                <div class="col-md-6">
                  <h5 class="card-title">Pantallas</h5>
                  <p class="card-title-desc">Este listado muestra todos los pantallas que estan registrados en el sistema.
                  </p>
                </div>
                <div class="col-md-3">
                  @include('mensajes.alertas')
                </div>
                @if(Auth::user()->accesoRuta('/pantalla/create'))
                  <div class="col-md-3">
                    <div class="row">
                      <div class="col-md-8">
                        <button type="button" class="btn btn-primary waves-effect waves-light"
                          data-bs-toggle="modal" data-animation="bounce"
                          data-bs-target=".addNewPantallaModal">
                          Agregar Pantalla
                        </button>
                        @include('modals.PantallaModals')  
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
                          <th>URL</th>       
                          <th>Acciones</th>
                        </tr>
                      </thead>


                      <tbody>
                        @foreach ($resultado as $fila)
                          <tr style="font-size: 100%;">
                            <td>{{$fila->id}}</td>
                            <td>{{$fila->nombre_pantalla}}</td> 
                            <td>{{$fila->url_pantalla}}</td>                        
                            <td>
                              
                              

                              @if (Auth::user()->accesoRuta('/pantalla/update'))
                                <button type="button" class="btn btn-success btn-sm"
                                  data-bs-toggle="modal" data-animation="bounce"
                                  data-bs-target=".editarPantallaModal{{$fila->id}}" title="Editar Pantalla">
                                  <i id="iconoBoton" class="fas fa-user-edit"></i>
                                </button>  
                                @include('modals.editarPantallaModals')
                              @endif

                              @if (Auth::user()->accesoRuta('/pantalla/delete'))                                

                                <a class="btn btn-danger btn-sm btnIcono" title="Eliminar pantalla" href="{{route('pantalla.delete', ['id'=> $fila->id] )}}" onclick="
                                  return confirm('Desea eliminar este pantalla del sistema?')"><i id="iconoBoton" class="fas fa-trash-alt"></i></a>                              
                            
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



