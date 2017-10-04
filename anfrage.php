<html>

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="Günstig Urlaub machen | Einzigartiger Ausblick auf die Bregenzerwälder Berglandschaft | Ruhige Umgebung, perfekt für Wanderungen">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="robots" content="index, follow">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">

    <link rel="icon" type="image/png" href="assets/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="assets/favicon-16x16.png" sizes="16x16" />

    <title>Ferienwohnung Ottilia Flatz - Wohnung</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans:300,400,700" rel="stylesheet">
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
</head>

<body>
    <header class="headroom">
        <div class="header-inner">
            <p class="header-brand"><a href="index.php">FERIENWOHNUNG FLATZ</a></p>
            <nav>
                <ul>
                    <li class="nav-element">
                        <a href="wohnung.php">Die Wohnung</a>
                    </li>
                    <li class="nav-element">
                        <a href="index.php#preise">Preise</a>
                    </li>
                    <li class="nav-element">
                        <a href="aktivitaeten.php">Aktivitäten</a>
                    </li>
                    <li class="nav-element" id="last-li">
                        <a href="anfrage.php" id="last-li-a">Unverbindliche Anfrage</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    <main class="anfrage-main">
        <h4>unverbindliche anfrage</h4>
        <h3 class="anfrage-heading">Es freut mich, dass Sie sich dazu entschieden haben, mir eine Anfrage zu schicken. </h3>
        <p class="anfrage-textblock">Bitte füllen Sie einfach die nachfolgenden Felder aus. Ihre Daten werden natürlich vertraulich behandelt und dienen keinen Werbezwecken. <br>Ich werde Sie dann per Mail oder Telefon kontaktieren. </p>
        <div id="form-messages"></div>
        <div class="form">
           <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        
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
            http_response_code(400);
            if (empty($name)) {
                echo "name empty";
            } 
            if (empty($nachname)) {
                echo "nachname empty";
            } 
            if (empty($mail)) {
                echo "mail empty";
            } 
            if (empty($telefon)){
                echo "telefon empty";
            } 
            if (empty($nachricht)){
                echo "nachricht empty";
            } 
            if (empty($anreise)){
                echo "anreise empty";
            } 
            if (empty($abreise)){
                echo "abreise empty";
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

            <form id="ajax-contact" action="anfrage.php" method="post">
                <h4>Persönliche Daten</h4>
                <input type="text" name="Vorname" placeholder="Vorname" id="vorname">
                <input type="text" name="Nachname" placeholder="Nachname" id="nachname">
                <h4 class="sub-h4">Kontaktdaten</h4>
                <input type="email" name="Mail" placeholder="Emailadresse" id="mail">
                <input type="tel" name="Telefon" placeholder="Telefonnummer" id="telefon">
                <br>
                <div class="anreise">
                    <h4 class="sub-h4">Gewünschte Anreise</h4>
                    <input type="date" name="anreise" id="anreise">
                </div>
                <div class="abreise">
                    <h4 class="sub-h4">Gewünschte Abreise</h4>
                    <input type="date" name="abreise" id="abreise">
                </div>
                <h4 class="sub-h4">nachricht</h4>
                <textarea name="Nachricht" id="nachricht" cols="30" rows="10" placeholder="Hier ist Platz für Ihre persönliche Nachricht an mich"></textarea>
                <input type="submit" value="anfrage senden">
            </form>
        </div>
    </main>
    
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/app.js"></script>
</body>
