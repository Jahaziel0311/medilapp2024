<div class="modal fade editarPacienteModal{{$fila->id}}" tabindex="-1" role="dialog"
                      aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title align-self-center"
                    id="exampleModalLabel">Actualizar Paciente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('paciente.save')}}" method="POST" role="form" class="form-horizontal" autocomplete="off">
                    @csrf
                    <div class="mb-0">
                        <div class="row">

                            <div class="col-lg-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Cédula</span>
                                    <input type="text"  class="form-control" name="txtCedula" id="txtCedula2" placeholder="Ejemplo:8-888-8888" 
                                    value="{{$fila->identificacion_paciente}}" required>
                                    <small id="AlertaCedula4" class="form-text text-muted"></small>
                                    <input type="hidden" id="txtCedulaOld" value="{{$fila->identificacion_paciente}}">
                                    
                                </div>
                            </div>
                            <div class="col-lg-6">                                
                                <div class="form-check col-md-6">
                                    <input type="radio" class="form-check-input" name="txtsexo" id="radio1" value="m"  <?php if($fila->sexo_paciente=="m"){echo 'checked="checked"';}?> >
                                    <label class="form-check-label" for="radio1">Masculino</label>
                                </div>
                                <div class="form-check col-md-6">
                                    <input type="radio" class="form-check-input" name="txtsexo" id="radio2" value="f" <?php if($fila->sexo_paciente=="f"){echo 'checked="checked"';}?>>
                                    <label class="form-check-label" for="radio2">Femenino</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Nombre</span>
                                    <input type="text"  class="form-control" id="inputnombre" placeholder="Ejemplo:Juan" name="txtnombre"
                                    value="{{$fila->nombre_paciente}}" required>     
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Apellido</span>
                                    <input type="text"  class="form-control" id="inputapellido" placeholder="Ejemplo:Perez" name="txtapellido"
                                    value="{{$fila->apellido_paciente}}" required >  
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Fecha de Nacimiento</span>
                                    
                                    <input class="form-control" type="date"  id="inputfecnac" name="txtfecnac" date-format="dd-mm-yyyy"
                                    value="{{$fila->fecha_nacimiento_paciente}}" required format>
                                    
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Telefono</span>
                                    <input type="text"  class="form-control" id="inputtelefono" placeholder="Ejemplo:66666666" name="txttelefono" 
                                    value="{{$fila->telefono_paciente}}" >  
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Correo</span>
                                    <input type="email"  class="form-control" placeholder="Ejemplo:juan@gmail.com" 
                                     name="txtemail" value="{{$fila->email_paciente}}" >  
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <textarea class="form-control" id="exampleFormControlTextarea1"
                                        placeholder="Comentario" name="txtComentario" rows="2">{{$fila->comentario_paciente}}</textarea>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                
                            </div>
                            <div class="col-lg-4">
                                <input type="hidden" name="esModal" id="esModal" class="form-control form-control-sm" value="2">
                                <input type="hidden" name="txtid" id="txtid" class="form-control form-control-sm" value="{{$fila->id}}">
                                <button type="submit" id="btnCrearModal" class="btn btn-info w-lg">Guardar Cambios</button>
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

