<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <?php include_once("link.html"); ?> 
    <link rel="stylesheet" href="style.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
<?php include_once("head.php"); ?> 
  <div class="all_container">
  <div class="all_r">
    <div class="title">Registration</div>
    <div class="content">
      <form action="ajout_client.php" method="post">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Nom</span>
            <input type="text" placeholder="Enter your name" name="nom" required>
          </div>
          <div class="input-box">
            <span class="details">Prenom</span>
            <input type="text" placeholder="Enter your username" name="prenom" required>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" placeholder="Enter your email" name="email" required>
          </div>
          <div class="input-box">
            <span class="details">Telephone</span>
            <input type="text" placeholder="Enter your number" name="tele" required>
          </div>
          <div class="input-box">
            <span class="details">Mot de pass</span>
            <input type="text" placeholder="Enter your password" name="password" required>
          </div>
          
        </div>
        <div class="gender-details">
          <input type="radio" name="gender" value="HOMME" id="dot-1" >
          <input type="radio" name="gender" value="FEMME" id="dot-2" >
          
          <span class="gender-title">Sexe</span>
          <div class="category">
            <label for="dot-1">
            <span class="dot one"></span>
            <span class="gender">Homme</span>
          </label>
          <label for="dot-2">
            <span class="dot two"></span>
            <span class="gender">Femme</span>
          </label>
         
        </div>
        <div class="button">
          <input type="submit" value="Register">
        </div>
        <?php
            if(isset($_SESSION['inscri']))
            {
              $msg = $_SESSION['inscri'];
              if($msg != "")
              {
              
             ?>
             <div style="text-align: center;" class="alert alert-success mt-3"><?= $msg; ?></div>
             
             <?php 
             
              }
            }
              ?>
        <p>Already have ana account ? <a href="login.php">Login</a></p>
       
      </form>
    </div>
  </div>
  </div>
  

</body>
</html>
