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
                <th scope="col">user_id</th>
                <th scope="col">publication_created</th>
                <th scope="col">publication_updated</th>
                <th scope="col">email</th>
                <th scope="col">phone</th>
                <th scope="col">pet</th>
                <th scope="col">img</th>
                <th scope="col">add_inf</th>
                <th scope="col">status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($publications as $publication)
                <tr>
                    <th scope="row">{{ $publication->id }}</th>
                    <td>{{ $publication->user->id }}</td>
                    <td>{{ $publication->created_at }}</td>
                    <td>{{ $publication->updated_at }}</td>
                    <td>{{ $publication->email }}</td>
                    <td>{{ $publication->phone }}</td>
                    <td>{{ $publication->pet }}</td>
                    <td>{{ $publication->img }}</td>
                    <td>{{ $publication->add_inf }}</td>
                    <td>{{ $publication->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
{{ $publications->links('vendor.pagination.bootstrap-5') }}
<hr class="feature-divider">
