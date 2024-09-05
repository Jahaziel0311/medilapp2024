<div class="modal fade editarRolModal{{$fila->id}}" tabindex="-1" role="dialog"
    aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title align-self-center"
                id="exampleModalLabel">Actualizar Rol</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('rol.save')}}" method="POST" role="form" autocomplete="off"> 
                    @csrf
                    <div class="mb-0">
                        <div class="row">

                            <div class="col-lg-12">                                
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Nombre del Rol</span>
                                    <input type="text"  class="form-control" placeholder="Ejemplo: Recepcionista" name="txtNombre" required value="{{$fila->nombre_rol}}">
                                                             
                                </div>
                            </div>                                                                              
                            
                            <div class="col-lg-8">
                                
                            </div>
                            <div class="col-lg-4">
                                <input type="hidden" name="txtId" value="{{$fila->id}}">
                                <button type="submit" id="btnCrearModal" class="btn btn-info w-lg">Guardar Rol</button>
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
