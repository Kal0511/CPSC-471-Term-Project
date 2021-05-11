<?php
session_start();
include('connection.php');

$username = $_POST['username'];
$password = $_POST['password'];

$username = stripcslashes($username);
$password = stripcslashes($password);
$username = mysqli_real_escape_string($db, $username);
$password = mysqli_real_escape_string($db, $password);

$sql = "SELECT privilege FROM account WHERE username = '$username' and password = '$password'";

$result = mysqli_query($db, $sql);
$row = mysqli_fetch_row($result);
$count = mysqli_num_rows($result);

if ($count == 0) {
    header('Location: login.php');
} else if ($row[0] == 'visitor') {
    header('Location: visitor.php');
    $_SESSION['loggedIn'] = TRUE;
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
    $_SESSION['type'] = $row[0];
} else {
    header('Location: employeeProfile.php');
    $_SESSION['loggedIn'] = TRUE;
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
    $_SESSION['type'] = $row[0];
}
echo json_encode($results);
?>