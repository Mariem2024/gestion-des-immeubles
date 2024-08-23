<?php
include "connexion.php";
$Id = $_GET["id"];

if (isset($_POST["submit"])) {
 
   $Nom = $_POST['nom'];
   $Adresse = $_POST['Adresse'];
   $coordonnées_GPS = $_POST['coordonnées_GPS'];
   $Etage = $_POST['Etage'];
   $Nombre_appartements = $_POST['Nombre_appartements'];
   $Nombre_taux_commerciale = $_POST['Nombre_taux_commerciale'];
   $propriétaire_des_immeubles= $_POST['propriétaire_des_immeubles'];
   $entreprise_de_travaux_interne = $_POST['entreprise_de_travaux_interne'];
   $contact_entreprise = $_POST['contact_entreprise'];
   $État = $_POST['état'];

   $sql = "UPDATE `immeubles` SET
    `nom`='$Nom',`adresse`='$Adresse',`coordonnées_GPS`='$coordonnées_GPS',`Etage`='$Etage',`Nombre_appartements`='$Nombre_appartements',`Nombre_taux_commerciale`='$Nombre_taux_commerciale',`propriétaire_des_immeubles`='$propriétaire_des_immeubles',`entreprise_de_travaux_interne`='$entreprise_de_travaux_interne',`contact_entreprise`='$contact_entreprise',`état`='$État' where id = $Id";

   $result = mysqli_query($conn, $sql);

   if ($result) {
      header("Location: index.php?msg=Mise à jour des données réussie");
   } else {
      echo "Failed: " . mysqli_error($conn);
   }
}

?>


<!DOCTYPE html>
<html lang="en">

<l>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <!-- Bootstrap -->
  
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <title>gestion des immeubles</title>
</head>
   
   <body>
   
   <div class="container">
      <div class="text-center mb-4">
         <h3>Éditer les informations</h3>
         <p class="text-muted"></p>
      </div>
      <?php
    $sql = "SELECT * FROM `immeubles` WHERE id = $Id LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>
      <div class="container d-flex justify-content-center">
         <form action="" method="post" style="width:50vw; min-width:300px;">
            <div class="row mb-3">
              

               <div class="col">
                  <label class="form-label">Nom:</label>
                  <input type="text" class="form-control" name="nom"  value="<?php echo $row['Nom'] ?>" >
               </div>
               <div class="col">
                  <label class="form-label">Adresse:</label>
                  <input type="text" class="form-control" name="Adresse"  value="<?php echo $row['Adresse'] ?>">
               </div>
            </div>

        
            <div class="row mb-10">
               <div class="col">
                  <label class="form-label"> coordonnées_GPS:</label>
                  <input type="text" class="form-control" name=" coordonnées_GPS"  value="<?php echo $row['coordonnées_GPS'] ?>">
               </div>

               <div class="col">
                  <label class="form-label">Etage:</label>
                  <input type="text" class="form-control" name="Etage"  value="<?php echo $row['Etage'] ?>">
               </div>
               <div class="col">
                  <label class="form-label">Nombre_appartements:</label>
                  <input type="text" class="form-control" name="Nombre_appartements"  value="<?php echo $row['Nombre_appartements'] ?>">
               </div>
            </div>
    
      
            <div class="row mb-10">
               <div class="col">
                  <label class="form-label"> Nombre_taux_commerciale:</label>
                  <input type="text" class="form-control" name="Nombre_taux_commerciale"  value="<?php echo $row['Nombre_taux_commerciale'] ?>">
               </div>


               <div class="col">
                  <label class="form-label">propriétaire_des_immeubles:</label>
                  <input type="text" class="form-control" name="propriétaire_des_immeubles"  value="<?php echo $row['propriétaire_des_immeubles'] ?>">
               </div>
               <div class="col">
                  <label class="form-label">entreprise_de_travaux_interne:</label>
                  <input type="text" class="form-control" name="entreprise_de_travaux_interne"  value="<?php echo $row['entreprise_de_travaux_interne'] ?>">
               </div>
               
            </div>
            <div class="row mb-10">
               <div class="col">
                  <label class="form-label"> contact_entreprise:</label>
                  <input type="text" class="form-control" name="contact_entreprise"  value="<?php echo $row['contact_entreprise'] ?>">
               </div>
               <div class="col">
                  <label class="form-label"> État:</label>
                  <input type="text" class="form-control" name="état"  value="<?php echo $row['État'] ?>">
               </div>
               <div>
               <button type="submit" class="btn btn-success" name="submit">Mise à jour</button>
               <a href="index.php" class="btn btn-danger">Annuler</a>
            </div>
            </form>
      </div>
   </div>









    <!-- Bootstrap -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

   </body>
</html>