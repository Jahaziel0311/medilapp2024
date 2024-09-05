<div id="resultadoSubirArchivoModals"   class="modal fade" tabindex="-1">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <div class="modal-header bg-valmar">

                <h5 class="modal-title"><span class="font-weight-bold text-white">Subir Archivo en PDF</span></h5>

                <button type="button" class="close text-white" data-dismiss="modal">&times;</button>

            </div>

            <div class="modal-body text-left" >

                <form action="{{route('ordenLaboratorio.examen.subirResultado')}}" method="POST" role="form" autocomplete="off" enctype="multipart/form-data">  
                    @csrf      
                    <div class="form-group">
                        <label class="text-rigth" for="">Archivo</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="archivoPdf" required  accept="application/pdf" id="customFile">
                            <label class="custom-file-label" for="customFile">Escoja el Archivo</label>
                          </div>                        
                       
                    </div>                   
                    
                
                
                    <br>
                    <br>
                
                    <div class="row justify-content-around"> 
                        <div class="col-8">

                        </div>
                        <div class="col-4"> 
                            <input type="hidden" name="txtId" value="{{$fila->id}}">
                            <button type="submit" id="botoncrear" class="btn btn-info btn-lg"> Guardar</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>

    </div>

</div>
