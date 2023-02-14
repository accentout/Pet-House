@extends('layouts.welcome')
@section('main_content')
    <div class="py-5 container text-white">
        <hr class="feature-divider">
        <span class="px-2 fs-4 ">My profile</span>
        <div class="container text-white py-5 px-5">
            <div class="row">
                <div class="col-sm-3">
                    <p class="mb-0">Full Name</p>
                </div>
                <div class="col-sm-9">
                    <p class="mb-0">{{$user->name}}</p>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-3">
                    <p class="mb-0">Email</p>
                </div>
                <div class="col-sm-9">
                    <p class="mb-0">{{$user->email}}</p>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-3">
                    <p class="mb-0">Password</p>
                </div>
                <div class="col-sm-9">
                    <a href="/change/{{$user->id}}" class="text-white">Change</a>
                </div>
            </div>
        </div>
    </div>
    <div class="album">
        <div class="container text-white">
            <hr class="feature-divider">
            <span class="px-2 py-5 fs-4 me-2">My publications</span>
            <h3 class="px-5 py-3 fs-4 me-2">Confirmed</h3>
            <div class="px-5 row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach($publications as $publication)
                    @if($publication->status === 'confirm')
                        <div class="col">
                            <div class="card bg-dark border-light" style="width:400px;height:500px">
                                <img src="{{ $publication->img }}" style="width:398px;height:250px">
                                <div class="card-body" style="width:398px;height:250px">
                                    <p class="card-text">{{ $publication->pet }}</p>
                                    <p class="text-white" style="width:350px;height:120px">{{Str::limit($publication->add_inf, 100)}}</p>
                                    <div class="dropdown me-2">
                                        <button class="btn btn btn-outline-light dropdown-toggle" type="button"
                                                data-toggle="dropdown">Contact
                                            <span class="caret"></span></button>
                                        <a href="{{ route('publication.edit', $publication->id) }}" class="btn btn-outline-light">Edit</a>
                                        <a href="{{ route('publication.delete', $publication->id) }}}" class="btn btn-outline-light me-2">Delete</a>
                                        <ul class="dropdown-menu bg-dark">
                                            <li><a class="mx-2 text-white">{{ $publication->email }}</a></li>
                                            <li><a class="mx-2 text-white">{{ $publication->phone }}</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <hr class="feature-divider">
            <h3 class="px-5 py-3 fs-4 me-2">Pending</h3>
            <div class="px-5 row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach($publications as $publication)
                    @if($publication->status === 'pending')
                        <div class="col">
                            <div class="card bg-dark border-light" style="width:400px;height:500px">
                                <img src="{{ $publication->img }}" style="width:398px;height:250px">
                                <div class="card-body" style="width:398px;height:250px">
                                    <p class="card-text">{{$publication->pet}}</p>
                                    <p class="text-white" style="width:350px;height:120px">{{Str::limit($publication->add_inf, 100)}}</p>
                                    <div class="dropdown me-2">
                                        <button class="btn btn btn-outline-light dropdown-toggle" type="button"
                                                data-toggle="dropdown">Contact
                                            <span class="caret"></span></button>
                                        <a href="{{ route('publication.edit', $publication->id) }}" class="btn btn-outline-light">Edit</a>
                                        <a href="{{ route('publication.delete', $publication->id) }}}" class="btn btn-outline-light me-2">Delete</a>
                                        <ul class="dropdown-menu bg-dark">
                                            <li><a class="mx-2 text-white">{{$publication->email}}</a></li>
                                            <li><a class="mx-2 text-white">{{$publication->phone}}</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <hr class="feature-divider">
            <h3 class="px-5 py-3 fs-4 me-2">Rejected</h3>
            <div class="px-5 row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach($publications as $publication)
                    @if($publication->status === 'reject')
                        <div class="col">
                            <div class="card bg-dark border-light" style="width:400px;height:500px">
                                <img src="{{ $publication->img }}" style="width:398px;height:250px">
                                <div class="card-body" style="width:398px;height:250px">
                                    <p class="card-text">{{$publication->pet}}</p>
                                    <p class="text-white" style="width:350px;height:120px">{{Str::limit($publication->add_inf, 100)}}</p>

                                    <div class="dropdown me-2">
                                        <button class="btn btn btn-outline-light dropdown-toggle" type="button"
                                                data-toggle="dropdown">Contact
                                            <span class="caret"></span></button>

                                        <a href="{{ route('publication.edit', $publication->id) }}" class="btn btn-outline-light">Edit</a>
                                        <a href="{{ route('publication.delete', $publication->id) }}}" class="btn btn-outline-light me-2">Delete</a>
                                        <ul class="dropdown-menu bg-dark">
                                            <li><a class="mx-2 text-white">{{$publication->email}}</a></li>
                                            <li><a class="mx-2 text-white">{{$publication->phone}}</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="alert" style="width:398px;height:250px" role="alert">
                                <h4 class="alert-heading">Rejection reason</h4>
                                    <p class="text-break">{{$publication->message->first()->content}}</p>
                                <hr>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <hr class="feature-divider">
        </div>
    </div>
@endsection
