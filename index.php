<?php
session_start();
date_default_timezone_set('Africa/Abidjan');
define('ROOT_PATH', __DIR__); // CHEMIN ABSOLU
require_once ROOT_PATH . '/dotenv.php'; // VARIABLES D'ENVIRONNEMENT
require_once ROOT_PATH .'/routes/route.php'; // LES REDIRECTIONS

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>reketSQL</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/global.css">
</head>

<body>
    <div id="prime">
        <div id="principal" class="">
            <?= Navbar() ?>
        </div>
        <div id="page">
            <?= Route() ?>
        </div>
        <div>
            <?= Footer() ?>
        </div>
    </div>
</body>

</html>