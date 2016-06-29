<!DOCTYPE html>
<head>
  <link rel="stylesheet" href="/css/app.css" charset="utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.12.0.min.js"></script>
  <link href='https://fonts.googleapis.com/css?family=Raleway:400,200,700' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>

    <title>The Online Portfolio of Paul Thorpe</title>
</head>

<body class="home">


<canvas id="canvasElement"></canvas>

  <nav class="header_nav">
    <ul class="nav_elements">
      <a href=""><li class="nav_element">Home</li></a>
      <!-- <a href=""> -->
        <li id="projects" class="nav_element">Projects
          <ul>
            <li><a href="http://bugwild.paul-webdev.com/">Bugwild</a></li>
            <li><a href="http://paul-webdev.com/">Restaurant Order System</a></li>
            <li><a href="http://timeclock.paul-webdev.com/">Timeclock</a></li>
            <li>
              <a href="https://github.com/paulsthorpe?tab=repositories">
                Github
              </a>
            </li>
          </ul>
        </li>
      <!-- </a> -->
      <a href="#contact"><li class="nav_element">Contact</li></a>
      <a href="/blog"><li class="nav_element">Blog</li></a>
    </ul>
  </nav>

  <div class="welcome">
  <p>Welcome!</p>
  <p class="welcome_message">
   <br>Hello! My name is Paul Thorpe and I love Web Development...and my family, fishing, craft beer, good food, good company...anyways... </p>
   <img src="images/me.png" alt="" class="me">
   <p class="welcome_message">I have a diverse skill set that is constantly increasing to ensure that I can handle most aspects of the web
     development process. I also have a serious addiction to learning. HTML5, CSS3, Bootstrap, Javascript, Jquery, PHP and MYSQL/MariaDB are all tools I use on a regular basis, but if a problem
     comes along that requires learning a new skill, I will pick it up with enthusiasm. <br></br> From responsive front-end designs to server-side architecture,<br>
     I LOVE IT ALL</p>

  <div class="social">
    <div class="social_wrapper">
    <a href="https://www.facebook.com/profile.php?id=100009881742914"><i class="fa fa-facebook-square"></i></a>
    </div>
    <div class="social_wrapper">
    <a href="https://www.instagram.com/paul__thorpe/"><i class="fa fa-instagram"></i></a>
    </div>
    <div class="social_wrapper">
    <a href="https://www.linkedin.com/in/paul-thorpe-8a7111101"><i class="fa fa-linkedin-square"></i></a>
    </div>
  </div>
  </div>




  <div class="skills">
    <div class="info_wrapper">
      <p class="skills_header">My Skills</p>
      <p>I aim to be fully capable of handling any task involved in the process of creating web sites or web applications (My Favorite!).
        To fulfill that desire I am constantly adding new tools to my arsenal. I use HTML, CSS/Sass, Javascript/Jquery and recently
        <a href="http://angular.io"><strong>Angular 2</strong></a> to make things organized and sexy on the client facing side. Per
         the project you could find me using Twitter's <a href="http://getbootstrap.com"><strong>Bootstrap</strong></a>, <a href="http://susy.oddbird.net/">
        <strong>Susy</strong></a> or my own custom grids to create responsive layouts that look great on any device.</p>
      <br></br>
      <p>If a database is required for the project I typically employ MYSQL or Maria DB to store all data, and use PHP to access data safely and efficiently.
        I use modern PHP MVC frameworks like <a href="http://laravel.com"><strong>Laravel</strong></a> and Object Oriented practices to
        make sure applications are efficient, reliable, easily manipulated and scalable. I love a great challenge, and get the most pleasure
        from projects heavily reliant on the server and data. Not too much in life gives me more pleasure than creating/working
        with APIs, creating custom content management systems (Sorry Wordpress!), or organzing and coordinating data flow. PHP is a
        reliable and time tested technology. While it may not carry the most scene hype, it is a solid foundation and is used in an estimated
        82% of websites today. <a href="http://w3techs.com/technologies/details/pl-php/all/all"><strong>More on that</strong></a></p>
    </div>

  </div>

  <div class="blog">
    <div class="blog-headline">
      <h1>From My Blog</h1>
      <h3>Project releases, web development wisdom and news</h3>
    </div>
    @foreach($posts as $post)
    <div class="post-entry">
      <div class="post-date">
        <h1 class="day">{{Carbon\Carbon::parse($post->created_at)->format('d')}}</h1>
        <p class="m-d">{{Carbon\Carbon::parse($post->created_at)->format('M Y')}}</p>
      </div>
      <div class="post-details">
        <h2><a data-text="{{$post->title}}" href="/blog/{{$post->id}}">{{$post->title}} &nbsp <i class="fa fa-chevron-right"></i></a></h2>
        <p>{{substr($post->body,0,200)}}...</p>
      </div>
      <div style="clear:both;">
      </div>
    </div>
    @endforeach
  </div>


<div id="contact" class="contact">
  <div class="contact_info_wrapper">
    <p class="contact_header">Get In Touch</p>
    <p>Have a website or project concept for personal or business use that you want to see become a reality? Need help updating an old
      website or want to add new features?
    <br></br>Just want to chat about new and exciting web technologies?<br></br>
    Have a hole in your company that you are looking to fill with a responsible,
    passionate developer looking to grow and adhere to best practices? I am available for full time employment, or contract work!</p>
  </div>
  <div class="social_contact">
    <a href="https://www.facebook.com/profile.php?id=100009881742914"><i class="fa fa-facebook-square"></i></a>
    <a href="https://www.instagram.com/paul__thorpe/"><i class="fa fa-instagram"></i></a>
    <a href="https://www.linkedin.com/in/paul-thorpe-8a7111101"><i class="fa fa-linkedin-square"></i></a>
    <a href="mailto:paulsthorpe@gmail.com"><i class="fa fa-envelope"></i></a>
  </div>
</div>



</body>

<script src="/js/all.js"></script>

<script type="text/javascript">
  $('.nav_element:nth-child(2)').mouseover(function(){
    $(this).find('ul').css('max-height','200px');
  }).mouseleave(function(){
    $(this).find('ul').css('max-height','0px');
  });

  function landBlogExerpts(){
    var scrollFactor = $(window).scrollTop();
    var excerpts = $('.post-entry').length;
    var entries = [];
    for (var i = 0; i < excerpts; i++){
      entries[i] = $('.post-entry').eq(i).offset().top - ($(window).height() / 1.2);
    }

    for (var i = 0; i < excerpts; i++){
      if (scrollFactor > entries[i]){
        $('.post-entry').eq(i).addClass('is-showing');
      }
    }
  }
  $(window).scroll(function(){
    landBlogExerpts();
  });

</script>



<!--
<div class="gearLoadSpace">
  <div class="gearContainer">
    <figure class="gear-sm"><img src="images/gear-sm.png" alt="" /></figure>
    <figure class="gear-md"><img src="images/gear-md.png" alt="" /></figure>
    <figure class="gear-sm"><img src="images/gear-sm.png" alt="" /></figure>
    <figure class="gear-md"><img src="images/gear-md.png" alt="" /></figure>
    <figure class="gear-sm"><img src="images/gear-sm.png" alt="" /></figure>
    <figure class="gear-md"><img src="images/gear-md.png" alt="" /></figure>
  </div>
</div> -->
