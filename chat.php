<?php
session_start();
require("conn.php");

if(!isset($_SESSION['id'])){
    
header("Location:".$site_url);
    
}else{

?>

<html>
<head>
   <title> Chat </title> 
    <link rel="stylesheet" href="style.css">
</head>

<body>
    
<main class="main _chat">
    
<div class="main__header _chat">
    <a href="<?=$site_url;?>/exit.php"><div class="cursor _chat"></div></a>
    <h1 class="name _chat">Test task</h1>
</div>
    
<div class="main__chat">
    <?php
    $query5=mysqli_query($db, "SELECT * FROM `message` ");
    if(mysqli_num_rows($query5)>0)
    {
        while($mes=mysqli_fetch_assoc($query5)){
            $mes_userid=$mes['id_user'];
            $mes_messge=$mes['message'];
            $query6=mysqli_query($db, "SELECT `name` FROM `user` WHERE `id` = '$mes_userid' AND `id` NOT LIKE '$user'");
            $mesuser=mysqli_fetch_assoc($query6);
            ?>
        <div class="message">
        <?php
            print $mes_messge." <br/><div class='message__user'> User".$mesuser['name']."</div>";
            ?>
        </div>
           <?php 
        }
    
    } else {
        print "No message";
    }
    ?>
    </div>
      
    <div class="main__footer">
        <form method="POST" action="messageSave.php">
            <input type="text" name="common_text" placeholder="Type message..." class="input-message">
            <input type="submit" name="common_submit" value="" class="button"/>
        </form>
    </div>

</main>       
</body>
</html>
    <?php
}
?>