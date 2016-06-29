<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GrahamCampbell\Markdown\Facades\Markdown;
use App\Http\Requests;
use App\Post;
use App\Category;

class BlogController extends Controller
{
    /**
     * get all post with ublished status and serve blog index view
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
//    public function index()
//    {
//        $posts = Post::where('draft', 1)->orderBy('updated_at', 'DESC');
//        $categories = Category::all();
//        return view('blog.index', compact('posts', 'categories'));
//    }

    /**
     * get post by url slug and serve post view
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getPost($slug)
    {
        $post = Post::where('slug', $slug)->first();
        return $post;
        $foo = Markdown::convertToHtml($post->body);
        $categories = Category::all();
        return view('blog.post', compact('post', 'categories', 'foo'));
    }

    /**
     * get posts within selected category
     * @param Category $cat
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getCategory(Category $cat)
    {
        $posts = Category::find($cat->id)->posts()->paginate(6);
        $categories = Category::all();
        return view('blog.index', compact('posts', 'cat', 'categories'));
    }

    /**
     * get post with the next closest id lower than current post
     * @param $post
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function prev($post)
    {
        $post = Post::where('id', '<', $post)->orderBy('id', 'DESC')->first();
        if (!$post) {
            $post = Post::orderBy('id', 'DESC')->first();
        }
        $formattedBody = Markdown::convertToHtml($post->body);
        $categories = Category::all();
        return view('blog.post', compact('post', 'categories', 'formattedBody'));
    }

    /**
     * get post with next highest id than current post
     * @param $post
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function next($post)
    {
        $post = Post::where('id', '>', $post)->first();
        if (!$post) {
            $post = Post::orderBy('id', 'ASC')->first();
        }
        $formattedBody = Markdown::convertToHtml($post->body);
        $categories = Category::all();
        return view('blog.post', compact('post', 'categories', 'formattedBody'));
    }


    /**
     * get all post and serve blog index view
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        // $posts = Post::where('draft', 1)->orderBy('updated_at', 'DESC');
        $posts = Post::with('categories')->paginate(9);
        $categories = Category::all();
        return view('blog.index', compact('posts', 'categories'));
    }

}
