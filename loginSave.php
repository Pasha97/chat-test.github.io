<?php 

session_start();
require "conn.php";

if(isset($_SESSION["id"])){
    
    header("Location:".$site_url."/chat.php");
    
}else{
   
?>

<html>
<head>
    
    <title> Chat</title> 
    <link rel="stylesheet" href="style.css">
    
</head>

<body>
    
<main class="main _new-log">
    
    <div class="main__header">
        <a href="loginIn.php">
            <div class="cursor" ></div> 
        </a>
        <span class="text _size-xl "> New Account</span>
    </div>
    
    <h1 class="name _new-log"> Sing in </h1>
    
    <div class="enter _new-log">
        
        <form method="post" action="<?=$site_url;?>/loginSave.php">
            <div class="enter__header _new-log">
               
                <label class="text _enter">NAME</label><br>
                <input type="text" name="name" class="input" required><br />
    
                <label  class="text _enter">EMAIL</label><br> 
                <input type="text" name="email" class="input" required><br />
   
                <label  class="text _enter">PASSWORD</label><br>
                <input type="password" name="password" class="input" required><br />

                <label class="text _enter">PHONE</label><br>
                <input type="text" name="phone" class="input" required><br />
                
    <?php
    
    if(isset($_POST["submit"])){
        
         $email =trim(htmlspecialchars($_POST["email"]));
         $name =trim(htmlspecialchars($_POST["name"]));
         $password=trim(htmlspecialchars($_POST["password"]));
         $phone=trim(htmlspecialchars($_POST["phone"]));
        
        $query2=mysqli_query($db , "SELECT * FROM `user` WHERE `email`='$email'");
        
    if (mysqli_num_rows($query2)>0){
        
            print "<div class='message-registered'>This email is already registered </div>";
        
        }else{
            
            $query3 = mysqli_query($db, "INSERT INTO `user` ( `name`, `password`, `email`,`phone` ) VALUES ('$name', '$password', '$email', '$phone')");
        }
    }
    ?>
                
        </div>
            
            <div class="enter__footer _new-log">
        
                <input type="submit" name="submit" value="CREATE ACCOUNT" class="button-enter _new-log">

            </div>
        </form> 
      </div>
</main>
</body>
</html>
<?php
}
?>