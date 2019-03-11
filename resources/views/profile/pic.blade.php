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
                    <hr>
                    <form action="/uploadPhoto" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="token" value="{{csrf_token()}}">
                        <input type="file" name="pic" class="form-control">    
                        <input type="submit" name="btn" class="btn btn-success">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
