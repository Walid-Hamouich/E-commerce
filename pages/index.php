<?php

if(!isset($_SESSION['id_client'])){
    header('Location: login.php');
    exit;
}

header('Location: master.php');

?>