<?php
session_start();
include 'db_connection.php';

$joueur_id = $_SESSION['user']['idJoueur'];
$jeu_id = $_POST['jeu_id'];
$nb_parties = $_POST['nb_parties'][$jeu_id];

$stmt = $conn->prepare("INSERT INTO Payer_Partie (idPartie, idJoueur, datePayement) VALUES (?, ?, NOW())");
for ($i = 0; $i < $nb_parties; $i++) {
    $stmt->bind_param("ii", $jeu_id, $joueur_id);
    $stmt->execute();
}

echo "Paiement effectué.";
header('Location: payer_partie.php');
?>
