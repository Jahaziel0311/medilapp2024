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
            <h4>Paso 2: Seleccione las Caracteristicas del examen</h4>
        </div>
        <div class="card">
            <div class="card-body">

                
                <form @if (Route::is('examen.update2')) action="{{route('examen.save2')}}" @else action="{{route('examen.insert2')}}" @endif   method="POST" role="form" class="form-horizontal" autocomplete="off">
                    @csrf
                    <div class="mb-0">
                        <div class="row">
                            @foreach($caracteristicas_examen as $caracteristica_examen)
                                <div class="col-md-4">
                                    <div class="checkbox my-2">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="caracteristicas_id[]" id="caracteristica{{$caracteristica_examen->id}}" value="{{$caracteristica_examen->id}}"
                                            @if(in_array($caracteristica_examen->id, $lista_caracteristicas))   checked @endif
                                                data-parsley-multiple="groups"
                                                data-parsley-mincheck="2">
                                            <label class="form-check-label"
                                                for="caracteristica{{$caracteristica_examen->id}}">{{$caracteristica_examen->nombre_caracteristica_examen}}</label>
                                        </div>
                                    </div>
                                
                                </div>     
                            @endforeach                                                                       
                            <div class="col-lg-3 offset-6">                            
                                <a href="{{ route('examen.update',['id'=>$id_examen]) }}" id="btnCrearModal" class="btn btn-secondary w-lg">Atras</a>
                            </div>
                            <div class="col-lg-3">
                                
                                <input type="hidden" name="txtid" id="inputtxtid" class="form-control" value="{{$id_examen}}">
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




