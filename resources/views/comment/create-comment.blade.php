@extends('layouts.welcome')
@section('main_content')
    <div class="py-5 container text-white">
        <form method="post" action="{{ route('comment.create.store', $publication->id) }}" enctype="multipart/form-data">
            @csrf
            <input type="text" name="name" id="name" placeholder="Enter Name" class="form-control"><br>
            <textarea type="text" name="description" id="description" placeholder="Enter description"
                      class="form-control"></textarea><br>
            <button type="submit" class="btn btn-outline-light me-2">Submit</button>
        </form>
    </div>
@endsection
