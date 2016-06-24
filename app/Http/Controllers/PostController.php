<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GrahamCampbell\Markdown\Facades\Markdown;

use Session;
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
    Session::flash('flash_message', 'Success');
    return redirect('/admin');
  }

  public function index(){
    // $posts = Post::where('draft', 1)->orderBy('updated_at', 'DESC');
    $posts = Post::with('categories')->paginate(9);
    $categories = Category::all();
    return view('blog.index', compact('posts','categories'));
  }

  public function getPost($slug) {
    $post = Post::where('slug', $slug)->firstOrFail();
    $formattedBody = Markdown::convertToHtml($post->body);
    $categories = Category::all();
    return view('blog.post', compact('post','categories','formattedBody'));
  }

  public function getCategory(Category $cat){
    $posts = Category::find($cat->id)->posts()->paginate(6);
    $categories = Category::all();
    return view('blog.index', compact('posts','cat','categories'));
  }

  public function next($post){
    $post = Post::where('id', '>', $post)->first();
    if(!$post){
      $post = Post::orderBy('id','ASC')->first();
    }
    $formattedBody = Markdown::convertToHtml($post->body);
    $categories = Category::all();
    return view('blog.post', compact('post','categories','formattedBody'));
  }

  public function prev($post){
    $post = Post::where('id', '<', $post)->orderBy('id','DESC')->first();
    if(!$post){
      $post = Post::orderBy('id','DESC')->first();
    }
    $formattedBody = Markdown::convertToHtml($post->body);
    $categories = Category::all();
    return view('blog.post', compact('post','categories','formattedBody'));
  }

  public function edit($id){
    $post = Post::where('id', $id)->firstOrFail();
    $categories = Category::all();
    return view('admin.edit_post', compact('post','categories'));
  }

  public function patch($id,Request $request){
    $post = Post::where('id', $id)->firstOrFail();
    $this->postService->patch($post,$request);
    Session::flash('flash_message', 'Success');
    return redirect('/admin');
  }



}
