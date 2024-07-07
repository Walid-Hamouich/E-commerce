<?php
include('./conexion.php');

if(isset($_SESSION['message'])) {
  $message = $_SESSION['message'];
}
?>
<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <?php include_once("link.html"); ?> 
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
  
  <?php include_once("head.php"); ?> 
  <div class="all_content">
    <div class="all_cnt">
        <form action="crudlogin.php" method="post">
            <div class="title">Login</div>
                <div class="input-box underline">
                    <input type="text" placeholder="Enter Your Email" name="email" required>
                <div class="underline"></div>
            </div>
            <div class="input-box">
            <input type="password" placeholder="Enter Your Password" name="pass" required>
            <div class="underline"></div>
            </div>
            <div class="input-box button">
              
            <input type="submit" name="" value="Se connecter">
            <?php
              if(isset($_SESSION['message'])) {
                echo '<div style="text-align: center;" class="alert alert-danger mt-3">'. $message .'</div>'; 
              }
            ?>
            </div>
        </form>
        <div class="social mt-5">
            <a href=""><i class="fa-brands fa-facebook-f"></i></a>
            <a href=""><i class="fa-brands fa-instagram"></i></a>
            <a href=""><i class="fa-solid fa-envelope"></i></i></a>
            <a href=""><i class="fa-brands fa-google-plus-g"></i></a>
            
        </div>
        <p>Don't have an acount?<a href="Sign.php">Signup</a></p>
        
    </div>
  </div>
    
  </body>
</html>

