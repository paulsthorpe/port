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

    /**
     * Inject Post Service
     * PostController constructor.
     * @param PostService $PostService
     */
    public function __construct(PostService $PostService)
    {

        $this->postService = $PostService;

    }

    /**
     * return all post to post index page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $posts = App\Post::orderBy('updated_at', 'DESC')->get();
        return view('admin.all_posts', compact('posts'));
    }

    /**
     * get post request and persist post to db
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function save(Request $request)
    {
        $this->postService->store($request);
        Session::flash('flash_message', 'Success');
        return redirect('/admin');
    }


    /**
     * serve add post form
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addPost()
    {
        $categories = App\Category::all();
        return view('admin.add_post', compact('categories'));
    }


    /**
     * recieve patch request and update post
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function patch(Request $request)
    {
        $this->postService->patch($request);
        Session::flash('flash_message', 'Success');
        return redirect('/admin');
    }

    /**
     * delete post
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Request $request)
    {
        $post = Post::where('id', $request->post_id)->first();
        $post->delete();
        Session::flash('flash_message', 'Success');
        return redirect('/admin');
    }


}
