@extends('layout.app')


@section('titulo')
    Crear Examen
@endsection

@section('contenido')
<div class="row">
    <div class="col-md-2">

    </div>
    <div class="col-md-8">
        <div class="text-center">
            <h1>Crear Examen</h1>
            <h4>Paso 1: Ingrese los datos para crear un examen</h4>
        </div>
      <div class="card">
          <div class="card-body">

            
            <form  @if (Route::is('examen.update')) action="{{route('examen.save')}}" @else action="{{route('examen.insert')}}" @endif  method="POST" role="form" class="form-horizontal" autocomplete="off">
                @csrf
                <div class="mb-0">
                    <div class="row">

                        <div class="col-lg-8 offset-2">                                
                            <div class="input-group mb-3">
                                <span class="input-group-text">Nombre del Examen</span>
                                <input type="text"  class="form-control"  placeholder="Ejemplo: Tipaje" name="txtNombre" @if (Route::is('examen.update')) value="{{$resultado->nombre_examen}}" @endif required>
                                                         
                            </div>
                        </div>
                        <div class="col-lg-8 offset-2">
                            
                            <div class="input-group mb-3">                                    
                                <div class="col-sm-12">
                                    <span>Tipo de Examen</span>
                                    <select class="form-select" id="cbxTipoExamen" name="cbxTipoExamen" value="" required>

                                        <option value='0'>Se puede dividir este examen</option>
                                        @foreach($tipo_examenes as $tipo_examen)
                                            <option value="{{$tipo_examen->id}}"@if (Route::is('examen.update')&& $tipo_examen->id == $resultado->tipo_examen_id) selected @endif>{{$tipo_examen->nombre_tipo_examen}}</option>
                                        @endforeach
                                        
                                        
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 offset-2">
                            
                            <div class="input-group mb-3">                                    
                                <div class="col-sm-12">
                                    <span>El Examen contiene valor de referencia:</span>
                                    <select class="form-select" id="cbxReferencia" name="cbxReferencia" required>

                                        <option value='0' @if (Route::is('examen.update')&& $resultado->tiene_referencia == 0 ) selected @endif>No</option>
                                        <option value='1' @if (Route::is('examen.update')&& $resultado->tiene_referencia == 1 ) selected @endif>Si</option>
                                        
                                        
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 offset-2">
                            <div class="mb-3">
                                <span >Descripcion del Examen</span>
                                <textarea class="form-control" id="txtDescripcion" name="txtDescripcion" rows="4" placeholder="Escriba una breve descripcion del examen">@if (Route::is('examen.update')) {{$detalle}} @endif</textarea>
                            </div>
                        </div>                                                                              
                        
                        
                        <div class="col-lg-4 offset-8">

                            @if (Route::is('examen.update'))

                                <input type="hidden" name="txtid" id="inputtxtid" class="form-control" value="{{$resultado->id}}">

                            @endif
                            
                            <button type="submit" id="btnCrearModal" class="btn btn-info w-lg">Siguiente</button>
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




