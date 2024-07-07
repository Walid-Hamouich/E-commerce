<?php

    session_start();
    define('UPLOAD_DIR', 'upload/');
    define('BASE_URL', '/php/ecommerce/pages/');
    try {
        $connexion = new PDO('mysql:host=localhost;dbname=ecomm','root', '');
        
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }


    // intval($_POST['cat_id']);
?>