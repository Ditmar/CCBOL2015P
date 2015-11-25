<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/*VERFICAR REGISTRO*/
	Route::get('verificar','ParticipantesController@Verficarregistroindex');
	Route::post('confirmacion','ParticipantesController@Verficarregistro');
/*RUTAS PARA OBTENER LAS CIUDADDES DEPENDIENDO A LOS PAISES*/
//obtenemos paises
	Route::get('paises','ParticipantesController@paises');
//obtenemos ciudades
	Route::post('ciudades','ParticipantesController@ciudades');
/*RUTAS PARA OBTENER LAS carreras DEPENDIENDO A Las universidades*/
//obtenemos universidades
	Route::get('universidades','ParticipantesController@universidades');
	Route::get('carreras/{id}','ParticipantesController@carreraslist');
//obtenemos carreras
	Route::post('carreras','ParticipantesController@carreras');
//verificamos si el usuario a selecionado las ubicaciones
	Route::get('metadata','RegistroParticipanteController@getDataForm');


/*REGISTRO POST DE PARTICIPANTE*/
Route::post('/registroparticipante','RegistroParticipanteController@registroparticipante');
/* RUTA PARA CONTACTO*/
Route::get('/Contacto',function(){
	echo "AQUI YA NO HAY NADA ";
});
Route::post('/Contacto','ContactoController@contactoenvio');
/*RUTAS PARA BLOG*/
Route::get('BLOG', 'BlogController@indexblog');
Route::get('articulos/{slug}',[
	'as' => 'article',
	'uses' => 'BlogController@article'
]);//todos los articulos
Route::get("/captcha","RegistroParticipanteController@getcaptcha");

Route::get('tag/{tag}',[
	'as' => 'tagged',
	'uses' => 'BlogController@tags'
]);//relacion de etiquetas
Route::get('inicio-de-sesion', [
	'uses' => 'Auth\AuthController@getLogin',
	'as'   => 'login'
]);//formulario de incio de session
Route::post('inicio-de-sesion', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@getLogout');//cerrar session
use App\ModelCarrera;
//routas con middleware para verificar que se haya iniciado sesion
Route::group(['middleware'=>['auth','participante'],'prefix'=>'participante'],function(){
	Route::get('main',[
		'uses'=>'ParticipantesPanelController@index',
		'as'=>'mainparticipante'
	]);
	Route::get("deposito",[
		'uses'=>"ParticipantesPanelController@crearformulario",
		'as'=>'registrardeposito'
	]);
	Route::post("senddeposito",[
		'uses'=>"ParticipantesPanelController@deposito",
		"as"=>'registrardepositoform'
		]);
	Route::get("vertodo",[
		'uses'=>'ParticipantesPanelController@vertodo',
		'as'=>'formulario'
	]);
	Route::post("updateparticipante",[
		'uses'=>'ParticipantesPanelController@update',
	]);
	Route::get("reloadForm",[
		'uses'=>'ParticipantesPanelController@loadform',
		'as'=>"reloadForm"
		]);
	
});
Route::group(['middleware' => ['auth','administrator'],'prefix'=>'admin'], function(){

					Route::get('prueba',function(){
					return view('prueba');
					});
					Route::get('/Bienvenido',[
					'uses' => 'HomeController@index',
					'as' => 'home'
					]);
					Route:get("dashboard","ParticipantesController@dashboard");
					Route::get("dashboard/list/{type}","ParticipantesController@participanteslist");
					Route::get('admin/posts/{id}/edit','AdminController@edit');//ormulario para editar articulos
					Route::post('admin/posts/refresh','AdminController@refresh');//editar actualizar post
					Route::get('admin/posts/nuevo',[
					'uses' => 'AdminController@nuevo',
					'as' => 'nuevapublicacion'
					]);//formulario para crear nuevos articulos
					Route::post('admin/posts/nuevo','AdminController@crear');//crear nuevo articulo
					Route::get('admin/posts/{id}/delete','AdminController@delete');//Borrar Publcicaon

				/* Registro de usuarios */
					Route::get('registro', [
						'uses' => 'UsuariosController@getRegistrar',
						'as'   => 'nuevousuario'
					]);//formulario de registro de usuario
					Route::post('registro', 'UsuariosController@postRegistrar');//registrar usuario

						/*	RUTAS PARA REGISTRO DE PARTICIPANTES DESDE ADMINISTRACION */
						Route::get('registroparticipante',[
							'uses' => 'RegistroParticipanteController@registroindex',
							'as' => 'registrosparticipantes'
						]);
						/*RUTAS PARA LISTAR PARTICIPANTES registrados (AGREDITACION)*/
						Route::get('participantes',[
								'uses' => 'ParticipantesController@participantesindex',
								'as' =>'participantesindex'
						]);
						//TODOS LOS PARTICIPANTES
						Route::get('/registrados','ParticipantesController@ParticipantesRegistrados');
						//TODOS LOS PARTICIPANTES QUE REALIZARON UN DEPOSITO
						Route::get('/registradosproceso','ParticipantesController@ParticipantesProceso');
						//TODOS LOS PARTICIPANTES OBSERVADOS
						Route::get('/observados','ParticipantesController@ParticipantesObservados');
						//TODOS LOS PARTICIPANTES INSCRITOS
						Route::get('/inscritos','ParticipantesController@ParticipantesInscritos');
						
						/*RUTAS PARA AGREDITACION O DESAGRADITACION DE UN PARTICIPANTE*/
						Route::get('/participante/{id}/Agreditacion','ParticipantesController@Agreditacion');
						/*AGREDITAR PARTICIPANTE*/
						Route::post('/participante/AgreditarParticipante','ParticipantesController@AgreditarParticipante');
						/*DESAGREDITAR PARTICIPANTE*/
						Route::post('/participante/Observar','ParticipantesController@ObservarParticipante');
						Route::post('/participante/editardatos','ParticipantesController@editParticipante');
						/*DAR DE BAJA AL PARTICIPANTE*/
						Route::get('/participante/{id}/BajaSistema','ParticipantesController@BajaSistema');
						/*Volver al sistema participante*/
						Route::get('/participante/{id}/VolverSistema','ParticipantesController@VolverSistema');
												
						Route::get('/participante/depo/{id}','ParticipantesController@checkdepositos');
						Route::post('/participante/registrodep','ParticipantesController@depositoadmin');
						Route::get('/participante/registrodep/{id}','ParticipantesController@depositoadminget');
						//register
						//printpapeletas
						
						Route::get('/participante/imprimir','ParticipantesController@printpapeletas');
						
						Route::post('/participante/register','ParticipantesController@register');
						
						Route::get('/participante/{id}/VolverSistema','ParticipantesController@VolverSistema');
						
						/*PArticipantes de Baja*/
						Route::get('/participante/buscar/{id}','ParticipantesController@buscar');
						
						Route::get('/partipantesbaja','ParticipantesController@partipantesbaja');
});
/*Ruta para El Temporizador*/
	//Route::get('/inaguracion','AdminController@inaguracion');
	//Route::get('/fechaservidor','HomeController@fechaservidor');
/*---------------*/

Route::get('/',[
	'uses'=>'MainPageController@index',
	'as'=>'weblayout']);
Route::get('/expositores/{id}',"Expositores@ver");

Route::get('/fill/',function(){
	$cc=["otros"];
	for($i=1;$i<51;$i++)
	{
		$p=new ModelCarrera();
		$p->nombre="otros";
		$p->idUni=$i;
		$p->save();
	}
});