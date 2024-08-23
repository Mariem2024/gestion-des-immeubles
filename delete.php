<?php
include "connexion.php";
$Id = $_GET["id"];
$sql = "DELETE FROM `immeubles` WHERE id = $Id";
$result = mysqli_query($conn, $sql);

if ($result) {
  header("Location: index.php?msg=Data deleted successfully");
} else {
  echo "Failed: " . mysqli_error($conn);
}