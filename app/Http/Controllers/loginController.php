<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use App\Models\User;
use App\Models\paciente;
use App\Models\rol_pantalla;
use Session;

class loginController extends Controller
{
    Public function index() {
        
        return view('auth.login');
    }

    Public function login(Request $request) {

        $credentials = $request->validate([
            'usuario' => ['required'],
            'password' => ['required'],
        ]);

        $nombre=$request->usuario;
        $contraseña=$request->password;        
        
        $existe=User::where('nombre_usuario',$nombre)->count();
        
        if ($existe==1) {
            $usuario=User::where('nombre_usuario',$nombre)->where('estado_usuario',1)->first(); 
            
            if ($usuario['password_usuario']==md5($contraseña)) {

                
                Auth::login($usuario);

                if (Session::get('url')) {
                       
                    return redirect(Session::get('url'));
                } else {
                   
                    return redirect(route('index'));
                }
                
                
            }
            else {
                
                return redirect()->back()->withErrors(['password' => "Contraseña incorrecta."])->withInput($request->all());
            }
        }
        else {
           
            $existe=paciente::where('email_paciente',$nombre)->count();
            
            if ($existe>0) {

                
                $usuarios=paciente::where('email_paciente',$nombre)->get();  
                
                $activo=true;                
                
                foreach ($usuarios as $usuario) {

                    
                    if ($usuario->identificacion_paciente==$contraseña) {

                        

                        if ($usuario->estado_paciente == 1) {

                            Session::put('paciente_id', $usuario->id);                
                            return Session::get('paciente_id');
            
                            if (Session::get('url')) {
                                
                                return redirect(Session::get('url'));
                            } else {
                            
                                return "Hola Mundo";
                            }
                            
                        } else {

                            $activo = false;
                        }                         
                    }
                        
                }
                              
                
                if($activo){
                    return redirect()->back()->withErrors(['password' => "Contraseña incorrecta."])->withInput($request->all());
                }
                
                return redirect()->back()->withErrors(['password' => "Tu usuario no esta activo"])->withInput($request->all());
                
                
            }
            
        }

        return redirect()->back()->withErrors(['usuario' => "El usuario es incorrecto."])->withInput($request->all());
            
    }

    Public function validation () {
        return view('login.validar');
    }

    Public function emailvalidation (Request $request) {
        $email=$request->email;

        $existe=usuario::where('email_usuario',$email)->count();

        if ($existe==1) {
            /* Codigo de validacion email */
            return redirect(route('login.index'))->withErrors(['status' => "Se ha mandado la verificación al correo electrónico." ]);
        }
        else {
            return back()->withInput()->withErrors(['status' => "El correo electronico no existe." ]);
        }
    }
    public function cerrar(){
        Session::put('usuario_log_id', '');        
        Session::put('usuario_rol_id', '');                
        Session::put('nombre_usuario', ''); 
        return redirect(route('login.index'));
    }
}
