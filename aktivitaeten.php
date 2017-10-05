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
        <main class="main-aktivitaeten">
            <div class="sommer">
                <img class="card-image" src="assets/ImpressionsImages/Blumenwiese-(c)-Huber-Images---Dam%C3%BCls-Faschina-Tourismus.jpg" alt="blumenwiese">
                <h3 class="card-heading">Sommer</h2>

            </div>
            <div class="winter">
                <img class="card-image" src="assets/ImpressionsImages/Ausblick-Hoch%C3%A4lpelealpe-B%C3%B6dele-Schwarzenberg-(c)-Alois-Metzler---Schwarzenberg-Tourismus.jpg" alt="hochaelpele">
                <h3 class="card-heading">Winter</h2>
            </div>
        </main>
    </div>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script>
        $(".hamburger").click(function() {
            $("button.hamburger").toggleClass("is-active");
            $(".mobile-nav").toggleClass("in-viewport");
        });

    </script>
</body>

</html>
