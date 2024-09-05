<div class="modal fade editarMedicoModal{{$fila->id}}" tabindex="-1" role="dialog"
                      aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title align-self-center"
                    id="exampleModalLabel">Editar Médico</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('medico.save')}}" method="POST" role="form" class="form-horizontal" autocomplete="off">
                    @csrf
                    <div class="mb-0">
                        <div class="row">

                            <div class="col-lg-6">                                
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Registro del Médico</span>
                                    <input type="text"  class="form-control" name="txtNumero" id="txtRegistro2" placeholder="Ingrese el numero de registro del Medico"
                                    value="{{$fila->numero_registro}}" required>                                    
                                    
                                </div>
                            </div>  

                            <div class="col-lg-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Nombre del Doctor</span>
                                    <input type="text"  class="form-control" name="txtNombre" placeholder="Ejemplo:Juan" 
                                    value="{{$fila->nombre_medico}}" required> 
                                </div>
                            </div>
                            
                            <div class="col-lg-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Correo</span>
                                    <input type="email"  class="form-control" placeholder="Ejemplo:juan@gmail.com" 
                                     name="txtEmail" value="{{$fila->email_medico}}" >  
                                </div>
                            </div>   
                            <div class="col-lg-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Telefono</span>
                                    <input type="text"  class="form-control" id="inputtelefono" placeholder="Ejemplo:66666666" name="txtTelefono" 
                                    value="{{$fila->telefono_medico}}" >  
                                </div>
                            </div>                                                 
                            
                            <div class="col-lg-8">
                                
                            </div>
                            <div class="col-lg-4">
                                <input type="hidden" name="esModal" id="esModal" class="form-control form-control-sm" value="2">                   
                                <input type="hidden" name="txtId" id="txtId" class="form-control form-control-sm" value="{{$fila->id}}">
                                <button type="submit" id="btnCrearModal" class="btn btn-info w-lg">Guardar Médico</button>
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


