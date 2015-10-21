<?php
//Blade Liger
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){

    	$id=\Auth::user()->id;//rescatar id del usuario logeado
        $user=\Auth::user()->username;
    	//$post = \DB::table('posts')->orderBy('id','desc')->paginate(10);
    	$post =\DB::table('posts')
                        ->select('*')
                        ->where('id_usuario', $id)
                        ->orderBy('updated_at','desc')
                        ->get();//rescatamos todas sus publicaciones
         //return var_dump($post);
          $inaguracion = \DB::table('tiempos')->get();
          //$fechaservidor = date('j F o G:i:s:u ');
          //$today = getdate();
          //$mon = $today['mday'];
          //return $fechaservidor;
    	return view('login.iniciohomeuser')
            ->with('user',$user)
            ->with('posts',$post)
            ->with('inaguracion',$inaguracion);
           //->with('fechaservidor',$fechaservidor);
    }
}
