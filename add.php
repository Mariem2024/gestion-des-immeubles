
<?php
include "connexion.php";

if (isset($_POST["submit"])) {
    
    $Nom = $_POST['nom'];
    $Adresse = $_POST['Adresse'];
    $coordonnées_GPS = $_POST['coordonnées_GPS'];
    $Etage = $_POST['Etage'];
    $Nombre_appartements = $_POST['Nombre_appartements'];
    $Nombre_taux_commerciale = $_POST['nombre_taux_commerciale'];
    $propriétaire_des_immeubles = $_POST['propriétaire_des_immeubles'];
    $entreprise_de_travaux_interne = $_POST['entreprise_de_travaux_interne'];
    $contact_entreprise = $_POST['contact_entreprise'];
    $État = $_POST['état'];

    // Vérification si tous les champs sont remplis
    if (
       empty($Nom) || empty($Adresse) || empty($coordonnées_GPS) || 
        empty($Etage) || empty($Nombre_appartements) || empty($Nombre_taux_commerciale) || 
        empty($propriétaire_des_immeubles) || empty($entreprise_de_travaux_interne) || 
        empty($contact_entreprise) || empty($État)
    ) {
        $error = "Tous les champs doivent être remplis.";
    } else {
        $sql = "INSERT INTO `immeubles`(`id`, `nom`, `Adresse`, `coordonnées_GPS`, `etage`, `nombre_appartements`, `nombre_taux_commerciale`, `propriétaire_des_immeubles`, `entreprise_de_travaux_interne`, `contact_entreprise`, `état`) 
                VALUES (Null, '$Nom', '$Adresse', '$coordonnées_GPS', '$Etage', '$Nombre_appartements', '$Nombre_taux_commerciale', '$propriétaire_des_immeubles', '$entreprise_de_travaux_interne', '$contact_entreprise', '$État')";
        
        $result = mysqli_query($conn, $sql);

        if ($result) {
            header("Location: index.php?msg=New record created successfully");
            exit();
        } else {
            $error = "Failed: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>PHP CRUD Application</title>
</head>
<body>
    <div class="container">
        <div class="text-center mb-4">
            <h3>Add New Building</h3>
            <p class="text-muted">Complete the form below to add a new building</p>
        </div>
        <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width:50vw; min-width:300px;">
                <?php if (isset($error)): ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $error ?>
                    </div>
                <?php endif; ?>
                <div class="row mb-3">
                    
                    <div class="col">
                        <label class="form-label">Nom:</label>
                        <input type="text" class="form-control" name="nom">
                    </div>
                    <div class="col">
                        <label class="form-label">Adresse:</label>
                        <input type="text" class="form-control" name="Adresse">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Coordonnées GPS:</label>
                        <input type="text" class="form-control" name="coordonnées_GPS">
                    </div>
                    <div class="col">
                        <label class="form-label">Étage:</label>
                        <input type="text" class="form-control" name="Etage">
                    </div>
                    <div class="col">
                        <label class="form-label">Nombre d'appartements:</label>
                        <input type="text" class="form-control" name="Nombre_appartements">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Nombre taux commerciale:</label>
                        <input type="text" class="form-control" name="nombre_taux_commerciale">
                    </div>
                    <div class="col">
                        <label class="form-label">Propriétaire des immeubles:</label>
                        <input type="text" class="form-control" name="propriétaire_des_immeubles">
                    </div>
                    <div class="col">
                        <label class="form-label">Entreprise de travaux interne:</label>
                        <input type="text" class="form-control" name="entreprise_de_travaux_interne">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Contact entreprise:</label>
                        <input type="text" class="form-control" name="contact_entreprise">
                    </div>
                    <div class="col">
                        <label class="form-label">État:</label>
                        <input type="text" class="form-control" name="état">
                    </div>
                </div>
                <button type="submit" class="btn btn-success" name="submit">Save</button>
                <a href="index.php" class="btn btn-danger">Cancel</a>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
