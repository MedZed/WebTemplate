<?php


   session_start();
   
   if(session_destroy()) {
      echo 'You have cleaned session';
   header('Refresh: 2; URL = login.php');

   }
?>