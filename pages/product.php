<?php 
    include_once("conexion.php");
   
    if (isset($_GET['categorie'])) {
		$categorie = $_GET['categorie'];
		try {
			
			$sql = "SELECT * FROM produit p join categorie c on c.id_cat = p.id_cat WHERE c.nom_cat = :choix";
			$stmt = $connexion->prepare($sql);
            $stmt->bindParam(':choix',$categorie);
			$stmt->execute();
			$result = $stmt->fetchAll();
			
		} catch(PDOException $e) {
			echo "Erreur : " . $e->getMessage();
		}
	}
    
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    

    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>



    <?php include_once("link.html"); ?> 
</head>
<body>
<?php include_once("head.php"); ?> 


    <section class="shop">
            <div class="img-p">
                <div class="main-p">
                    
                </div>
            </div>
        <h2 class="shop-title">NOTRE PRODUITS</h2>
        <div class="sp-all">
            <div class="shop-menu">
                <h2>Categories</h2>
                <ul>
                    <div class="cat">
                        <form method="get" action="">
                            <li><button type="submit" name="categorie" value="Trico">Trico</button></li>
                            <li><button type="submit" name="categorie" value="Pantalons">Pantalons</button></li>
                            <li><button type="submit" name="categorie" value="T-Shirt">T-Shirt</button></li>
                            <li><button type="submit" name="categorie" value="Shaussures">Shaussures</button></li>
                            <li><button type="submit" name="categorie" value="Jacket">Jacket</button></li>
                    </form>
                </div>
                        
                </ul>     
                
            </div>
            <div class="shop-content">
                
            <?php 
             if (isset($_GET['categorie'])) {
            foreach ($result as  $ligne ){
             ?>
             
                    <div class="product">
                        <div class="image">
                            <img src="<?= BASE_URL.$ligne['img_filename'] ?>">
                        </div>
                        <div class="namePrice">
                            <h3><?= $ligne['nom_produit'] ?></h3>
                            <span><?= $ligne['prix'].'$' ?></span>
                        </div>
                        <p><?= $ligne['description'] ?></p>
                       
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
                        
                        <?php
                        if(isset($_SESSION['id_client']))
                        {         
                        ?>
                       <div class="bay">
                            <!--<a href="ajout_au_panier.php?" data-toggle="modal" id="bt" data-target="#exampleModal">Add to cart </a>-->
                            <button class="prodinfo"  data-id="<?= $ligne["id_produit"] ?>" id="bt"  >Add to cart </button>
                        </div>
                        <?php
                        
                        }else
                        {
                        ?>
                        <div class="bay">
                            <a href="login.php"  id="bt"> Add to cart </a>
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                    
                    <!--<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">/h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                
                                <form action="ajout_au_panier.php" method="post">
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Quantite:</label>
                                        <input type="number" class="form-control" name="qte" id="recipient-name">

                                    </div>
                                    <input type="submit" value="Ajouter au pannier" id="bt">
                                    
                                </form>

                               
                            </div>
                            
                            </div>
                        </div>
                    </div>-->
                <?php }
                } ?>
                    
                    
            </div>
        </div>
       
       <script type="text/javascript">
            $(document).ready(function(){
                $('.prodinfo').click(function(){
                    var prodinfo = $(this).data('id');
                    var txt = $('#idprod');
                    txt.val(prodinfo);
                     $('#empModal').modal('show'); 
                });
            });
       </script>
         <div class="modal fade" id="empModal" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Quantite Produits :</h4>
                          <button type="button" class="close" data-dismiss="modal">×</button>
                        </div>
                        <div class="modal-body">
                        </div>
                        <form action="ajout_au_panier.php" method="post">
                            <label for=""  class="col-form-label">Entrer la Quantite : </label>
                            <input type="number"  name="qte">
                            <input type="hidden" name="idp" id="idprod">
                            <input type="submit" name="" value="Ajouter" id="btt">
                        </form>
                    
                    </div>
                </div>
        </div>
        <style>
            form
            {
                padding:25px;
            }
            form input{
                margin:5px;
            }
            form #btt{
                padding: 5px 8px;
                border-radius: 7px;
                border: none;
                background-color: var(--main);
                color: var(--sectionBack);
                font-size: 15px;
                text-transform: capitalize;
                cursor: pointer;
                transition: .5s;
                text-decoration: none;
            }
        </style>
    </section>
    <?php include_once("footer.php") ?>
</body>
</html>