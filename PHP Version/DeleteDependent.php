<?php
session_start();
include('connection.php');  
    $ID = $_SESSION["ID"];
    $rowid = $_GET['id'];
    echo $ID;
    echo $rowid;
    $sql = "DELETE FROM dependent WHERE visitorID=? and name=?";
    if ($stmt = mysqli_prepare($db, $sql)) {
        mysqli_stmt_bind_param($stmt, "is", $ID, $rowid);
        if (mysqli_stmt_execute($stmt)) {
        } else {
          echo "Error - healthrecord";
        }
        mysqli_stmt_close($stmt);
      }
      header("location: visitor.php");
    ?>