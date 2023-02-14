@extends('layouts.welcome')
@section('main_content')
    @if (Auth::user()->role === 'user')
        <div class="py-5 container text-white">
            @if ($errors->all())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif
            @if (session('message'))
                <div class="alert alert-success">
                    <p>Success!</p>
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">
                    <p>Posting limit: two per day!</p>
                </div>
            @endif
            <form method="post" action="{{ route('publication.create.store') }}" enctype="multipart/form-data">
                @csrf
                <input type="email" name="email" id="email" placeholder="Enter E-mail" value="{{ old('email') }}" class="form-control"><br>
                <input type="text" name="phone" id="phone" placeholder="Enter phone" value="{{ old('phone') }}" class="form-control"><br>
                <input type="text" name="pet" id="pet" placeholder="Enter pet" value="{{ old('pet') }}" class="form-control"><br>
                <input type="file" name="img" id="img" placeholder="Load image" class="form-control"><br>
                <textarea type="text" name="add_inf" id="add_inf" placeholder="Enter additional information" class="form-control"> {{ old('add_inf') }}</textarea><br>
                <button type="submit" class="btn btn-outline-light me-2">Submit</button>
            </form>
        </div>
    @endif
@endsection
