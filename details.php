<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <?php 
                    if(isset($_SESSION['status']))
                    {
                        ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Hey!</strong> <?php echo $_SESSION['status']; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                         unset($_SESSION['status']);
                    }
                ?>

                <div class="card mt-5">
                    <div class="card-header">
                        <h4>Mise à jour l'état</h4>
                    </div>
                    <div class="card-body">

                        <form action="date.php" method="POST">
                            <div class="form-group mb-3">
                                <label for="">Nom</label>
                                <input type="text" name="Nom" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Etat</label>
                                <input type="text" name="Etat" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">date</label>
                                <input type="datetime-local" name="date" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" name="save_datetime" class="btn btn-primary">enregistrer</button>
                            </div>
                        </form>

                    </div>
                </div>

                <!-- Tableau pour afficher les données -->
                <div class="card mt-5">
                    <div class="card-header">
                        
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                   
                                    <th>Nom</th>
                                    <th>Etat</th>
                                    <th>date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Connexion à la base de données
                                include "connexion.php";

                                // Récupération des données
                                $query = "SELECT * FROM demo";
                                $query_run = mysqli_query($conn, $query);

                                if(mysqli_num_rows($query_run) > 0)
                                {
                                    foreach($query_run as $row)
                                    {
                                        ?>
                                        <tr>
                            
                                            <td><?= $row['Nom']; ?></td>
                                            <td><?= $row['Etat']; ?></td>
                                            <td><?= $row['date']; ?></td>
                                            <td>
                                                <a href="editdt.php?id=<?= $row['id']; ?>" class="btn btn-info btn-sm">Éditer</a> <!-- Bouton d'édition -->
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }
                                else
                                {
                                    ?>
                                    <tr>
                                        <td colspan="3">No Record Found</td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
