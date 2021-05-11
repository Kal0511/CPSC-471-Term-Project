<?php
require_once "connection.php";
$name = "";
$username = "";
$password = "";
$confirm_password = "";
$name_err = "";
$username_err = "";
$password_err = "";
$confirm_password_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $username = trim($_POST["username"]);
  if (empty($username)) {
    $username_err = "Please enter a username.";
  } else {
    $sql = "SELECT * FROM account WHERE username = ?";
    if ($stmt = mysqli_prepare($db, $sql)) {
      mysqli_stmt_bind_param($stmt, "s", $username);
      if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_store_result($stmt);
        if (mysqli_stmt_num_rows($stmt) == 1) {
          $username_err = "This username is already taken.";
        }
      } else {
        echo "Error";
      }
      mysqli_stmt_close($stmt);
    }
  }

  $password = trim($_POST["password"]);
  if (empty($password)) {
    $password_err = "Please enter a password.";
  }

  $confirm_password = trim($_POST["confirm_password"]);
  if (empty($confirm_password)) {
    $confirm_password_err = "Please confirm password.";
  } else {
    if (empty($password_err) && ($password != $confirm_password)) {
      $confirm_password_err = "Password did not match.";
    }
  }

  if (empty($username_err) && empty($password_err) && empty($confirm_password_err)) {

    $sql = "INSERT INTO account (username, password, privilege) VALUES (?, ?, 'visitor')";
    if ($stmt = mysqli_prepare($db, $sql)) {
      mysqli_stmt_bind_param($stmt, "ss", $username, $password);
      if (mysqli_stmt_execute($stmt)) {
      } else {
        echo "Error - account";
      }
      mysqli_stmt_close($stmt);
    }

    $ID = "";
    while(empty($ID)){
      $num = random_int(10,10000);
    $sqlid = "SELECT * FROM person WHERE ID='$num'";
    $result = mysqli_query($db, $sqlid);  
    $row = mysqli_fetch_row($result);  
    $count = mysqli_num_rows($result);  
    if($count==0){
    $ID = $num;
    }
    echo $ID;
    }

$name = $_POST["name"];
    $sql = "INSERT INTO person (ID, name, phone, address, username) VALUES (?, ?,'Please Enter', 'Please Enter', ?)";
    if ($stmt = mysqli_prepare($db, $sql)) {
      mysqli_stmt_bind_param($stmt, "iss", $ID, $name, $username);
      if (mysqli_stmt_execute($stmt)) {
      } else {
      }
      mysqli_stmt_close($stmt);
    }

    $sql = "INSERT INTO visitor (ID, homecountry, entrypoint, exitpoint, entrydate, exitdate, processedBy, status) VALUES (?, 'Please Enter',null, null,null, null, null, 'N')";
    if ($stmt = mysqli_prepare($db, $sql)) {
      mysqli_stmt_bind_param($stmt, "i", $ID);
      if (mysqli_stmt_execute($stmt)) {
      } else {
        echo "Error - visitor";
      }
      mysqli_stmt_close($stmt);
    }

    $sql = "INSERT INTO healthrecord (personID, gender, lasttestdate) VALUES (?, 'Please Enter','00-00-00')";
    if ($stmt = mysqli_prepare($db, $sql)) {
      mysqli_stmt_bind_param($stmt, "i", $ID);
      if (mysqli_stmt_execute($stmt)) {
      } else {
        echo "Error - healthrecord";
      }
      mysqli_stmt_close($stmt);
    }
    
    $sql = "INSERT INTO vehicle (vvisitorID, licensenum) VALUES (?, 'Please Enter')";
    if ($stmt = mysqli_prepare($db, $sql)) {
      mysqli_stmt_bind_param($stmt, "i", $ID);
      if (mysqli_stmt_execute($stmt)) {
      } else {
        echo "Error - healthrecord";
      }
      mysqli_stmt_close($stmt);
    }
  }
  mysqli_close($db);
  header("location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Sign Up</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="styles.css">
</head>

<body>
  <div id="login">
    <div class="form">
      <header style="text-align:center;">Register</header>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="col-md-12 mb-3">
          <div class="z-item">
            <img src="./images/user.png" alt="">
            <input type="text" name="username"
              class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>"
              value="<?php echo $username; ?>" placeholder="Username">
            <span class="invalid-feedback">
              <?php echo $username_err; ?>
            </span>
          </div>
        </div>
        <div class="col-md-12 mb-3">
          <div class="z-item">
            <img src="./images/psw.png" alt="">
            <input type="name" name="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>"
              value="<?php echo $name; ?>" placeholder="Full Name">
            <span class="invalid-feedback">
              <?php echo $name_err; ?>
            </span>
          </div>
        </div>
        <div class="col-md-12 mb-3">
          <div class="z-item">
            <img src="./images/psw.png" alt="">
            <input type="password" name="password"
              class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>"
              value="<?php echo $password; ?>" placeholder="Password">
            <span class="invalid-feedback">
              <?php echo $password_err; ?>
            </span>
          </div>
        </div>
        <div class="col-md-12 mb-3">
          <div class="z-item">
            <img src="./images/psw.png" alt="">
            <input type="password" name="confirm_password"
              class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>"
              value="<?php echo $confirm_password; ?>" placeholder="Confirm Password">
            <span class="invalid-feedback">
              <?php echo $confirm_password_err; ?>
            </span>
          </div>
        </div>
        <input type="submit" class="btn btn-primary" value="Submit">
      </form>
      <footer>
        <p style="text-align:center; padding-top: 20px;">Already have an account? <a href="login.php">Login here</a>.
        </p>
      </footer>
    </div>
  </div>
</body>

</html>