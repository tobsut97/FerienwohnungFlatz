$(function () {
    // Get the form.
    var form = $('#ajax-contact');

    // Get the messages div.
    var formMessages = $('#form-messages');

    $(form).submit(function (event) {
        event.preventDefault();

        var formData = $(form).serialize();


        $.ajax({
                type: 'POST',
                url: $(form).attr('action'),
                data: formData
            })
            .done(function (response) {
                $(formMessages).removeClass('error');
                $(formMessages).addClass('success');

                $(formMessages).text(response);

                $('#vorname').val('');
                $('#nachname').val('');
                $('#mail').val('');
                $('#telefon').val('');
                $('#anreise').val('');
                $('#abreise').val('');
                $('#nachricht').val('');
            })
            .fail(function (data) {
                $(formMessages).removeClass('success');
                $(formMessages).addClass('error');

                if (data.responseText !== '') {
                    $(formMessages).text(data.responseText);
                } else {
                    $(formMessages).text('Ups! Da ist wohl was schiefgelaufen.');
                }
            });
    });

    // TODO: The rest of the code will go here...
});
