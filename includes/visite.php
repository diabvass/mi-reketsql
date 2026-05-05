<?php
require_once ROOT_PATH . '/includes/db.php';

try {
    $adresseIP = $_SERVER['REMOTE_ADDR'] ?? "0.0.0.0"; 
    $infosIP= DetectePays($adresseIP);
    $pays = $infosIP['country_name'] ?? 'introuvable';
    $clic = $infosIP['isp'] ?? 'inconnu';
    $date = date('Y-m-d H:i:s');


    $sql = "INSERT INTO visite (adresseIP, visiteDate, visitePays, visiteClic) VALUES (:ip, :visiteDate, :pays, :clic)";
    $stmt = $pdo->prepare($sql);
       
    $stmt->execute([
        'ip' => $adresseIP,
        'pays' => $pays,
        'clic' => $clic,
        'visiteDate' => $date
    ]);

} catch (\PDOException $e) {
    error_log("Erreur d'insertion visite : " . $e->getMessage());
}
function DetectePays($adresseIP){
    $url = 'https://api.iplocation.net/?ip=' . urlencode($adresseIP);
    $json = file_get_contents($url);
    $data = json_decode($json, true);
    return $data ?? [];
}   
