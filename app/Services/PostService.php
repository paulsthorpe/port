<?php
namespace App\Services;
use App\Post;
use GrahamCampbell\Markdown\Facades\Markdown;
use App\Category;


/*
|--------------------------------------------------------------------------
| Post Class
|--------------------------------------------------------------------------
|
| Provides useful static functions to use throught the appliction to assist in
| storing, sorting and displaying blog post
|
|
*/

class PostService {



  /*
  |--------------------------------------------------------------------------
  | getPost
  |--------------------------------------------------------------------------
  |
  | Retrieve a single Post to send to post view
  |
  |
  |
  */

    public static function getPost($post) {

    }


    /*
    |--------------------------------------------------------------------------
    | store
    |--------------------------------------------------------------------------
    |
    | Retrieve http request and persists data to database
    |
    |
    |
    */

      public static function store($request) {
        //instantiate new post
        $post = new Post;
        //assign data
        $post->title = $request->title;
        $post->body = $request->body;
        $post->tags = $request->tags;
        $post->slug = str_slug($post_title);
        //store image name to pass to image field
        $imageName = $request->file('image')->getClientOriginalName();
        //move imave to directory
        $file = $request->file('image')->move(public_path()."/blog_images/", $imageName);
        //save image name
        $post->image = $imageName;
        //create new post
        $post->save();
        //if categories were applied attach them to the post
        if($request->categories){

          foreach($request->categories as $cat){
            $post->categories()->attach($cat);
          }//foreach

        }//if

      }//store method

      public static function patch($post,$request) {

        //assign data
        $post->id = $post->id;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->slug = str_slug($post->title);
        //store image name to pass to image field, if image was uploaded
        if($request->file('image')){
          $imageName = $request->file('image')->getClientOriginalName();
          //move imave to directory
          $file = $request->file('image')->move(public_path()."/blog_images/", $imageName);
          //save image name
          $post->image = $imageName;
        }
        //create new post
        $post->save();
        //if categories were applied attach them to the post after detaching previous
        if($request->categories){
          $post->categories()->detach();
          foreach($request->categories as $cat){
            $post->categories()->attach($cat);
          }//foreach

        }//if

      }//patch method

      public static function displayBanners($cat){

      }




  } //end Post class
