<?php

ob_start();
require_once'header.php';

  if($_SESSION['type']==3 && $_SESSION['full']==1){
      // if user type 3 but he complete info
    echo NULL;   //the system will do nothing
    }elseif($_SESSION['type']==3 && $_SESSION['full']==0){
    // the system will do  header location to page complete.php
    header('Location:complete');
  }
ob_end_flush();

?>


