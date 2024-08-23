<?php
include "connexion.php";

// Initialisation de la variable de recherche
$search = '';

if (isset($_POST['search'])) {
    $search = mysqli_real_escape_string($conn, $_POST['search']);
    $sql = "SELECT * FROM `immeubles` WHERE `Nom` LIKE '%$search%' AND `État` = 'réceptionné'";
} else {
    $sql = "SELECT * FROM `immeubles` WHERE `État` = 'réceptionné'";
}

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
   <!-- Bootstrap -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
   
   <div class="container">
      <form method="POST" action="">
         
         <input type="text" name="search" id="search" placeholder="Search by Name" class="form-control mt-3" value="<?php echo htmlspecialchars($search); ?>">
         <button type="submit" class="btn btn-primary mt-3">Search</button>
      </form>

      <?php
      if (isset($_GET["msg"])) {
         $msg = $_GET["msg"];
         echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
         ' . $msg . '
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
      }
      ?>

      <a href="index.php" class="btn btn-dark-center">Retour à la liste des immeubles</a>
      <table id="immeublesTable" class="table table-bordered table-striped mt-4">
         <thead class="table-dark">
            <tr>
               <th scope="col">Id</th>
               <th scope="col">Nom</th>
               <th scope="col">Adresse</th>
               <th scope="col">Coordonnées GPS</th>
               <th scope="col">Etage</th>
               <th scope="col">Nombre d'appartements</th>
               <th scope="col">Nombre de taux commerciale</th>
               <th scope="col">Propriétaire des immeubles</th>
               <th scope="col">Entreprise de travaux interne</th>
               <th scope="col">Contact entreprise</th>
               <th scope="col">État</th>
            </tr>
         </thead>
         <tbody>
            <?php
            if (mysqli_num_rows($result) > 0) {
               while ($row = mysqli_fetch_assoc($result)) {
                  echo "<tr>
                           <td>{$row['Id']}</td>
                           <td>{$row['Nom']}</td>
                           <td>{$row['Adresse']}</td>
                           <td>{$row['coordonnées_GPS']}</td>
                           <td>{$row['Etage']}</td>
                           <td>{$row['Nombre_appartements']}</td>
                           <td>{$row['Nombre_taux_commerciale']}</td>
                           <td>{$row['propriétaire_des_immeubles']}</td>
                           <td>{$row['entreprise_de_travaux_interne']}</td>
                           <td>{$row['contact_entreprise']}</td>
                           <td>{$row['État']}</td>
                        </tr>";
               }
            } else {
               echo "<tr><td colspan='11' class='text-center'>Aucun immeuble réceptionné trouvé.</td></tr>";
            }
            ?>
         </tbody>
      </table>
   </div>
   
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
