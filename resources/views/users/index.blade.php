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
@endsection
