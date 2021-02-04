<?php

    include('connection.php');

    $login_query3    = $mysqli->query("SELECT * FROM user WHERE verification = 1 LIMIT 1");
    $count3          = $login_query3->num_rows;
    $row3            = $login_query3->fetch_array(MYSQLI_ASSOC);
    
    //echo '<p> mail address : ',  $row3['email'] ,'</p>';
    if(!is_null($row3['email']))
    {
        //echo '<div class="alert alert-danger" role="alert"> sql aldi </div>';
        $veri   = $row3['email'];
    }
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
  <div class="py-5 text-center" style="">
    <div class="container">
        <div class="mx-auto col-md-6 col-10 bg-white p-5">
            <?php
            
                if(@$_POST["email"])
                {   
                    $email              = $_POST["email"];
                    $password           = $_POST["password"];
                    
                        if($email != '' && $password != '')
                        {
                            $login_query    = $mysqli->query("SELECT * FROM user WHERE email = '$email' && user_password = '$password'");
                            $count          = $login_query->num_rows;
                            $row            = $login_query->fetch_array(MYSQLI_ASSOC);

                            if($count > 0)
                            {
                                @$_SESSION["member_id"] = $row["userid"];
                                @$_SESSION["namesurname"] = $row["username"];
                                @$_SESSION["email"] = $row["email"];
                                
                                if($row["verification"] == 1)
                                {
                                    echo '<div class="alert alert-danger" role="alert"> Verified User </div>';
                                }
                                else
                                {
                                    echo '<div class="alert alert-danger" role="alert"> Unverified User </div>';
                                }

                                echo '<div class="alert alert-danger" role="alert"> Logged In </div>';
                                echo '<div class="col-md-12"><a class="btn btn-primary" href="logout.php">Log out<br></a></div>';
                                
                            }else
                            {
                                echo '<div class="alert alert-danger" role="alert"> Not Found </div>';
                            }
                        }else
                        {
                            echo '<div class="alert alert-danger" role="alert"> Fill </div>';
                        }
                    
                }
                else
                {
                    echo '<div class="alert alert-danger" role="alert"> Fill email and password please! </div>';
                }
                
            ?>
            <img src="spotify.png" class="imgLeft"/>
            <h1 class="mb-4">Log in</h1>
            <form name="spotify_login" action="login.php" method="POST">
            <?php
                if(isset($veri))
                    {
                        //echo'<div class="alert alert-danger" role="alert"> aldi </div>';
                        echo '<div class="form-group"> <input type="email" name="email" class="form-control" placeholder="Enter Email" id="form9"  value= "' , $veri, '"> </div>';
                    }else
                    {
                        //echo '<div class="alert alert-danger" role="alert"> bos </div>';
                        echo '<div class="form-group"> <input type="email" name="email" class="form-control" placeholder="Enter Email" id="form9"  > </div>';
                    }
            ?>
                <div class="form-group mb-3"> <input type="password" name="password" class="form-control" placeholder="Enter Password" id="form10" > <small class="form-text text-muted text-right"></small> 
            </div> 
                <input type="checkbox" id="remember_me" checked="checked" name="remember_me" value="remember_me">
                <label for="remember_me"> Remember me</label>
                </br>
                <button type="submit" class="btn btn-primary">Log In</button>
                </br>
                <a href="forgotmypassword.php" target="">Forgot my password?</a>
                </br> 
                <a href="signin.php" target="">Don't Have an Account?</a>
            </form>
            
        </div>
    </div>
    
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 </body>

</html>
