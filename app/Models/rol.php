<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rol extends Model
{
    use HasFactory;
    protected $table = "rol";
    protected $primaryKey="id";
    protected $fillable=array("nombre_rol");

    public function usuarios()
    {
        return $this->hasMany('App\Models\usuario');
    }

    public function pantallas()
    {
        return $this->belongsToMany('App\Models\pantalla', 'rol_pantalla', 'rol_id', 'pantalla_id');
        
    }

    public function menu()
    {
        $rol_id = Auth()->user()->rol->id;
        $pantallas_rol = rol_pantalla::where('rol_id',$rol_id)->get();
        $lista = array();

        foreach($pantallas_rol as $pantalla_rol){
            array_push($lista,$pantalla_rol->pantalla->id);
        }

        return pantalla::where('padre',0)->where('estado_pantalla',1)->whereIn('id',$lista)->get();
    }
}
