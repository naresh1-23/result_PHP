<?php
  include('connect.php');
  if(isset($_POST['loginsubmit'])){
      $username = $_POST['username'];
      $password = $_POST['password'];

      if($username==''){
          $msg = "username is required";
          header('Location:../login.php?errmsg='+$msg);
      }
      if($password==''){
          $msg = "password is required";
          header('Location:../login.php?errmsg='+$msg);
      }  
    $query = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn,$query);
    
    $row = mysqli_num_rows($result);
    if($row==2){
        $data = mysqli_fetch_assoc($result);
        session_start();
        $_SESSION['login']=1;

        header('Location:../admin.php');
    }else{
        header('Location:../login.php?errmsg=email and password does not match');
    }


  }

?>