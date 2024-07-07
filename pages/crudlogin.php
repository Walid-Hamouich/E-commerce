<?php

include_once("conexion.php");

if(isset($_POST['email'])) {
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $req = $connexion->prepare("select cc.* ,p.id_pannier from compte_client cc join pannier p on p.id_client = cc.id_client where cc.email = :email and cc.passwordd = :pass");
    $req->bindParam(':email',$email);
    $req->bindParam(':pass', md5($pass));
    $req->execute();
    if($req->rowCount() >0) {
       $ligne = $req->fetch(); 
       $_SESSION['id_client'] = $ligne['id_client'];
       $_SESSION['nom_client'] = $ligne['nom_client'];
       $_SESSION['prenom_client'] = $ligne['prenom_client'];
       $_SESSION['id_pannier'] = $ligne['id_pannier'];
       header('location:master.php');
       echo 'bien jouer';
    }
    else{
        header('location:login.php');
        $_SESSION['message'] = "Email ou Mot de pass incorrect";
    }
    

    
}else
{
    echo 'NO';
}