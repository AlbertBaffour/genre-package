{{--<div class="modal fade" id="addEditGenre100" data-backdrop="static" tabindex="-1" role="dialog"--}}
{{--     aria-labelledby="addEditGenre100" aria-hidden="true">--}}
{{--    <div class="modal-dialog modal-sm" role="document">--}}
{{--        <div class="modal-content">--}}
{{--            <div class="modal-header">--}}
{{--                <h5 class="modal-title-genre">Add genre</h5>--}}
{{--                <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                    <span aria-hidden="true">&times;</span>--}}
{{--                </button>--}}
{{--            </div>--}}
{{--            <div class="modal-body">--}}
<form id="genre-create" action="{{route('genre')}}" method="post" class="form">
    @csrf
    <div>
        <h4 class="" id="">@lang('Create a new Genre')</h4>
    </div>

    {{--                todo lang--}}
    <div class="d-flex flex-wrap">
        {!! Form::hidden('id', '',['id'=>'id']) !!}
        {!! Form::label('name', __('Name'),['class' => 'col-form-label font-weight-bold']); !!}
        <input id="name"
               type="text"
               name="name"
               class = 'form-control name '
               placeholder = "{{__('genre').'...'}}"
                value="">
        {!! Form::label('description', __('Description'),['class' => 'col-form-label mt-2 col-12 font-weight-bold']); !!}
        {!! Form::textarea('description', old('name'), ['class' => 'form-control  mt-1 ','rows' => 3, 'placeholder' => __('description').'...']) !!}

    </div>
    <br>
    <button type="submit" class="btn btn-primary" id="btn-save-genre">@lang('Save genre')</button>
    <button type="button" class="btn btn-primary" hidden id="btn-update-genre">@lang('Update genre')</button>

</form>
{{--            </div></div></div></div>--}}
