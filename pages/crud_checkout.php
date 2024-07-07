<?php

include_once("conexion.php");

if(isset($_POST["payment"]) )
{
    try
    {
        $connexion->beginTransaction();

        $pay = $_POST["payment"];
        $livraison =  $_POST["typl"];
        $id_pannier = $_SESSION["id_pannier"];
        $date = date('Y-m-d');
        $prixtot = $_POST['prixtot'];

        $req = "insert into command values(null,'$date',$id_pannier)";
        $connexion->exec($req);

        $id = $connexion->lastInsertId();
        
        $reqpay = "insert into paiement values(null,$id,'$pay','$date')";
        $connexion->exec($reqpay);

        $reqlivraison = "insert into livraison values(null,'$date',$id,'$livraison')";
        $connexion->exec($reqlivraison);

        $reqfcture = "insert into facture values(null,$id,'$date',$prixtot)";
        $connexion->exec($reqfcture);

        $connexion->commit();


        $_SESSION['comm'] = "la command a eté effectuer avec succes";
        header('location:checkout.php');



    }catch(PDOException $e) {
        
        $connexion->rollBack();//suicide
        echo "Erreur : " . $e->getMessage();
    }
}
else{
    echo "Error";
}

?>