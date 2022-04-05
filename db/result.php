<?php
  include('connect.php');
  if(isset($_POST['submit'])){
      $username = $_POST['name'];
      $roll = $_POST['roll'];

      if($username==''){
          $msg = "username is required";
          header('Location:../login.php?errmsg='+$msg);
      }
      if($roll==''){
          $msg = "roll is required";
          header('Location:../login.php?errmsg='+$msg);
      }  
    $query = "SELECT * FROM student WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn,$query);
    
    $row = mysqli_num_rows($result);
    if($row==1){
        

        header('Location:../result.php');
    }else{
        header('Location:../login.php?errmsg=email and password does not match');
    }


  }

?>