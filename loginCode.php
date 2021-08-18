<?php
if (isset($_POST['loginbtn'])){
  
  require 'db.php';
  $password = $_POST['password'];
  $email = $_POST['email'];
  

  if (empty($email) || empty($password)){
    header("Location: login.php?error=emptyfields");
    exit();
  }
else {
  $sql = "SELECT * FROM users WHERE UserEmail =?;";
  $stmt = mysqli_stmt_init($conn);
  if(!mysqli_stmt_prepare($stmt,$sql)){
    header("Location: login.php?error=sqlerror");
    exit();
  }
    else{

      mysqli_stmt_bind_param($stmt,"s",$email);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      if ($rows = mysqli_fetch_assoc($result)){
         $pwdcheck = password_verify($password,$rows['UserPassword']);

          if ($pwdcheck == false){
            header("Location: login.php?error=wrongpwd");
           exit();
          }
          elseif ($pwdcheck == true) {
            session_start();
            $_SESSION['username'] = $rows['UserName'];
            $_SESSION['userid'] = $rows['UserEmail'];
            header("Location: shop.php?signin=success");
            exit();
          }
          else {
            header("Location: login.php?error=cantlogin");
            exit();
          }
      }
      else{
        header("Location: login.php?error=nouser");
        exit();
      }
    }
}
}

else{
  header("Location: login.php");
  exit();
}