<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Controllers\ContactoController;
class MainPageController extends BaseController
{
	/*
    Variable Global
    */
    var $baseresponse;

    /*
    Constructor base
    */
    function __construct()
    {
        $this->baseresponse = array("menu"=>"inicio");
    }
	public function index()
	{
    $mensaje = null;
    $ciudades = \DB::table('Ciudad')->get();
    $paises = \DB::table('Paises')->get();
    $universidades = \DB::table('Universidad')->get();
    $carreras = \DB::table('carrera')->get();
    //indexprincipalnew
    $inaguracion = \DB::table('tiempos')->get();

		return View("portada.indexprincipalnew",$this->baseresponse)
                ->with('ciudades',$ciudades)
                ->with('paises',$paises)
                ->with('universidades',$universidades)
                ->with('carreras',$carreras)
                ->with('inaguracion',$inaguracion)
                ->with('mensaje',$mensaje)
                ->with("auth",\Auth::check());
	}
}
