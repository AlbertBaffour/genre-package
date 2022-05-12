<div class="table-responsive">
    @if (isset($genres))
        <div class="pagination">
            {!! $genres->links() !!}
        </div>
    @endif
    <table class="table">
        <thead>
        <tr>
            <th class="col-5">Genre</th>
            <th class="col-2">DWCode</th>
            <th class="col-2">Enabled</th>
            <th class="col-3"><span class="p-2">Actions</span></th>
        </tr>
        </thead>
        <tbody>
        @foreach($genres as $genre)
            <tr>
                <td class="text-break">{{ $genre->name}}</td>
                <td>{{ $genre->dwcode }}</td>
                <td>{{ $genre->enabled }}</td>
                <td>
                    <form action="/genre/delete/{{$genre->id}}" method="post">
                        @method('delete')
                        @csrf
                        <div class="btn-group btn-group-sm">
{{--                            <a href="/genres/clean/{{ $genre->id.'&p'.$genres->currentPage()}}" class="btn btn-outline-success border-0"--}}
{{--                               data-toggle="tooltip"--}}
{{--                               title="Clean {{ $genre->name }}">--}}
{{--                                Clean--}}
{{--                            </a>--}}
                            <button type="button" data-redirect="{{$genres->currentPage()}}" id="btn-edit-genre"
                                    class="btn btn-outline-secondary border-0"
                                    data-id="{{$genre->id}}"
                                    data-name="{{$genre->name}}"
                                    data-dwcode="{{$genre->dwcode}}"
                                    data-enabled="{{$genre->enabled}}"
                                    data-toggle="tooltip"
                                    title="Edit {{ $genre->name }}">
                                Edit
                            </button>
                            <button type="button" id="delete-genre" class="btn btn-outline-danger border-0"
                                    data-id="{{$genre->id}}"
                                    data-name="{{$genre->name}}"
                                    data-toggle="tooltip"
                                    title="Delete {{ $genre->name }}">
                                Delete
                            </button>
                            {!! Form::hidden('page', $genres->currentPage(), ['id' => 'page']) !!}
                        </div>
                    </form>
                </td>
            </tr>
        @endforeach
        {{--    todo lang--}}
        {{$genres->count()==0? __('0 result found')  :''}}
        </tbody>
    </table>
</div>
