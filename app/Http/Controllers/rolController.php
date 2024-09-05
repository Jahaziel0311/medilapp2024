<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\rol;
use Session;

class rolController extends Controller
{
    public function index(){

        if (!Auth::user()) {

            $current = url()->current();
            Session::put('url', $current);    
            return redirect(route('login.index'));
        }

        if(Auth::user()->accesoRuta('/rol')){

                        
            if (Auth::user()->rol->tipo_rol == 1) {
                $resultado = rol::get(); 
            } else {
                $resultado=rol::where('estado_rol',1)->get();
            }

            return view ("rol.index", ["resultado"=>$resultado]);
            
        }

        return redirect(route('index'));

    } 

    public function insert(Request $request){

        if (!Auth::user()) {

            $current = url()->current();
            Session::put('url', $current);    
            return redirect(route('login.index'));
        }

        if(Auth::user()->accesoRuta('/rol/create')){

            $obj_rol = new rol();
            $obj_rol->nombre_rol = $request->txtNombre;
            $obj_rol->save();
        
            return redirect(route('rol.index'))->withErrors(['status' => "Se creó el rol " .$obj_rol->nombre_rol ]);          

        }

        return redirect(route('index'));
    }

    public function save(Request $request){

        if (!Auth::user()) {

            $current = url()->current();
            Session::put('url', $current);    
            return redirect(route('login.index'));
        }

        if(Auth::user()->accesoRuta('/rol/update')){

            $obj_rol = rol::find($request->txtId);
            $obj_rol->nombre_rol = $request->txtNombre;
            $obj_rol->save(); 

            return redirect(route('rol.index'))->withErrors(['status' => "Se guardo el rol " .$obj_rol->nombre_rol ]);  
        }

        return redirect(route('index'));
    }

    public function delete($id){

        if (!Auth::user()) {

            $current = url()->current();
            Session::put('url', $current);    
            return redirect(route('login.index'));
        }

        if(Auth::user()->accesoRuta('/rol/delete')){

            $resultado = rol::find($id);
            $resultado->estado_rol = 0;
            $resultado->save();
            return redirect(route('rol.index'))->withErrors(['danger' => "Se ha eliminado el rol" ]);

        }

        return redirect(route('index'));

    }

    public function desbloquear($id){

        if (!Auth::user()) {

            $current = url()->current();
            Session::put('url', $current);    
            return redirect(route('login.index'));
        }

        if(Auth::user()->accesoRuta('/rol/delete')){

            $obj_rol = rol::find($id);
            $obj_rol->estado_rol = 1;
            $obj_rol->save();
            return redirect(route('rol.index'))->withErrors(['status' => "Se ha desbloqueado el rol" ]);  

        }

        return redirect(route('index'));

    }

    public function create(){

        if (!Auth::user()) {

            $current = url()->current();
            Session::put('url', $current);    
            return redirect(route('login.index'));
        }

        if(Auth::user()->accesoRuta('/rol/create')){

            return view("rol.create"); 

        }

        return redirect(route('index'));

    }
}
