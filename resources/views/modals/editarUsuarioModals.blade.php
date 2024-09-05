<div class="modal fade editarUsuarioModal{{$fila->id}}" tabindex="-1" role="dialog"
    aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title align-self-center"
                id="exampleModalLabel">Actualizar Usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('usuario.save') }}" method="POST" role="form" autocomplete="off"> 
                    @csrf
                    <div class="mb-0">
                        <div class="row">

                            <div class="col-lg-6">                                
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Usuario</span>
                                    <input type="text"  class="form-control" id="txtUsuario" placeholder="Ejemplo:Juan" name="txtUsuario"                                        
                                        value="{{$fila->nombre_usuario}}" required>
                                               
                                </div>
                            </div>
                            <div class="col-lg-6">
                                
                                <div class="input-group mb-3">                                    
                                    <div class="col-sm-12">
                                        <select class="form-select" name="txtRol" id="" value="{{$fila->rol_id}}" required>

                                            <option>Seleccione un Rol</option>
                                            @foreach($roles as $rol)
                                                @if($rol->id == $fila->rol_id)
                                                    <option value="{{$rol->id}}" selected>{{$rol->nombre_rol}}</option>
                                                @else
                                                    <option value="{{$rol->id}}" >{{$rol->nombre_rol}}</option>
                                                @endif
                                                
                                            @endforeach
                                            
                                            
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-lg-6">                                
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Contraseña</span>
                                    <input type="password"  class="form-control" id="inputPassword4" placeholder="" name="txtContraseña"
                                        value="{{$fila->password_usuario}}"  required> 
                                </div>
                            </div>      
                            
                            
                            <div class="col-lg-6">
                                
                                <div class="input-group mb-3">                                    
                                    <div class="col-sm-12">
                                        <select class="form-select" name="txtEstado" id="" value="{{$fila->estado_usuario}}"  required> 

                                            <option>Seleccione un Estado</option>                                            
                                            @if($fila->estado_usuario == 0)
                                                <option value = "0" selected>Bloqueado</option>
                                                <option value = "1">Activo</option>
                                            @else
                                                <option value = "0" >Bloqueado</option>
                                                <option value = "1" selected>Activo</option>
                                            @endif
                                            
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Correo</span>
                                    <input type="email"  class="form-control" placeholder="Ejemplo:juan@gmail.com" 
                                     name="txtEmail" value="{{$fila->email_usuario}}" >  
                                </div>
                            </div>
                            
                            <div class="col-lg-8">
                                
                            </div>
                            <div class="col-lg-4">
                                <input type="hidden" name="txtId" value="{{$fila->id}}">
                                <button type="submit" id="botoncrear" class="btn btn-info w-lg">Guardar Usuario</button>
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