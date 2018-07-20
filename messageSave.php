<?php
session_start();
require("conn.php");

if(isset($_POST["common_submit"])){
   
    $text=trim(htmlspecialchars($_POST["common_text"]));
    $id=$_SESSION["id"];
    
    $query4=mysqli_query($db, "INSERT INTO `message` (`id`, `message`, `id_user`) VALUES (NULL, '$text', '$id')");
    
    if($query4){
        
       header("Location:".$site_url);
        
    }else{
        
        header("Location:".$site_url);
        
    }
}
?>