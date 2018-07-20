<?php

session_start();
require("conn.php");

if(isset($_SESSION['id'])){
   
    header("Location:".$site_url."/chat.php");
    
}else{
    
   header("Location:".$site_url."/loginIn.php"); 
}

?>