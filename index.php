<?php
/**
 * @var db $db
 */

require "settings/init.php";
?>
<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">
    
    <title>Login - Førstehjælpseksperten</title>
    
    <meta name="robots" content="All">
    <meta name="author" content="Udgiver">
    <meta name="copyright" content="Information om copyright">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Stylesheet -->
    <link href="css/styles.css" rel="stylesheet" type="text/css">

    <!-- Font Awesome ikoner -->
    <script src="https://kit.fontawesome.com/737b386bab.js" crossorigin="anonymous"></script>

    <!-- Bootstraps ikoner -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- AOS - Animate On Scroll Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Favicon: https://favicon.io/favicon-converter/ -->
    <link rel="apple-touch-icon" sizes="180x180" href="img/logo/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/logo/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/logo/favicon/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">


</head>

<body class="login-bg-gradient">

<div class="vh-100 overflow-hidden position-relative text-center">

    <!-- Baggrundscirkler -->
    <img src="img/ui/circle1.svg" class="login-circle login-c1" alt="Baggrunds element">
    <img src="img/ui/circle1.svg" class="login-circle login-c2" alt="Baggrunds element">
    <img src="img/ui/circle1.svg" class="login-circle login-c3" alt="Baggrunds element">
    <img src="img/ui/circle1.svg" class="login-circle login-c4" alt="Baggrunds element">
    <img src="img/ui/circle1.svg" class="login-circle login-c5" alt="Baggrunds element">

    <!-- Container -->
    <div class="login-container h-100 d-flex flex-column align-items-center justify-content-between">

        <!-- Logo -->
        <img src="img/logo/logohvid.png" class="login-logo" alt="Førstehjælpseksperten logo i hvid version">

        <!-- Tekst -->
        <p class="login-text text-white fw-bold fs-4">Red liv - i enhver situation</p>

        <!-- Knapper -->
        <div class="w-100 d-flex flex-column align-items-center gap-4 mb-5">

            <!-- Login -->
            <button class="btn login-btn" data-bs-toggle="modal" data-bs-target="#loginModal">Log ind</button>

            <!-- Akut -->
            <a href="#" class="btn akut-btn d-flex align-items-center justify-content-center">AKUT ADGANG</a>

        </div>

    </div>

</div>

<!-- Wave -->
<img src="img/ui/wave.svg" class="login-wave" alt="Wave UI element i bunden af skærmen">

<!-- Login modalL -->
<div class="modal fade" id="loginModal" tabindex="-1">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content border-0 rounded-5 p-3 login-modal">

            <div class="modal-body">

                <!-- Brugernavn -->
                <div class="mb-3">
                    <label class="form-label fs-4">Brugernavn</label>
                    <input type="text" class="form-control border-0 bg-light py-2" placeholder="Indtast din brugernavn"></div>

                <!-- Adgangskode -->
                <div class="mb-1">
                    <label class="form-label fs-4">Adgangskode</label>
                    <input type="password" class="form-control border-0 bg-light py-2" placeholder="Indtast din adgangskode"></div>

                <a href="#"
                    class="small text-decoration-none"
                    onclick="error404()">
                    Glemt adgangskode?
                </a>

                <!-- Login -->
                <a href="forside.php" class="btn modal-login-btn w-100 mt-4">Login</a>

            </div>

        </div>

    </div>

</div>

<script>
    function error404() {
        alert("Funktion kommer snart");
    }
</script>


<!------------ Bootstrap library ------------>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!------------ AOS LIBRARY ------------>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>


</body>
</html>
