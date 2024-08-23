<?php
session_start();
$con = mysqli_connect("localhost","root","","immeubles");

if(isset($_POST['save_datetime']))
{
    $Nom = $_POST['Nom'];
    $Etat = $_POST['Etat'];
    $date = $_POST['date'];

    $query = "INSERT INTO demo (Nom,Etat,date) VALUES ('$Nom', '$Etat','$date')";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Date Time Inserted Successfully";
        header("Location: details.php");
    }
    else
    {
        $_SESSION['status'] = "Date Time Not Inserted";
        header("Location: index.php");
    }
}
?>