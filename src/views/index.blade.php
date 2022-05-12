@extends('genre::template')
@section('content')
<div class="m-4 col-8">
    @include('genre::inc.form')
    <br>
    @include('genre::inc.table')
{{--<input id="yuyy" value="yu">--}}

{{--    <button id="btnt">btn</button>--}}
</div>
@include('genre::inc.delete_modal')

@endsection


