<?php
include 'header.php';
include_once 'db.php';



if (isset($_POST['id']) && $_POST['id']!=""){
    $id = $_POST['id'];
    $result = mysqli_query($conn,"SELECT * FROM products WHERE ProductID = $id;");
    $row = mysqli_fetch_assoc($result);
    $name = $row['ProductName'];
    $id = $row['ProductID'];
    $price = $row['ProductPrice'];
    $image = $row['ProductImage'];
    $desc = $row['ProductShortDesc'];
     
    $cartArray = array(
     $id=>array(
     'name'=>$name,
     'id'=>$id,
     'price'=>$price,
     'quantity'=>1,
     'image'=>$image,
     'desc'=>$desc)
    );
     
    if(empty($_SESSION["shopping_cart"])) {
        $_SESSION["shopping_cart"] = $cartArray;
       // $status = "<div class='box'>Product is added to your cart!</div>";
       echo '<script>alert("Product is added to your cart!")</script>';
    }else{
        $array_keys = array_keys($_SESSION["shopping_cart"]);
        if(in_array($id,$array_keys)) {
    // $status = "<div class='box' style='color:red;'> Product is already added to your cart!</div>"; 
       echo '<script>alert("Product is already added to your cart!")</script>';
        } else {
        $_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
       // $status = "<div class='box'>Product is added to your cart!</div>";
       echo '<script>alert("Product is added to your cart!")</script>';
     }
     
     }
    }


if (isset($_POST['searchbtn'])){

   $search = mysqli_real_escape_string($conn,$_POST['search']);
   $sql = "select * from products where ProductName like '%$search%' or ProductShortDesc like '%$search%';";
   $result = mysqli_query($conn,$sql);
   $queryresult = mysqli_num_rows($result);

   if ($queryresult>0){
    while ($rows=mysqli_fetch_assoc($result)){

?>


<div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <form method="post" action="">
              <input type='hidden' name='id' value="<?php echo $rows['ProductID']; ?>" />
              <a href="#"><img class="card-img-top" src="<?php echo $rows['ProductImage']; ?>" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="#"><?php echo $rows['ProductName']; ?></a>
                </h4>
                <h5>$<?php echo $rows['ProductPrice']; ?></h5>
                <p class="card-text"><?php echo $rows['ProductShortDesc']; ?></p>
              </div>
              <div class="card-footer">
                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                <input type="hidden" name="id" value="<?php echo $rows['ProductID']; ?>"/>
                <button type="submit" class="btn btn-warning">Add to cart</button>
              </form>
              </div>
            </div>
          </div>

          <?php
              }}else{
                  echo "no matching results";
              }}
              include 'footer.php';
              ?>
