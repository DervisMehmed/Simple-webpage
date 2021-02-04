<?php

  include('connection.php');
  $email = @$_SESSION["email"];
  //echo '<p> mail address : ',  $email ,'</p>';
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://static.pingendo.com/bootstrap/bootstrap-4.3.1.css">
</head>

<nav class="navbar navbar-expand-md navbar-dark bg-primary">
    <div class="container"> <button class="navbar-toggler navbar-toggler-right border-0" type="button" data-toggle="collapse" data-target="#navbar18">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbar18"> <a class="navbar-brand d-none d-md-block" href="index.php">
          <i class="fa d-inline fa-lg fa-circle"></i>
          <b> Spotify</b>
        </a>
        <ul class="navbar-nav mx-auto"></ul>
        <ul class="navbar-nav">
          <li class="nav-item"> <a class="nav-link" href="login.php">Log In</a> </li>
          <li class="nav-item"> <a class="nav-link text-white" href="signin.php">Sign In</a> </li>
        </ul>
      </div>
    </div>
</nav>

<body>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="">Recover Password</h1>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <form name="spotify_repassw" action="repassword.php" method="POST">
            
            <?php
              if(!empty(@$_SESSION["email"]))
              {
                  echo '<div class="form-group row"> <label for="inputpasswordh1" class="col-2 col-form-label">Old Password</label>
                  <div class="col-10">
                    <input type="password" name = "oldpass" class="form-control" id="inputpasswordh1" required="required" placeholder="Old Password"> 
                  </div>
                  </div>
                  <div class="form-group row"> <label for="inputpasswordh2" class="col-2 col-form-label">New Password</label>
                    <div class="col-10">
                        <input type="password" name = "newpass" class="form-control" id="inputpasswordh2" required="required" placeholder="New Password"> 
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button> <br>';

                  $newpass        = $_POST['newpass'];
                  $oldpass        = $_POST['oldpass'];

                  $login_query    = $mysqli->query("SELECT * FROM user WHERE email = '$email' && user_password = '$oldpass'");
                  $count          = $login_query->num_rows;
                  $row            = $login_query->fetch_array(MYSQLI_ASSOC);

                  if($count > 0)
                  {
                    $mysqli->query("UPDATE user SET user_password = '$newpass' WHERE email = '$email' && user_password = '$oldpass'");
                    echo '<div class="col-md-12 text-center"><a class="btn btn-link btn-lg" href="login.php">You changed your password! go to Log In </a></div>';
                  }
              }
              else
              {
                echo '<br> <div class="col-md-12 text-center"> <a class="btn btn-link btn-lg" href="signin.php"> Sign In </a> </div>';
              }
            ?>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>