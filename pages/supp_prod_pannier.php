<?php
include_once("conexion.php");

if(isset($_GET["id"]))
{
    echo "ok";
    $id = $_GET["id"];

    echo $id;
    $req ="delete from pannier_produit where id_pp = $id";
    $connexion->exec($req);
    header("location: product.php");
   
}
?>