<?php

namespace App\Http\Controllers;
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
use Illuminate\Http\Request;

class orden_laboratorioController extends Controller
{
    public function consultar($cedula){
        $valor= array();
        $existe = paciente::where('identificacion_paciente',$cedula)->count();
        if($existe ==1){
            $paciente = paciente::where('identificacion_paciente',$cedula)->first();
            $valor= array("cedula"=>$cedula,"nombre"=>$paciente->nombre_paciente." ".$paciente->apellido_paciente); 
            
        }

        return $valor;
    }

    public function consultarRegistro($registro){
        $valor= array();
        $existe = medico::where('numero_registro',$registro)->count();
        if($existe ==1){
            $medico = medico::where('numero_registro',$registro)->first();
            $valor= array("registro"=>$registro,"nombre"=>$medico->nombre_medico); 
            
        }

        return $valor;
    }
}
