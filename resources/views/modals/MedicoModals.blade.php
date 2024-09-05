<div class="modal fade addNewMedicoModal" tabindex="-1" role="dialog"
                      aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title align-self-center"
                    id="exampleModalLabel">Agregar Médico</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('medico.insert')}}" method="POST" role="form" class="form-horizontal" autocomplete="off">
                    @csrf
                    <div class="mb-0">
                        <div class="row">

                            <div class="col-lg-6">                                
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Registro del Médico</span>
                                    <input type="text"  class="form-control" name="txtNumero" id="txtRegistro2" placeholder="Ingrese el numero de registro del Medico"  onfocusout="validarRegistro2()"
                                    value="{{old ('txtNumero')}}" required>
                                    <div class="invalid-feedback" id="AlertaRegistro2"></div>
                                    <div class="invalid-feedback" id="AlertaMedico2"></div>
                                    
                                </div>
                            </div>  

                            <div class="col-lg-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Nombre del Doctor</span>
                                    <input type="text"  class="form-control" name="txtNombre" placeholder="Ejemplo:Juan" 
                                    value="{{old ('txtNombre')}}" required> 
                                </div>
                            </div>
                            
                            <div class="col-lg-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Correo</span>
                                    <input type="email"  class="form-control" placeholder="Ejemplo:juan@gmail.com" 
                                     name="txtEmail" value="{{old ('txtEmail')}}" >  
                                </div>
                            </div>   
                            <div class="col-lg-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Telefono</span>
                                    <input type="text"  class="form-control" id="inputtelefono" placeholder="Ejemplo:66666666" name="txtTelefono" 
                                    value="{{old ('txtTelefono')}}" >  
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
                                <input type="hidden" name="txtCedula2" id="txtCedula2" class="form-control form-control-sm" value="">
                                <input type="hidden" name="txtRegistro2" id="txtRegistro2" class="form-control form-control-sm" value="">
                                <button type="submit" id="btnCrearModal" class="btn btn-info w-lg">Agregar Médico</button>
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


