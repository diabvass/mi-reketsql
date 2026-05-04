<?php
require_once ROOT_PATH . '/includes/db.php';

try {
    $ip_address = $_SERVER['REMOTE_ADDR'] ?? "0.0.0.0"; 
    $agent = $_SERVER['HTTP_USER_AGENT'] ?? 'Inconnu';

    $sql = "INSERT INTO visite (ip_address, agent) VALUES (:ip, :agent)";
    $stmt = $pdo->prepare($sql);
    
    $stmt->execute([
        'ip' => $ip_address,
        'agent' => $agent
    ]);

} catch (\PDOException $e) {
    error_log("Erreur d'insertion visite : " . $e->getMessage());
}