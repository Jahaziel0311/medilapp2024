<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\medico;
use App\Models\pantalla;
use Carbon\Carbon;
use Session;

class medicoController extends Controller
{
    public function index(){

        if (!Auth::user()) {

            $current = url()->current();
            Session::put('url', $current);    
            return redirect(route('login.index'));
        }

        if(Auth::user()->accesoRuta('/medico')){

                        
            if (Auth::user()->rol->tipo_rol == 1) {
                $resultado = medico::get(); 
            } else {
                $resultado=medico::where('estado_medico',1)->get();
            }
            return view ("medico.index", ["resultado"=>$resultado]);
        }

        return redirect(route('index'));
        
    }

    public function insert(Request $request){
        if (!Auth::user()) {

            $current = url()->current();
            Session::put('url', $current);    
            return redirect(route('login.index'));
        }

        if(Auth::user()->accesoRuta('/medico/create')){

            $existe = medico::where('numero_registro',$request->txtNumero)->count();

            if($existe == 0){

                $obj_medico = new medico();
                $obj_medico->numero_registro=$request->txtNumero;
                $obj_medico->nombre_medico = strtoupper($request->txtNombre);
                $obj_medico->email_medico = strtolower($request->txtEmail);
                $obj_medico->telefono_medico = $request->txtTelefono;                
                $obj_medico->save();
                if($request->esModal){
                    if($request->esModal==2){
                        return redirect()->back()->with(['txtCedula'=>$request->txtCedula,'txtRegistro'=>$obj_medico->numero_registro]);
                    }
                    if($request->esModal==3){
                        return redirect(route('orden_laboratorio.create'))->with(['txtCedula'=>$request->txtCedula,'txtRegistro'=>$obj_medico->numero_registro]);
                    }
                }
        
                return redirect(route('medico.index'))->withErrors(['status' => "Se creó el medico " .$obj_medico->nombre_medico ]);
            }
            
            return back()->withInput()->withErrors(['danger' => "Este medico ya esta registrado" ]);             

        }

        return redirect(route('index'));
    }

    public function save(Request $request){

        if (!Auth::user()) {

            $current = url()->current();
            Session::put('url', $current);    
            return redirect(route('login.index'));
        }

        if(Auth::user()->accesoRuta('/medico/update')){

            $obj_medico = medico::find($request->txtId);
            if($obj_medico->numero_registro == $request->txtNumero){
                
                $obj_medico->numero_registro =$request->txtNumero;
                $obj_medico->nombre_medico = strtoupper($request->txtNombre);
                $obj_medico->email_medico = strtolower($request->txtEmail);
                $obj_medico->telefono_medico = $request->txtTelefono;
                $obj_medico->save();
                return redirect(route('medico.index'))->withErrors(['status' => "Se ha guardado el medico " ]);
            
                
            }else{

                $existe = medico::where('numero_registro',$request->txtNumero)->count();

                if($existe == 1){
                    if($request->esModal==2){
                        return redirect()->back()->withErrors(['danger'=> "Ingreso un numero de registro que ya existe"]);
                        
                    }
                    return back()->withInput()->withErrors(['status' => "El nuevo numero de registro ya esta asignado a otro medico" ]); 
                }else{           

                    $obj_medico->numero_registro =$request->txtNumero;
                    $obj_medico->nombre_medico = $request->txtNombre;
                    $obj_medico->email_medico = $request->txtEmail;
                    $obj_medico->telefono_medico = $request->txtTelefono;
                    $obj_medico->save();
                    return redirect(route('medico.index'))->withErrors(['status' => "Se ha guardado el medico " ]);
                }
            }          

        }

        return redirect(route('index'));
    }

    public function delete($id){

        if (!Auth::user()) {

            $current = url()->current();
            Session::put('url', $current);    
            return redirect(route('login.index'));
        }

        if(Auth::user()->accesoRuta('/medico/delete')){

            $obj_medico = medico::find($id);
            $obj_medico->estado_medico = 0;
            $obj_medico->save();
            return redirect(route('medico.index'))->withErrors(['danger' => "Se ha eliminado el medico" ]);  

        }

        return redirect(route('index'));

    }

    public function desbloquear($id){

        if (!Auth::user()) {

            $current = url()->current();
            Session::put('url', $current);    
            return redirect(route('login.index'));
        }

        if(Auth::user()->accesoRuta('/medico/delete')){

            $obj_medico = medico::find($id);
            $obj_medico->estado_medico = 1;
            $obj_medico->save();
            return redirect(route('medico.index'))->withErrors(['status' => "Se ha desbloqueado el medico" ]);  

        }

        return redirect(route('index'));

    }

    public function create(){

        if (!Auth::user()) {

            $current = url()->current();
            Session::put('url', $current);    
            return redirect(route('login.index'));
        }

        if(Auth::user()->accesoRuta('/medico/create')){

            return view("medico.create"); 

        }

        return redirect(route('index'));

    }
}
