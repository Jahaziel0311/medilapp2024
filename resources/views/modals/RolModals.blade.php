<div class="modal fade addNewRolModal" tabindex="-1" role="dialog"
                      aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title align-self-center"
                    id="exampleModalLabel">Agregar Rol</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('rol.insert')}}" method="POST" role="form" class="form-horizontal" autocomplete="off">
                    @csrf
                    <div class="mb-0">
                        <div class="row">

                            <div class="col-lg-12">                                
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Nombre del Rol</span>
                                    <input type="text"  class="form-control" placeholder="Ejemplo: Recepcionista" name="txtNombre" required>
                                                             
                                </div>
                            </div>                                                                              
                            
                            <div class="col-lg-8">
                                
                            </div>
                            <div class="col-lg-4">
                                <input type="hidden" name="esModal" value='1'>
                                <button type="submit" id="btnCrearModal" class="btn btn-info w-lg">Agregar Rol</button>
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