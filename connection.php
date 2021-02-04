<?php

    session_start();

    $mysqli = new mysqli('localhost','root','','cs458');
    if(mysqli_connect_errno()){
      printf('connection failed:', mysqli_connect_error());
      exit();
    }

    $mysqli->set_charset('utf8');
