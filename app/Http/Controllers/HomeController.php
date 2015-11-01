<?php
//Blade Liger
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){

    	$id=\Auth::user()->id;
        $user=\Auth::user()->username;
    	$post =\DB::table('posts')
                        ->select('*')
                        ->where('id_usuario', $id)
                        ->orderBy('updated_at','desc')
                        ->get();//rescatamos todas sus publicaciones
          $inaguracion = \DB::table('tiempos')->get();
      return view('login.iniciohomeuser')
            ->with('user',$user)
            ->with('posts',$post)
            ->with('inaguracion',$inaguracion);
    }
}
