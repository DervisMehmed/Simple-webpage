    <?php

        include('connection.php');

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
    <div class="container"> 
      <button class="navbar-toggler navbar-toggler-right border-0" type="button" data-toggle="collapse" data-target="#navbar18">
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
          <div class="row">
            <div class="mx-auto col-md-6 col-10 bg-white p-5" style="">
            <form name="spotify_signup" action="signin.php" method="POST">
                <?php
                    if(@$_POST["gender"])
                    {
                        $signin_username           = $_POST["username"];
                        $signin_password           = $_POST["password"];
                        $signin_email              = $_POST["email"];
                        $signin_birthdate          = $_POST["birthdate"];
                        $signin_gender             = $_POST["gender"];

                        $signin_query       = $mysqli->query("SELECT * FROM user WHERE email='$signin_email'");
                        $count              = $signin_query->num_rows;

                        if($count > 0)
                        {
                            echo '<div class="alert alert-danger" role="alert"> Already Exist; </div>';
                        }else 
                        {
                            $adduser = $mysqli->query("INSERT INTO user VALUES('','$signin_email','$signin_username','$signin_password','$signin_birthdate','$signin_gender', '')");
                            
                            $e = $_POST["email"];
                            $to = $e;
                            $subject = "Email Verification";
                            $message = "<a href= 'https://localhost/v_page.php'> Register Account</a>";
                            $headers = "From: <MAIL_ADDRESS> \r \n";
                            $headers .= "MIME-Version: 1.0" . "\r\n";
                            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                            mail($to,$subject,$message,$headers);
                            
                            @$_SESSION["email"] = $signin_email;

                            echo '<div class="alert alert-success" role="alert"> User Created. Check your mail to verify your mail address.</div>';

                            sleep(1);

                            //header('Location: login.php');
                        }
                    }
                ?>
                <img src="spotify.png" class="imgLeft"/>
              <h2 class="mb-4">Sign up with your email address</h2>
                <div class="form-group"><input name="email" type="email" class="form-control my-2" placeholder="Enter your email" id="form19" required="required">
                  <div class="form-group"><input name="emailre" type="email" class="form-control my-2" placeholder="Confirm your email" id="form529" required="required">
                    <div class="form-group my-2" style=""><input name="password" type="password" class="form-control" placeholder="Create a password" id="form39" required="required">
                    <br br>  
                    <div class="form-group"> <input name="username" type="text" class="form-control" placeholder="Profile Name" id="form49" required="required">
                        <div class="form-group"><input name="birthdate" type="date" class="form-control my-2" placeholder="Date of Birth" id="form59"></div>
                      </div>
                    </div>
                  </div>    
                </div>
              <div class="row">
                <div class="col-md-20">
                
                  <h6 class="text-left">What is your gender?</h6>
                  <div class="col-md-20">
                      <label><input name="gender" type="radio" value="1" checked /> Male</label>
                      <label><input name="gender" type="radio" value="2" /> Female</label>
                      <label><input name="gender" type="radio" value="3" /> Non-Binary</label>
                  </div>
                  <input type="checkbox" id="remember_me" checked="checked" name="remember_me" value="remember_me">
                    <label for="remember_me"> Share my registration data in our privacy policy.</label>
                </div>
              </div>
              
              <br br>
              <button name="signupButton" type="submit" class="btn btn-primary">SIGN UP</button>
            </form>
            </br br>
                  <a href="login.php" target="">Have an account? Log in.</a>
            </div>
          </div>
        </div>

      </div>
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
    </html>