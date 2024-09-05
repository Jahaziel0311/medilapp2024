<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Route::get('/', function () {
    return view('welcome');
});
 */

 use App\Http\Controllers\medicoController;
 use App\Http\Controllers\pacienteController;
 use App\Http\Controllers\rolController;

 use App\Http\Controllers\loginController;
 use App\Http\Controllers\usuarioController;
 use App\Http\Controllers\examenController;
 use App\Http\Controllers\resultadoController;
 use App\Http\Controllers\tipoexamenController;
 use App\Http\Controllers\caracteristica_examen_controller;
 use App\Http\Controllers\orden_laboratorioController;
 use App\Http\Controllers\roldepantallaController;
 use App\Http\Controllers\pdfController;
 use App\Http\Controllers\mailController;
 
 Route::get('/', [Controller::class, 'index'])->name('index');
 Route::get("/login", [loginController::class, 'index'])->name("login");
 Route::Post("/login", [loginController::class, 'login'])->name("login.login");
 
 Route::get('/menu', [Controller::class, 'pantallasMenu'])->name('menu');
 
 Route::get("/medico", [medicoController::class, 'index'])->name("medico.index");
 Route::get("/medico/create", [medicoController::class, 'create'])->name("medico.create");
 Route::get("/medico/crear", [medicoController::class, 'create'])->name("medico.crear");
 Route::post('/medico/create', [medicoController::class, 'insert'])->name("medico.insert") ;
 Route::post('/medico/crear', [medicoController::class, 'insert'])->name("medico.insertar");
 Route::get("/medico/update/{id}", [medicoController::class, 'update'])->name("medico.update");
 Route::post("/medico/update", [medicoController::class, 'save'])->name("medico.save");
 Route::get("/medico/delete/{id}", [medicoController::class, 'delete'])->name("medico.delete");
 Route::get("/medico/desbloquear/{id}", [medicoController::class, 'desbloquear'])->name("medico.desbloquear");
 
 /*tipoexamen*/
 Route::get("/tipoexamen", [tipoexamenController::class, 'index'])->name("tipoexamen.index");
 Route::get("/tipoexamen/create", [tipoexamenController::class, 'create'])->name("tipoexamen.create");
 Route::post("/tipoexamen/create", [tipoexamenController::class, 'insert'])->name("tipoexamen.insert");
 Route::get("/tipoexamen/update/{id}", [tipoexamenController::class, 'update'])->name("tipoexamen.update");
 Route::post("/tipoexamen/update", [tipoexamenController::class, 'save'])->name("tipoexamen.save");
 Route::get("/tipoexamen/delete/{id}", [tipoexamenController::class, 'delete'])->name("tipoexamen.delete");
 Route::get("/tipoexamen/desbloquear/{id}", [tipoexamenController::class, 'desbloquear'])->name("tipoexamen.desbloquear");
 
 Route::get("/rol", [rolController::class, 'index'])->name("rol.index");
 Route::get("/rol/create", [rolController::class, 'create'])->name("rol.create");
 Route::post("/rol/create", [rolController::class, 'insert'])->name("rol.insert");
 Route::get("/rol/update/{id}", [rolController::class, 'update'])->name("rol.update");
 Route::get("/rol/delete/{id}", [rolController::class, 'delete'])->name("rol.delete");
 Route::get("/rol/desbloquear/{id}", [rolController::class, 'desbloquear'])->name("rol.desbloquear");
 Route::post("/rol/update", [rolController::class, 'save'])->name("rol.save");
 
 /*PACIENTE*/
 Route::get("/paciente", [pacienteController::class, 'index'])->name("paciente.index");
 Route::get("/paciente/ultimos", [pacienteController::class, 'ultimos'])->name("paciente.ultimos");
 Route::get("/paciente/ver", [pacienteController::class, 'busqueda'])->name("paciente.busqueda");
 Route::get("/paciente/ver/{buscar}", [pacienteController::class, 'buscado'])->name("paciente.buscado");
 Route::POST("/paciente/ver", [pacienteController::class, 'busque2'])->name("paciente.busque2");
 Route::get("/paciente/create", [pacienteController::class, 'create'])->name("paciente.create");
 Route::post("/paciente/create", [pacienteController::class, 'insert'])->name("paciente.insert");
 Route::get("/paciente/update/{id}", [pacienteController::class, 'update'])->name("paciente.update");
 Route::post("/paciente/update", [pacienteController::class, 'save'])->name("paciente.save");
 Route::get("/paciente/delete/{id}", [pacienteController::class, 'eliminar'])->name("paciente.delete");
 Route::get("/paciente/desbloquear/{id}", [pacienteController::class, 'desbloquear'])->name("paciente.desbloquear");
 Route::get("/paciente/buscar/{id}", [pacienteController::class, 'buscar'])->name("paciente.buscar");
 Route::get("/paciente/verPassword/{id}", [pacienteController::class, 'verPassword'])->name("paciente.verPassword");
 /*Usuario*/
 Route::get("/usuario", [usuarioController::class, 'index'])->name("usuario.index");
 Route::get("/usuario/create", [usuarioController::class, 'create'])->name("usuario.create");
 Route::post("/usuario/create", [usuarioController::class, 'insert'])->name("usuario.insert");
 Route::get("/usuario/update/{id}", [usuarioController::class, 'update'])->name("usuario.update");
 Route::post("/usuario/update", [usuarioController::class, 'save'])->name("usuario.save");
 Route::get("/usuario/delete/{id}", [usuarioController::class, 'delete'])->name("usuario.delete");
 Route::get("/usuario/desbloquear/{id}", [usuarioController::class, 'desbloquear'])->name("usuario.desbloquear");
 Route::get("/usuario/bloquear/{id}", [usuarioController::class, 'bloquear'])->name("usuario.bloquear");
 Route::get("/usuario/nuevaPassword/{id}", [usuarioController::class, 'updatePassword'])->name("usuario.update.password");
 Route::post("/usuario/nuevaPassword/{id}", [usuarioController::class, 'updatePasswordSave'])->name("usuario.update.password.save");
 Route::get("/userName/{usuario}", [usuarioController::class, 'userName'])->name("userName.usuario");
 Route::get("/email/{correo}", [usuarioController::class, 'Correo'])->name("Correo.usuario");
 
 /*caracteristica examen*/
 Route::get("/caracteristicaExamen",[caracteristica_examen_controller::class,'mostrar'])->name("caracteristica_examen.mostrar");
 Route::get("/caracteristicaExamen/create",[caracteristica_examen_controller::class,'create'])->name("caracteristica_examen.create");
 Route::post("/caracteristicaExamen/create",[caracteristica_examen_controller::class,'insert'])->name("caracteristica_examen.insert");
 Route::get("/caracteristicaExamen/update/{id}",[caracteristica_examen_controller::class,'update'])->name("caracteristica_examen.update");
 Route::post("/caracteristicaExamen/update", [caracteristica_examen_controller::class, 'save'])->name("caracteristica_examen.save");
 Route::get("/caracteristicaExamen/delete/{id}", [caracteristica_examen_controller::class, 'delete'])->name("caracteristica_examen.eliminar");
 Route::get("/caracteristicaExamen/desbloquear/{id}", [caracteristica_examen_controller::class, 'desbloquear'])->name("caracteristica_examen.desbloquear");
 
 //Rutas Examen por Jahaziel De Salas
 Route::get("/examen", [examenController::class, 'index'])->name("examen.index");
 Route::get("/examen/create", [examenController::class, 'crear'])->name("examen.crear");
 Route::get("/examen/create/{id}", [examenController::class, 'crear2'])->name("examen.crear2");
 Route::get("/examen/create/ordenar/{id}", [examenController::class, 'crear3'])->name("examen.crear3");
 Route::post("/examen/create/ordenar", [examenController::class, 'insert3'])->name("examen.insert3");
 Route::post("/examen/create", [examenController::class, 'insert'])->name("examen.insert");
 Route::post("/examen/create2", [examenController::class, 'insert2'])->name("examen.insert2");
 Route::post("/examen/save", [examenController::class, 'save'])->name("examen.save");
 Route::post("/examen/save2", [examenController::class, 'save2'])->name("examen.save2");
 Route::get("/examen/update/{id}", [examenController::class, 'update'])->name("examen.update");
 Route::get("/examen/update2/{id}", [examenController::class, 'update2'])->name("examen.update2");
 Route::get("/examen/delete/{id}", [examenController::class, 'delete'])->name("examen.delete");
 
 //Rutas Resultado por Jahaziel De Salas
 Route::get("/ordenesLaboratorio", [resultadoController::class, 'index'])->name("resultado.index");
 Route::get("/ordenesLaboratorio/ver", [resultadoController::class, 'index'])->name("resultado.ver");
 Route::get("/ordenesLaboratorio/historial", [resultadoController::class, 'historial'])->name("resultado.historial");
 Route::get("/ordenesLaboratorio/examenes/{id}", [resultadoController::class, 'examenes'])->name("ordenLaboratorio.examenes");
 Route::get("/ordenesLaboratorio/resultados/{id}", [resultadoController::class, 'resultados'])->name("ordenLaboratorio.resultados");
 Route::get("/ordenesLaboratorio/resultados1/{id}", [resultadoController::class, 'resultados1'])->name("ordenLaboratorio.resultados1");
 Route::get("/ordenesLaboratorio/verResultados/{id}", [resultadoController::class, 'verResultados'])->name("ordenLaboratorio.ver.resultados");
 Route::post("/ordenesLaboratorio/resultados/{id}", [resultadoController::class, 'insertarResultados'])->name("insertar.resultados");
 Route::get("/ordenesLaboratorio/resultados/update/{id}", [resultadoController::class, 'update'])->name("ordenLaboratorio.update.resultados");
 Route::post("/ordenesLaboratorio/save", [resultadoController::class, 'save'])->name("ordenLaboratorio.save.resultado");
 Route::post("/ordenesLaboratorio/guardar", [resultadoController::class, 'guardar'])->name("ordenLaboratorio.guardar");
 Route::get("/ordenesLaboratorio/examen/eliminar/{id}", [resultadoController::class, 'eliminarExamen'])->name("ordenLaboratorio.examen.eliminar");
 Route::get("/ordenesLaboratorio/examen/terminado/{id}", [resultadoController::class, 'examenTerminado'])->name("ordenLaboratorio.examen.terminado");
 Route::Post("/ordenesLaboratorio/examen/subir", [resultadoController::class, 'subirArchivo'])->name("ordenLaboratorio.examen.subirResultado");

 //rutas pantalla y rol de pantalla
 Route::get("/pantalla", [roldepantallaController::class,'index'])->name("pantalla.index");
 Route::get("/pantalla/create", [roldepantallaController::class, 'create'])->name("pantalla.create");
 Route::post("/pantalla/create", [roldepantallaController::class, 'insert'])->name("pantalla.insert");
 Route::get("rol/pantalla/{id}", [roldepantallaController::class,'rolPantalla'])->name("rol.pantallas");
 Route::get("/pantalla/delete/{id}",[roldepantallaController::class,'delete'])->name("pantalla.delete");
 Route::get("/pantalladmin/update/{id}",[roldepantallaController::class,'update'])->name("pantalla.update");
 Route::post("/pantalladmin/update",[roldepantallaController::class,'save'])->name("pantalla.save");
 Route::post("/rol/pantalla/save",[roldepantallaController::class,'pantallaSave'])->name("rolPantalla.save");
 Route::get("roles/pantalla/{id}", [roldepantallaController::class,'rolesPantalla'])->name("roles.pantallas");
 Route::get("roles/pantallas", [roldepantallaController::class,'rolesPantallas'])->name("roles.pantallas.index");
 
 

 Route::get("/login", [loginController::class, 'index'])->name("login.index");
 Route::Post("/login", [loginController::class, 'login'])->name("login.login");
 Route::get("/validation", [loginController::class, 'validation'])->name("login.validation");
 Route::get("/cerrar", [loginController::class, 'cerrar'])->name("login.cerrar");
 Route::post("/validation", [loginController::class, 'emailvalidation'])->name("login.email");
 
 /*Orden laboratorio*/
 Route::get("/orden_laboratorio", [orden_laboratorioController::class, 'index'])->name("orden_laboratorio.index");
 Route::get("/orden_laboratorio/create", [orden_laboratorioController::class, 'create'])->name("orden_laboratorio.create");
 Route::get("/orden_laboratorio/create/{id}", [orden_laboratorioController::class, 'create2'])->name("orden_laboratorio.create2");
 Route::post("/orden_laboratorio/create", [orden_laboratorioController::class, 'insert'])->name("orden_laboratorio.insert");
 Route::get("/orden_laboratorio/createnext", [orden_laboratorioController::class, 'createnext'])->name("orden_laboratorio.createnext");
 Route::post("/orden_laboratorio/next", [orden_laboratorioController::class, 'createnext'])->name("orden_laboratorio.next");
 Route::get("/orden_laboratorio/delete/{id}", [orden_laboratorioController::class, 'delete'])->name("orden_laboratorio.delete");
 Route::get("/orden_laboratorio/desbloquear/{id}", [orden_laboratorioController::class, 'desbloquear'])->name("orden_laboratorio.desbloquear");
 Route::get("/orden_laboratorio/update/{id}", [orden_laboratorioController::class, 'update'])->name("orden_laboratorio.update");
 Route::post("/orden_laboratorio/update", [orden_laboratorioController::class, 'save'])->name("orden_laboratorio.save");
 Route::post("/orden_laboratorio/updatenext", [orden_laboratorioController::class, 'updatenext'])->name("orden_laboratorio.updatenext");
 Route::get("/consultar/{cedula}", [orden_laboratorioController::class, 'consultar'])->name("consultar.cedula");
 Route::get("/consultarRegistro/{registro}", [orden_laboratorioController::class, 'consultarRegistro'])->name("consultar.registro");
 
 
 //pdf
 Route::get("/imprimir/pdf/{id}", [pdfController::class, 'pdfResultado'])->name("imprimir.resultado");
 Route::get("/imprimir/X/{id}/{tipo}", [pdfController::class, 'pdfResultadoGrupo'])->name("imprimir.XGrupo");
 Route::get("/mail/imprimir/pdf/{id}", [pdfController::class, 'pdfMailResultado'])->name("imprimir.mail.resultado");
 
 //notificaciones
 
 Route::get("/notificacion/{id}", [resultadoController::class, 'notificacion'])->name("notificacion.orden");
 Route::get("/notificacion/ordenTerminada/{id}", [resultadoController::class, 'ordenTerminada'])->name("notificacion.ordenTerminada");
 
 //Correo 09/01/2021
 
 Route::post("/mail/pdf/", [mailController::class, 'enviarcorreo'])->name("enviar.correo");
 Route::post("/mail/pdfGrupo/", [mailController::class, 'enviarcorreoGrupo'])->name("enviar.correoGrupo");
 
 
 Route::get("/prueba/prueba", [resultadoController::class, 'prueba']);