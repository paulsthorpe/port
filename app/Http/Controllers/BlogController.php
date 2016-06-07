<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GrahamCampbell\Markdown\Facades\Markdown;
use App\Http\Requests;
use App\Post;
use App\Category;

class BlogController extends Controller
{
    public function index(){
      $posts = Post::where('draft', 1)->orderBy('updated_at', 'DESC');
      $categories = Category::all();
      return view('blog.index', compact('posts','categories'));
    }

    public function getPost(Post $post) {
      $foo = Markdown::convertToHtml($post->body);
      $categories = Category::all();
      return view('blog.post', compact('post','categories', 'foo'));
    }
}
