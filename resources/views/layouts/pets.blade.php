@extends('layouts.welcome')
@section('main_content')
    <div class="album py-2">
        <div class="container text-white py-3 px-5">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach($publications as $el)
                    <div class="col">
                        <div class="card bg-dark border-light" style="width:400px;height:500px">
                            <a href="{{ route('pet', $el->id) }}">
                                <img src="{{ $el->img }}" style="width:398px;height:250px">
                            </a>
                            <div class="card-body" style="width:398px;height:250px">
                                <p class="card-text">{{$el->pet}}</p>
                                <p class="text-white" style="width:350px;height:120px">{{Str::limit($el->add_inf, 100)}}</p>
                                <div class="dropdown">
                                    <button class="btn btn btn-outline-light dropdown-toggle" type="button"
                                            data-toggle="dropdown">Contact
                                        <span class="caret"></span></button>
                                    <ul class="dropdown-menu bg-dark">
                                        <li><a class="mx-2 text-white">{{$el->email}}</a></li>
                                        <li><a class="mx-2 text-white">{{$el->phone}}</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
