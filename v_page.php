<?php

    include('connection.php');
    $email = @$_SESSION["email"];
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://static.pingendo.com/bootstrap/bootstrap-4.3.1.css">
</head>

<body>
  <div class="py-5">
    <div class="container">
      <div class="row">
      <?php
        if(@$_SESSION["email"] != '')
        {
          $login_query    = $mysqli->query("SELECT * FROM user WHERE email = '$email'");
          $count          = $login_query->num_rows;
          $row            = $login_query->fetch_array(MYSQLI_ASSOC);

          if($count > 0)
          {
            $mysqli->query("UPDATE user SET verification = 1 WHERE email = '$email'");
          }
          
          echo '<div class="col-md-12 text-center"><a class="btn btn-link btn-lg" href="login.php">You verified your account, you can click here.</a></div>';
        }
        else
        {
          echo '<div class="col-md-12 text-center"><a class="btn btn-link btn-lg" href="signin.php">you cannot verify your email address.</a></div>';
        }
      ?>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>