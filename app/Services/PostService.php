<?php
namespace App\Services;

use App\Post;
use GrahamCampbell\Markdown\Facades\Markdown;
use App\Category;


/*
|--------------------------------------------------------------------------
| PostService Class
|--------------------------------------------------------------------------
|
| 
| 
|
|
*/

class PostService
{


    public static function getPost($post)
    {

    }

    /**
     * get post request from controller and save post to db
     * @param $request
     */
    public static function save($request)
    {
        //instantiate new post
        $post = new Post;
        //assign data
        $post->title = $request->title;
        $post->body = $request->body;
        $post->tags = $request->tags;
        $post->slug = str_slug($post->title);
        //store image name to pass to image field
        $imageName = $request->file('image')->getClientOriginalName();
        //move imave to directory
        $file = $request->file('image')->move(public_path() . "/blog_images/", $imageName);
        //save image name
        $post->image = $imageName;
        //create new post
        $post->save();
        //if categories were applied attach them to the post
        if ($request->categories) {

            foreach ($request->categories as $cat) {
                $post->categories()->attach($cat);
            }//foreach

        }//if

    }//save method


    /**
     * get patch request from controller and update post
     * @param $request
     */
    public static function patch($request)
    {
        $post = Post::where('id', $request->post_id)->first();
        //assign data
        $post->title = $request->title;
        $post->body = $request->body;
        $post->slug = str_slug($post->title);
        //store image name to pass to image field, if image was uploaded
        if ($request->file('image')) {
            $imageName = $request->file('image')->getClientOriginalName();
            //move imave to directory
            $file = $request->file('image')->move(public_path() . "/blog_images/", $imageName);
            //save image name
            $post->image = $imageName;
        }
        //create new post
        $post->save();
        //if categories were applied attach them to the post after detaching previous
        if ($request->categories) {
            $post->categories()->detach();
            foreach ($request->categories as $cat) {
                $post->categories()->attach($cat);
            }//foreach
        }//if

    }//patch method

    public static function displayBanners($cat)
    {

    }


} //end Post class
