<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ContactoController extends Controller
{
    public function contactoindex(){
    	$mensaje = null;
    	return View('contacto.contacto')->with('mensaje',$mensaje);
    }
    public function contactoenvio(Request $request){
    	$mensaje = null;
			$rules = array(
				'name' => 'required|regex:/^[a-záéóóúàèìòùäëïöüñ\s]+$/i|min:3|max:80',
				'emailcontacto' => 'required|email|between:3,80',
				'subject' => 'required|regex:/^[a-z0-9áéóóúàèìòùäëïöüñ\s]+$/i|min:3|max:80',
				'msg' => 'required|between:3,500',
			);
			$messages=array(
				'name.required' => 'El campo es requerido',
				'name.regex' => 'solo se aceptan letras',
				'name.min' => 'minimo 3 caracteres',
				'name.max' => 'maximo 80 caracteres',
				'emailcontacto.required' => 'El campo es requerido',
				'emailcontacot.regex' => 'solo se aceptan letras y numeros',
				'email.between' => 'entre 3 y 80 caracteres',
				'subject.required' => 'El campo es requerido',
				'subject.regex' => 'solo se aceptan letras y numeros',
				'subject.min' => 'minimo 3 caracteres',
				'subject.max' => 'maximo 80 caracteres',
				'msg.required' => 'el campo es requerido',
				'msg.between' => 'entre 3 y 500 caracteres',
				);
				$data = array(
					'name' => \Input::get('name'),
					'email' => \Input::get('emailcontacto'),
					'subject' => \Input::get('subject'),
					'msg' => \Input::get('msg'),
				);
			$this->validate($request, $rules, $messages);
      $fromEmail = 'spyatorio@gmail.com';
			$fromName = 'Administrador CCbol 2015';
			\Mail::send('contacto.correo', $data, function($message) use ($fromName, $fromEmail){
				$message->to($fromEmail, $fromName);
				$message->from($fromEmail, $fromName);
				$message->subject('nuevo email de contacto');
			});

		    return redirect()->action('MainPageController@index');;
    }
}
