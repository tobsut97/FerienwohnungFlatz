<?php
    // Only process POST reqeusts.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
/*
        // Get the form fields and remove whitespace.
        $name = strip_tags(trim($_POST["name"]));
				$name = str_replace(array("\r","\n"),array(" "," "),$name);
        $nachname = strip_tags(trim($_POST["nachname"]));

        $mail = filter_var(trim($_POST["mail"]), FILTER_SANITIZE_EMAIL);
        $telefon = strip_tags(trim($_POST["telefon"]));
        $anreise = strip_tags(trim($_POST["anreise"])); 
        $abreise = strip_tags(trim($_POST["abreise"]));
        $nachricht = trim($_POST["nachricht"]);*/
        
         function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        
        $name = test_input($_POST["Vorname"]);
        $nachname = test_input($_POST["Nachname"]);
        $mail =  test_input($_POST["Mail"]);
        $telefon = test_input($_POST["Telefon"]);
        $anreise = test_input($_POST["anreise"]);
        $anreiseCorrect = date("d-m-Y", strtotime($anreise));
        $abreise =  test_input($_POST["abreise"]);
        $abreiseCorrect = date("d-m-Y", strtotime($abreise));
        $nachricht = test_input($_POST["Nachricht"]);
        
       
        


       // Check that data was sent to the mailer.
        if ( empty($name) OR empty($nachname) OR !filter_var($mail, FILTER_VALIDATE_EMAIL) OR empty($telefon) OR empty($nachricht) OR empty($anreise) OR empty($abreise) ) {
            $errors = array();
            http_response_code(400);
            if (empty($name)) {
                $errors[0] = "Das Feld Vorname ist leer";
            } 
            if (empty($mail)) {
                $errors[2] = "Das Feld Emailadresse ist leer";
            }  
            if (empty($anreise)){
                $errors[5] = "Das Feld Anreise ist leer";
            } 
            if (empty($abreise)){
                $errors[6] = "Das Feld Abreise ist leer";
            }
            exit;
        }



        // Set the recipient email address.
        $recipient = "tobiassutterluety@gmail.com";

        // Set the email subject.
        $subject = "Neue Anfrage von $name";

        // Build the email content.
        $email_content = "Vorname: $name\n";
        $email_content .= "Nachname: $nachname\n\n";
        $email_content .= "Email: $mail\n";
        $email_content .= "Telefonnummer: $telefon\n";
        $email_content .= "Anreise: $anreiseCorrect\n";
        $email_content .= "Abreise: $abreiseCorrect\n";
        $email_content .= "Nachricht: $nachricht\n";

        // Build the email headers.
        $email_headers = "From: $name <$mail>";

        // Send the email.
        if (mail($recipient, $subject, $email_content, $email_headers)) {
            // Set a 200 (okay) response code.
            http_response_code(200);
            echo "Ihre Nachricht wurde erfolgreich übermittelt. Ich werde mich per Telefon oder Mail bei Ihnen melden.";
        } else {
            // Set a 500 (internal server error) response code.
            http_response_code(500);
            echo "Oops! Something went wrong and we couldn't send your message.";
        }

    } else {
        // Not a POST request, set a 403 (forbidden) response code.
        http_response_code(403);
        echo "Es ist ein Problem aufgetreten. Bitte versuchen Sie es erneut.";
    }

?>
