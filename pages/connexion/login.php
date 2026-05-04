<?php
function Login()
{
    $Log = <<<HTML
    <link rel="stylesheet" href="./css/connexion.css">
   
    <div class="logForm container-fluid">
        <div class="container mt-4 p-5 shadow-lg">
            <div class="logHaut mb-4 text-center">
                <div class="fw-bold">Connectez-vous</div>
            </div> 
            <div>
                <form id="loginForm" class="needs-validation" novalidate>
                    <div class="mb-3">
                        <input type="email" name="email" placeholder="Email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <input type="password" name="password" placeholder="Mot de passe" class="form-control" required>
                    </div>
                    
                    <button type="submit" name="connexion" class="btn w-100 fw-bold mb-3">Se connecter</button>
                </form>
            </div>
             <p class="text-center mb-0">
                Pas de compte ? <a href="./?p=sig" class="fw-bold text-decoration-none" style="color : var(--accent);">Créer un compte</a>
                <div class="message text-center text-danger fw-bold"></div>
            </p>
        </div>
    </div>

    <script src="/reketSQL/js/connexion/login.js"></script>
    HTML;
    return $Log;
}