<?php
session_start();
unset($_SESSION['LoginUser']);
session_destroy();
header("location:../website/index.html");
?>