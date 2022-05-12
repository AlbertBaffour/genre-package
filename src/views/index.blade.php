@extends('genre::template')
@section('content')
    <div class="m-4 col-8">
        <div class="alert alert-success alert-dismissible d-none fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <button class="btn btn-outline-success" id="btn-add-genre">Create genre</button>
        <br><br>
        @include('genre::inc.table')

    </div>
    @include('genre::inc.form_modal')
    @include('genre::inc.delete_modal')

@endsection


