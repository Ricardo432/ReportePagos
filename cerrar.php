<?php 

session_start();
unset($_SESSION['name']);
unset($_SESSION['tiempo']);
header("location:index.html"); ?>