<?php 
session_start();
require("conn.php");


if(isset($_SESSION["id"])){
    
    header("Location:".$site_url."/chat.php");
    
}else{
    
    if(isset($_POST["submit"])){ 
        
        $email =trim(htmlspecialchars($_POST["email"]));
        $password=trim(htmlspecialchars($_POST["password"]));
        
        $query=mysqli_query($db, "SELECT * FROM `user` WHERE `email`= '$email' AND `password` = '$password' ");
        
        if(mysqli_num_rows($query)>0){
            
            $user = mysqli_fetch_assoc($query);
            $_SESSION["id"]=$user["id"];
            header("Location:".$site_url."/chat.php");
        }
    }
?>

<html>
<head>
    
    <title> Chat</title> 
    <link rel="stylesheet" href="style.css">
    
</head>

<body>
    
<main class="main">
    
    <h1 class="name"> Chat </h1>  
    
    <div class="enter">
    <form method="post" action="<?=$site_url;?>/loginIn.php">
        
        <div class="enter__header">
            <label for="" class="text _enter">USERNAME</label><br /> 
            <input type="text" name="email" class="input"><br />
            <label for="" class="text _enter">PASSWORD</label><br />
            <input type="password" name="password"  class="input"><br />
        </div>
        
        <div class="enter__footer">
                <input type="submit" name="submit" value="Get Started" class="button-enter">
        </div>
    </form> 
    </div>

    <div class="footer">
        <span class="text">Not registered? </span>
        <a href="loginSave.php" class="link _underline _bold"> Create Account</a>
    </div>
    
</main>
</body>
</html>
<?php
}
?>