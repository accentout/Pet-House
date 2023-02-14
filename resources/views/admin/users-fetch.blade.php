<select class="form-select-border-width-5" id="choose" name="choose">
    <option value="{{request('choose')}}">Pagination per page</option>
    <option value='10'
            @if(request('choose') === '10')
                selected
            @endif
    >10</option>
    <option value='50'
            @if(request('choose') === '50')
                selected
            @endif
    >50</option>
    <option value='100'
            @if(request('choose') === '100')
                selected
           @endif
    >100</option>
</select>
<select class="form-select-border-width-5" id="sort" name="sort">
    <option value="{{request('sort')}}">Sort</option>
    <option value='asc'
            @if(request('sort') === 'asc')
                selected
            @endif
    >First-Late</option>
    <option value='desc'
            @if(request('sort') === 'desc')
                selected
            @endif
    >Late-First</option>
</select>
<div class="py-3">
    <table class="table table-dark table-bordered table-striped text-white">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">name</th>
                <th scope="col">email</th>
                <th scope="col">created at</th>
                <th scope="col">updated at</th>
                <th scope="col">role</th>
                <th scope="col">status</th>
                <th scope="col">ban</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>{{ $user->updated_at }}</td>
                    <td>{{ $user->role }}</td>
                    <td>{{ $user->status }}</td>
                    @if($user->status === 'active')
                        <td><a href="{{ route('user.ban', $user->id) }}" class="text-white">Ban</a></td>
                    @else
                        <td><a href="{{ route('user.unban', $user->id) }}" class="text-white">Unban</a></td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
{{ $users->links('vendor.pagination.bootstrap-5') }}
<hr class="feature-divider">
