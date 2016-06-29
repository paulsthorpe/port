@extends('admin.layout')

@section('content')
<div class="container-fluid" style="padding: 50px 0 0 50px;">
  <div class="row">
    <h1 class="page-header">All Post</h1>
      <table class="table table-hover">
        <thead>
        <tr>
          <th>Id</th>
          <th>Title</th>
          <th>Edit Post</th>
          <th>View Post</th>
          <th>Delete Post</th>
        </tr>
        </thead>
        <tbody>
          @foreach($posts as $post)
          <tr>
          <td>{{$post->id}}</td>
          <td>{{$post->title}}</td>
          <td>
            <a href="/admin/edit_post/{{$post->id}}">
              <button>Edit this Post</button>
            </a>
          </td>
          <td>
            <a href="/blog/{{$post->slug}}">
              <button>View this Post</button>
            </a>
          </td>
          <td>
            <form class="tn btn-primary" action="/admin/edit_post" method="post">
              {{ csrf_field() }}
              {{ method_field('DELETE') }}
              <input type="hidden" name="post_id" value="{{$post->id}}">
              <input type="submit" class="btn btn-primary" name="name" value="Delete Post" onclick='return confirm("Are you sure you want to delete $post->post_title?")'>
            </form>
          </td>
          </tr>
          @endforeach
        </tbody>
      </table>
  </div>
</div>
@endsection
