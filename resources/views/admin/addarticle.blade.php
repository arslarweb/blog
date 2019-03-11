@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Hi {{ Auth::user()->name }}</div>

               @foreach($errors->all() as $error)
                   {{$error}}<br>
                @endforeach

                <div class="container">
                    <form action="/admin/articles/save" method="post" enctype="multipart/form-data">
                        @csrf
                        <h3>User</h3><br>
                        <input type="text" name="user_id" style="margin-top:0.3px;"><br>
                        <h3>Title</h3><br>
                        <input type="text" name="title" style="margin-top:0.3px;"><br>
                        <h3>Category</h3><br>
                        <select name="category_id">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach
                        </select>
                        <h3>Short text</h3><br>
                        <textarea cols="40" rows="4" name="short_text"></textarea><br>
                        <h3>Text of the article</h3><br>
                        <textarea cols="60" rows="10" name="full_text"></textarea><br>
                        <h3>Author of the article</h3><br>
                        <input type="text" name="author"><br>
                        Image <input type="file" name="image"><br>
                        <br>
                        <input type="submit" name="save" value="save" class="btn btn-success">
                    </form>
                        <a href="/profile/{{ Auth::user()->name }}" class="btn btn-danger">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
