<div class="modal fade addNewUsuarioModal" tabindex="-1" role="dialog"
                      aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title align-self-center"
                    id="exampleModalLabel">Agregar Usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('usuario.insert')}}" method="POST" role="form" class="form-horizontal" autocomplete="off">
                    @csrf
                    <div class="mb-0">
                        <div class="row">

                            <div class="col-lg-6">                                
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Usuario</span>
                                    <input type="text"  class="form-control" id="txtUsuario" placeholder="Ejemplo:Juan" name="txtUsuario"
                                        onfocusout="userName()"
                                        value= "{{ old('txtUsuario')}}" required>
                                    <div class="invalid-feedback" id="AlertaUsuario"></div>           
                                </div>
                            </div>
                            <div class="col-lg-6">
                                
                                <div class="input-group mb-3">                                    
                                    <div class="col-sm-12">
                                        <select class="form-select" name="txtRol" id="" value="" required>

                                            <option>Seleccione un Rol</option>
                                            @foreach ($roles as $rol)
                                                <option value="{{$rol->id}}" >{{$rol->nombre_rol}}</option>
                                            @endforeach
                                            
                                            
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-lg-6">                                
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Contraseña</span>
                                    <input type="password"  class="form-control" id="inputPassword4" placeholder="" name="txtContraseña"
                                    value= "{{ old('txtContraseña')}}"  required> 
                                </div>
                            </div>      
                            <div class="col-lg-6">                                
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Repetir Contraseña</span>
                                    <input type="password"  class="form-control" id="inputPassword4" placeholder="" name="txtContraseña_confirmation"
                                    value= ""  required>                                     
                                    @error('contraseña') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror         
                                </div>
                            </div>
                            
                            <div class="col-lg-6">
                                
                                <div class="input-group mb-3">                                    
                                    <div class="col-sm-12">
                                        <select class="form-select" name="txtEstado" id="" required value="">

                                            <option>Seleccione un Estado</option>                                            
                                            <option value = "0">Bloqueado</option>
                                            <option value = "1" selected >Activo</option>
                                            
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Correo</span>
                                    <input type="email"  class="form-control" placeholder="Ejemplo:juan@gmail.com" 
                                     name="txtEmail" value="{{old ('txtEmail')}}" >  
                                </div>
                            </div>
                            
                            <div class="col-lg-8">
                                
                            </div>
                            <div class="col-lg-4">
                                <input type="hidden" name="esModal" value='1'>
                                <button type="submit" id="botoncrear" class="btn btn-info w-lg">Agregar Usuario</button>
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