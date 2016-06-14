<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/css/app.css" charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.12.0.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,200,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="/css/monokai-sublime.css">
    <meta name="type" content="article">
    <meta name="article:published_time" content=" @yield('published_at')">
    <meta name="description" content=" @yield('tags') ">
    <script src="/js/highlight.pack.js"></script>
    <script>hljs.initHighlightingOnLoad();</script>
  </head>
  <body>
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          appId      : '243822392667219',
          xfbml      : true,
          version    : 'v2.6'
        });
      };

      (function(d, s, id){
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) {return;}
         js = d.createElement(s); js.id = id;
         js.src = "//connect.facebook.net/en_US/sdk.js";
         fjs.parentNode.insertBefore(js, fjs);
       }(document, 'script', 'facebook-jssdk'));
    </script>
    @yield('content')


  </body>
</html>
