<div id="newMailGroupModal"   class="modal fade" tabindex="-1">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <div class="modal-header bg-valmar">

                <h5 class="modal-title"><span class="font-weight-bold text-white">Correo del Usuario</span></h5>

                <button type="button" class="close text-white" data-dismiss="modal">&times;</button>

            </div>

            <div class="modal-body text-left" >
                <form action="{{route('enviar.correoGrupo')}}" method="POST" role="form" autocomplete="off">
                    @csrf
                  
                    <label for="">Correo</label>
                    <div class="input-group flex-nowrap">
    
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="addon-wrapping"><i class="fas fa-at"></i></span>
                        </div>
                        <input type="email" class="form-control" placeholder="Ejemplo:juan@gmail.com" aria-label="Username"
                            aria-describedby="addon-wrapping" name="txtEmail" value={{$orden->paciente->email_paciente}}>
                    </div>
                                        
                    <br>
                    <br>
                   
                    
                    <input type="hidden" name="orden_id" id="esModal" class="form-control form-control-sm" value={{$orden->id}}>                   
                   
                    <input type="hidden" name="tipo_id" id="esModal" class="form-control form-control-sm" value={{$tipo->id}}>  
                    

                    <div class="row justify-content-around"> 
                        <div class="col-8">

                        </div>
                        <div class="col-4"> 
                            <button type="submit" id="btnCrearMedicoModal" class="btn btn-info btn-lg"> Enviar</button>
                        </div>    
                        
                    
                    </div>
                    
    
                </form>

               

            </div>

        </div>

    </div>

</div>
