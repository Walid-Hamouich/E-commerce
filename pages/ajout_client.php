<?php

include_once("conexion.php");

if(isset($_POST['nom']))
{
    try
    {
        $connexion->beginTransaction();
        
        $nom = $_POST['nom'];
        $prix = $_POST['prenom'];
        $email = $_POST['email'];
        $tele = $_POST['tele'];
        $password = md5($_POST['password']);
        $gender = $_POST['gender'];
        $date = date('Y-m-d');
        $result = $connexion->prepare("INSERT INTO compte_client VALUES (null, :nom,:prenom,:date,:email,:password,:sexe,:tele)");
    
        $result->bindParam(':nom',$nom);
        $result->bindParam(':prenom',$prenom);
        $result->bindParam(':date',$date);
        $result->bindParam(':email',$email);
        $result->bindParam(':password',$password);
        $result->bindParam(':sexe',$gender);
        $result->bindParam(':tele',$tele);
        
        $result->execute();
    
        // $result->execute(array(
        //     'nom' => $nom,
        //     'prenom' => $prenom,
        //      ...
        // ));
    
        $id = $connexion->lastInsertId();
        $req = $connexion->prepare("insert into pannier values(null,:id)");
        $req->bindParam(':id',$id);
        $req->execute();
    
        $connexion->commit();





   
        //$req = $connexion->query("insert into pannier values(null,)");
        $_SESSION['inscri'] = "le client a eté enregistre avec succes";
        header('location:Sign.php');

    }catch(PDOException $e) {
        
        $connexion->rollBack();//suicide
        echo "Erreur : " . $e->getMessage();




    }
    
}
?>