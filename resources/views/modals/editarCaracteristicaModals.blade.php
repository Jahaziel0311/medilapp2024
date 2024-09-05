<div id="editarCaracteristicaModal{{$fila->id}}"   class="modal fade" tabindex="-1">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <div class="modal-header bg-valmar">

                <h5 class="modal-title"><span class="font-weight-bold text-white">Editar Tipo de Examen</span></h5>

                <button type="button" class="close text-white" data-dismiss="modal">&times;</button>

            </div>
 
            <div class="modal-body text-left" >

                <form action="{{ route('caracteristica_examen.save') }}" method="POST" role="form" autocomplete="off">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="">Nombre</label>
                            <input type="text" class="form-control" id="" placeholder="Ejemplo: Color" name="txtNombre" required value="{{$fila->nombre_caracteristica_examen}}">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Unidad</label>
                            <input type="text" class="form-control" id="" placeholder="Ejemplo: mg/Dl" name="txtUnidad"  value="{{$fila->unidad_caracteristica_examen}}">
                        </div>

                        
                        <div class="form-group col-md-12">
                            <label for="exampleFormControlTextarea1">Valor:</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="txtValor" rows="5" >{!!$valores_referencia[$fila->id]!!}</textarea>
                        </div>
                    </div>
                    @if ($fila->es_obligatorio=='1')
                        <div class="form-check col-md-12">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1" name="txtEsObligatorio" value='1' checked>
                            <label class="form-check-label" for="exampleCheck1">¿Este campo es Obligatorio?</label>
                        </div>
                    @else
                        <div class="form-check col-md-12">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1" name="txtEsObligatorio" value='1'>
                            <label class="form-check-label" for="exampleCheck1">¿Este campo es Obligatorio?</label>
                        </div>
                    @endif
                    
                      
                    <input type="hidden" name="txtId" id="input" class="form-control" value="{{ $fila->id }}">

                    
                    <br>
                    <div class="row justify-content-around"> 
                        <div class="col-8">

                        </div>
                        <div class="col-4"> 
                            <input type="hidden" name="txtId" value="{{$fila->id}}">
                            <button type="submit" id="botoncrear" class="btn btn-info btn-lg"> Guardar</button>
                        </div>
                    </div>
                </form>

            </div>

        </div>

    </div>

</div>
