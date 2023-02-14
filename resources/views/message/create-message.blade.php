@extends('layouts.welcome')
@section('main_content')
    <div class="py-5 container text-white">
        <h1 class="feature-heading lh-5"> <p class="card-text ">Message</h1>
        <form method="post" action="{{ route('request.reject.message', $publication->id) }}" enctype="multipart/form-data">
            @csrf
            <textarea type="text" name="content" id="content" placeholder="Enter message"
                                                                             class="form-control"></textarea><br>
            <button type="submit" class="btn btn-outline-light me-2">Submit</button>
        </form>
    </div>
@endsection
