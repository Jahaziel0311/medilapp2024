@extends('layout.app')


@section('titulo')
    Crear Examen
@endsection

@section('head')

    <link href="{{asset('assets/libs/nestable2/jquery.nestable.min.css')}}" rel="stylesheet" type="text/css" />

@endsection

@section('js')
    <script src="{{asset('assets/libs/nestable2/jquery.nestable.min.js')}}"></script>
    <script src="{{asset('assets/js/pages/nestable-init.js')}}"></script>
@endsection

@section('contenido')
<div class="row">
    <div class="col-md-2">

    </div>
    <div class="col-md-8">
        <div class="text-center">
            <h1>Crear Examen</h1>
            <h4>Paso 3: Ordene las caracteristicas seleccionadas</h4>
        </div>
        <div class="card">
            <div class="card-body">

                <div class="col-lg-6 offset-3">
                    <div class="card">
                        <div class="card-body">

                            <div class="custom-dd dd" id="nestable_list_1">
                                <ol class="dd-list">
                                    @foreach ($caracteristicas as $caracteristica)
                                        <li class="dd-item" data-id={{$caracteristica->caracteristica_examen_id}}>
                                            <div class="dd-handle">
                                                {{$caracteristica->caracteristica_examen->nombre_caracteristica_examen}}
                                            </div>
                                        </li> 
                                    @endforeach  
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>

                           
                
                
                <form action="{{route('examen.insert3')}}" method="POST" role="form" class="form-horizontal" autocomplete="off">
                    @csrf
                    <div class="mb-0">
                        <div class="row">                                                                                                
                            <div class="col-lg-3 offset-6">                            
                                <a href="{{ route('examen.update2',['id'=>$examen_id]) }}" id="btnCrearModal" class="btn btn-secondary w-lg">Atras</a>
                            </div>
                            <div class="col-lg-3">
                                
                                <input type="hidden" name="inputOrden" id="nestable_list_1_output" class="form-control" value="">
                                <input type="hidden" name="examen_id" id="inputtxtid" class="form-control" value={{$examen_id}}>
                                <button type="submit" id="btnCrearModal" class="btn btn-info w-lg">Guardar</button>
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




