<?php
    include('connection.php');
    @$_SESSION["member_id"] = "";
    @$_SESSION["namesurname"] = "";
    @$_SESSION["email"] = "";
    session_destroy();
    header('Location: index.php');
