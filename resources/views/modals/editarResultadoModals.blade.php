<div id="editarResultadoModal{{$fila->id}}"   class="modal fade" tabindex="-1">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <div class="modal-header bg-valmar">

                <h5 class="modal-title"><span class="font-weight-bold text-white">Editar Resultado</span></h5>

                <button type="button" class="close text-white" data-dismiss="modal">&times;</button>

            </div>

            <div class="modal-body text-left" >

                <form action="{{route('ordenLaboratorio.guardar')}}" method="POST" role="form" autocomplete="off">
                    @csrf
                    
                    <div class="form-row ">
                        <div class="form-group col-md-12">
                            <label for="">Cedula del Paciente:</label>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                        <input type="text"
                                            class="form-control" name="txtCedula" id="txtCedula" aria-describedby="helpId"
                                            onfocusout="validar()" placeholder="Ingrese la identificacion del Paciente" required
                                            value="{{$fila->paciente->identificacion_paciente}}">
                                        
                                        <small id="AlertaCedula" class="form-text text-muted"></small>
                                    </div>
                                    <div class="col-md-6 justify-content-around">
                                        <div class="form-group col-md-10"> 
                                            <button id="btnCrearPaciente" type="button" class="btn-block btn btn-primary btn-lg btnCrear"               
                                                data-toggle="modal" data-target="#addNewPacienteModal">
                                                Crear Nuevo Paciente
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>   
                    </div>
                  
                    
                    
            
            
    
                    <div class="form-row ">
                        <div class="form-group col-md-12">
                            <label for="">Registro del Medico:</label>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                        <input type="text"
                                            class="form-control" name="txtRegistro" id="txtRegistro" aria-describedby="helpId" 
                                            onfocusout="validarRegistro()" placeholder="Ingrese el numero de registro del Medico" required
                                            value="{{$fila->medico->numero_registro}}">
                                        <small id="AlertaRegistro" class="form-text text-muted"></small>
                                        <small id="AlertaMedico" class="form-text text-muted"></small>
                                    
                                    </div>
                                    <div class="col-md-6 justify-content-around">
                                        <div class="form-group col-md-10">  
                                    
                                            <button id="btnCrearMedico" type="button" class="btn-block btn btn-primary btn-lg btnCrear"               
                                                data-toggle="modal" data-target="#addNewMedicoModal">
                                                Crear Nuevo Médico
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
    
                    </div>
                    
    
                    <div class="form-group col-6">
                       
                        <select class="form-control " hidden id="selectExterno" name="selectExterno" >
                            <option value='0' selected>Selecciones a quien Enviar</option>
                            @foreach ($externos as $externo)
                                <option value='{{$externo->id}}'>{{$externo->nombre_usuario}}</option>
                            @endforeach
                          </select>
                    </div>
                    
                    <br>
                    
                    <div class="form-group col-4"> 
                        <div class="custom-control custom-checkbox my-1 mr-sm-2">
                            <input type="checkbox" class="custom-control-input" id="crearOrden" required>
                            <label class="custom-control-label" for="crearOrden">¿Desea editar esta orden?</label>
                        </div>
                    </div>
    
                    <div class="form-group col-8">
                        <div class="custom-control custom-checkbox my-1 mr-sm-2">
                            <input type="checkbox" class="custom-control-input" id="esExterno" name="esExterno" onclick="listaExterno();">
                            <label class="custom-control-label" for="esExterno">Pertenece a un Laboratorio Externo</label>
                        </div>
                    </div>
                    
                    
                    <br>
                    <br>
                    <div class="row justify-content-around"> 
                        <input type="hidden" name="txtId" value="{{$fila->id}}">
                        <div class="col-4"> 
                            <button type="submit" id="botoncrear" class="btn btn-primary btn-block btn-lg"><i class="fas fa-check"></i> Guardar</button>
                        </div>
    
                      
                    
                    </div>
    
                </form>
            </div>

        </div>

    </div>

</div>
