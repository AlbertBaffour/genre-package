;(function($) {
        $(document).ready(function() {
           // alert('t1');
        });
    //add genre
    $(document).on('click',"#btn-add-genre", function() {
        $('.modal-title-genre').html('Create genre')
        $('#action-type').val('add')
        $('#id').val('')
        $('#name').val('')
        $('#dwcode').val('')
        $('#enabled').val(true)
        $('#addEditGenre100 .alert-danger').addClass('d-none')
        $('#addEditGenre100').modal('show');

    })
    //edit genre
    $(document).on('click',"#btn-edit-genre", function() {
        // Get data attributes from td tag
        let id = $(this).data('id');
        let name = $(this).data('name');
        let dwcode = $(this).data('dwcode');
        let enabled = $(this).data('enabled');
        //form aanpassen
        $('.modal-title-genre').html('Edit genre')
        $('#action-type').val('edit')
        $('#id').val(id)
        $('#name').val(name)
        $('#dwcode').val(dwcode)
        $('#enabled').val(enabled)
        $('#addEditGenre100 .alert-danger').addClass('d-none')
        //show modal
        $('#addEditGenre100').modal('show');
    })
    //save genre
    $(document).on('click','#btn-save-genre',function () {
        //set method
        _method = 'POST'
        if($('#action-type').val()==='edit') _method = "PUT"
        $.ajax({
            url: "genre",
            type: _method,
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: $('#genre-create-edit-form').serialize(),
            success: function (result) {
                if(!result.errors) {
                    // Success logic goes here..!
                    $('#addEditGenre100').modal('hide');
                    location.reload();
                    $('.alert-success').append('<li>'+result.success+'</li>');
                    $('.alert-success').removeClass('d-none');
                }else {
                    console.log(result.errors)
                    // Error logic goes here..!
                    $('.alert-danger').html('');
                    $.each(result.errors, function(key, value){
                        $('#addEditGenre100 .alert-danger').removeClass('d-none');
                        $('#addEditGenre100 .alert-danger').append('<li>'+value+'</li>');
                    });
                }
            },
            error: function (error) {

            }
        });
    });

//delete
    $(document).on('click','#delete-genre',function () {
        $('#modal-genre-name').html($(this).data('name'));
        $('#modal-genre-id').val($(this).data('id'));
        $('#deleteGenre100').modal('show');
    });

    $(document).on('click','#modal-confirm-genre-delete',function () {
        $.ajax({
            url: "genre/delete/"+$('#modal-genre-id').val(),
            type: 'get',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                '_method': 'delete',
            },
            success: function (data) {
                // Success logic goes here..!
                $('#deleteGenre100').modal('hide');
                location.reload();
            },
            error: function (error) {
                // Error logic goes here..!
            }
        });
    });
}($));
