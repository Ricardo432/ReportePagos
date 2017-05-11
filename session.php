<?php


 session_start();
 if(!isset($_SESSION['name'])) {
  header("location:index2.php?res=3");
	
}
    $inactivo = 900;
 
    if(isset($_SESSION['tiempo']) ) {
    $vida_session = time() - $_SESSION['tiempo'];
        if($vida_session > $inactivo)
        {
            session_destroy();
            header("Location: index2.php?res=3"); 
        }
    }
 
    $_SESSION['tiempo'] = time();
?>
 