$(function(){
    // Show create html table
    $('#go-create').on('click', function(){
        $('#request-more-wrapper').html( $('#tpl-create').html() );
    });

    // Trigger create
    $('body').on('click', '#trigger-create', function(){
        $.ajax({
            'url': APP_URL + '/create',
            'method': 'POST',
            'data': {
                'name': $('#tpl-name').val(),
                'surname': $('#tpl-surname').val(),
                'ident': $('#tpl-ident').val(),
                'country': $('#tpl-country').val(),
                'date': $('#tpl-date').val()
            }
        }).done(function(serverResponse){
            if (serverResponse.status == 'OK') {
                $('#response-wrapper').html(serverResponse.body);
            }
        });
    });

    // Show update table
    $('#go-update').on('click', function(){
        var id = $('#update-id').val();

        if (id == '0' || id == '') {
            alert('Please input a valid ID!');
            return;
        }

        $('#request-more-wrapper').html( $('#tpl-create').html() );
        $('#hidden-id').val(id);
        $('#trigger-create').attr('id', 'trigger-update');

        // Get one record info
        $.ajax({
            'url': APP_URL + '/get_one/' + $('#hidden-id').val(),
            'method': 'GET'
        }).done(function(serverResponse){
            $('#tpl-name').val(serverResponse.name);
            $('#tpl-surname').val(serverResponse.surname);
            $('#tpl-ident').val(serverResponse.identification_no);
            $('#tpl-country').val(serverResponse.country);
            $('#tpl-date').val(serverResponse.date_of_birth);
        });
    });

    // Trigger update
    $('body').on('click', '#trigger-update', function(){
        $.ajax({
            'url': APP_URL + '/update',
            'method': 'POST',
            'data': {
                'id': $('#hidden-id').val(),
                'name': $('#tpl-name').val(),
                'surname': $('#tpl-surname').val(),
                'ident': $('#tpl-ident').val(),
                'country': $('#tpl-country').val(),
                'date': $('#tpl-date').val()
            }
        }).done(function(serverResponse){
            if (serverResponse.status == 'OK') {
                $('#response-wrapper').html(serverResponse.body);
            }
        });
    });

    // Read
    $('#go-read').on('click', function(){
        $.ajax({
            'url': APP_URL + '/read?page=' + $('#read-page').val(),
            'method': 'GET'
        }).done(function(serverResponse){
            $('#response-wrapper').html( JSON.stringify(serverResponse.data, null, 4) );
        });
    });

    // Go search
    $('#go-search').on('click', function(){
        var search = $('#search').val();

        if (search == '') {
            alert('Please enter few characters in the search field!');
            return;
        }

        $.ajax({
            'url': APP_URL + '/search',
            'method': 'POST',
            'data': {
                'search': search
            }
        }).done(function(serverResponse){
            $('#response-wrapper').html( JSON.stringify(serverResponse, null, 4) );
        });
    });

    // On refresh, show Read : page 1
    $('#go-read').click();

});