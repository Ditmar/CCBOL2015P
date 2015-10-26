<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\ModelParticipantes;
use App\DepositoParticipantes;
use App\User;
use Carbon\Carbon;
class RegistroParticipanteController extends Controller
{
    public function registroindex(){// registro dedes otra plantilla por ruta
      $ciudades = \DB::table('Ciudad')->get();
      $paises = \DB::table('Paises')->get();
      $universidades = \DB::table('Universidad')->get();
      $carreras = \DB::table('carrera')->get();
    	return view('participantes.registroparticipantes');
      }
    public function getciudad($idPais)
    {
        $ciudades=\DB::table('Ciudad')->where("idPais",$idPais)->get();
        return Response::json(array(
            "ciudades"=>$ciudades));
    }
    public function getcaptcha()
    {
        return view("portada.captcha");
    }
    public function getDataForm()
    {
        /*
            Tengo que verificar si las sessiones existen
        */
        if(\Session::get('idPa')!=""&&\Session::get('idCi')!=""&&\Session::get('idUni')!=""&&\Session::get('idCa')!="")
        {
            $datos=array(
                "idPais"=>\Session::get('idPa'),
                "idCi"=>\Session::get('idCi'),
                "idUni"=>\Session::get('idUni'),
                "idCa"=>\Session::get('idCa'),
            );
            $paises=\DB::table('Paises')->get();
            $ciudad=\DB::table('Ciudad')->where('idPais',\Session::get('idPa'))->get();
            $universidad=\DB::table("Universidad")->get();
            $carrera=\DB::table("carrera")->where("idUni",\Session::get('idUni'))->get();
            return json_encode(array(
                'succes'=>true,
                "sessiones"=>$datos,
                "paises"=>$paises,
                "ciudad"=>$ciudad,
                "universidad"=>$universidad,
                "carrera"=>$carrera
                ));
        }

        return json_encode(["succes"=>false]);
    }
    public function registroparticipante(Request $request) // mismo post para registro personal y con un ususario
    {

        //guardamos los datos en variables de session
        \Session::put('idPa',\Input::get('pais'));
        \Session::put('idCi',\Input::get('ciudad'));
        \Session::put('idUni',\Input::get('universidad'));
        \Session::put('idCa',\Input::get('carrera'));
        $url="http://".$_SERVER['HTTP_HOST'].":".$_SERVER['SERVER_PORT'].$_SERVER['REQUEST_URI'];
        //$data=\Request::all();
        $rules = array(
            'nombres'   => 'required|max:150|min:3',
            'apellidos' => 'required|max:150|min:3',
            'nick'      => 'required|unique:participante,nick|max:150|min:2',
            'ci'      => 'required|unique:participante,ci|max:16000000|min:6|numeric',
            'semestre'  => 'required|max:100|min:6',
            'sexo'      => 'required',
            'emails'     => 'required|unique:participante,emails|max:255|min:5',
            'pais' => 'required',
            'ciudad' => 'required',
            'universidad' => 'required',
            'carrera' => 'required',
            'g-recaptcha-response' => 'required|captcha',
            'password'  => 'required|confirmed|min:6|max:16',
        );

        //$this->validate($request, $rules);
        $validator = \Validator::make(\Input::all(), $rules);
        if($validator->fails())
        {
            return \Response::json(array(
                        'success' => false,
                        'errors' => $validator->getMessageBag()->toArray()));
        }

        $u=new User();
        $u->username=\Input::get('nick');
        $u->email=\Input::get('emails');
        $u->nombres=\Input::get('nombres');
        $u->apellidos=\Input::get('apellidos');
        $u->password=\Hash::make(\Input::get('password'));
        $u->remember_token=\Input::get('_token');
        $u->rol="participante";
        $u->save();

        $id_usuario = \DB::table('users')
                ->select('id')
                ->where('email',\Input::get('emails'))
                ->get();
        foreach ($id_usuario as $p) {
            $idusuario    = $p->id;//
        }

        $ci=\Input::get('ci');

        $p = new ModelParticipantes;

        $p->nombres=\Input::get('nombres');
        $p->apellidos=\Input::get('apellidos');
        $p->nick=\Input::get('nick');
        $p->ci=\Input::get('ci');
        $p->semestre=\Input::get('semestre');
        $p->sexo=\Input::get('sexo');
        $p->emails=\Input::get('emails');
        $p->idUni=\Input::get('universidad');
        $p->idCa=\Input::get('carrera');
        $p->idPais=\Input::get('pais');
        $p->idCi=\Input::get('ciudad');
        $p->remember_token=\Input::get('_token');
        /*fila de usuario*/
        $p->idUs=$idusuario;// lo puse uno por que NOSE que usuario poner, se supone que el registro es libre
        $p->save();
        $monto=250;
        $msn="";
        if(\Input::get('semestre')=="profesional")
        {
            $monto=300;
        }else if(\Input::get('semestre')=="estudiante")
        {
            $monto=250;
        }else
        {
            $monto=1000000000;
            $msn="Usted a modificado el formulario, registramos su ip por seguridad, no intente dañar este sistema.";
        }
        $data = array(
                    'name' => \Input::get('nombres'),
                    "monto"=>$monto,
                    "montod"=>$monto+50,
                    "tipo"=>\Input::get('semestre'),
                    "msn"=>$msn,
                    'url' => "http://".$_SERVER['HTTP_HOST']."/verificar"
                );
        \Mail::send('contacto.email',$data, function($message)
        {
            $message->from('spyatorio@gmail.com', 'CCBOL2015');
            $message->to(\Input::get('emails'));
            $message->subject('PREINSCRIPCIÓN CCBOL2015');
        });


        if(\Auth::check()){
          return \Redirect::route('home')->with('alert','Participante creado con exito');
          //return \Redirect::route('/admin/home')->with('alert','Participante creado con exito');
        }else {    
            return \Response::json(array(
                "success"=>true,
                "msn"=>"Registro exitoso.<br>Verifique en la bandeja de entrada de su correo ".\Input::get('emails').", para continuar con el registro.<br>Verifique su SPAM (en caso de no haber recibido en la bandeja de entrada) ";
                ));
        }

    }

}
