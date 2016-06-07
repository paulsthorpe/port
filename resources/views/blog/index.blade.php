@extends('blog.master')

@section('content')
<div class="blog-index">

  <nav class="blog-nav">
    <ul class="nav-elements">
      <li><a href="/">Home</a></li>
      <li><a href="/blog">Blog Index</a></li>
      <li><a href="#contact">Contact Me</a></li>
    </ul>
  </nav>



  <?php

  $image = '/images/blogIndex.png';
  $title = 'Blog';
  $alt = 'There are no post to display';

  if(isset($cat)){
    switch($cat->title):
      case 'Angular2':
            $image = '/images/angularBanner.jpg';
            $title = $cat->title;
            break;
      case 'Laravel':
            $image = '/images/laravelBanner.png';
            $title = '';
            break;
      case 'Javascript':
            $image = '/images/jsBanner.jpg';
            $title = '';
            break;
      case 'PHP':
            $image = '/images/phpBanner.png';
            $title = '';
            break;
      case 'CSS':
            $image = '/images/cssBanner.jpg';
            $title = '';
            break;
    endswitch;
  }

  ?>



  <section class="banner" style="background-image: url({{$image}})">
    <h1>{{$title}}</h1>
  </section>
<div class="row">
  <section class="recent-posts col-lg-8 col-lg-offset-2">
    <div class="row">

        @foreach($posts as $post)
          <div class="post-container col-lg-4 col-md-6 col-sm-6 col-xs-12">
            <a href="/blog/{{$post->id}}">
              <div class="post">
                <div class="img" style="background-image: url('/blog_images/{{$post->image}}')">
                </div>
                <p>
                  {{$post->title}}
                </p>
            </a>
                <div class="tags">
                  <span>Date:</span>
                  {{$post->updated_at->format('m-d-Y')}}
                  <br>
                  <span>Categories:</span>
                  @foreach($post->categories as $category)
                  <a href="./blog/category/{{$category->id}}">{{$category->title}}</a>
                  @endforeach
                </div>
            </div>
          </div>
        @endforeach

    </div> <!--row-->

    <div class="row">
      <div class="pagination-area">
        {!! $posts->links() !!}
        <!-- <ul>
          <li><a href="#"><i class="fa fa-chevron-left"></i></a></li>
          <li><a href="#">01</a></li>
          <li><a href="#">02</a></li>
          <li><a href="#">03</a></li>
          <li><a href="#"><i class="fa fa-chevron-right"></i></a></li>
        </ul> -->
      </div>
    </div>


  </section>
  <div class="sidebar col-lg-2">
    <div class="categories">
      <h2>Blog Categories</h2>
      <ul>
        @foreach($categories as $category)
        <li><a href="../../blog/category/{{$category->id}}">{{$category->title}}</a></li>
        @endforeach
      </ul>
    </div>
  </div>
</div>



<div class="row">
  <div id="contact" class="contact">
    <div class="contact_info_wrapper">
      <p class="contact_header">Lets Get In Touch!</p>
      <p>Have a website or project concept for personal or business use that you want to see become a reality? Need help updating an old website or want to add new features?
      <br></br>Just want to chat about new and exciting web technologies?<br></br>Have a hole in your company that you are looking to fill with a responsible, passionate developer looking to grow and adhere to best practices? I am available for full time employment, or contract work!</p>
    </div>
    <div class="social">
      <a href="https://www.facebook.com/profile.php?id=100009881742914"><i class="fa fa-facebook-square"></i></a>
      <a href="https://www.instagram.com/paul__thorpe/"><i class="fa fa-instagram"></i></a>
      <a href="https://www.linkedin.com/in/paul-thorpe-8a7111101"><i class="fa fa-linkedin-square"></i></a>
      <a href="mailto:paulsthorpe@gmail.com"><i class="fa fa-envelope"></i></a>
    </div>
  </div>
</div>


</div>
@endsection
