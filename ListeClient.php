<?php

require_once 'coucheDTO/ClientDTO.php';
require_once 'coucheDAO/ClientDAO.php';

// Initialize the ClientDAO
$clientDAO = new ClientDAO();

// Fetch all clients
$clients = $clientDAO->findAll();

?>
<!DOCTYPE html>
<html>
<head>
    <title>Client List</title>
</head>
<body>

<!-- Display Client List -->
<h2>Client List</h2>
<ul>
    <?php foreach ($clients as $client): ?>
        <li><a href='/ListeClient.php?client_id=<?= $client['id_client'] ?>'><?= $client['nom_client'] ?> <?= $client['prenom_client'] ?></a></li>
    <?php endforeach; ?>
</ul>

<?php

// Display Client Details
if (isset($_GET['client_id'])) {
    $client_id = $_GET['client_id'];
    $clientDetails = $clientDAO->findById($client_id);

    if ($clientDetails) {
        ?>
        <!-- Display Client Details -->
        <h2>Client Details</h2>
        <p>ID: <?= $clientDetails['id_client'] ?></p>
        <p>Nom: <?= $clientDetails['nom_client'] ?></p>
        <p>Prenom: <?= $clientDetails['prenom_client'] ?></p>
        <p>Date de Naissance: <?= $clientDetails['date_naissance'] ?></p>
        <p>Adresse: <?= $clientDetails['adresse_postale'] ?></p>
        <p>Email: <?= $clientDetails['Email'] ?></p>
        <p>Sexe: <?= $clientDetails['Sexe'] ?></p>
        <p>Salaire: <?= $clientDetails['Salaire'] ?></p>
        <?php
    } else {
        echo "<p>Client not found.</p>";
    }
}

?>

</body>
</html>
