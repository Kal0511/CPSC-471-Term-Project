<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LOGIN</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <link rel="stylesheet" href="styles.css">
</head>

<body>
  <div id="login">
    <div class="form">
      <header>LOGIN</header>
      <form action="authentication.php" method="post">
        <div class="col-md-12 mb-3">
          <div class="z-item">
            <img src="./images/user.png" alt="">
            <input type="text" id="username" name="username" class="form-control" placeholder="username" />
            <div class="valid-feedback">
              Pass
            </div>
            <div class="invalid-feedback">
              Reject
            </div>
          </div>
        </div>
        <div class="col-md-12 mb-3">
          <div class="z-item">
            <img src="./images/psw.png" alt="">
            <input type="text" id="password" name="password" class="form-control" placeholder="password" />
            <div class="valid-feedback">
              Pass
            </div>
            <div class="invalid-feedback">
              Reject
            </div>
          </div>
        </div>
        <input type="submit" class="btn btn-primary" value="Login">
      </form>
      <footer>
        <p style="text-align:center; padding-top: 20px;">Don't have an account? <a href="register.php">Register here</a>.</p>
      </footer>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

</html>