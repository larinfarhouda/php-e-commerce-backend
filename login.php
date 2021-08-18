<?php
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
       else if ($_GET['error'] == "wrongpwd"){
        echo '<p class = "errormsg"> wrong password</p>';
        }
        else if ($_GET['error'] == "nouser"){
          echo '<p class = "errormsg"> no user with this email please sign up </p>';
        }
    }
    else if (isset($_GET['signin']) == "success"){
      echo '<script>alert("you have signed in successfully")</script>'; 
    }
    
?>

<form class="col-md-6" action="loginCode.php" method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <button type="submit" name="loginbtn" class="btn btn-warning">login</button>
  <label for="or">or</label>
  <button type="submit" class="btn btn-warning"><a href="signup.php">signup</a></button>
</form>

</div>

<?php
include 'footer.php';
?>