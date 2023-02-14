@extends('layouts.welcome')
@section('main_content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$errors}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="py-5 container text-white">
        <form method="post" action="{{ route('password.change.store', $user->id) }}">
            @csrf
            <input type="password" name="password" id="password" placeholder="Enter password" class="form-control"><br>
            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Enter password confirmation" class="form-control"><br>
            <button type="submit" class="btn btn-outline-light me-2">Submit</button>
        </form>
    </div>
@endsection
