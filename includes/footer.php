<?php
function Footer()
{
    $actif = isset($_SESSION["User"]); 
    $navig = $actif ? '<li><a href="#" class="footer-link"><i class="fa-solid fa-book me-2"></i>Exercice</a></li>' : 
        '
        <li><a href="./?p=log" class="footer-link"><i class="fa-solid fa-user-lock me-2"></i>Se connecter</a></li>
        <li><a href="./?p=sig" class="footer-link"><i class="fa-solid fa-user-plus me-2"></i>Créer un compte</a></li>
        ';
    $year = date('Y');
    return <<<HTML
        <link rel="stylesheet" href="./css/footer.css">
        <footer id="footer">
            <div class="container">
                <div class="row gy-4 align-items-center">
                    <!-- Navigation -->
                    <div class="col-md-8">
                        <div class="footer-brand mb-2">
                            <h5 class="text-uppercase fw-bold m-0"><span>Navigation</span></h5>
                            <ul class="list-unstyled footer-nav">
                                $navig
                            </ul>
                        </div>
                    </div>

                    <!-- Support & Liens -->
                    <div class="col-md-4 text-md">
                        <h5 class="text-uppercase fw-bold mb-3"><span>Support & Ressources</span></h5>
                        <ul class="list-unstyled footer-nav">
                            <li><a href="mailto:vassiriki.diabate@epitech.eu" class="footer-link"><i class="fa-solid fa-envelope me-2"></i>Contactez-moi</a></li>
                            <li><a href="https://github.com/diabvass/mi-reketsql.git" class="footer-link" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-github me-2"></i>Voir le repo</a></li>
                            <li><a href="https://diabvass.dpdns.org" class="footer-link" target="_blank" rel="noopener noreferrer"><i class="fa-solid fa-link me-2"></i>Lien utile</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Copyright -->
                <div class="footer-bottom mt-4 pt-3 border-top text-center">
                    <p class="small opacity-75 mb-0">
                        L'interface simplifiée pour la gestion de vos bases de données et l'apprentissage du SQL.
                    </p>
                    <p class="small text-muted mb-0">&copy; {$year} reketSQL</p>
                </div>
            </div>
        </footer>
    HTML;
}