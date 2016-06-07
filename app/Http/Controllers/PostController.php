<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GrahamCampbell\Markdown\Facades\Markdown;

use App\Http\Requests;
use App\Post;
use App\Category;
use App\Services\PostService;

class PostController extends Controller
{

  //inject PostService
  public function __construct(PostService $PostService){

    $this->postService = $PostService;

  }

  public function store(Request $request) {
    $this->postService->store($request);
    return redirect('/admin');
  }

  public function index(){
    // $posts = Post::where('draft', 1)->orderBy('updated_at', 'DESC');
    $posts = Post::with('categories')->paginate(8);
    $categories = Category::all();
    return view('blog.index', compact('posts','categories'));
  }

  public function getPost(Post $post) {
    $formattedBody = Markdown::convertToHtml($post->body);
    $categories = Category::all();
    return view('blog.post', compact('post','categories','formattedBody'));
  }

  public function getCategory(Category $cat){
    $posts = Category::find($cat->id)->posts()->paginate(8);
    $categories = Category::all();
    return view('blog.index', compact('posts','cat','categories'));
  }



}
