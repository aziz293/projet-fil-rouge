
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Profil Utilisateur</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    <div class="container">
        <h1>Modifier Profil Utilisateur</h1>
        <form action="modifier_traitement.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_utilisateur" value="<?php echo $id_utilisateur; ?>">
            <fieldset>
                <legend>Informations Utilisateur</legend>
                <div class="form-group">
                    <label for="nom">Nom:</label>
                    <input type="text" id="nom" name="nom" value="<?php echo $nom; ?>" required>
                </div>
                <div class="form-group">
                    <label for="prenom">Prénom:</label>
                    <input type="text" id="prenom" name="prenom" value="<?php echo $prenom; ?>" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="<?php echo $email; ?>" required>
                </div>
                <div class="form-group">
                    <label for="dateNaissance">Date de Naissance:</label>
                    <input type="date" id="dateNaissance" name="dateNaissance" value="<?php echo $dateNaissance; ?>" required>
                </div>
                <div class="form-group">
                    <label for="photo">Photo de Profil:</label>
                    <input type="file" id="photo" name="photo">
                </div>
                <?php if(!empty($photo_profil)): ?>
                    <img src="<?php echo $photo_profil; ?>" alt="Photo de Profil" class="profil-photo">
                <?php endif; ?>
                <button type="submit" class="btn">Enregistrer les Modifications</button>
            </fieldset>
        </form>
    </div>
</body>
</html>
