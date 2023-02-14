@extends('layouts.welcome')
@section('main_content')
    <div class="album py-2">
        <div class="container text-white py-3 px-5">
            <hr class="feature-divider">
            <h1 class="feature-heading lh-5"> <p class="card-text">Users</h1>
            @csrf
            <div class="py-3" id="table_data">
                @include('admin.users-fetch')
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $('#table_data').on('click',  '.pagination a', function(event){
                event.preventDefault();
                let page = $(this).attr('href').split('page=')[1];
                let per_page = $('#choose').val();
                let sort_by = $('#sort').val();
                fetch_data(page, per_page, sort_by);
            });
            function fetch_data(page, per_page, sort_by)
            {
                let _token = $("input[name = _token]").val();
                $.ajax({
                    url:'{{ route('users.fetch') }}?=' + page,
                    method: 'POST',
                    data: {_token: _token, page:page, choose:per_page, sort: sort_by},
                    success:function(data)
                    {
                        $('#table_data').html(data);
                        per_page = $('#choose').val();
                        sort_by= $('#sort').val();
                    }
                });
            }
            $(document).on('change', function(event){
                event.preventDefault();
                let per_page = $('#choose').val();
                let sort_by = $('#sort').val();
                pagination_data(per_page, sort_by);
            });
            function  pagination_data(per_page, sort_by)
            {
                let _token = $("input[name = _token]").val();
                $.ajax({
                    url:'{{ route('users.fetch') }}',
                    method: 'POST',
                    data: {_token: _token, choose:per_page, sort: sort_by},
                    success:function(data)
                    {
                        $('#table_data').html(data);
                        per_page = $('#choose').val();
                        sort_by= $('#sort').val();
                    }
                });
            }
        });
    </script>
@endsection
