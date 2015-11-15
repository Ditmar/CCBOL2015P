<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\DepositoParticipantes;
class ParticipantesPanelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $username=\Auth::user()->username;
        //Obtenemos los datos de los participantes
        $participantes=\DB::table("participante")->where("idUs",\Auth::user()->id)->first();
        //idPa
        $deposito=\DB::table("deposito")->where("idPa",$participantes->id)->get();
        $dep=true;
        if(isset($deposito))
        {
            $type="";
            $obs="";
            foreach ($deposito as $key) {
                $type=$key->estado;
                if(isset($key->obs))
                {
                    $obs=$key->obs;    
                }else{
                    $obs="";
                }
                $dep=false;
            }
            
            return view('participantespanel.participantesdashboard')->with("user",$username)
        ->with("participante",$participantes)
        ->with("exist",$dep)
        ->with('obs',$obs)
        ->with("depo",$type);

        }
        return view('participantespanel.participantesdashboard')->with("user",$username)
        ->with("participante",$participantes)
        ->with("exist",$dep);

    }
    public function crearformulario()
    {
        return view('participantespanel.deposito');
    }
    public function vertodo()
    {

        $p=\DB::table("participante")->where("idUs",\Auth::user()->id)->first();
        $data=\DB::table("participante")
        ->join("Paises","Paises.id","=","participante.idPais")
        ->join("Ciudad","Ciudad.id","=","participante.idCi")
        ->join("Universidad","Universidad.id","=","participante.idUni")
        ->join("carrera","carrera.id","=","participante.idCa")
        ->where("participante.id",$p->id)
        ->select('participante.*','Paises.nombre as pname','Ciudad.nombre as cname','Universidad.nombre as uname','carrera.nombre as caname')
        ->first();
        $paises=\DB::table('Paises')->get();
        $ciudad=\DB::table('Ciudad')->where('idPais',$p->idPais)->get();
        $universidad=\DB::table("Universidad")->get();
        $carrera=\DB::table("carrera")->where("idUni",$p->idUni)->get();
        return view('participantespanel.formulario')->with('perfil',$data)
        ->with("paises",$paises)
        ->with("ciudad",$ciudad)
        ->with("universidad",$universidad)
        ->with("carrera",$carrera);
    }
    public function loadform()
    {
        $username=\Auth::user()->username;
        //Obtenemos los datos de los participantes
        $participantes=\DB::table("participante")->where("idUs",\Auth::user()->id)->first();
        return view('participantespanel.reloadform')->with("participante",$participantes);
    }
    

    public function deposito(Request $request)
    {
        $rules=array(
            'codigo'     => 'required|unique:deposito,codigo|numeric',
            'monto' =>  'required|numeric',
            'fecha'  =>'required|date|date_format:Y-m-d',
            'hora'=>'required|date_format:H:i',
            'depositante'=>'required',
            'g-recaptcha-response' => 'required|captcha',
            'boleta' => 'required|max:5500|image',
        );
        //echo"AQUI ";
        $this->validate($request,$rules);
       //$validator = \Validator::make(\Input::all(), $rules);
        /*if($validator->fails())
        {
            return \Redirect::route('formulario')->withErrors($validator);
        }*/

        $url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        $file = $request->file('boleta');
        $participantes=\DB::table("participante")->where("idUs",\Auth::user()->id)->first();
        $id_participante=$participantes->id;
        $nombre = Carbon::now()->timestamp.$file->getClientOriginalName();
        \Storage::disk('local')->put($nombre,  \File::get($file));
        \Storage::move($nombre, 'preinscripciones/'.$nombre);
        $d = new DepositoParticipantes;
        $d->idPa=$id_participante;
        $d->codigo=\Input::get('codigo');
        $d->monto=\Input::get('monto');
        $d->fecha=\Input::get('fecha');
        $d->hora=\Input::get('hora');
        $d->estado="proceso";
        $d->depositante=\Input::get('depositante');
        $d->ci_depositante="0000000";
        $d->imgboleta=$nombre;
        $d->remember_token=\Input::get('_token');
        /*filas url de la tabla*/
        $d->url=$url;
        $d->absurl=$url;
        $d->save();
        return \Redirect::route("mainparticipante");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $rules = array(
            'nombres'   => 'required|max:150|min:3',
            'apellidos' => 'required|max:150|min:3',
            //'nick'      => 'required|unique:participante,nick|max:150|min:2',
            //'ci'      => 'required|unique:participante,ci|max:16000000|min:6|numeric',
            'semestre'  => 'required|max:100|min:2',
            'sexo'      => 'required',
            //'emails'     => 'required|unique:participante,emails|max:255|min:5',
            'pais' => 'required',
            'ciudad' => 'required',
            'universidad' => 'required',
            'carrera' => 'required',
            'g-recaptcha-response' => 'required|captcha'
        );
        //return "here";
       //$this->validate($request, $rules);
       $validator = \Validator::make(\Input::all(), $rules);
       if($validator->fails())
       {
            return \Redirect::route('formulario')->withErrors($validator);
       }

       // return "no valida";
        \DB::table("participante")->where("idUs",\Auth::user()->id)->update(
            array(
                "nombres"=>\Input::get('nombres'),
                "apellidos"=>\Input::get('apellidos'),
                //"nick"=>\Input::get('nick'),
                //"ci"=>\Input::get('ci'),
                "semestre"=>\Input::get('semestre'),
                "sexo"=>\Input::get('sexo'),
                //"emails"=>\Input::get('emails'),
                "idPais"=>\Input::get('pais'),
                "idCi"=>\Input::get('ciudad'),
                "idUni"=>\Input::get('universidad'),
                "idCa"=>\Input::get('carrera')
            )
        );
        return "true"; 

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
