<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\examen;
use App\Models\caracteristica_examen;
use App\Models\examen_caracteristica_examen;
use App\Models\tipo_examen;
use Session;

class examenController extends Controller
{

    public function index(){

        if (!Auth::user()) {

            $current = url()->current();
            Session::put('url', $current);    
            return redirect(route('login.index'));
        }
    
        if(Auth::user()->accesoRuta('/examen')){

            $resultado = examen::where('estado_examen',1)->where('es_principal','<>',0)->get(); 
            return view('examen.index', ["resultado"=>$resultado, "grupos"=>[]]);


        }

    }

    public function crear(){

        if (!Auth::user()) {

            $current = url()->current();
            Session::put('url', $current);    
            return redirect(route('login.index'));
        }
    
        if(Auth::user()->accesoRuta('/examen/create')){

            $tipo_examenes = tipo_examen::where('estado_tipo_examen',1)->get();
            return view("examen.create",["tipo_examenes"=>$tipo_examenes]);

        }
            
              
        return redirect(route('index'));

    }

    public function insert(Request $request){

        if (!Auth::user()) {

            $current = url()->current();
            Session::put('url', $current);    
            return redirect(route('login.index'));
        }
    
        if(Auth::user()->accesoRuta('/examen/create')){

            if($request->cbxTipoExamen == 0){
                    
                $obj_tipo_examen = new tipo_examen();
                $obj_tipo_examen->nombre_tipo_examen = $request->txtNombre;
                $obj_tipo_examen->estado_tipo_examen = 0;
                $detalle_examen = $request->txtDescripcion;
                $detalle_examen = str_replace("<","	&lt;",$detalle_examen);
                $detalle_examen = str_replace(">","	&gt;",$detalle_examen);
                $detalle_examen = str_replace("↑",'<span style="font-family: DejaVu Sans, sans-serif;">&uarr;</span>',$detalle_examen);
                $detalle_examen = str_replace("↓",'<span style="font-family: DejaVu Sans, sans-serif;">&darr;</span>',$detalle_examen);
                $obj_tipo_examen->detalle_tipo_examen = nl2br($detalle_examen);                                            
        
                                    
                $obj_tipo_examen->save();

                $obj_examen = new examen(); 
                $obj_examen->nombre_examen = $request->txtNombre;                    
                $obj_examen->tipo_examen_id = $obj_tipo_examen->id;
                $obj_examen->tiene_referencia =$request->cbxReferencia;
                $detalle_examen = $request->txtDescripcion;
                $detalle_examen = str_replace("<","	&lt;",$detalle_examen);
                $detalle_examen = str_replace(">","	&gt;",$detalle_examen);
                $detalle_examen = str_replace("↑",'<span style="font-family: DejaVu Sans, sans-serif;">&uarr;</span>',$detalle_examen);
                $detalle_examen = str_replace("↓",'<span style="font-family: DejaVu Sans, sans-serif;">&darr;</span>',$detalle_examen);
                $obj_examen->detalle_examen = nl2br($detalle_examen);
                $obj_examen->es_principal = 2;                        
                $obj_examen->save();
                
            }else{

                $obj_examen = new examen(); 
                $obj_examen->nombre_examen = $request->txtNombre;                    
                $obj_examen->tipo_examen_id = $request->cbxTipoExamen;
                $obj_examen->tiene_referencia = $request->cbxReferencia;
                $detalle_examen = $request->txtDescripcion;
                $detalle_examen = str_replace("<","	&lt;",$detalle_examen);
                $detalle_examen = str_replace(">","	&gt;",$detalle_examen);    
                $detalle_examen = str_replace("↑",'<span style="font-family: DejaVu Sans, sans-serif;">&uarr;</span>',$detalle_examen);
                $detalle_examen = str_replace("↓",'<span style="font-family: DejaVu Sans, sans-serif;">&darr;</span>',$detalle_examen);
                                    
                $obj_examen->detalle_examen =nl2br($detalle_examen);                   
                $obj_examen->es_principal = 1; 
                if(isset($request->ckbReferencia)){
                    $obj_examen->tiene_referencia=1;
                }else{
                    $obj_examen->tiene_referencia=0;
                }
                if (isset($request->ckbExterno)) {
                    $obj_examen->es_externo = 1;
                } else {
                    $obj_examen->es_externo = 0;
                }  
                $obj_examen->save();
                if ($obj_examen->es_externo == 1) {
                    $es_impreso = caracteristica_examen::where('nombre_caracteristica_examen','Documento_impreso')->first();
                    $caracteristica = new examen_caracteristica_examen();
                    $caracteristica->examen_id = $obj_examen->id;
                    $caracteristica->caracteristica_examen_id =$es_impreso->id;
                    $caracteristica->num_orden = 1;
                    $caracteristica->save();
                    return redirect (route('examen.index'))->withErrors(['status' => "El examen se guardo correctamente" ]);
                }
            }
            return redirect()->route('examen.crear2', ['id' => $obj_examen->id]);

        }
            
              
        return redirect(route('index'));

    }

    public function crear2($id){

        if (!Auth::user()) {

            $current = url()->current();
            Session::put('url', $current);    
            return redirect(route('login.index'));
        }
    
        if(Auth::user()->accesoRuta('/examen/create')){

            $caracteristicas_examen = caracteristica_examen::where('estado_caracteristica_examen',1)->orderBy('nombre_caracteristica_examen')->get();
            $caracteristicas= examen_caracteristica_examen::get()->where('examen_id',$id);
            
            $lista_caracteristicas= array();
            foreach($caracteristicas as $caracteristica){
                array_push($lista_caracteristicas,$caracteristica->caracteristica_examen_id);
            }
        
            return view("examen.create2",["lista_caracteristicas"=>$lista_caracteristicas,"caracteristicas_examen"=>$caracteristicas_examen,"id_examen"=>$id]);

        }

        return redirect(route('index'));

    }

    public function insert2(Request $request){

        if (!Auth::user()) {

            $current = url()->current();
            Session::put('url', $current);    
            return redirect(route('login.index'));
        }
    
        if(Auth::user()->accesoRuta('/examen/create')){

            
        
            $examen = examen::find($request->txtid);
                
            if($examen->es_principal == 2){

                DB::table('examen_caracteristica_examen')->where('examen_id', '=', $request->txtid)->delete();
                foreach($request->caracteristicas_id as $key=>$caracteristica){ 

                    $obj_caracteristica= new examen_caracteristica_examen();
                    $obj_caracteristica->examen_id = $examen->id;
                    $obj_caracteristica->num_orden=$key;
                    $obj_caracteristica->caracteristica_examen_id = $caracteristica;
                    $obj_caracteristica->save();

                    $caracteristica_examen = caracteristica_examen::find($caracteristica);

                    $obj_examen = new examen();
                    $obj_examen->nombre_examen = $caracteristica_examen->nombre_caracteristica_examen;                    
                    $obj_examen->tipo_examen_id = $examen->tipo_examen_id;
                    $obj_examen->tiene_referencia = $examen->tiene_referencia;
                    $obj_examen->detalle_examen = $examen->detalle_examen;
                    $obj_examen->es_principal = 0; 
                    $obj_examen->padre=$examen->id;
                    $obj_examen->save();

                    $obj_caracteristica= new examen_caracteristica_examen();
                    $obj_caracteristica->examen_id = $obj_examen->id;
                    $obj_caracteristica->num_orden=$key;
                    $obj_caracteristica->caracteristica_examen_id = $caracteristica;
                    $obj_caracteristica->save();
                    
                }  
            }else{

            

                DB::table('examen_caracteristica_examen')->where('examen_id', '=', $request->txtid)->delete();
                foreach($request->caracteristicas_id as $key=>$caracteristica){ 

                    $obj_caracteristica= new examen_caracteristica_examen();
                    $obj_caracteristica->examen_id = $request->txtid;
                    $obj_caracteristica->num_orden=$key;
                    $obj_caracteristica->caracteristica_examen_id = $caracteristica;
                    $obj_caracteristica->save();
                    
                }  
            }
            return redirect()->route('examen.crear3', ['id' => $request->txtid]);

        }        
          
        return redirect(route('index'));
    }
    

    public function crear3($id){

        if (!Auth::user()) {

            $current = url()->current();
            Session::put('url', $current);    
            return redirect(route('login.index'));
        }
    
        if(Auth::user()->accesoRuta('/examen/create')){

            $caracteristicas = examen_caracteristica_examen::where('examen_id',$id)->orderBy('num_orden')->get();
            return view("examen.create3",['caracteristicas'=>$caracteristicas,"examen_id"=>$id]); 

        }
    
            
        return redirect(route('index'));
        

    }

    public function insert3(Request $request){
        if (!Auth::user()) {

            $current = url()->current();
            Session::put('url', $current);    
            return redirect(route('login.index'));
        }
    
        if(Auth::user()->accesoRuta('/examen/create')){
        
            if ($request->inputOrden != null) {
                $ListaDeID= explode(',',$request->inputOrden); 
                
               
                
                $examen = examen::find($request->examen_id);

                
                
                if($examen->es_principal==2){
                    $examenes = examen::where('padre',$examen->id)->get();
                    

                    $lista_examenes = array();
                    foreach($examenes as $fila){
                        
                        array_push($lista_examenes,$fila->id);
                        
                        
                    }

                    

                    
                    foreach($ListaDeID as $key=>$id){

                        return $this->eliminarChar($id);
                        
                        examen_caracteristica_examen::where('examen_id',$request->examen_id)
                                                    ->where('caracteristica_examen_id',$id)
                                                    ->update(['num_orden' => $key]);
                        
                        foreach($lista_examenes as $fila_1){
                            examen_caracteristica_examen::where('examen_id',$fila_1)
                                                    ->where('caracteristica_examen_id',$id)
                                                    ->update(['num_orden' => $key]);
                            
                        }
                        
                    }

                    
                }else{

                    foreach($ListaDeID as $key=>$id){

                        
                        examen_caracteristica_examen::where('examen_id',$request->examen_id)
                                                    ->where('caracteristica_examen_id',$this->eliminarChar($id))
                                                    ->update(['num_orden' => $key]);
                                                    
                    
                    }
                }

                
            }
            return redirect (route('examen.index'))->withErrors(['status' => "El examen se guardo correctamente" ]);

        }
        
          
        return redirect(route('index'));
        
        
    }

    public function eliminarChar($string){

        $arr1 = str_split($string);
        $numero = '';
        foreach ($arr1 as $value) {

            if (is_numeric($value)) {
                $numero = $numero.$value;
            }
            
        }
        return $numero;
    }

    public function update($id){

        if (!Auth::user()) {

            $current = url()->current();
            Session::put('url', $current);    
            return redirect(route('login.index'));
        }
    
        if(Auth::user()->accesoRuta('/examen/update')){

            $tipo_examenes = tipo_examen::where('estado_tipo_examen',1)->get();
            $resultado = examen::find($id);
            $detalle_examen = $resultado->detalle_examen;
            $detalle_examen = str_replace("<br />","",$detalle_examen);
            $detalle_examen = str_replace('<span style="font-family: DejaVu Sans, sans-serif;">&darr;</span>',"↓",$detalle_examen);
            $detalle_examen = str_replace('<span style="font-family: DejaVu Sans, sans-serif;">&uarr;</span>',"↑",$detalle_examen);
            $detalle_examen = str_replace('&lt;',"<",$detalle_examen);
            $detalle_examen = str_replace('&gt;',">",$detalle_examen);
            return view("examen.create",["tipo_examenes"=>$tipo_examenes,'resultado'=>$resultado,'detalle'=>$detalle_examen]);

        }
            
              
        return redirect(route('index'));
    }

    public function save(Request $request){

        if (!Auth::user()) {

            $current = url()->current();
            Session::put('url', $current);    
            return redirect(route('login.index'));
        }
    
        if(Auth::user()->accesoRuta('/examen/update')){

            $obj_examen = examen::find($request->txtid); 
            $obj_examen->nombre_examen = $request->txtNombre;
            
            $detalle_examen = $request->txtDescripcion;
            $detalle_examen = str_replace("<","	&lt;",$detalle_examen);
            $detalle_examen = str_replace(">","	&gt;",$detalle_examen);    
            $detalle_examen = str_replace("↑",'<span style="font-family: DejaVu Sans, sans-serif;">&uarr;</span>',$detalle_examen);
            $detalle_examen = str_replace("↓",'<span style="font-family: DejaVu Sans, sans-serif;">&darr;</span>',$detalle_examen);
            $obj_examen->detalle_examen =nl2br($detalle_examen);
            if(isset($request->cbxReferencia)){
                if ($request->cbxReferencia == 1) {
                    $obj_examen->tiene_referencia=1;
                } else {
                    $obj_examen->tiene_referencia=0;
                }
                
                
            }else{
                $obj_examen->tiene_referencia=0;
            }
            if (isset($request->ckbExterno)) {
                $obj_examen->es_externo = 1;
            } else {
                $obj_examen->es_externo = 0;
            }  
            $obj_examen->save();
            if ($obj_examen->es_externo == 1) {                        
                return redirect (route('examen.index'))->withErrors(['status' => "El examen se guardo correctamente" ]);
            }
            $obj_examen->save();

            
            return redirect()->route('examen.update2', ['id' => $obj_examen->id]);

        }
            
              
        return redirect(route('index'));
    }

    public function update2($id){

        if (!Auth::user()) {

            $current = url()->current();
            Session::put('url', $current);    
            return redirect(route('login.index'));
        }
    
        if(Auth::user()->accesoRuta('/examen/update')){

            $caracteristicas_examen = caracteristica_examen::where('estado_caracteristica_examen',1)->orderBy('nombre_caracteristica_examen')->get();
            $caracteristicas= examen_caracteristica_examen::get()->where('examen_id',$id);
            
            $lista_caracteristicas= array();
            foreach($caracteristicas as $caracteristica){
                array_push($lista_caracteristicas,$caracteristica->caracteristica_examen_id);
            }
        
            return view("examen.create2",["lista_caracteristicas"=>$lista_caracteristicas,"caracteristicas_examen"=>$caracteristicas_examen,"id_examen"=>$id]);

        }
            
              
        return redirect(route('index'));
    }

    public function save2(Request $request){

        if (!Auth::user()) {

            $current = url()->current();
            Session::put('url', $current);    
            return redirect(route('login.index'));
        }
    
        if(Auth::user()->accesoRuta('/examen/update')){

            $examen = examen::find($request->txtid);
                
            if($examen->es_principal == 2){

                DB::table('examen_caracteristica_examen')->where('examen_id', '=', $examen->id)->delete();
                $examenes = examen::where('padre',$examen->id)->get();
                $lista_examenes =array();
                foreach($examenes as $fila){
                    array_push($lista_examenes,$fila->id);
                }
                
                
                foreach($lista_examenes as $fila){
                    DB::table('examen_caracteristica_examen')->where('examen_id',$fila)->delete();
                    DB::table('examen')->where('id',$fila)->delete();
                }
                
                foreach($request->caracteristicas_id as $key=>$caracteristica){ 

                    $obj_caracteristica= new examen_caracteristica_examen();
                    $obj_caracteristica->examen_id = $examen->id;
                    $obj_caracteristica->num_orden=$key;
                    $obj_caracteristica->caracteristica_examen_id = $caracteristica;
                    $obj_caracteristica->save();

                    $caracteristica_examen = caracteristica_examen::find($caracteristica);

                    $obj_examen = new examen();
                    $obj_examen->nombre_examen = $caracteristica_examen->nombre_caracteristica_examen;                    
                    $obj_examen->tipo_examen_id = $examen->tipo_examen_id;
                    $obj_examen->tiene_referencia = $examen->tiene_referencia;
                    $obj_examen->es_principal = 0; 
                    $obj_examen->detalle_examen = $examen->detalle_examen;
                    $obj_examen->padre=$examen->id;
                    $obj_examen->save();

                    $obj_caracteristica= new examen_caracteristica_examen();
                    $obj_caracteristica->examen_id = $obj_examen->id;
                    $obj_caracteristica->num_orden=$key;
                    $obj_caracteristica->caracteristica_examen_id = $caracteristica;
                    $obj_caracteristica->save();
                    
                }  
            }else{

            

                DB::table('examen_caracteristica_examen')->where('examen_id', '=', $request->txtid)->delete();
                foreach($request->caracteristicas_id as $key=>$caracteristica){ 

                    $obj_caracteristica= new examen_caracteristica_examen();
                    $obj_caracteristica->examen_id = $request->txtid;
                    $obj_caracteristica->num_orden=$key;
                    $obj_caracteristica->caracteristica_examen_id = $caracteristica;
                    $obj_caracteristica->save();
                    
                }  
            } 
            return redirect()->route('examen.crear3', ['id' => $request->txtid]);

        }
            
              
        return redirect(route('index'));
    }

    
}

