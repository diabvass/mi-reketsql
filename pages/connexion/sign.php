<?php
function Sign()
{
    $Sig = <<<HTML
        <link rel="stylesheet" href="./css/connexion.css">

        <div class="sigForm container-fluid">
        <div class="container mt-4 p-5 shadow-lg">
            <div class="logHaut mb-4 text-center">
                <div class="fw-bold">Inscrivez-vous</div>
            </div> 
            <div> 
                <form method="POST" id="signForm" class="needs-validation" novalidate>
                    <div class="row">
                        <div class="col mb-3">
                            <input type="text" name="nom" placeholder="Nom" class="form-control" required>
                        </div>  
                    </div>

                    <div class="row g-2">
                        <div class="mb-3 col">
                            <input type="email" name="email" placeholder="Email" class="form-control" required>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="mb-3 col-md-6">
                            <input type="password" name="password" id="passe" placeholder="Mot de passe" class="form-control" required>
                        </div>
                        <div class="mb-3 col-md-6">
                            <input type="password" name="confirme" id="confirme" placeholder="Confirmer" class="form-control" required>
                        </div>
                    </div>
                    
                    <button type="submit" name="inscription" class="inscription btn w-100 fw-bold mb-3">Inscription</button>
                </form>
            
            </div>
            <p class="text-center mb-0">
                Déjà inscrit ? <a href="./?p=log" class="fw-bold text-decoration-none" style="color : var(--accent);">Se connecter</a>
                <div class="message text-center text-danger fw-bold"></div>
            </p>
        </div>
    </div>
    <script src="/reketSQL/js/connexion/sign.js"></script>

    HTML;
    return $Sig;
}