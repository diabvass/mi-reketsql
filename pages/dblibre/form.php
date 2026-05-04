<?php
function RequetForm() {
    $structure = Structure();
    return <<<HTML
    <link rel="stylesheet" href="./css/dblibre.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.16/codemirror.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.16/theme/dracula.min.css">

    <div class="test mt-3 container-fluid">
        <div class="container">
            <div class="form shadow-sm">
                <!-- Header -->
                <div class="d-flex justify-content-between align-items-center bg-light p-2 border-bottom">
                    <div class="form-head">
                        <span class="point bg-success"></span>
                        <span class="point bg-warning"></span>
                        <span class="point bg-danger"></span>
                        <span class="ms-2 fw-bold text-secondary">Console SQL</span>
                    </div>
                    <div class="badge bg-primary me-2">MODE LECTURE</div>
                </div>

                <div class="d-flex w-100 cadre">
                    <!-- Éditeur (round1) -->
                    <div class="round1 p-3 border-end"> 
                        <form id="queryForm">
                            <div class="editor border rounded">
                                <textarea name="query" id="sqlEditor">SELECT * FROM resto</textarea>
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-success btn-sm px-4">
                                    <i class="fa-solid fa-play me-1"></i> Exécuter
                                </button>
                                <button type="button" class="btn btn-outline-danger btn-sm px-4 ms-2" onclick="clearEditor()">
                                    <i class="fa-solid fa-trash me-1"></i> Effacer
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Structure (round2) -->
                    <div class="round2 flex-grow-1 p-3 bg-light">
                        <h6 class="text-center border-bottom pb-2 mb-3">Structure de la base</h6>
                        <div class="structure">
                            $structure
                        </div>
                    </div>
                </div>

                <!-- Zone de Résultats -->
                <div class="resultats p-3 border-top bg-white">
                    <div class="success" style="display:none;"></div>
                    <div class="error" style="display:none;"></div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.16/codemirror.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.16/mode/sql/sql.min.js"></script>
    <script src="./js/codeMirror.js"></script>
    <script src="./js/dblibre/form.js"></script>
HTML;
}

function Structure() {
    return <<<HTML
    <ul class="list-unstyled small">
        <li class="mb-2"><strong>resto</strong> (<u>idresto</u>, nomresto, adresse, telephone, nomchef, nbetoile)</li>
        <li class="mb-2"><strong>menu</strong> (<u>idmenu</u>, entree, plat, dessert)</li>
        <li class="mb-2"><strong>contenant</strong> (<u>idcontenant</u>, nomcontenant)</li>
        <li class="mb-2"><strong>boisson</strong> (<u>idboisson</u>, nomboisson, temperature, degreealcool)</li>
        <li class="mb-2"><strong>menuresto</strong> (<u>idresto, idmenu</u>, prix)</li>
        <li class="mb-2"><strong>boissonservi</strong> (<u>idboisson, idcontenant</u>, prix)</li>
    
        <li class="text-primary mt-2"><em>Liaisons : menuresto, boissonservi</em></li>
    </ul>
HTML;
}