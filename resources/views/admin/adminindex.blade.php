@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Hi {{ Auth::user()->name }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Welcome to your profile!<br>
                    <img src="/img/{{ Auth::user()->pic }}" width="80px" height="80px"><br>
                    <a href="/changephoto/{id}">Change image</a>
                </div>
                <hr>
                <div class="card-body">
                    My posts
                </div>
            </div>
        </div>
    </div>
    
</div>
<div>
    <a href="/admin/articles/add"><button class="btn btn-primary">Add new article</button></a>
    <table class="table">
        <tr>
            <th>Id</th>
            <th>User</th>
            <th>Category</th>
            <th>Title</th>
            <th>Description</th>
            <th>Full_text</th>
            <th>Image</th>
            <th>Author</th>
            <th>Posted</th>
        </tr>
        @foreach($articles as $article)
            <tr>     
                <td>{{$article->id}}</td>             
                <td>{{$article->user->name}}</td>
                <td>{{$article->category->title}}</td>             
                <td>{{$article->title}}</td>
                <td>{{$article->short_text}}</td> 
                <td>{{$article->full_text}}</td>
                @if($article->image)
                       <td> <img src="/img/articles/{{$article->image}}" width="70"></td>
                @endif
                <td>{{$article->author}}</td> 
                <td>{{$article->created_at}}</td>
                <td>
                    <a href="/admin/articles/edit/{{$article->id}}">Edit</a>/
                    <a href="/admin/articles/delete/{{$article->id}}">Delete</a>
                </td>
                <td>
                    <a href="/comment/{{$article->id}}">Add comment</a>/

                </td>
            </tr>    
          
         @endforeach   
    </table>
</div>
@endsection
