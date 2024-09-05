<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\pantalla;
use App\Models\rol;
use App\Models\rol_pantalla;
use Illuminate\Support\Facades\DB;
use Session;

class roldepantallaController extends Controller
{

    public function index(){
        
        if (!Auth::user()) {

            $current = url()->current();
            Session::put('url', $current);    
            return redirect(route('login.index'));
        }

        if(Auth::user()->accesoRuta('/pantalla')){

            $resultado = pantalla::orderBy('padre')->orderBy('id')->get();            
            $pantallas_padre = pantalla::where('padre',0)->get();
            return view('pantalla.index',["resultado"=>$resultado,"pantallas_padre"=>$pantallas_padre]);

        }
            
              
        return redirect(route('index'));
            
    }

    public function create(){

        if (!Auth::user()) {

            $current = url()->current();
            Session::put('url', $current);    
            return redirect(route('login.index'));
        }

        if(Auth::user()->accesoRuta('/pantalla/create')){

            $pantallas_padre = pantalla::where('padre',0)->get();

            return view('pantalla.create',["pantallas_padre"=>$pantallas_padre]);

        }
        
            
        return redirect(route('index'));            
    
    }   

   

    public function insert(Request $request){

        if (!Auth::user()) {

            $current = url()->current();
            Session::put('url', $current);    
            return redirect(route('login.index'));
        }

        if(Auth::user()->accesoRuta('/pantalla/create')){

            if($request->txtEstado == 1){
                $estado =1;
            }else{
                $estado=0;
            }
            
            $obj_pantalla = new pantalla();        
            $obj_pantalla->nombre_pantalla=$request->txtNombre;
            $obj_pantalla->titulo_pantalla = str_replace(' ', '', $request->txtNombre);        
            $obj_pantalla->url_pantalla=$request->txtUrl;
            $obj_pantalla->padre = $request->txtPadre;
            $obj_pantalla->estado_pantalla = $estado;
            $obj_pantalla->save();
            return redirect(route('pantalla.index'))->withErrors(['status' => "Se ha creado la pantalla: " .$obj_pantalla->nombre_pantalla ]);
        }
    
            
        return redirect(route('index'));

    }

    

    public function delete($id){
        
        if (!Auth::user()) {

            $current = url()->current();
            Session::put('url', $current);    
            return redirect(route('login.index'));
        }

        if(Auth::user()->accesoRuta('/pantalla/delete')){

            $resultado = pantalla::find($id);         
            $resultado->delete();
            
            return redirect(route('pantalla.index'))->withErrors(['status' => "Se ha eliminado la pantalla" ]);
        }
        
            
        return redirect(route('index'));
       
    }

    public function save(Request $request){

        if (!Auth::user()) {

            $current = url()->current();
            Session::put('url', $current);    
            return redirect(route('login.index'));
        }

        if(Auth::user()->accesoRuta('/pantalla/update')){

            if($request->txtEstado == 1){
                $estado =1;
            }else{
                $estado=0;
            }
            
            $obj_panta= pantalla::find($request->txtId);
            $obj_panta->nombre_pantalla= $request->txtNombre;
            $obj_panta->titulo_pantalla = str_replace(' ', '', $request->txtNombre);        
            $obj_panta->url_pantalla= $request->txtUrl;
            $obj_panta->estado_pantalla = $estado;
            $obj_panta->padre = $request->txtPadre;
            $obj_panta->save();
    
            return redirect(route('pantalla.index'))->withErrors(['status' => "Se ha actualizado la pantalla" ]);
        }        
            
        return redirect(route('index'));

    }


    public function pantallaSave(Request $request){
        if (!Auth::user()) {

            $current = url()->current();
            Session::put('url', $current);    
            return redirect(route('login.index'));
        }

        
        if(Auth::user()->accesoRuta('/roles/pantalla/0')){            
        
            DB::table('rol_pantalla')->where('rol_id', '=', $request->txtid)->delete();
            if (empty($request->pantallas_id )) {
                
            } else {
                foreach($request->pantallas_id as $pantalla_id){ 

                    $obj_pantalla= new rol_pantalla();
                    $obj_pantalla->rol_id= $request->txtid;
                    $obj_pantalla->pantalla_id = $pantalla_id;
                    $obj_pantalla->save();
                    
                }  
            }
            
            
            return redirect()->back()->withErrors(['status' => "El rol se modifico correctamente" ]);
        }
        
            
        return redirect(route('index'));
    }

    public function rolesPantalla($id){

        if (!Auth::user()) {

            $current = url()->current();
            Session::put('url', $current);    
            return redirect(route('login.index'));
        }

        if(Auth::user()->accesoRuta('/roles/pantalla/0')){ 

            $pantallas = pantalla::where('padre',0)->get();
            $pantallas_rol= rol_pantalla::get()->where('rol_id',$id);
            $roles = rol::orderBy('id', 'ASC')->get();
            $rol = rol::find($id);
            $lista_pantallas= array();
            foreach($pantallas_rol as $pantalla){
                array_push($lista_pantallas,$pantalla->pantalla_id);
            }     
    
            return view("rolpantalla.selectPantallaId",["pantallas"=>$pantallas,"rol"=>$rol,"roles"=>$roles,"lista_pantallas"=>$lista_pantallas]);
        }
        
            
        return redirect(route('index'));
      
    }
    
}
