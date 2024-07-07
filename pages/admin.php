
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <?php include_once("head.php"); ?> 
  <?php 
    $listDesCat = $connexion->prepare('SELECT * FROM categorie');
    $listDesCat->execute();
    $listDesCat = $listDesCat->fetchAll();
  ?>
  <div class="all_content">
    <div class="all_cnt">
        <?php
          if(isset($_SESSION['message'])){
            echo $_SESSION['message'];
            unset($_SESSION['message']);
          }
        ?>
        <form action="Ajouter_prod.php" method="post" enctype="multipart/form-data">
          <div class="title">ADD PRODUCT</div>
            <div class="input-box underline">
              <input type="text" placeholder="nom" name="nom" required>
              <div class="underline"></div>
            </div>
            <div class="input-box">
              <input type="text"  name="prix" placeholder="prix" required>
              <div class="underline"></div>
            </div>
            <div class="input-box underline">
              <input type="text"   name="stock" placeholder="stock" required>
              <div class="underline"></div>
            </div>
            <div class="input-box underline">
              <input type="text"   name="descrip" placeholder="description" required>
              <div class="underline"></div>
            </div>
            <div class="input-box underline">
              <div class="input-group mb-3">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="inputGroupFile02" name="img">
                </div>
                <div class="input-group-append"></div>
              </div>
              <div class="underline"></div>
            </div>
            <div class="input-group">
              <select name="cat"  name="cat"  class="custom-select" id="inputGroupSelect04" >
                <!-- <option value="1">TRIKO</option>
                <option value="2">PANTALANT</option>
                <option value="3">t-SHIRT</option>
                <option value="4">CHAUSSURE</option> -->
                <?php
                  foreach($listDesCat as $prodCat){
                    echo '<option value="'.$prodCat['id_cat'].'">'.$prodCat['nom_cat'].'</option>';
                  }
                ?>
              </select>
              <div class="input-group-append"></div>
            </div>
            <div class="input-box button">
              <input type="submit" name="" value="Se connecter">
            <?php

     

            ?>
            
            </div>
        </form>
        <!-- <div class="social mt-5">
            <a href=""><i class="fa-brands fa-facebook-f"></i></a>
            <a href=""><i class="fa-brands fa-instagram"></i></a>
            <a href=""><i class="fa-solid fa-envelope"></i></i></a>
            <a href=""><i class="fa-brands fa-google-plus-g"></i></a>
        </div> -->
        <!-- <p>Don't have an acount?<a href="Sign.php">Signup</a></p> -->
        
    </div>
  </div>
</body>
</html>