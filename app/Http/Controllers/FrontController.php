<?php
namespace App\Http\Controllers;
use View;
use App\Post;
use App\User;
use App\Category;
use App\Http\Requests;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    private $paginate = 10;
    public function index()
    {
        $title = "home";
       
        $posts = Post::with('category', 'user', 'tags')->opened()->paginate($this->paginate);
        $this->paginate = array(
                'limit'=>10
            );
        
        return view('front.index', compact('posts', 'title', 'best'));
    }
    public function show($id)
    {
        $title = "page single";
        $post = Post::findOrFail($id);
        
        return view('front.show', compact('post', 'title'));
    }
    public function showPostByUser($id)
    {
        $user = User::findOrFail($id);
        $user = User::find($id);
        $posts = $user->posts->posts()->published()->get();
        $name = $user->name;
        $title = "Utilisateur : {$user->name}";
        
        return view('front.user', compact('posts', 'title', 'name'));
    }
    public function showPostByCat($id)
    {
        $category = Category::findOrFail($id);
        $title = $category->title;
        $posts = $category->posts()->opened()->get();
        
        return view('front.category', compact('posts', 'title'));
    }
}