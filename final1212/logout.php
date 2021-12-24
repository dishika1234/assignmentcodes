<?php
 session_start();
 unset($_SESSION['sessionUser']);
 unset($_SESSION['sessionEmail']);
 unset( $_SESSION['sessionId']);
 header("location: login.php");




 ?>
