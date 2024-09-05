<div class="modal fade addNewPantallaModal" tabindex="-1" role="dialog"
                      aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title align-self-center"
                    id="exampleModalLabel">Agregar Pantalla</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('pantalla.insert')}}" method="POST" role="form" class="form-horizontal" autocomplete="off">
                    @csrf
                    <div class="mb-0">
                        <div class="row">

                            <div class="col-lg-6">                                
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Nombre del Pantalla</span>
                                    <input type="text"  class="form-control" placeholder="Ejemplo: Crear Usuario" name="txtNombre" required>
                                                             
                                </div>
                            </div>    
                            <div class="col-lg-6">                                
                                <div class="input-group mb-3">
                                    <span class="input-group-text">URL</span>
                                    <input type="text"  class="form-control" placeholder="Ejemplo: /usuario/create" name="txtUrl" required>
                                                             
                                </div>
                            </div>                                                                            
                            <div class="col-lg-6">
                                
                                <div class="input-group mb-3">                                    
                                    <div class="col-sm-12">
                                        <select class="form-select" name="txtPadre" id="" value="" required>

                                            <option>Asignar a</option>
                                            <option value="0">Raiz</option>
                                            @foreach ($pantallas_padre as $padre)
                                                <option value="{{$padre->id}}">{{$padre->nombre_pantalla}}</option>
                                            @endforeach 
                                            
                                            
                                        </select>
                                    </div>
                                </div>
                                
                            </div>

                            <div class="col-lg-6">
                                
                                <div class="checkbox my-2">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="txtEstado" id="" value="1" checked
                                            id="customCheck3" data-parsley-multiple="groups"
                                            data-parsley-mincheck="2">
                                        <label class="form-check-label"
                                            for="customCheck3">Mostrar en el Menu?</label>
                                    </div>
                                </div>
                                
                            </div>
                          
                            <div class="col-lg-4 offset-8">
                                <input type="hidden" name="esModal" value='1'>
                                <button type="submit" id="btnCrearModal" class="btn btn-info w-lg">Agregar Pantalla</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
