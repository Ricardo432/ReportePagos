<?php


 session_start();
if(!isset($_SESSION['name'])) {
  header("location:index2.php?res=3");
	
} ?>