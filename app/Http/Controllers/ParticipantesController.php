<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\DepositoParticipantes;
use App\ModelParticipantes;
class ParticipanteAux
{
  var $id;
  var $nombres;
  var $apellidos;
  var $nick;
  var $ci;
  var $semestre;
  var $emails;
  var $destado;
}
class ParticipantesController extends Controller
{

      public function participantesindex(){
        return view('participantes.participantes');
      }
      public function depositoadminget($id)
      {
        $depo=\DB::table("deposito")
        ->where("idPa",$id)
        ->get();
        return \Response::json(array("dep"=>$depo));
      }
      public function printpapeletas()
      {
         $depo=\DB::table("deposito")
         ->join('participante','participante.id','=','deposito.idPa')
         ->join("estracto",'deposito.codigo','=','estracto.code')
         ->select("participante.id","participante.nombres","participante.apellidos","deposito.codigo","estracto.code","deposito.monto as m","estracto.monto","estracto.estado")
         ->get();
         $estracto=\DB::table("estracto")
                    ->get();

         $depo2=\DB::table("participante")
         ->join('deposito','participante.id','=','deposito.idPa')
         ->where('deposito.monto','>',2)
         ->where('deposito.estado','correcto')
         ->take(100)
         ->get();
         //print_r($depo);
         $i=1;
         $jj=0;
         foreach($depo as $item)
         {
            $item->index=$i;
            $i++;
         }
         $j=1;
         $information=[];
         $total=0;
         foreach($depo2 as $item)
         {
            $item->index=$j;
            $j++;
            $item->code='-';
            $item->m='-';
            if(strlen(trim($item->codigo))==8|strlen(trim($item->codigo))==14|strlen(trim($item->codigo))==6)
            {
              foreach($estracto as $b)
              {
                if($b->code==$item->codigo)
                {
                  $jj++;
                  $item->code=$b->code;
                  $item->m=$b->monto;
                }
              }
              $information[]=$item;  
              $total+=$item->monto;
            }
            
         }
        $pdf = \PDF::loadView('reportes.inscritos', array(
          "p"=>$information,"j"=>$j-1,"Total"=>$total,"boleta"=>($j-1)-$jj));
         /*return view('reportes.inscritos',array(
          "depositos"=>[],"p"=>$information,"Total"=>$total)
         );*/
        return $pdf->stream();
      }
      public function depositoadmin(Request $request)
    {
        $url="";
        $d = new DepositoParticipantes;
        $d->idPa=\Input::get('id');;
        $d->codigo=\Input::get('codigo');
        $d->monto=\Input::get('monto');
        $d->fecha=\Input::get('fecha');
        $d->hora=\Input::get('hora');
        $d->estado="proceso";
        $d->depositante=\Input::get('depositante');
        $d->ci_depositante="0000000";
        $d->imgboleta="default.jpg";
        $d->remember_token=\Input::get('_token');
        $d->url=$url;
        $d->absurl=$url;
        $d->save();
        return \Response::json(array("msn"=>true));
    }
      public function ParticipantesRegistrados()
      {
        $cantidad=0;
        $total=0;
        $participantes = \DB::table('participante')
        ->join("Universidad",'Universidad.id','=','participante.idUni')
        ->join('carrera','carrera.id','=','participante.idCa')
        ->orderBy('id', 'desc')
        ->select("participante.*","participante.estado as destado","Universidad.nombre as unombre","carrera.nombre as cnombre")
        ->get();
        $lista=[];
        foreach ($participantes as $p) {
          $data=\DB::table('deposito')->where("idPa",$p->id)->first();
            $cantidad++;
            /*$pp=new ParticipanteAux();
            $pp->id=$p->id;
            $pp->nombres=$p->nombres;
            $pp->apellidos=$p->apellidos;
            $pp->nick=$p->nick;
            $pp->ci=$p->ci;
            $pp->semestre=$p->semestre;
            $pp->emails=$p->emails;*/
          if(isset($data))
          {
            $p->destado=$data->estado;
            $p->fechadep=$data->created_at;
            //deposito.monto
            $p->monto=$data->monto;
          }else
          {

            $p->destado="No registro la boleta";
            $p->fechadep="-";
            $p->monto=0;
          }
          $total+=$p->monto;
          $lista[]=$p;
          
        }
        $stats=array("cantidad"=>$cantidad,"dinero"=>$total);
        $infoo[]=(object)$stats;
        return view('participantes.resultadosparticipantes')
        ->with('participantes',$lista)
        ->with("data",$infoo);
      
      }
      public function dashboard()
      {
        return view("admin.dashboard");
      }
      public function checkdepositos($code)
      {
          $estracto=\DB::table('estracto')
          ->where("code",$code)
          ->get();
          return \Response::json(array("data"=>$estracto)); 
      }
      public function participanteslist($type)
      {

        if($type!="all")
        {
          $participantes = \DB::table('participante')
        ->join("deposito","participante.id",'=','deposito.idPa')
        ->join("Universidad",'Universidad.id','=','participante.idUni')
        ->join('carrera','carrera.id','=','participante.idCa')
        ->where("deposito.estado",$type)
        ->select("participante.*","Universidad.nombre as unombre","carrera.nombre as cnombre")
        ->distinct()
        ->orderBy('id', 'desc')
        ->get();
          
        }else
        {
          $participantes = \DB::table('participante')
        ->join("Universidad",'Universidad.id','=','participante.idUni')
        ->join('carrera','carrera.id','=','participante.idCa')
        ->select("participante.*","Universidad.nombre as unombre","carrera.nombre as cnombre")
        ->distinct()
        ->orderBy('id', 'desc')
        ->get();
        }
        $sumatotal=0;
        $total=0;
        foreach($participantes as $item) 
        {
          $total++;
          $deposito=\DB::table("deposito")
          ->where("deposito.idPa",$item->id)
          ->get();
          if(count($deposito)==0)
          {
            $item->dep=false;
          }else{
            $item->dep=true;
          }
          foreach($deposito as $dd)
          {
            $sumatotal+=$dd->monto;
          }
          $item->depo=$deposito;
        }
        return \Response::json(array("participante"=>$participantes,"stats"=>array("total"=>$total,"monto"=>$sumatotal)));
      }
      public function buscar($key)
      {
        $participantes = \DB::table('participante')
        ->join("Universidad",'Universidad.id','=','participante.idUni')
        ->join('carrera','carrera.id','=','participante.idCa')
        ->where("participante.ci",$key)
        ->select("participante.*","Universidad.nombre as unombre","carrera.nombre as cnombre")
        ->distinct()
        ->orderBy('id', 'desc')
        ->get();
        if(count($participantes)==0)
        {
          $participantes = \DB::table('participante')
        ->join("Universidad",'Universidad.id','=','participante.idUni')
        ->join('carrera','carrera.id','=','participante.idCa')
        ->where("participante.emails",'LIKE','%'.$key.'%')
        ->select("participante.*","Universidad.nombre as unombre","carrera.nombre as cnombre")
        ->distinct()
        ->orderBy('id', 'desc')
        ->get();
          //depositos
          if(count($participantes)==0)
          {
            $depositos=\DB::table("deposito")
            ->where('deposito.codigo',$key)
            ->first();
            $participantes = \DB::table('participante')
            ->join("Universidad",'Universidad.id','=','participante.idUni')
            ->join('carrera','carrera.id','=','participante.idCa')
            ->where("participante.id",$depositos->idPa)
            ->select("participante.*","Universidad.nombre as unombre","carrera.nombre as cnombre")
            ->distinct()
            ->orderBy('id', 'desc')
            ->get();
          } 
        }
        $sumatotal=0;
        $total=0;
        foreach($participantes as $item) 
        {
          $total++;
          $deposito=\DB::table("deposito")
          ->where("deposito.idPa",$item->id)
          ->get();
          if(count($deposito)==0)
          {
            $item->dep=false;
          }else{
            $item->dep=true;
          }
          foreach($deposito as $dd)
          {
            $sumatotal+=$dd->monto;
          }
          $item->depo=$deposito;
        }
        return \Response::json(array("participante"=>$participantes,"stats"=>array("total"=>$total,"monto"=>$sumatotal)));
        
      }
      public function ParticipantesProceso()
      {
        $participantes = \DB::table('participante')
        ->join("deposito","participante.id",'=','deposito.idPa')
        ->join("Universidad",'Universidad.id','=','participante.idUni')
        ->join('carrera','carrera.id','=','participante.idCa')
        ->where("deposito.estado","proceso")
        ->select("participante.*","deposito.estado as destado","Universidad.nombre as unombre","carrera.nombre as cnombre","deposito.monto","deposito.created_at as fechadep")
        ->orderBy('id', 'desc')
        ->get();
        
        //return json_encode(array("participantes"=>$participantes));
        $cantidad=0;
        $sumdinero=0;
        foreach($participantes as $item)
        {
          $cantidad++;
          $sumdinero+=$item->monto;

        }
         $stats=array("cantidad"=>$cantidad,"dinero"=>$sumdinero);
        $data[]=(object)$stats;

        return view('participantes.resultadosparticipantes')
        ->with('participantes',$participantes)
        ->with("data",$data);;
      
      }
      public function ParticipantesObservados()
      {

        $participantes = \DB::table('participante')
        ->join("deposito","participante.id",'=','deposito.idPa')
        ->join("Universidad",'Universidad.id','=','participante.idUni')
        ->join('carrera','carrera.id','=','participante.idCa')
        ->where("deposito.estado","observado")
        ->select("participante.*","deposito.estado as destado","Universidad.nombre as unombre","carrera.nombre as cnombre","deposito.monto","deposito.created_at as fechadep")
        ->orderBy('id', 'desc')
        ->get();
        //Estadistica
        $cantidad=0;
        $sumdinero=0;
        foreach($participantes as $item)
        {
          $cantidad++;
          $sumdinero+=$item->monto;

        }
        $stats=array("cantidad"=>$cantidad,"dinero"=>$sumdinero);
        $data[]=(object)$stats;

           return view('participantes.resultadosparticipantes')
           ->with('participantes',$participantes)
           ->with("data",$data);
      
      
      }
      public function ParticipantesInscritos()
      {
        $participantes = \DB::table('participante')
        ->join("deposito","participante.id",'=','deposito.idPa')
        ->join("Universidad",'Universidad.id','=','participante.idUni')
        ->join('carrera','carrera.id','=','participante.idCa')
        ->where("deposito.estado","corecto")
        ->select("participante.*","deposito.estado as destado","Universidad.nombre as unombre","carrera.nombre as cnombre","deposito.monto","deposito.created_at as fechadep")
        ->orderBy('id', 'desc')
        ->get();
        $cantidad=0;
        $sumdinero=0;
        foreach($participantes as $item)
        {
          $cantidad++;
          $sumdinero+=$item->monto;

        }
        $stats=array("cantidad"=>$cantidad,"dinero"=>$sumdinero);
        $data[]=(object)$stats;
         
          return view('participantes.resultadosparticipantes')
          ->with('participantes',$participantes)
          ->with('data',$data);
      
       
      }
      public function Agreditacion($id){
        $participante = \DB::table('participante')
                ->where('participante.id',$id)
                ->leftJoin('deposito', 'participante.id', '=', 'deposito.idPa')
                ->leftJoin('carrera', 'participante.idCa', '=', 'carrera.id')
                ->leftJoin('Universidad', 'participante.idUni', '=', 'Universidad.id')
                ->leftJoin('Paises', 'participante.idPais', '=', 'Paises.id')
                ->leftJoin('Ciudad', 'participante.idCi', '=', 'Ciudad.id')
                ->select('participante.id','nombres','apellidos','nick','ci','sexo','deposito.estado as destado','semestre','emails','deposito.codigo','deposito.monto',
                          'deposito.fecha','deposito.hora','deposito.depositante','deposito.ci_depositante','deposito.imgboleta',
                          'carrera.nombre as carrera',
                          'Universidad.nombre as universidad',
                          'Paises.nombre as pais',
                          'Ciudad.nombre as ciudad',
                          'participante.id as participante'
                        )
                ->get();
        return view('participantes.agreditacionparticipantes')->with('participante',$participante);
      }
      public function editParticipante()
      {
        $idp=\Input::get("id");
        $ci=\Input::get("ci");
        $email=\Input::get("email");
        $pass=\Input::get("password");
        $idUs=\Input::get("idUs");
        $participante=\DB::table("participante")->where("id",$idp)->first();
       \DB::table("participante")
        ->where("id",$idp)
        ->update(array("emails"=>$email,"ci"=>$ci));
       //\Hash::make(\Input::get('password'));
       if($pass=="")
       {
        \DB::table("users")
        ->where("id",$idUs)
        ->update(array("email"=>$email));
        $data = array(
                    'ci'=>$ci,
                    'nombre' => $participante->nombres." ".$participante->apellidos,
                    'email' => $email,
                    'password'=>'',
                    "obs"=>"Su password no ha sufrido modificaciones."
                );
       }else
       {
        \DB::table("users")
        ->where("id",$idUs)
        ->update(array("email"=>$email,"password"=>\Hash::make($pass)));
        $data = array(
                    'ci'=>$ci,
                    'nombre' => $participante->nombres." ".$participante->apellidos,
                    'email' => $email,
                    'password'=>$pass,
                    'obs'=>""
                );
       }
       
        \Mail::send('contacto.reenvio',$data, function($message)use ($email)
        {
            $message->from('spyatorio@gmail.com', 'CCBOL2015');
            $message->to($email);
            $message->subject('CCBOL2015 Nuevas Credenciales');
        });
        return \Response::json(array("status"=>true));
      }
      public function AgreditarParticipante(Request $request){
        $idp=\Input::get("id");
        $code=\Input::get("code");
        //return $code;
        if($code!=0)
        {
          \DB::table("estracto")
          ->where("code",$code)
          ->update(array("estado"=>true));  
        }
        \DB::table("deposito")
        ->where("idPa",$idp)
        ->update(array("estado"=>"correcto"));

        //id del participante

        $participante=\DB::table("participante")->where("id",$idp)->first();

        //ENVIAMOS EL CORREO CONFIRMANDO QUE SU CUENTA SE AVALO
        if($participante->emails!="admin")
        {
          $data = array(
                    'name' => $participante->nombres." ".$participante->apellidos,
                    'url' => "http://".$_SERVER['HTTP_HOST']."/verificar"
                );
          \Mail::send('contacto.confirmacion',$data, function($message)use ($participante)
          {
              $message->from('spyatorio@gmail.com', 'CCBOL2015');
              $message->to($participante->emails);
              $message->subject('ACREDITACION CCBOL2015 CORRECTA');
          });
        }
        

        return \Response::json(array("status"=>true));
      }

      public function ObservarParticipante(Request $request){
        
        $idp=\Input::get("id");
        $nombre=\Input::get("nombre");
        $email=\Input::get("email");
        $msn=\Input::get("message");

        \DB::table("deposito")
        ->where("idPa",$idp)
        ->update(array("estado"=>"observado","obs"=>$msn));
          $data = array(
                  "nombre"=>$nombre,
                  "mensaje"=>$msn
                );
        \Mail::send('contacto.observacion',$data, function($message)use ($email)
        {
            $message->from('spyatorio@gmail.com', 'CCBOL2015');
            $message->to($email);
            $message->subject('DEPOSITO OBSERVADO');
        });
        return json_encode(array("succes"=>true));
        //return back()->withInput();
      }
      public function paises(){
        $paises = \DB::table('Paises')->get();
        return json_encode(array("idPais"=>\Session::get('idPa'),"pais"=>$paises));
      }
      public function ciudades(){
        $pais = \Input::get('pais');
        $ciudades =  \DB::table('Ciudad')
                ->where('idPais',$pais)
                ->get();
        return $ciudades;
      }

      public function universidades(){
        $universidades = \DB::table('Universidad')->get();
        return json_encode(array("idUni"=>\Session::get('idUni'),"uni"=>$universidades));
      }
      public function register()
      {
        $id_usuario = $username=\Auth::user()->id;
        $p = new ModelParticipantes;

        $p->nombres=\Input::get('nombres');
        $p->apellidos=\Input::get('apellidos');
        $p->nick="Guest";
        $p->ci=\Input::get('ci');
        $p->semestre=\Input::get('semestre');
        $p->sexo=\Input::get('sexo');
        $p->emails="admin";
        $p->idUni=\Input::get('universidad');
        $p->idCa=\Input::get('carrera');
        $p->idPais=1;
        $p->idCi=29;
        $p->remember_token=\Input::get('_token');
        /*fila de usuario*/
        $p->idUs=$id_usuario;
        $p->save();
        return \Response::json(array("msn"=>true));
      }
      public function carreraslist($uni)
      {
        $carreras =  \DB::table('carrera')
                ->where('idUni',$uni)
                ->get();
        return \Response::json(array("carreras"=>$carreras));
      }
      public function carreras(){
        $universidad = \Input::get('universidad');
        $carreras =  \DB::table('carrera')
                ->where('idUni',$universidad)
                ->get();
        return $carreras;
      }

      public function BajaSistema($id){
        \DB::table('participante')
            ->where('id', $id)
            ->update(['participacion' => FALSE]);
        return back()->withInput();
      }

      public function VolverSistema($id){
        \DB::table('participante')
            ->where('id', $id)
            ->update(['participacion' => TRUE]);
        return back()->withInput();
      }

      public function partipantesbaja(){
         $participantes = \DB::table('participante')
             ->select('id','nombres','apellidos','ci')
             ->where('participacion',False)
             ->get();
         return view('participantes.participantesbaja')->with('participantes',$participantes);
      }

      public function Verficarregistroindex(){
        $mensaje = 'null';
        return view('participantes.verificarregistro')->with('mensaje',$mensaje);
      }
      public function Verficarregistro(){
        $ci = \Input::get('ci');
        $confirmacion = \DB::table('participante')
                          ->where('ci',$ci)
                          ->get();
        if (sizeof($confirmacion)==0) {
          $mensaje = 'NO';
        }
        else{
          $mensaje = 'SI';
        }
        return view('participantes.verificarregistro')->with('mensaje',$mensaje);
      }
}
