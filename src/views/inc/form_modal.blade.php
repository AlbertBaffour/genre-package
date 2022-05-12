<div class="modal fade" id="addEditGenre100" data-backdrop="static" tabindex="-1" role="dialog"
     aria-labelledby="addEditGenre100" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title-genre">Create genre</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger d-none" ></div>
<form id="genre-create-edit-form" action="{{route('genre')}}" method="post" class="form">
    @csrf

    {{--                todo lang--}}
    <div class="d-flex flex-wrap">
        {!! Form::hidden('id', '',['id'=>'id']) !!}
        {!! Form::hidden('action-type', '',['id'=>'action-type']) !!}
        {!! Form::label('name', __('Name'),['class' => 'col-form-label font-weight-bold']); !!}
        <input id="name"
               type="text"
               name="name"
               class = 'form-control name {{$errors->has('name')?"is-invalid":""}}'
               placeholder = "{{__('genre').'...'}}"
                value="{{old('name')}}">
        @if($errors->has('name'))
            <span class="invalid-feedback">{{$errors->first('name')}}</span>
        @endif
        {!! Form::label('dwcode', __('DWCode'),['class' => 'col-form-label mt-2 col-12 font-weight-bold']); !!}
        {!! Form::text('dwcode', old('dwcode'), ['class' => 'form-control  mt-1 '.($errors->has('dwcode')?"is-invalid":""), 'placeholder' => __('dwcode').'...']) !!}
        @if($errors->has('dwcode'))
            <span class="invalid-feedback">{{$errors->first('dwcode')}}</span>
        @endif
        {!! Form::label('enabled', __('Enabled'),['class' => 'col-form-label mt-2 col-12 font-weight-bold']); !!}
        {!! Form::checkbox('enabled', old('enabled'), ['class' => 'form-control  mt-1 ']) !!}

    </div>
    <br>
    <button type="button" class="btn btn-primary" id="btn-save-genre">@lang('Save genre')</button>

</form>
            </div></div></div></div>
