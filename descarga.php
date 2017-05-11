<?php
$comp = $_GET['ar'];
header("Content-disposition: attachment; filename=".$comp.);

readfile($comp);
?>