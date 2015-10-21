<?php
//BLADE LIGER
namespace App\Http\Controllers;

/*esto para blog ccbol 2015*/
use App\Post;
/*-------------------------*/
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexblog()
    {
        //return "hola";
        $posts = \DB::table('posts')
                ->leftJoin('users', 'posts.id_usuario', '=', 'users.id')
                ->select('title','content','tags','photo','slug','username','posts.created_at','posts.updated_at')
                ->orderBy('posts.updated_at','desc')
                ->paginate(3);
                //->get();
        //return var_dump($posts);
        //$posts = Post::all()->orderBy('id','asc')->;
        //$posts = \DB::table('posts')->orderBy('id','desc')->paginate(3);
        //$posts = \DB::table('posts')->orderBy('id','desc')->get();
        return view('blog.welcomeblog')->with('posts', $posts);
    }

    public function article($slug)
    {
        //$slug = Post::findBySlug($slug);
        
        $post = \DB::table('posts')
                ->where('slug',$slug)
                ->leftJoin('users', 'posts.id_usuario', '=', 'users.id')
                ->select('title','content','tags','photo','slug','username','posts.updated_at')
                ->get();
        foreach ($post as $t) {
            $title = $t->title;
        }
        //return $title;
        //return var_dump($posts);
        return view('blog.article')->with('post',$post)->with('title',$title);
    }
    public function tags($tags){
        $posts = Post::where('tags','LIKE','%'.$tags.'%')->get();
        //return var_dump($posts);
        return view('blog.tagsblog')->with('posts',$posts);
    }

}
