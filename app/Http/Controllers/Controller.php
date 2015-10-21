<?php
// BLADE LIGER
namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
abstract class Controller extends BaseController {
	use DispatchesCommands, ValidatesRequests;
}
//REMPLACE ESTO PARA QUE FUNCIONARA EL LOGIN
/*use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

abstract class Controller extends BaseController
{
    public function getIndex()
    {
    	return "HOLA";
    }
}*/
