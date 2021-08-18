
<?php
//echo isset($_SESSION['userid']); 

//if (!isset($_SESSION['userid'])) {
  //echo '<script>alert("you have to log in first")</script>';
//}
//else{


//}

include 'header.php';

if (isset($_POST['quantity'])){
  foreach($_SESSION["shopping_cart"] as &$value){
    if($value['id'] === $_POST["id"]){
        $value['quantity'] = $_POST["quantity"];
        break; // Stop the loop after we've found the product
    }
  }
}


if (isset($_POST['remove'])){
  if(!empty($_SESSION["shopping_cart"])) {
      foreach($_SESSION["shopping_cart"] as $key => $value) {
        if($_POST['id'] == $key){
        unset($_SESSION["shopping_cart"][$key]);
        echo '<script>alert("Product is removed from your cart!")</script>';
        }
        if(empty($_SESSION["shopping_cart"]))
        unset($_SESSION["shopping_cart"]);
        } 
  }
  }

if(!empty($_SESSION["shopping_cart"])) {
  $cart_count = count(array_keys($_SESSION["shopping_cart"]));




?>

<!--Section: Block Content-->
<section>

  <!--Grid row-->
  <div class="row">

    <!--Grid column-->
    <div class="col-lg-8">

      <!-- Card -->
      <div class="card wish-list mb-3">
        <div class="card-body">

          <h5 class="mb-4">Cart (<span><?php echo $cart_count; ?></span> items)</h5>


          <?php 
            if(isset($_SESSION["shopping_cart"])){
              $total_price = 0; 
             // $product["quantity"] = $_POST['quantity']; 
            foreach ($_SESSION["shopping_cart"] as $product){
          ?>
<form method="post" action="" >

<input type='hidden' name='id' value="<?php echo $product["id"]; ?>" />
          <div class="row mb-4">
            <div class="col-md-5 col-lg-3 col-xl-3">
              <div class="view zoom overlay z-depth-1 rounded mb-3 mb-md-0">
                <img class="img-fluid w-100"
                  src="<?php echo $product["image"]; ?>" alt="Sample">
              </div>
            </div>
            <div class="col-md-7 col-lg-9 col-xl-9">
              <div>
                <div class="d-flex justify-content-between">
                  <div>
                    <h5><?php echo $product["name"]; ?></h5>
                  </div>
                  <div>
                    
                   <div class="def-number-input number-input safari_only mb-0 w-100">
                     <!--  <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                        class="minus" ></button> -->
                      <input class="quantity" min="0" name="quantity" value="<?php echo $product["quantity"]; ?>" type="number" onchange="this.form.submit()">
                      <!--<button onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                        class="plus"></button> -->
                      </form>
                    </div>
                    <small id="passwordHelpBlock" class="form-text text-muted text-center">
                    quantity
                    </small>
                  </div>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                <form method="post" action="cart.php" >
                  <input type='hidden' name='id' value="<?php echo $product["id"]; ?>" />
                  <div>
                    <button name="remove" type="submit" class="card-link-secondary small text-uppercase mr-3">Remove item </button>
                  </div>
                </form>
                  <p class="mb-0"><span><strong><?php echo  $product["quantity"]." * $". $product["price"]; ?></strong></span></p>
                </div>
              </div>
            </div>
          </div>
        <?php
       // $product["quantity"] = $_POST['quantity']; 
       $total_price += ($product["price"]*$product["quantity"]);
}
        ?>

        </div>
      </div>
      <!-- Card -->

      <!-- Card -->
      <div class="card mb-3">
        <div class="card-body">

          <h5 class="mb-4">Expected shipping delivery</h5>

          <p class="mb-0"> Thu., 12.03. - Mon., 16.03.</p>
        </div>
      </div>
      <!-- Card -->

      <!-- Card -->
      <div class="card mb-3">
        <div class="card-body">

          <h5 class="mb-4">We accept</h5>

          <img class="mr-2" width="45px"
            src="https://mdbootstrap.com/wp-content/plugins/woocommerce-gateway-stripe/assets/images/visa.svg"
            alt="Visa">
          <img class="mr-2" width="45px"
            src="https://mdbootstrap.com/wp-content/plugins/woocommerce-gateway-stripe/assets/images/amex.svg"
            alt="American Express">
          <img class="mr-2" width="45px"
            src="https://mdbootstrap.com/wp-content/plugins/woocommerce-gateway-stripe/assets/images/mastercard.svg"
            alt="Mastercard">
          <img class="mr-2" width="45px"
            src="https://z9t4u9f6.stackpathcdn.com/wp-content/plugins/woocommerce/includes/gateways/paypal/assets/images/paypal.png"
            alt="PayPal acceptance mark">
        </div>
      </div>
      <!-- Card -->

    </div>
    <!--Grid column-->

    <!--Grid column-->
    <div class="col-lg-4">

      <!-- Card -->
      <div class="card mb-3">
        <div class="card-body">

          <h5 class="mb-3">The total amount of</h5>

          <ul class="list-group list-group-flush">
            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
              Temporary amount
              <span><?php echo $total_price; ?></span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
              Shipping
              <span>free</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
              <div>
                <strong>The total amount of</strong>
              </div>
              <span><strong>$<?php echo $total_price; ?></strong></span>
            </li>
          </ul>
          <button type="button" class="btn btn-primary btn-block waves-effect waves-light">buy now</button>
        </div>
      </div>
      <!-- Card -->


    </div>
    <!--Grid column-->

  </div>
  <!--Grid row-->

</section>
<!--Section: Block Content-->

<?php
}}
else{
  echo '<div class="card mb-3"><div class="card-body"><h2 class="mb-4">your cart is empty</h2></div></div>';
}
include 'footer.php';
?>