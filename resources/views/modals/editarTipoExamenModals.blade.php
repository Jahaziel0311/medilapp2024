<div id="editarTipoExamenModal{{$fila->id}}"   class="modal fade" tabindex="-1">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <div class="modal-header bg-valmar">

                <h5 class="modal-title"><span class="font-weight-bold text-white">Editar Tipo de Examen</span></h5>

                <button type="button" class="close text-white" data-dismiss="modal">&times;</button>

            </div>
 
            <div class="modal-body text-left" >

                <form action="{{route('tipoexamen.save')}}" method="POST" role="form" autocomplete="off">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="inputEmail4">Tipo Examen</label>
                            <input type="text" class="form-control" id="inputEmail4" placeholder="Ejemplo:Juan" name="txttipoexamen" value="{{$fila->nombre_tipo_examen}}" required>
                        </div>                    
                    </div>
                    <br>
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
