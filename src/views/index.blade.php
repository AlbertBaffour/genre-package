@extends('genre::template')
@section('content')
<div class="m-4 col-8">
    @include('genre::inc.form')
    <br>
    @include('genre::inc.table')
<div id="yu"></div>
</div>
@include('genre::inc.delete_modal')
@section('js')
    <script type="text/javascript">
        (function($) {
        alert('here')
        document.getElementById("yu").innerHTML = "Hello World!"
        //add genre
        document.on('click',"#btn-add-genre", function() {
            $('#addEditGenre100').modal('show');

        })
        //edit genre
        $(document).on('click',"#edit-genre", function() {
            // Get data attributes from td tag
            let id = $(this).closest('td').data('id');
            let name = $(this).closest('td').data('name');
            let description = $(this).closest('td').data('description');
            //form aanpassen
            $('#btn-save-genre').attr('hidden',true);
            $('#btn-update-genre').attr('hidden',false);
            $('#name').val(name);
            $('#description').val(description);
            $('#id').val(id);
        });
        $(document).on('click',"#btn-update-genre", function() {

        });

        //delete
        function loadGenreDeleteModal(id, name) {
            $('#modal-genre-name').html(name);
            $('#modal-confirm-genre-delete').attr('onclick', `confirmGenreDelete(${id})`);
            $('#deleteGenre100').modal('show');
        }

        function confirmGenreDelete(id) {
            $.ajax({
                url: '{{ url('genre') }}/' + id,
                type: 'post',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    '_method': 'delete',
                },
                success: function (data) {
                    // Success logic goes here..!
                    $('#deleteGenre100').modal('hide');
                    $("#genre-table").load('/genre/table', function(){
                    });
                },
                error: function (error) {
                    // Error logic goes here..!
                }
            });
        }
        }(jQuery));
    </script>
@endsection
@endsection


