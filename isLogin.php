<?php
    if(isset($_SESSION['isLogin'])){
      header('location:gamehub/dashboard.php');
    }
?>