<div class="modal fade addNewPacienteModal" tabindex="-1" role="dialog"
                      aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title align-self-center"
                    id="exampleModalLabel">Agregar Paciente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('paciente.insert')}}" method="POST" role="form" class="form-horizontal" autocomplete="off">
                    @csrf
                    <div class="mb-0">
                        <div class="row">

                            <div class="col-lg-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Cédula</span>
                                    <input type="text"  class="form-control" name="txtCedula" id="txtCedula2" placeholder="Ejemplo:8-888-8888"  onfocusout="validar2()"
                                    value="{{old ('txtcedula')}}" required>
                                    <div class="invalid-feedback" id="AlertaCedula2"></div>
                                    
                                </div>
                            </div>
                            <div class="col-lg-6">                                
                                <div class="form-check col-md-6">
                                    <input type="radio" class="form-check-input" name="txtsexo" id="radio1" value="m" <?php if(old('txtsexo')=="m"){echo 'checked="checked"';}?> checked>
                                    <label class="form-check-label" for="radio1">Masculino</label>
                                </div>
                                <div class="form-check col-md-6">
                                    <input type="radio" class="form-check-input" name="txtsexo" id="radio2" value="f" <?php if(old('txtsexo')=="f"){echo 'checked="checked"';}?>>
                                    <label class="form-check-label" for="radio2">Femenino</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Nombre</span>
                                    <input type="text"  class="form-control" id="inputnombre" placeholder="Ejemplo:Juan" name="txtnombre"
                                    value="{{old ('txtnombre')}}" required>     
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Apellido</span>
                                    <input type="text"  class="form-control" id="inputapellido" placeholder="Ejemplo:Perez" name="txtapellido"
                                    value="{{old ('txtapellido')}}" required >  
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Fecha de Nacimiento</span>
                                    
                                    <input class="form-control" type="date"  id="inputfecnac" name="txtfecnac" date-format="dd-mm-yyyy"
                                    value="{{old ('txtfecnac')}}" required>
                                    
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Telefono</span>
                                    <input type="text"  class="form-control" id="inputtelefono" placeholder="Ejemplo:66666666" name="txttelefono" 
                                    value="{{old ('txttelefono')}}" >  
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Correo</span>
                                    <input type="email"  class="form-control" placeholder="Ejemplo:juan@gmail.com" 
                                     name="txtemail" value="{{old ('txtemail')}}" >  
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <textarea class="form-control" id="exampleFormControlTextarea1"
                                        placeholder="Comentario" name="txtComentario" rows="2">{{old ('txtComentario')}}</textarea>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                
                            </div>
                            <div class="col-lg-4">
                                @if(Request::url() === env('APP_URL').'/orden_laboratorio/create')
                    
                                    <input type="hidden" name="esModal" id="esModal" class="form-control form-control-sm" value="2">

                                @else
                                    <input type="hidden" name="esModal" id="esModal" class="form-control form-control-sm" value="1">
                                @endif
                                <input type="hidden" name="txtRegistro2" id="txtRegistro2" class="form-control form-control-sm" value="">
                                <button type="submit" id="btnCrearModal" class="btn btn-info w-lg">Agregar Paciente</button>
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





