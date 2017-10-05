$(function () {
    // Get the form.
    var form = $('#ajax-contact');

    // Get the messages div.
    var formMessages = $('#form-error-ul');
    var heading = $("#messages-heading");

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

                document.getElementById("form-messages").style.display = "block";
                document.getElementById("form-messages").style.border = "2px solid #47735b";

                $(heading).text('Ihre Anfrage war erfolgreich')
                $(formMessages).text(data.responseText);

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

/*
                document.getElementById("form-messages").style.display = "block";
                document.getElementById("form-messages").style.border = "2px solid red";
*/



                if (data.responseText !== '') {
                    console.log(data);
                    $(heading).text('Folgende Fehler sind aufgetreten:')
                    $(formMessages).text(data.responseText);
                } else {
                    console.log(data);
                    $(formMessages).text('Ups! Da ist wohl was schiefgelaufen.');
                }
            });
    });

    // TODO: The rest of the code will go here...
});
