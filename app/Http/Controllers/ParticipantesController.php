<?php
//sdddf
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
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

        foreach($participantes as $item) 
        {
          $deposito=\DB::table("deposito")
          ->where("deposito.idPa",$item->id)
          ->get();
          if(count($deposito)==0)
          {
            $item->dep=false;
          }else{
            $item->dep=true;
          }
          $item->depo=$deposito;
        }
        return \Response::json(array("participante"=>$participantes));
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
      public function AgreditarParticipante(Request $request){
        $idp=\Input::get("id");
        \DB::table("deposito")
        ->where("idPa",$idp)
        ->update(array("estado"=>"correcto"));
        //id del participante
        echo "-> ".$idp;

        $participante=\DB::table("participante")->where("id",$idp)->first();

        //ENVIAMOS EL CORREO CONFIRMANDO QUE SU CUENTA SE AVALO
        $data = array(
                    'name' => $participante->nombres." ".$participante->apellidos,
                    'url' => "http://".$_SERVER['HTTP_HOST']."/verificar"
                );
        \Mail::send('contacto.confirmacion',$data, function($message)use ($participante)
        {
            $message->from('spyatorio@gmail.com', 'CCBOL2015');
            $message->to($participante->emails);
            $message->subject('ACREDITACION CCBOL2015');
        });

        return back()->withInput();
      }

      public function ObservarParticipante(Request $request){
        
        $idp=\Input::get("id");
        $nombre=\Input::get("nombre");
        $email=\Input::get("email");
        $msn=\Input::get("message");

        \DB::table("deposito")
        ->where("idPa",$idp)
        ->update(array("estado"=>"observado"));

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
