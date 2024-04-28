<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "profil";

// Initialiser les variables pour éviter les erreurs de notice
$nom = $prenom = $email = $photo_profil = $dateNaissance = "";

// Vérifier si les données ont été soumises
if(isset($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['dateNaissance'])) {
    // Création de la connexion
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérification de la connexion
    if ($conn->connect_error) {
        die("La connexion a échoué : " . $conn->connect_error);
    }

    // Récupération des données du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $dateNaissance = $_POST['dateNaissance'];

    if(isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $photo = $_FILES['photo']['name']; 
        $target_directory = "uploads/"; // Assurez-vous que le répertoire "uploads" existe dans le même dossier que votre script PHP
        $target_file = $target_directory . basename($photo);

        if(move_uploaded_file($_FILES['photo']['tmp_name'], $target_file)) {
            //echo "Le fichier a été téléchargé avec succès.";
            $photo_profil = $target_file;
        } else {
            //echo "Erreur lors du téléchargement du fichier.";
        }
    } else {
        //echo "Aucun fichier téléchargé.";
    }

    // Requête SQL pour ajouter l'utilisateur à la base de données
    $sql = "INSERT INTO utilisateurs (nom, prenom, email, photo, dateNaissance) VALUES ('$nom', '$prenom', '$email', '$photo_profil', '$dateNaissance')";

    if ($conn->query($sql) === TRUE) {
        //echo "Utilisateur ajouté avec succès";
    } else {
        //echo "Erreur lors de l'ajout de l'utilisateur : " . $conn->error;
    }

    // Fermeture de la connexion
    $conn->close();
} else {
    echo "Veuillez remplir tous les champs du formulaire.";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Utilisateur</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
<div class="container">
    <div class="left-column">
        <?php if(!empty($photo_profil)): ?>
            <img src="<?php echo $photo_profil; ?>" alt="Photo de Profil" class="profil-photo">
        <?php endif; ?>
        <br>

        <a href="modifier.php?id=<?php echo $id_utilisateur; ?>">Modifier</a>

    </div>
    <div class="right-column">
        <h1>Profil Utilisateur</h1>
        <div id="profil-info">
            <table>
                <tr>
                    <td><strong>Nom:</strong></td>
                    <td><?php echo $nom; ?></td>
                </tr>
                <tr>
                    <td><strong>Prénom:</strong></td>
                    <td><?php echo $prenom; ?></td>
                </tr>
                <tr>
                    <td><strong>Email:</strong></td>
                    <td><?php echo $email; ?></td>
                </tr>
                <tr>
                    <td><strong>Date de Naissance:</strong></td>
                    <td><?php echo $dateNaissance; ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
</body>
</html>
