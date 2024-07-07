<?php


include_once("conexion.php");
if(isset($_SESSION['id_pannier']) && isset($_POST['idp']) && isset($_POST['qte']))
{
   
   
    echo "ok";
    echo "id pannier ".$_SESSION['id_pannier']."<br>";
    echo "id prod ".$_POST['idp']."<br>";
    echo "qte ".$_POST['qte']."<br>";
   
    $id_pannier = $_SESSION['id_pannier'];
    $id_prod = $_POST['idp'];
    $qte = $_POST['qte'];
    
    $result = $connexion->prepare("INSERT INTO pannier_produit VALUES (null,:id_prod,:id_pannier,:qte)");

    $result->bindParam(':id_prod',$id_prod);
    $result->bindParam(':id_pannier',$id_pannier);
    $result->bindParam(':qte',$qte);

    $result->execute();
    header("location:product.php");

}else
{
    echo "ddd";
}

?>