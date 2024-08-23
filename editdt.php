<?php
session_start();
include "connexion.php";

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM demo WHERE id='$id' ";
    $query_run = mysqli_query($conn, $query);

    if(mysqli_num_rows($query_run) == 1) {
        $row = mysqli_fetch_array($query_run);
        $Nom = $row['Nom'];
        $Etat = $row['Etat'];
        $date = $row['date'];
    }
}

if(isset($_POST['update_event'])) {
    $id = $_POST['id'];
    $Etat = $_POST['Etat'];
    $date = $_POST['date'];

    $query = "UPDATE demo SET date='$date',Etat='$Etat' WHERE id='$id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run) {
        $_SESSION['status'] = "Événement mis à jour avec succès";
        header("Location: details.php");
    } else {
        $_SESSION['status'] = "Échec de la mise à jour de l'événement";
        header("Location: editdt.php?id=".$id);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">
                        <h4>Mise à jour l'état</h4>
                    </div>
                    <div class="card-body">

                        <form action="editdt.php" method="POST">
                            <input type="hidden" name="id" value="<?= $id; ?>">

                            <div class="form-group mb-3">
                                <label for="">Nom</label>
                                <input type="text" name="Nom" value="<?= $Nom; ?>" class="form-control" readonly>
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Etat</label>
                                <input type="text" name="Etat" value="<?= $Etat; ?>" class="form-control" >
                            </div>
                            <div class="form-group mb-3">
                                <label for="">date</label>
                                <input type="datetime-local" name="date" value="<?= date('Y-m-d\TH:i', strtotime($date)); ?>" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" name="update_event" class="btn btn-primary">Mise à jour</button>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>

</body>
</html>
