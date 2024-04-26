<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "profil";

// Vérifier si les données ont été soumises
if(isset($_POST['id'], $_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['dateNaissance'])) {
    // Récupérer l'identifiant de l'utilisateur s'il est défini dans la requête POST
    $id_utilisateur = $_POST['id'];

    // Création de la connexion
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérification de la connexion
    if ($conn->connect_error) {
        die("La connexion a échoué : " . $conn->connect_error);
    }

    // Récupération des autres données du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $dateNaissance = $_POST['dateNaissance'];

    // Vérifier si une nouvelle photo a été téléchargée
    if(isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $photo = $_FILES['photo']['name']; 
        $target_directory = "uploads/"; // Assurez-vous que le répertoire "uploads" existe dans le même dossier que votre script PHP
        $target_file = $target_directory . basename($photo);

        // Déplacer le fichier téléchargé vers le répertoire de destination
        if(move_uploaded_file($_FILES['photo']['tmp_name'], $target_file)) {
            $photo_profil = $target_file;
        } else {
            echo "Erreur lors du téléchargement du fichier.";
            exit();
        }
    } else {
        // Utiliser la photo actuelle si aucune nouvelle photo n'a été téléchargée
        $photo_profil = $_POST['photo_profil'];
    }

    // Requête SQL pour mettre à jour les informations de l'utilisateur dans la base de données
    $sql = "UPDATE utilisateurs SET nom = '$nom', prenom = '$prenom', email = '$email', photo = '$photo_profil', dateNaissance = '$dateNaissance' WHERE id = '$id_utilisateur'";

    if ($conn->query($sql) === TRUE) {
        echo "Informations utilisateur mises à jour avec succès";
    } else {
        echo "Erreur lors de la mise à jour des informations de l'utilisateur : " . $conn->error;
    }

    // Fermeture de la connexion
    $conn->close();
} else {
    echo "Veuillez remplir tous les champs du formulaire.";
}
?>
