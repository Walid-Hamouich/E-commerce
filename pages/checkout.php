<?php
include_once("conexion.php");
if(!isset($_SESSION["id_client"]))
{
  header("location:login.php");
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    

    
    <?php include_once("link.html");?> 
    
  </head>

  <body>
  <?php include_once("head.php");?> 
    <div class="container mb-5 mt-5">
      <div class="py-5 text-center">
        <h2>Checkout form</h2>
      </div>
      <?php
                $prixtot = 0;
                if(isset($_SESSION['id_pannier']))
                {
                    $id = $_SESSION['id_pannier'];
                    $req = $connexion->prepare('select pp.*,p.* from pannier_produit pp join produit p on p.id_produit = pp.id_produit  where pp.id_pannier=:id');
                    $req->bindParam(':id', $id);
                    $req->execute();
                    $lignes = $req->fetchAll();

                    $rs = $connexion->prepare('select * from pannier_produit where id_pannier= :id');
                    $rs->bindParam(':id', $id);
                    $count = $rs->rowCount();
                    

                    
                 
           ?> 
      <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Your cart</span>
            <span class="badge badge-secondary badge-pill">3</span>
          </h4>
          <ul class="list-group mb-3">
          <?php
            foreach($lignes as $ligne)
            {
              $prixtot += $ligne["qte_produit"]*$ligne["prix"];
          ?>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0"><?= $ligne["nom_produit"] ?></h6>
                <small class="text-muted">Brief description</small>
              </div>
              <span class="text-muted"><?= $ligne["qte_produit"]*$ligne["prix"] ."$"?></span>
            </li>

              <?php
              }
      
              ?>
            <li class="list-group-item d-flex justify-content-between bg-light">
              <div class="text-success">
                <h6 class="my-0">Total (USD)</h6>
                
              </div>
              <span class="text-success"><?= $prixtot ."$"  ?></span>
            </li>
            
          </ul>

          <?php
            
     }
          ?>
        </div>
        <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Billing address</h4>
          <form class="needs-validation" novalidate action="crud_checkout.php" method="post">
            <input type="hidden" name="prixtot" value="<?= $prixtot ?>">
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">First name</label>
                <input type="text" class="form-control" id="firstName" placeholder="" value="<?= $_SESSION["nom_client"]; ?>" required>
                <div class="invalid-feedback">
                  Valid first name is required.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Last name</label>
                <input type="text" class="form-control" id="lastName" placeholder="" value="<?= $_SESSION["prenom_client"]; ?>" required>
                <div class="invalid-feedback">
                  Valid last name is required.
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label for="address">Address</label>
              <input type="text" class="form-control" id="address" placeholder="Address..." required>
              <div class="invalid-feedback">
                Please enter your shipping address.
              </div>
            </div>

         

           
            
            <hr class="mb-4">

            <h4 class="mb-3">Payment</h4>

            <div class="d-block my-3">
              <div class="custom-control custom-radio">
                <input id="credit" name="payment" type="radio" value="Credit card" class="custom-control-input" checked required>
                <label class="custom-control-label" for="credit">Credit card</label>
              </div>
              <div class="custom-control custom-radio">
                <input id="debit" name="payment" type="radio" value="Cash" class="custom-control-input" required>
                <label class="custom-control-label" for="debit">Cash</label>
              </div>
              <div class="custom-control custom-radio">
                <input id="paypal" name="payment" type="radio" value="PayPal" class="custom-control-input" required>
                <label class="custom-control-label" for="paypal">Paypal</label>
              </div>
            </div>
           

            <h4 class="mb-3">Livraison</h4>
            <div style="width: 100%;">
                <div class="col-md-8 mb-3  d-flex justify-content-between " style="width: 100%;">
                    <label for="country" class="mr-5">Type de Livraison : </label>
                    <select class="custom-select d-block w-100 ml-5" id="country" name="typl" required>
                        <option value="">Choose...</option>
                        <option value="Standard">Standard</option>
                        <option value="type">Express</option>
                    </select>
                
                </div>
            </div>
             
           
            <hr class="mb-4">
            <?php
            if(isset($_SESSION['comm']))
            {
              $msg = $_SESSION['comm'];
              if($msg != "")
              {
              
             ?>
             <div style="text-align: center;" class="alert alert-success mt-3"><?= $msg; ?></div>
             
             <?php 
             unset($_SESSION['comm']);
              }
            }
              ?>
            <button class="btn btn-primary btn-lg btn-block" id="btcheck" type="submit">Continue to checkout</button>
            <style>
                #btcheck {
                    padding: 10px 20px;
                    border-radius: 7px;
                    border: none;
                    background-color: var(--main);
                    color: var(--sectionBack);
                    font-size: 18px;
                    text-transform: capitalize;
                    cursor: pointer;
                    transition: .5s;
                    text-decoration: none;
                }
            </style>
          </form>
        </div>
      </div>

     
    </div>

    <?php include_once("footer.php");?> 
  </body>
</html>
