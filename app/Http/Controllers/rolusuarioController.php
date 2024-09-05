<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\rol;
use Illuminate\Support\Facades\DB;
use Session;

class rolusuarioController extends Controller
{
    //
    public function index(){

        if (Session::has('usuario_rol_id')) {
            $pantallas_menu = Controller::urlsPantallasXUsuario();
            
            if (in_array('/rol',$pantallas_menu)){//solo modificar la ruta buscar las rutas en web.php o el la tabla pantallas
                //esto ya estaba
                if(Session::get('usuario_rol_id')==1){
                    $resultado = rol::where('id','<>','0')->get(); 
                }else{
                    $resultado = rol::where('estado_rol',1)->get(); 
                }
                $permisos = Controller::permisos('rol');
                return view('rol.index', ["resultado"=>$resultado,"permisos"=>$permisos]);

            }
            
              
            return redirect(route('index'));
            
        }else{
            return redirect(route('login.index'));
        }
        
    }


    public function create(){
        if (Session::has('usuario_rol_id')) {
            $pantallas_menu = Controller::urlsPantallasXUsuario();
            
            if (in_array('/rol/create',$pantallas_menu)){//solo modificar la ruta buscar las rutas en web.php o el la tabla pantallas
                //esto ya estaba
                return view("rol.create");
            }
            
              
            return redirect(route('index'));
            
        }else{
            return redirect(route('login.index'));
        }
    
    
    }

    public function insert(Request $request){
        if (Session::has('usuario_rol_id')) {
            $pantallas_menu = Controller::urlsPantallasXUsuario();
            
            if (in_array('/rol/create',$pantallas_menu)){//solo modificar la ruta buscar las rutas en web.php o el la tabla pantallas
                $obj_rol = new rol();
                $obj_rol->nombre_rol = $request->txtNombre;
                $obj_rol->save();

                return redirect(route('rol.index'))->withErrors(['status' => "Se creó el rol " .$obj_rol->id ]);
            }
            
            return redirect(route('index'));
            
        }else{
            return redirect(route('login.index'));
        }
        

    }

    public function update($id){
        if (Session::has('usuario_rol_id')) {
            $pantallas_menu = Controller::urlsPantallasXUsuario();
         
                if (in_array('/rol/update',$pantallas_menu)){//solo modificar la ruta buscar las rutas en web.php o el la tabla pantallas
                    $resultado = rol::get()->where('id',$id);
                    return view ("rol.update",  ["resultado"=>$resultado]);
                }

            return redirect(route('index'));
            
        }else{
            return redirect(route('login.index'));
        }
        
    }

    public function save(Request $request){
        if (Session::has('usuario_rol_id')) {
            $pantallas_menu = Controller::urlsPantallasXUsuario();
            
            if (in_array('/rol/update',$pantallas_menu)){//solo modificar la ruta buscar las rutas en web.php o el la tabla pantallas
                $obj_rol = rol::find($request->txtId);
                $obj_rol->nombre_rol = $request->txtNombre;
                $obj_rol->save();
                return redirect(route('rol.index'))->withErrors(['status' => "Se ha guardado el rol" ]);

            }
              
            return redirect(route('index'));
            
        }else{
            return redirect(route('login.index'));
        }
        
    }
    public function delete($id){
        if (Session::has('usuario_rol_id')) {
            $pantallas_menu = Controller::urlsPantallasXUsuario();
            
            if (in_array('/rol/delete',$pantallas_menu)){//solo modificar la ruta buscar las rutas en web.php o el la tabla pantallas
                //esto ya estaba 
                $resultado = rol::find($id);
                $resultado->estado_rol = 0;
                $resultado->save();
                return redirect(route('rol.index'))->withErrors(['status' => "Se ha eliminado el rol" ]);
            }
             
            return redirect(route('index'));
            
        }else{
            return redirect(route('login.index'));
        }
        
    }
    public function desbloquear($id){
        if (Session::has('usuario_rol_id')) {
            $pantallas_menu = Controller::urlsPantallasXUsuario();
            
                if (in_array('/rol/delete',$pantallas_menu)){//solo modificar la ruta buscar las rutas en web.php o el la tabla pantallas
                    //esto ya estaba 
                    $obj_rol = rol::find($id);
                    $obj_rol->estado_rol = 1;
                    $obj_rol->save();
                    return redirect(route('rol.index'))->withErrors(['status' => "Se ha desbloqueado el rol" ]);

                }
              
            return redirect(route('index'));
            
        }else{
            return redirect(route('login.index'));
        }
        

    }
}
