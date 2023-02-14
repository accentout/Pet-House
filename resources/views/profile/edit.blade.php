@extends('layouts.welcome')
@section('main_content')
    <div class="py-5 container text-white">
        <form method="post" action="{{ route('publication.edit.store', $publication->id) }}"
              enctype="multipart/form-data">
            @csrf
            <input type="email" name="email" id="email" placeholder="Enter E-mail" value="{{ $publication->email }}"
                   class="form-control"><br>
            <input type="text" name="phone" id="phone" placeholder="Enter phone" value="{{ $publication->phone }}"
                   class="form-control"><br>
            <input type="text" name="pet" id="pet" placeholder="Enter pet" value="{{ $publication->pet }}"
                   class="form-control"><br>
            <input type="file" name="img" id="img" placeholder="Load image" value="{{ $publication->img }}"
                   class="form-control"><br>
            <textarea type="text" name="add_inf" id="add_inf" placeholder="Enter additional information"
                      class="form-control">
                {{ $publication->add_inf }}
            </textarea><br>
            <button type="submit" class="btn btn-outline-light me-2">Submit</button>
        </form>
    </div>
@endsection
