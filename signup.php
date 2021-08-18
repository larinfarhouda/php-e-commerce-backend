<?php

if (isset($_POST['signupbtn'])) {
  
    require 'db.php';

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $adress = $_POST['adress'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $zip = $_POST['zip'];


    if (empty($name) || empty($email)|| empty($password) || empty($adress)|| empty($city) || empty($country) || empty($zip)){
      header("Location: signup.php?error=emptyfields");
      exit();
    }

    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z-' ]*$/", $name)){
      header("Location: signup.php?error=invalidmail&name");
      exit();
    }

    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
      header("Location: signup.php?error=invalidmail");
      exit();
    }

    elseif (!preg_match("/^[a-zA-Z-' ]*$/",$name)){
      header("Location: signup.php?error=invalidname");
      exit();
    }

    else{
        $sql = "SELECT UserEmail FROM users WHERE UserEmail =?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
          header("Location: signup.php?error=sqlerror");
          exit();
        }
        else{
          mysqli_stmt_bind_param($stmt,"s",$email);
          mysqli_stmt_execute($stmt);
          mysqli_stmt_store_result($stmt);
          $resultCheck = mysqli_stmt_num_rows($stmt);
          if ($resultCheck>0){
            header("Location: signup.php?error=emailtaken");
            exit();
          }
          else {
            $sql = "INSERT INTO users (UserEmail, UserPassword, UserName, UserCity, UserZip, UserPhone, UserCountry, UserAddress) VALUES (?,?,?,?,?,?,?,?)";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt,$sql)){
              header("Location: signup.php?error=sqlerror");
              exit();
          }
          else{
            $hashedpwd = password_hash($password, PASSWORD_DEFAULT);

            mysqli_stmt_bind_param($stmt,"ssssssss",$email,$hashedpwd,$name,$city,$zip,$phone,$country,$adress);
            mysqli_stmt_execute($stmt);
            header("Location: login.php?signup=success");
            exit();
          }
        }
    }
  }
}

include 'header.php';
?>


<div class="d-flex justify-content-center">
<img src="images/loginn.png" class="image"></div>
</div>

<div class="form">

<?php
    if (isset($_GET['error'])){

        if ($_GET['error'] == "emptyfields"){
            echo '<p class = "errormsg"> Fill all the fields </p>';
          }

       else if ($_GET['error'] == "invalidmail"){
        echo '<p class = "errormsg"> invalid mail </p>';
        }
        else if ($_GET['error'] == "invalidname"){
          echo '<p class = "errormsg"> invalid name </p>';
        }

        else if ($_GET['error'] == "invalidmail&name"){
         echo '<p class = "errormsg"> invalid mail and name </p>';
        }  
        
        else if ($_GET['error'] == "emailtaken"){
          echo '<p class = "errormsg"> email is already taken </p>';
         }  
    }
    else if (isset($_GET['signup']) == "success"){

      echo '<script>alert("you have signed up successfully")</script>'; 
    }
    
?>
<form class="formm col-md-6" action="signup.php" method="POST">
<div class="form-group">
    <label for="name">Name</label>
    <input type="name" name="name" class="form-control" id="inputAddress" placeholder="Name">
  </div>
  <div class="form-group">
    <label for="phone">Phone</label>
    <input type="phone" name="phone" class="form-control" id="inputAddress" placeholder="phone">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="Email">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Password</label>
      <input type="password" name="password" class="form-control" id="inputPassword4" placeholder="Password">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" name="adress" class="form-control" id="inputAddress" placeholder="1234 Main St">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">City</label>
      <select type="text" name="city" class="form-control" id="inputCity">
        <option selected>Choose...</option>
        <option>istanbul</option>
        </select>
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">Country</label>
      <input type="text" name="country" id="inputState" class="form-control">
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">Zip</label>
      <input type="text" name="zip" class="form-control" id="inputZip">
    </div>
  </div>
  <button type="submit" name="signupbtn" class="btn btn-warning">Sign up</button>
</form>

</div>

<?php
include 'footer.php';
?>