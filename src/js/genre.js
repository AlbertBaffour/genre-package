;(function($) {
        $(document).ready(function() {
           // alert('t1');

            // your code here
            $("#yuyy").val("Hello World!2")
            $('#btnt').on('click',function (){
                alert($('#yuyy').val())
                //document.getElementById("yu").innerText=("btn click")
                console.log($("#yuyy").val())
                $('#yuyy').val('new value2');
                console.log($("#yuyy").val())
            })



//add genre
    $(document).on('click',"#btn-add-genre", function() {
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
        });

//delete
    $(document).on('click','#delete-genre',function () {
        $('#modal-genre-name').html($(this).data('name'));
        $('#modal-confirm-genre-delete').attr('onclick', `confirmGenreDelete(${$(this).data('id')})`);
        $('#deleteGenre100').modal('show');
    });

    function confirmGenreDelete(id) {
        $.ajax({
            url: '{{ url("genre") }}/' + id,
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
}($));
