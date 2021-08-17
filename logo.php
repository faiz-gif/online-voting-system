<?php
session_start();
unset($_SESSION['user_enrol']);
unset($_SESSION['user_name']);
unset($_SESSION['gen_id']);
session_destroy();
header("location:index.php");
?>