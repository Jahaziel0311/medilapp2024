<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Carbon\Carbon;
use App\Models\rol;
use App\Models\pantalla;
use App\Models\notificacion;
use App\Models\rol_pantalla;
use App\Models\paciente;
use App\Models\orden_laboratorio;
use App\Models\medico;
use App\Models\examen_orden_laboratorio;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller as BaseController;
use Session;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(){

        
        if (!Auth::user()) {

            $current = url()->current();
            Session::put('url', $current);    
            return redirect(route('login.index'));
        }

               

        if (Auth::user()->rol->tipo_rol>0) {
            $ordenes_totales = orden_laboratorio::where('estado_orden_laboratorio','<>','Eliminado')
                                                    ->where('fecha_orden',Carbon::today()->toDateString())
                                                    ->count();
                
                $ordenes_totales_mes = orden_laboratorio::where('estado_orden_laboratorio','<>','Eliminado')
                                                    ->where('fecha_orden','>',Carbon::today()->subWeek(4)->toDateString())
                                                   ->count();
                $ordenes_terminadas_mes = orden_laboratorio::where('estado_orden_laboratorio','Terminado')
                                                   ->where('fecha_orden','>',Carbon::today()->subWeek(4)->toDateString())
                                                   ->count();
                $porcentaje_terminado_mes = ($ordenes_terminadas_mes/$ordenes_totales_mes)*100;
                $ordenes_enproceso_mes = orden_laboratorio::where('estado_orden_laboratorio','En Proceso')
                                                        ->where('fecha_orden','>',Carbon::today()->subWeek(4)->toDateString())
                                                        ->count();
                $porcentaje_enproceso_mes = ($ordenes_enproceso_mes/$ordenes_totales_mes)*100;
                $ordenes_pendientes_mes = orden_laboratorio::where('estado_orden_laboratorio','Pendiente')
                                                        ->where('fecha_orden','>',Carbon::today()->subWeek(4)->toDateString())
                                                        ->count();
                $porcentaje_pendiente_mes = ($ordenes_pendientes_mes/$ordenes_totales_mes)*100;

                $ordenes_terminadas = orden_laboratorio::where('estado_orden_laboratorio','Terminado')
                                                        ->where('fecha_orden',Carbon::today()->toDateString())
                                                        ->count();

                $pacientes_activos = paciente::where('estado_paciente',1)->count();
                $medicos_activos = medico::where('estado_medico',1)->count();
                $ordenes_tot = orden_laboratorio::where('estado_orden_laboratorio','<>','Eliminado')->count();
                $examenes_tot = examen_orden_laboratorio::where('estado_examen','Terminado')->count();
                $medicos = medico::where('estado_medico',1)->get();

                if($ordenes_totales==0){

                    return view("dashboard",["ordenes_totales"=>0,
                                            "ordenes_terminadas"=>0,
                                            "porcentaje_terminado"=>100,
                                            "ordenes_enproceso"=>0,
                                            "porcentaje_enproceso"=>100,
                                            "ordenes_pendientes"=>0,
                                            "porcentaje_pendiente"=>100,
                                            "ordenes_totales_mes"=>$ordenes_totales_mes,
                                            "ordenes_terminadas_mes"=>$ordenes_terminadas_mes,
                                            "porcentaje_terminado_mes"=>$porcentaje_terminado_mes,
                                            "ordenes_enproceso_mes"=>$ordenes_enproceso_mes,
                                            "porcentaje_enproceso_mes"=>$porcentaje_enproceso_mes,
                                            "ordenes_pendientes_mes"=>$ordenes_pendientes_mes,
                                            "porcentaje_pendiente_mes"=>$porcentaje_pendiente_mes,
                                            "pacientes_activos"=>$pacientes_activos,
                                            "medicos_activos"=>$medicos_activos,
                                            "ordenes_tot"=>$ordenes_tot,
                                            "examenes_tot"=>$examenes_tot,
                                            "medicos"=>$medicos
                                        ]); 
                    
                    if ($ordenes_totales_mes == 0) {
                        return view("dashboard",["ordenes_totales"=>0,
                        "ordenes_terminadas"=>0,
                        "porcentaje_terminado"=>100,
                        "ordenes_enproceso"=>0,
                        "porcentaje_enproceso"=>100,
                        "ordenes_pendientes"=>0,
                        "porcentaje_pendiente"=>100,
                        "ordenes_totales_mes"=>0,
                        "ordenes_terminadas_mes"=>0,
                        "porcentaje_terminado_mes"=>0,
                        "ordenes_enproceso_mes"=>0,
                        "porcentaje_enproceso_mes"=>0,
                        "ordenes_pendientes_mes"=>0,
                        "porcentaje_pendiente_mes"=>0,
                        "pacientes_activos"=>$pacientes_activos,
                        "medicos_activos"=>$medicos_activos,
                        "ordenes_tot"=>$ordenes_tot,
                        "examenes_tot"=>$examenes_tot
                        ]); 
                    }
                    
                    
                }

               
                
                
                
                if ($ordenes_totales_mes == 0) {
                    return view("dashboard",["ordenes_totales"=>0,
                    "ordenes_terminadas"=>0,
                    "porcentaje_terminado"=>100,
                    "ordenes_enproceso"=>0,
                    "porcentaje_enproceso"=>100,
                    "ordenes_pendientes"=>0,
                    "porcentaje_pendiente"=>100,
                    "ordenes_totales_mes"=>0,
                    "ordenes_terminadas_mes"=>0,
                    "porcentaje_terminado_mes"=>0,
                    "ordenes_enproceso_mes"=>0,
                    "porcentaje_enproceso_mes"=>0,
                    "ordenes_pendientes_mes"=>0,
                    "porcentaje_pendiente_mes"=>0,
                    "pacientes_activos"=>$pacientes_activos,
                    "medicos_activos"=>$medicos_activos,
                    "ordenes_tot"=>$ordenes_tot,
                    "examenes_tot"=>$examenes_tot
                    ]);  
                }
                
              
                $porcentaje_terminado = ($ordenes_terminadas/$ordenes_totales)*100;
                $ordenes_enproceso = orden_laboratorio::where('estado_orden_laboratorio','En Proceso')
                                                        ->where('fecha_orden',Carbon::today()->toDateString())
                                                        ->count();
                $porcentaje_enproceso = ($ordenes_enproceso/$ordenes_totales)*100;
                $ordenes_pendientes = orden_laboratorio::where('estado_orden_laboratorio','Pendiente')
                                                        ->where('fecha_orden',Carbon::today()->toDateString())
                                                        ->count();
                $porcentaje_pendiente = ($ordenes_pendientes/$ordenes_totales)*100;

                
                return view("dashboard",["ordenes_totales"=>$ordenes_totales,
                                                "ordenes_terminadas"=>$ordenes_terminadas,
                                                "porcentaje_terminado"=>$porcentaje_terminado,
                                                "ordenes_enproceso"=>$ordenes_enproceso,
                                                "porcentaje_enproceso"=>$porcentaje_enproceso,
                                                "ordenes_pendientes"=>$ordenes_pendientes,
                                                "porcentaje_pendiente"=>$porcentaje_pendiente,
                                                "ordenes_totales_mes"=>$ordenes_totales_mes,
                                                "ordenes_terminadas_mes"=>$ordenes_terminadas_mes,
                                                "porcentaje_terminado_mes"=>$porcentaje_terminado_mes,
                                                "ordenes_enproceso_mes"=>$ordenes_enproceso_mes,
                                                "porcentaje_enproceso_mes"=>$porcentaje_enproceso_mes,
                                                "ordenes_pendientes_mes"=>$ordenes_pendientes_mes,
                                                "porcentaje_pendiente_mes"=>$porcentaje_pendiente_mes,
                                                "pacientes_activos"=>$pacientes_activos,
                                                "medicos_activos"=>$medicos_activos,
                                                "ordenes_tot"=>$ordenes_tot,
                                                "examenes_tot"=>$examenes_tot
                                            ]); 
        }

        return redirect(route('login.index'));
        
    }

    

}
