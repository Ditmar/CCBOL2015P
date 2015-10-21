<?php
//BLADE LIGER
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
class UsuariosController extends Controller
{
    //copiado de REGISTERSUSER.PHP


    public function getRegistrar()
    {
        return view('auth.register');
    }

    public function postRegistrar(Request $request)
    {

        //$data=\Request::all();
        $rules = array(
            'username'  => 'required|unique:users,username|max:150|min:5',
            'email'     => 'required|unique:users,email|max:255|min:5',
            'nombres'   => 'required|max:150|min:4',
            'apellidos' => 'required|max:150|min:4',
            'password'  => 'required|confirmed|min:6|max:16',
        );
        //$v= \Validator::make($data, $rules);
        //dd($v->errors());
       /* if ($v->fails()) {
            return redirect()->back()
            ->withError($v->errors())
            ->withInput(\Request::except('password'));
        }*/
        $this->validate($request, $rules);


        //return "fail";
        $u = new User;

        $u->username=\Input::get('username');
        $u->email=\Input::get('email');
        $u->nombres=\Input::get('nombres');
        $u->apellidos=\Input::get('apellidos');
        $u->password=\Hash::make(\Input::get('password'));
        $u->remember_token=\Input::get('_token');
        $u->rol='administrador';
        $u->save();

        //$alert=\Session::flash('alert','Tu publicacion fue creada con exito');
        //return \Redirect::route('home')->with('alert',$alert)->with('users',$users);
        return \Redirect::route('home')->with('alert','Usuario creado con existo');;
    }

}
