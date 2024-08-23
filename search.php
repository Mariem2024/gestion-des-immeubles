<?php
include "connexion.php";

if(isset($_POST['query'])){
    $search = mysqli_real_escape_string($conn, $_POST['query']);
    $sql = "SELECT * FROM `immeubles` WHERE `Nom` LIKE '%$search%'";
} else {
    $sql = "SELECT * FROM `immeubles`";
}

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0){
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
                <td>
                    <a href='edit.php?id={$row['Id']}' class='link-dark'><i class='fa-solid fa-pen-to-square fs-5 me-3'></i></a>
                    <a href='delete.php?id={$row['Id']}' class='link-dark'><i class='fa-solid fa-trash fs-5'></i></a>
                </td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='12' class='text-center'>Aucun immeuble trouvé.</td></tr>";
}
?>
