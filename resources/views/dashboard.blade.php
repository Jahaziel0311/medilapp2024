@extends('layout.app')

@section('titulo')
    Dashboard
@endsection

@section('contenido')

    <div class="row">
        <div class="col-md-3 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-4 align-self-center">
                            <div class="icon-info">
                                <i class="mdi mdi-account-multiple text-info"></i>
                            </div>
                        </div>
                        <div class="col-8 align-self-center text-center">
                            <div class="ms-2 text-end">
                                <p class="mb-1 text-muted font-size-13">Pacientes</p>
                                <h4 class="mb-1 font-size-20">{{$pacientes_activos}}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="progress mt-2" style="height:3px;">
                        <div class="progress-bar progress-animated  bg-info" role="progressbar" style="max-width: 100%;"
                            aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->
        <div class="col-md-3 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-4 align-self-center">
                            <div class="icon-info">
                                <i class="mdi mdi-medical-bag text-purple"></i>
                            </div>
                        </div>
                        <div class="col-8 align-self-center text-center">
                            <div class="ms-2 text-end">
                                <p class="mb-1 text-muted font-size-13">Doctores</p>
                                <h4 class="mb-1 font-size-20">{{$medicos_activos}}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="progress mt-2" style="height:3px;">
                        <div class="progress-bar progress-animated  bg-purple" role="progressbar" style="max-width: 100%;" aria-valuenow="100"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->

        <div class="col-md-3 col-xl-3" >
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-4 align-self-center">
                            <div class="icon-info">
                                <i class="mdi mdi-file-plus text-success"></i>
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-8 align-self-center text-center">
                            <div class="ms-2 text-end">
                                <p class="mb-0 text-muted font-size-13">Ordenes Totales</p>
                                <span class="font-size-20"><strong>{{$ordenes_tot}}</strong></span>
                                
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                    <div class="progress mt-2" style="height:3px;">
                        <div class="progress-bar progress-animated  bg-success" role="progressbar" style="max-width: 100%;"
                            aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
        <div class="col-md-3 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4 col-4 align-self-center">
                            <div class="icon-info">
                                <i class="mdi mdi-file-excel text-pink"></i>
                            </div>
                        </div>
                        <div class="col-sm-8 col-8 align-self-center text-center">
                            <div class="ms-2 text-end">
                                <p class="mb-1 text-muted font-size-13">Examenes Totales</p>
                                <h4 class="mb-1 font-size-20">{{$examenes_tot}}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="progress mt-2" style="height:3px;">
                        <div class="progress-bar progress-animated  bg-pink" role="progressbar"
                            style="max-width: 100%;" aria-valuenow="100" aria-valuemin="0"
                            aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4">Exámenes del Día</h5>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="table-responsive">
                                <table class="table table-hover table-centered table-nowrap mb-0">
                                   
                                    <tbody>
                                        <tr>
                                            <span>Ordenes Pendientes</span>
                                                <small
                                                    class="float-end ms-2  font-size-12">{{$ordenes_pendientes}}</small>
                                                <div class="progress mt-2" style="height:5px;">
                                                    <div class="progress-bar bg-primary"
                                                        role="progressbar" style="width: {{$porcentaje_pendiente}}%;"
                                                        aria-valuenow="{{$porcentaje_pendiente}}" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <span>Ordenes en Proceso</span>
                                                <small
                                                    class="float-end ms-2  font-size-12">{{$ordenes_enproceso}}</small>
                                                <div class="progress mt-2" style="height:5px;">
                                                    <div class="progress-bar bg-purple"
                                                        role="progressbar" style="width: {{$porcentaje_enproceso}}%;"
                                                        aria-valuenow="{{$porcentaje_enproceso}}" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <span>Ordenes Terminadas</span>
                                                <small
                                                    class="float-end ms-2  font-size-12">{{$ordenes_terminadas}}</small>
                                                <div class="progress mt-2" style="height:5px;">
                                                    <div class="progress-bar bg-success"
                                                        role="progressbar" style="width: {{$porcentaje_terminado}}%;"
                                                        aria-valuenow="{{$porcentaje_terminado}}" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <span>Ordenes Totales</span>
                                                <small
                                                    class="float-end ms-2  font-size-12">{{$ordenes_totales}}</small>
                                                <div class="progress mt-2" style="height:5px;">
                                                    <div class="progress-bar bg-pink"
                                                        role="progressbar" style="width: 100%;"
                                                        aria-valuenow="100" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                            <!--end table-responsive-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4">Exámenes del Mes</h5>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="table-responsive">
                                <table class="table table-hover table-centered table-nowrap mb-0">
                                   
                                    <tbody>
                                        <tr>
                                            <span>Ordenes Pendientes</span>
                                                <small
                                                    class="float-end ms-2  font-size-12">{{$ordenes_pendientes_mes}}</small>
                                                <div class="progress mt-2" style="height:5px;">
                                                    <div class="progress-bar bg-primary"
                                                        role="progressbar" style="width: {{$porcentaje_pendiente_mes}}%;"
                                                        aria-valuenow="{{$porcentaje_pendiente_mes}}" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <span>Ordenes en Proceso</span>
                                                <small
                                                    class="float-end ms-2  font-size-12">{{$ordenes_enproceso_mes}}</small>
                                                <div class="progress mt-2" style="height:5px;">
                                                    <div class="progress-bar bg-purple"
                                                        role="progressbar" style="width: {{$porcentaje_enproceso_mes}}%;"
                                                        aria-valuenow="{{$porcentaje_enproceso_mes}}" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <span>Ordenes Terminadas</span>
                                                <small
                                                    class="float-end ms-2  font-size-12">{{$ordenes_terminadas_mes}}</small>
                                                <div class="progress mt-2" style="height:5px;">
                                                    <div class="progress-bar bg-success"
                                                        role="progressbar" style="width: {{$porcentaje_terminado_mes}}%;"
                                                        aria-valuenow="{{$porcentaje_terminado_mes}}" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <span>Ordenes Totales</span>
                                                <small
                                                    class="float-end ms-2  font-size-12">{{$ordenes_totales_mes}}</small>
                                                <div class="progress mt-2" style="height:5px;">
                                                    <div class="progress-bar bg-pink"
                                                        role="progressbar" style="width: 100%;"
                                                        aria-valuenow="100" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                            <!--end table-responsive-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4">Medicos</h5>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="table-responsive">
                                <table class="table table-hover table-centered table-nowrap mb-0">
                                    
                                    <tbody>
                                        @foreach ($medicos as $medico)
                                            <tr>
                                                <td>{{$medico->nombre_medico}}</td>
                                                
                                                <td>{{$medico->numero_registro}}</td>
                                                <td>{{$medico->telefono_medico}}</td>                                            
                                            </tr>
                                        @endforeach
                                        
                                       
                                    </tbody>
                                </table>
                            </div>
                            <!--end table-responsive-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection