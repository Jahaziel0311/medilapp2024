<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pantalla extends Model
{
    use HasFactory;
    protected $table = "pantalla";
    protected $primaryKey="id";
    protected $fillable=array("nombre_pantalla","url_pantalla","estado_pantalla","padre");


    
    public function rol_pantallas(){
        return $this->hasMany('App\Models\rol_pantalla');
    }

    public function sub_menu()
    {
        $rol_id = Auth()->user()->rol->id;
        $pantallas_rol = rol_pantalla::where('rol_id',$rol_id)->get();
        $lista = array();

        foreach($pantallas_rol as $pantalla_rol){
            array_push($lista,$pantalla_rol->pantalla->id);
        }

        return pantalla::where('padre',$this->id)->whereIn('id',$lista)->get();
    }

    public function sub_pantallas()
    {  

        return pantalla::where('padre',$this->id)->get();

    }
    


}
