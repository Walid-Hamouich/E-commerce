<?php
include_once("conexion.php"); 

if(isset($_POST['nom']))
{
      $allowedFiles = array('jpg', 'png', 'jpeg');



      $nom = $_POST['nom'];
      $prix = $_POST['prix'];

      
      $stock = $_POST['stock'];
      $descrip = $_POST['descrip'];
      
      $img = $_FILES['img'];
      $cat = $_POST['cat'];
      
      var_dump($img);
      echo '<br>';
      $fileUploadPath = UPLOAD_DIR . md5(base64_encode(hash('sha256', basename($img['name'].time()))));
      $fileExtension = strtolower(pathinfo($img['name'], PATHINFO_EXTENSION));
      
      if(!in_array($fileExtension, $allowedFiles)){
        $_SESSION['message'] = '<div class="alert alert-danger"><b>OPS!!</b> Erreur Lors D\'ajout de votre produit</div>';
        die(header('Location: admin.php'));
      }

      $fileSize = getimagesize($img['tmp_name']);
      var_dump($fileSize);

      if($img['error'] != 0){
        $_SESSION['message'] = '<div class="alert alert-danger"><b>OPS!!</b> Erreur Lors D\'ajout de votre produit</div>';
        die(header('Location: admin.php'));
      }

     

      if(!move_uploaded_file($img['tmp_name'], $fileUploadPath.'.'.$fileExtension)){
        $_SESSION['message'] = '<div class="alert alert-danger"><b>OPS!!</b> Erreur Lors D\'ajout de votre produit</div>';
        die(header('Location: admin.php'));
      }
      $finalUploadName = $fileUploadPath.'.'.$fileExtension;
      try {
        $result = $connexion->prepare("insert into produit values(null,:cat,:nom,:description,:prix,:stock,:img)");
        $result->bindParam(':nom',$nom);
        $result->bindParam(':prix',$prix);
        $result->bindParam(':stock',$stock);
        $result->bindParam(':description',$descrip);
        $result->bindParam(':img', $finalUploadName);
        $result->bindParam(':cat',$cat);
  
        $result->execute();
      } catch (\Throwable $th) {
        //throw $th;
        $_SESSION['message'] = '<div class="alert alert-danger"><b>OPS!!</b>Erreur Lors D\'ajout de votre produit</div>';
        die(header('Location: admin.php'));
      }
      $_SESSION['message'] = '<div style="text-align: center;" class="alert alert-success"><b>Good!!</b> Le Produit '.$nom.' a ét Bien Ajouté</div>';
      die(header('Location: admin.php'));
}
// $q = "select img from produit where id_produit = 1 ";

// foreach( $connexion->query($q) as $row)
// {
//     // echo "<img src='data:image/jpeg;base64," . base64_decode($row["img"]) . "'>";

// // Fetch the result
// // Fetch the result




// }
// $query = "SELECT img FROM produit WHERE id_produit = 1";
// $result = $connexion->query($query);

// // Fetch the image data from the query result
// if ($result->rowCount() > 0) {
//   $row = $result->fetch();
//   $imgData = $row['img'];

//   // Encode the image data to base64 and display the image
//   $imgBase64 = base64_encode($imgData);
//   echo '<img src="data:image/jpeg;base64,' . $imgBase64 . '">';
// }









?>