<?php
// webhook-wave.php
header('Content-Type: application/json');

// Configuration Firebase (à adapter)
require_once 'vendor/autoload.php'; // Si vous utilisez Composer

// Récupérer les données du webhook
$input = file_get_contents('php://input');
$data = json_decode($input, true);

// Vérifier la signature (à adapter selon la doc Wave)
$signature = $_SERVER['HTTP_X_WAVE_SIGNATURE'] ?? '';
// TODO: Vérifier la signature avec votre clé secrète

// Log pour déboguer
error_log("Webhook Wave reçu: " . $input);

// Traiter le webhook
if ($data && isset($data['transaction_id'])) {
    // Envoyer les données à Firebase via l'API REST
    $firebaseUrl = "https://firestore.googleapis.com/v1/projects/poulailler-3515e/databases/(default)/documents/wave_transactions";
    
    // Rechercher la transaction
    // Vous pouvez utiliser l'API REST Firebase pour mettre à jour
    
    // Réponse succès
    echo json_encode(['success' => true]);
} else {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid payload']);
}
?>
