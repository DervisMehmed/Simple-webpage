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

  <body>
    <div id="content-main" class="content-main" role="main">
      <div class="container block-content text-center">
        <div class="row">
        <form name="spotify_forgotmypw" action="forgotmypassword.php" method="POST">
                  <?php

                      if(@$_POST["forminput"])
                      {
                          $isExist            = $_POST["forminput"];
                          $query1             = $mysqli->query("SELECT * FROM user WHERE email='$isExist'");
                          $count              = $query1->num_rows;
                          $row                = $query1->fetch_array(MYSQLI_ASSOC);


                          $query2             = $mysqli->query("SELECT * FROM user WHERE username='$isExist'");
                          $count2             = $query2->num_rows;
                          $row2               = $query2->fetch_array(MYSQLI_ASSOC);

                          if($count > 0)
                          {
                            //sleep(4);
                            
                            $e = $row["email"];
                            $to = $e;
                            $subject = "Email Verification";
                            $message = "<a href= 'https://localhost/repassword.php'> Change Password</a>";
                            $headers = "From: <MAIL_ADDRESS> \r \n";
                            $headers .= "MIME-Version: 1.0" . "\r\n";
                            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                            mail($to,$subject,$message,$headers);

                            @$_SESSION["email"] = $e;

                            echo '<div class="alert alert-danger" role="alert"> Message sent by Email! </div>';
                          }else if( $count2 > 0)
                          {
                            $e = $row2["email"];
                            $to = $e;
                            $subject = "Email Verification";
                            $message = "<a href= 'https://localhost/repassword.php'> Change Password</a>";
                            $headers = "From: <MAIL_ADDRESS> \r \n";
                            $headers .= "MIME-Version: 1.0" . "\r\n";
                            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                            mail($to,$subject,$message,$headers);

                            @$_SESSION["email"] = $e;
                            
                            echo '<div class="alert alert-danger" role="alert"> Message sent by Username! </div>';
                            //sleep(1);
                          }
                          else
                          {
                            echo '<div class="alert alert-danger" role="alert"> User not found! </div>';
                          }
                      }
                  ?>
          <div class="col-sm-8 col-sm-offset-2">
            <h1>Password Reset</h1>
            <p>Enter your <b>Spotify username</b>, or the <b>email address</b> that you used to register. We'll send you an email with your username and a link to reset your password.</p>
          </div>

          <div class="col-sm-8 col-sm-offset-3">
            <form name="form" method="post" action="/uk/password-reset/" id="forgot-password-index" novalidate="novalidate">
              <div id="form">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group"><label class="control-label required" for="form_input">Email address or username</label>
                      <input type="text" id="form_input" name="forminput" required="required" data-msg-required="This field is required" class="form-control">
                    </div>
                  </div>
                </div>
                <button name="sendButton" type="submit" class="btn btn-primary">SEND</button>
              </div>
              </form>
            </form>
            <p>If you still need help, contact <a id="password-link-support" class="what-is-spotify" target="_blank" href="https://support.spotify.com/uk/contact-spotify-anonymous">Spotify Support.</a></p>
          </div>
        </div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>

  </html>