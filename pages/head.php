<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include_once("link.html");?> 
    <?php include_once("conexion.php") ?>

    
</head>

<body>

    <div class="head">

        <div class="nv cont">
            <nav>
                <a href="master.php" class="lg"><span>E</span>commerce</a>
                <ul>
                    <li><a href="./master.php"><span>A</span>cceuil</a></li>
                    <li><a href="master.php#about"><span>A</span>propos</a></li>
                    <li><a href="./product.php"><span>P</span>roduits</a>
                        <ul>
                            
                            <div class="p-list">
                                <li><a href="">Trico</a></li>
                                <li><a href="">Pantalons</a></li>
                                <li><a href="">T-Shirt</a></li>
                                <li><a href="">Shaussures</a></li>
                            </div>
                        </ul>
                       
                    <li><a href="content.php#fot"><span>C</span>ontact</a></li>
                </ul>
                <div class="icons-p">
                    <i class="fa-regular fa-heart user"></i>
                    <?php
                    if(isset($_SESSION['id_client']))
                    {         
                    ?>
                    <i class="fa-solid fa-cart-arrow-down down" id="cart-icon" ></i>
                    <i class="fa-regular fa-user user" onclick="toggleMenu()"></i>
                    <?php
                    
                    }else
                    {
                    ?>
                    <a href="sign.php" class="btn-sign">Signup</a>
                     <?php
                    }
                     ?>
                    <div class="sub-m " id="subMenu">
                        <div class="sub">
                            <div class="user-i">
                                <i class="fa-solid fa-user use" ></i>                              
                                <h5><?= $_SESSION['nom_client'] . " ".$_SESSION['prenom_client']; ?></h5>
                            
                            </div>
                            <hr>

                            <a href="" class="sub-l">
                                <i class="fa-solid fa-pen-to-square"></i>
                                <p>Edit Profile</p>
                                <span>></span>
                            </a>
                            <a href="" class="sub-l">
                                <i class="fa-solid fa-star"></i>
                                <p>Historique command</p>
                                <span>></span>
                            </a>
                            <a href="logout.php" class="sub-l">
                                <i class="fa-solid fa-right-from-bracket"></i>
                                <p>Logout</p>
                                <span>></span>
                            </a>
                        </div>
                    </div>
                </div>
                <script>
                    var submenu = document.getElementById("subMenu");
                    function toggleMenu()
                    {
                        submenu.classList.toggle('open-menu');
                    }

                </script>
            </nav>
           <?php
                    $prixtot = 0;
                    if(isset($_SESSION['id_pannier']))
                    {
                        $id = $_SESSION['id_pannier'];
                        $req = $connexion->prepare('select pp.*,p.* from pannier_produit pp join produit p on p.id_produit = pp.id_produit  where pp.id_pannier=:id');
                        $req->bindParam(':id', $id);
                        $req->execute();
                        $lignes = $req->fetchAll();

                        //$req->execute(array('id' => $id, 'autreAttribut' => $autreAttribut));

                       

                    }
                    $rs = $connexion->prepare('select * from pannier_produit where id_pannier= :id');
                    $rs->bindParam(':id', $id);
                    $count = $rs->rowCount();
                   
                    
           ?> 
            <div class="cart">
                <h2 class="cart-title">YOUR CART</h2>
                <?php
                 if(isset($_SESSION['id_pannier']))
                 {
                    foreach($lignes as $l)
                    {
                    ?>
                    <div class="cart-content">
                        <div class="cart-box">
                            <img src="<?= BASE_URL.$l['img_filename'] ?>"  class="c-img" alt="">
                            <div class="detail-box">
                                <div class="cp-title" ><?= $l["nom_produit"] ?></div>
                                <div class="c-price" id="prix" ><?= $l["prix"]."$" ?></div>
                                <input type="number" id="qte" value="<?= $l["qte_produit"] ?>" class="quantity">
                            </div>
                            <a href="supp_prod_pannier.php?id=<?= $l['id_pp'] ?>" onclick="return confirm('Are you sure you want to delete this')"><i class="fa-solid fa-trash cart-remove"></i></a>

                            <!---->
                        </div>
                    </div>
                
                    <?php

                    $prixtot += $l["prix"] * $l["qte_produit"];
                    }
                }
                ?>

                <div class="total">
                    <div class="total-t">Total</div>
                    <div class="total-p" id="tot"><?= $prixtot ."$"?></div>
                </div>
                <script>
                    
                </script>
                
                <div class="by">
                    <a href="checkout.php" class="btn-by">Buy Now</a>
                </div>
                
                <i class="fa-sharp fa-regular fa-x " id="close"></i>
            </div>
        </div>
    </div>
    <script src="../javascript/script.js"></script>
</body>
</html>