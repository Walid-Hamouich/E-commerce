<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include_once("link.html"); ?> 
       
    
</head>
<body>
<?php include_once("head.php"); ?> 
    <div id="carouselExampleIndicators" class="carousel slide"  data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="carousel-caption ">
                    <span>New Collection</span>
                    <h3>C'est Votre Magasin</h3>
                    <h4>Votre Chez Vous</h4>
                    <button class="btn-a">Afficher Plus</button>
                </div>   
                <img class="w-100%" src="../image/pexels-edgars-kisuro-1488463.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
                <div class="carousel-caption ">
                    <span>New Collection</span>
                    <h3>C'est Votre Magasin</h3>
                    <h4>Votre Chez Vous</h4>
                    <button class="btn-a">Afficher Plus</button>
                </div>   
                <img class="w-100%" src="../image/pexels-terje-sollie-298863.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
                <div class="carousel-caption ">
                    <span>New Collection</span>
                    <h3>C'est Votre Magasin</h3>
                    <h4>Votre Chez Vous</h4>
                    <button class="btn-a">Afficher Plus</button>
                </div>   
               <img class="w-100%" src="../image/pexels-tembela-bohle-1884584.jpg" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div class="services">
        <div class="service">
            <i class="fa-solid fa-truck-fast"></i>
            <div>
                <h5>Livraison gratuite</h4>
                <p>Commandes de plus de 100$</p>
            </div>
        </div>
        <div class="service">
        <i class="fa-solid fa-lock"></i>
            <div>
                <h5>Paiement 100% sécurisé</h5>
                <p>Paiement en ligne</p>
            </div>
        </div>
        <div class="service">
           <i class="fa-solid fa-rotate-left"></i>
           <div>
                <h5>Retours gratuits</h5>
                <p>Dans les 30 jours</p>
           </div>
            
        </div>
        <div class="service">
            <i class="fa-solid fa-tag"></i>
            <div>
                <h5>Prix abordable</h5>
                <p>Garantie</p>
            </div>
          
        </div>
        <hr>
    </div>
    <section id="about">
        <div class="container-imag">
            <img src="../image/Ecommerce web page-pana.png" alt="">
        </div>
        <div class="container-text" i>
            <h1>A propos</h1>
            <h3>Nous offrons les meilleurs produits</h3>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Numquam doloremque dolor repellendus tempora accusantium cum! Facere enim laboriosam ducimus numquam architecto voluptates. Accusamus autem id earum, at debitis aliquam nostrum.</p>
        </div>
        
   </section>
   <section id="m-w">
    <h2>New Collection</h2>
    <div class="container-mw">
        <div class="parent">
            <div class="content-m child">
                <div class="main">
                    
                    <h3>Men's Fashion</h3>
                    <p>Up to 70% off</p>
                    <a href="" class="btn-b">SHOP NOW</a>
                </div>
            </div>
        </div>
        <div class="parent">
            <div class="content-w child">
                <div class="main child">
                    
                    <h3>Women's Wear</h3>
                    <p>Up to 70% off</p>
                    <a href="" class="btn-b">SHOP NOW</a>
                </div>
            </div>
        </div>
        
    </div>
    

   </section>
   
    <div id="fot">
       <?php include_once("footer.php") ?>
    </div>
   
   
</body>
</html>