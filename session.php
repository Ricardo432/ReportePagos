<?php


 session_start();
 if(isset($_SESSION['name'])) {
     $inactivo = 1800;
 
    if(isset($_SESSION['tiempo']) ) {
    $vida_session = time() - $_SESSION['tiempo'];
  
  
   

        if($vida_session > $inactivo)
        {
            
            session_destroy();
            header("Location: index2.php?res=3&r=1"); 
        }
    }
    


    $_SESSION['tiempo'] = time();
	
}else{
   
   header("location:index2.php?res=3&r=0");

   
}
?>
 