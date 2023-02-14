@extends('layouts.welcome')
@section('main_content')
    <div class="py-2 bg-dark border-bottom">
        <div class="container bg-dark text-white py-3 px-5">
            <div class="row feature">
                <div class="col-md-9">
                    <h1 class="feature-heading lh-5"> <p class="card-text ">{{$publication->pet}}</h1>
                    <hr class="feature-divider">
                    <img src="{{ asset($publication->img) }}" style="width:910px;height:555px">
                    <hr class="feature-divider">
                    <h2 class="card-text text-white">Description</h2>
                    <hr class="feature-divider">
                    <p class="lead">{{$publication->add_inf}}</p>
                </div>
                <div class="dropdown">
                    <button class="btn btn btn-outline-light dropdown-toggle" type="button"
                            data-toggle="dropdown">Contact
                        <span class="caret"></span></button>
                    <a href="{{ route('comment.create', $publication->id) }}" class="btn btn-outline-light">Comment</a>
                    <ul class="dropdown-menu bg-dark">
                        <li><a class="mx-2 text-white">{{$publication->email}}</a></li>
                        <li><a class="mx-2 text-white">{{$publication->phone}}</a></li>
                    </ul>
                </div>
            </div>
            <div class="row feature">
                <div class="col-md-9">
                    <hr class="feature-divider">
                    <h1 class="feature-heading lh-5"> <p class="card-text ">Comments</h1>
                    <hr class="feature-divider">
                        @foreach($publication->comments as $comment)
                            <h3 class="feature-heading lh-2"> <p class="card-text">{{$comment->name}}</h3>
                            <p class="lead">{{$comment->description}}</p>
                            @if (Auth::user()->role === 'admin')
                                <a href="{{ route('comment.delete', $comment->id) }}" class="btn btn-outline-light">Delete</a>
                            @endif
                        <hr class="feature-divider">
                       @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
