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
    <link rel="stylesheet" href="hamburger.css">

</head>

<body>
    <div class="wrapper">
        <header>
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
                    <button class="hamburger hamburger--collapse" type="button">
                  <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                  </span>
                </button>
                    <div class="mobile-nav">
                        <ul class="mobile-ul">
                            <li>
                                <a href="wohnung.php">Die Wohnung</a>
                            </li>
                            <li>
                                <a href="#preise">Preise</a>
                            </li>
                            <li>
                                <a href="aktivitaeten.php">Aktivitäten</a>
                            </li>
                            <li>
                                <a href="anfrage.php">Unverbindliche Anfrage</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
        <main class="anfrage-main">
            <h4>unverbindliche anfrage</h4>
            <h3 class="anfrage-heading">Es freut mich, dass Sie sich dazu entschieden haben, mir eine Anfrage zu schicken. </h3>
            <p class="anfrage-textblock">Bitte füllen Sie einfach die nachfolgenden Felder aus. Ihre Daten werden natürlich vertraulich behandelt und dienen keinen Werbezwecken. <br>Ich werde Sie dann per Mail oder Telefon kontaktieren. </p>
            <div class="form-message-container">
                <div class="form">
                    <form id="ajax-contact" action="mailer.php" method="post" onsubmit="return validateForm()">
                        <!--                    <h4>Persönliche Daten</h4>-->
                        <div class="form-column">
                            <label for="Vorname">Vorname *</label>
                            <input type="text" name="Vorname" placeholder="Max" id="vorname">
                            <span class="error" id="error-vorname"></span>
                        </div>
                        <div class="form-column">
                            <label for="Nachname">Nachname</label>
                            <input type="text" name="Nachname" placeholder="Mustermann" id="nachname">
                        </div>
                        <div class="form-column">
                            <label for="Mail">Emailadresse *</label>
                            <input type="email" name="Mail" placeholder="max.mustermann@gmail.com" id="mail">
                            <span class="error" id="error-mail"></span>
                        </div>
                        <div class="form-column">
                            <label for="Telefon">Telefonnummer</label>
                            <input type="tel" name="Telefon" placeholder="+43 664 1234567" id="telefon">
                        </div>
                        <div class="form-column">
                            <label for="anreise">Anreisedatum *</label>
                            <input type="date" name="anreise" id="anreise">
                            <span class="error" id="error-anreise"></span>
                        </div>
                        <div class="form-column">
                            <label for="abreise">Abreisedatum *</label>
                            <input type="date" name="abreise" id="abreise">
                            <span class="error" id="error-abreise"></span>
                        </div>
                        <textarea name="Nachricht" id="nachricht" cols="30" rows="10" placeholder="Hier ist Platz für Ihre persönliche Nachricht an mich"></textarea>
                        <input type="submit" value="anfrage senden">
                    </form>
                </div>
                <div id="form-messages">
                    <h5 id="messages-heading"></h5>
                    <ul id="form-error-ul">
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul>
                </div>
            </div>

        </main>
    </div>


    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/app.js"></script>
    <script>
        function validateForm() {
            var vorname = $("#vorname").val();
            var mail = $("#mail").val();
            var anreise = $("#anreise").val();
            var abreise = $("#abreise").val();

            function dateDiffInDays(abreise, anreise) {
                var _MS_PER_DAY = 1000 * 60 * 60 * 24;

                var abreiseNew = new Date(abreise);
                var anreiseNew = new Date(anreise);

                var utc1 = Date.UTC(abreiseNew.getFullYear(), abreiseNew.getMonth(), abreiseNew.getDate());
                var utc2 = Date.UTC(anreiseNew.getFullYear(), anreiseNew.getMonth(), anreiseNew.getDate());

                return Math.floor((utc2 - utc1) / _MS_PER_DAY);
            }

            checkFields(vorname, mail, abreise, anreise);

            function checkFields(vorname, mail, abreise, anreise) {


                var remainingDays = dateDiffInDays(anreise, abreise);

                if (vorname == "") {
                    document.getElementById("vorname").style.border = "2px solid red";
                    document.getElementById("error-vorname").style.display = "inline";
                    $("#error-vorname").text('Bitte füllen Sie dieses Feld aus');
                }
                if (mail == "") {
                    document.getElementById("mail").style.border = "2px solid red";
                    document.getElementById("error-mail").style.display = "inline";
                    $("#error-mail").text('Bitte füllen Sie dieses Feld aus');
                }
                if (abreise == "") {
                    document.getElementById("abreise").style.border = "2px solid red";
                    document.getElementById("error-abreise").style.display = "inline";
                    $("#error-abreise").text('Bitte füllen Sie dieses Feld aus');
                }
                if (anreise == "") {
                    document.getElementById("anreise").style.border = "2px solid red";
                    document.getElementById("error-anreise").style.display = "inline";
                    $("#error-anreise").text('Bitte füllen Sie dieses Feld aus');
                }

                if (anreise > abreise) {
                    document.getElementById("anreise").style.border = "2px solid red";
                    $("#error-anreise").text('Ihr Anreisedatum ist nach Ihrem Abreisedatum');
                }

                if (remainingDays < 3) { // Apply you login on remaining days
                    console.log(remainingDays);
                    document.getElementById("anreise").style.border = "2px solid red";
                    document.getElementById("abreise").style.border = "2px solid red";
                    $("#error-anreise").text('Sie müssen mindestens drei Nächte auswählen');
                }

            }


        }

    </script>
    <script>
        $(".hamburger").click(function() {
            $("button.hamburger").toggleClass("is-active");
            $(".mobile-nav").toggleClass("in-viewport");
        });

    </script>
</body>
