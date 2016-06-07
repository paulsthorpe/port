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
            <a href="/add_post/{{$post->id}}">
              <button>Edit this Post</button>
            </a>
          </td>
          <td>
            <a href="/blog/{{$post->id}}">
              <button>View this Post</button>
            </a>
          </td>
          <td>
            <a onclick='return confirm("Are you sure you want to delete $post->post_title?")' href="/admin/delete_post/{{$post->id}}">
              <button>Delete this Post</button>
            </a>
          </td>
          </tr>
          @endforeach
        </tbody>
      </table>
  </div>
</div>
@endsection
