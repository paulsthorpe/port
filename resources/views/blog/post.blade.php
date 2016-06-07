@extends('blog.master')
<?php use GrahamCampbell\Markdown\Facades\Markdown; ?>
@section('content')
<div class="blog-post">

  <nav class="blog-nav">
    <ul class="nav-elements">
      <li><a href="/">Home</a></li>
      <li><a href="/blog">Blog Index</a></li>
      <li><a href="#contact">Contact Me</a></li>
    </ul>
  </nav>

<section class="post-splash" style="background-image: url('/blog_images/{{$post->image}}')">
  <div class="post-meta">

    <a href="/blog/{{($post->id-1)}}"><button class="btn btn-centerX"><i class="fa fa-chevron-left"></i> &nbsp Previous Article</button></a>
    <div class="timestamp">
      <i class="fa fa-calendar"></i>
      {{$post->created_at->format('m-d-Y h:i:s A')}}
    </div>
    <a href="/blog/{{($post->id+1)}}"><button class="btn btn-centerX">Next Article <i class="fa fa-chevron-right"></i> </button></a>
  </div>
</section>
<section class="post-content">
  <div class="row">
    <div class="content col-lg-8 col-sm-12 col-lg-offset-1">
        <h1>{{$post->title}}</h1>
        <?php echo $formattedBody; ?>
    </div>
    <div class="sidebar col-lg-2">
      <!-- <div class="recent">
        <h2>Recent Posts</h2>
        <ul>
          <li><a href="#">Post 1</a></li>
          <li><a href="#">Post 1</a></li>
          <li><a href="#">Post 1</a></li>
          <li><a href="#">Post 1</a></li>
          <li><a href="#">Post 1</a></li>
        </ul>
      </div> -->
      <div class="categories">
        <h2>Blog Categories</h2>
        <ul>
          @foreach($categories as $category)
          <li><a href="/blog/category/{{$category->id}}">{{$category->title}}</a></li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
</section>
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
