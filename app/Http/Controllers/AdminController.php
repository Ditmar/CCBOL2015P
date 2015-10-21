<?php
//BLADE LIGER
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Post;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function edit($id){
        $idusuario=\Auth::user()->id;
        $idpostusuario=\DB::table('posts')
                  ->select('id_usuario')
                  ->where('id',$id)
                  ->get();
        foreach ($idpostusuario as $i) {
          $idpostU = $i->id_usuario;
        }
        if ($idpostU != $idusuario) {
          return "Usted no puede editar este articulo";
        }


        $post = Post::find($id);
        return view('login.editarpublicacion')->with('post',$post);
    }
    public function refresh(Request $request){
      $rules = array(
            'title'  => 'required|max:250|min:5',
            'content'     => 'required|min:5',
            'tags'   => 'required|max:100|min:4',
            'photo' => 'max:1500|image',
        );
        //$v= \Validator::make($data, $rules);
        //return var_dump($v);
        //dd($v->errors());
       /* if ($v->fails()) {
            return redirect()->back()
            ->withError($v->errors())
            ->withInput(\Request::except('password'));
        }*/

        $this->validate($request, $rules);


       $rca=\Input::get('rca');
       $post =\DB::table('posts')
                        ->select('photo')
                        ->where('id', $rca)
                        ->get();//nombre de photo anterior para elminar
       //$post = \DB::select('select photo from posts where id_usuario = :id', ['id' => $rca]);
        foreach ($post as $p) {
            $photoedit    = $p->photo;//
        }

       $file = $request->file('photo');
       if($file != null){
              //return "no hay imagen";
              //return var_dump($file);
              //obtenemos el nombre del archivo
              $nombre = Carbon::now()->timestamp.$file->getClientOriginalName();//guardar imagen
              //indicamos que queremos guardar un nuevo archivo en el disco local
              \Storage::disk('local')->put($nombre,  \File::get($file));
              //\Storage::move($nombre, 'preinscripciones/'.$nombre);  // mover imagenes a otro direcctorio
              \Storage::delete($photoedit);//eliminar imagen anterior
              $p = Post::find($rca);

              $p->title=\Input::get('title');
              $p->content=\Input::get('content');
              $p->tags=\Input::get('tags');
              $p->photo=$nombre;
              $p->resluggify();

              $p->save();
        }
        else{
          $p = Post::find($rca);

          $p->title=\Input::get('title');
          $p->content=\Input::get('content');
          $p->tags=\Input::get('tags');
          //$p->photo=$nombre;
          $p->remember_token=\Input::get('_token');
          $p->resluggify();

          $p->save();

        }
        return \Redirect::route('home');

    }

    public function nuevo(){
        return view('login.nuevapublicacion');
    }

    public function crear(Request $request){

        $rules = array(
            'title'  => 'required|max:250|min:5',
            'content'     => 'required|min:5',
            'tags'   => 'required|max:100|min:4',
            'photo' => 'required|max:1500|image',
        );
        //$v= \Validator::make($data, $rules);
        //return var_dump($v);
        //dd($v->errors());
       /* if ($v->fails()) {
            return redirect()->back()
            ->withError($v->errors())
            ->withInput(\Request::except('password'));
        }*/

        $this->validate($request, $rules);
        //return "fail";
        $user=\Auth::user()->id;

        //obtenemos el campo file definido en el formulario
       $file = $request->file('photo');

       //obtenemos el nombre del archivo
       $nombre = Carbon::now()->timestamp.$file->getClientOriginalName();
       //return $nombre;
       //indicamos que queremos guardar un nuevo archivo en el disco local
       \Storage::disk('local')->put($nombre,  \File::get($file));
        //return $nombre;
        $p = new Post;

        $p->id_usuario=$user;
        $p->title=\Input::get('title');
        $p->content=\Input::get('content');
        $p->tags=\Input::get('tags');
        $p->photo=$nombre;
        $p->remember_token=\Input::get('_token');
        $p->save();

        //$alert=\Session::flash('alert','Tu publicacion fue creada con exito');
        //return \Redirect::route('home')->with('alert',$alert)->with('users',$users);
        return \Redirect::route('home')->with('alert','Publicacion creada con existo');
    }
    public function delete($id){
        $idusuario=\Auth::user()->id;
        $idpostusuario=\DB::table('posts')
                  ->select('id_usuario')
                  ->where('id',$id)
                  ->get();
        foreach ($idpostusuario as $i) {
          $idpostU = $i->id_usuario;
        }
        if ($idpostU != $idusuario) {
          return "Usted no puede Eliminar este articulo";
        }

        $post = Post::find($id);
        $post->delete();
        \Storage::delete($post->photo);//eliminamos la photo de la publiacion
        return \Redirect::route('home');
    }


}
