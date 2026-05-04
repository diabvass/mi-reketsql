<?php
ini_set('display_errors', 0);
error_reporting(E_ALL);

header("Content-Type: application/json");

try {
    require_once __DIR__ . "/../pages/dblibre/tableau/table.php";
    require_once __DIR__ . "/../includes/db.php";

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['query'])) {
        $query = trim($_POST['query']);
        
        // en majuscule
        $queryMajuscule = strtoupper(preg_replace('/\s+/', ' ', $query));

        if (!str_starts_with($queryMajuscule, 'SELECT')) {
            echo json_encode(["statut" => "error", "data" => "Action non autorisée. Seules les lectures (SELECT) sont permises."]);
            exit;
        }

        $req = $pdo->prepare($query);
        $req->execute();
        $result = $req->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode([
            "statut" => "success",
            "html" => ResultatTab($result)
        ]);

    } else {
        echo json_encode(["statut" => "error", "data" => "Requête invalide ou vide."]);
    }

} catch (PDOException $e) {
    error_log("Erreur SQL [Détails confidentiels] : " . $e->getMessage());

    $messagePublic = "Une erreur est survenue lors de l'exécution de la requête.";

    if (str_contains($e->getMessage(), 'SQLSTATE[42S02]')) {
        $messagePublic = "La table demandée n'existe pas";
    } elseif (str_contains($e->getMessage(), 'SQLSTATE[42S22]')) {
        $messagePublic = "Une des colonnes spécifiées est introuvable.";
    } elseif (str_contains($e->getMessage(), 'SQLSTATE[42000]')) {
        $messagePublic = "Erreur de syntaxe dans votre requête SQL.";
    }

    echo json_encode([
        "statut" => "error", 
        "data" => $messagePublic 
    ]);

} catch (Exception $e) {
    error_log("Erreur Système : " . $e->getMessage());
    echo json_encode(["statut" => "error", "data" => "Erreur interne du serveur."]);
}