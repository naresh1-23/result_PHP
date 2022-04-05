<?php
  include('connect.php');
  if(isset($_POST['submit'])){
      $coursename = $_POST['course'];

      if($coursename==''){
          $msg = "fill the required field";
          header('Location:../login.php?errmsg='+$msg);
      } 
    $query = "INSERT INTO course(CourseName) VALUES('$coursename')";
    $result = mysqli_query($conn,$query);
    if($result){
        $msg='inserted successfully';
        header("Location:../addcourse.php?msg=".$msg);
    }else{
        $msg = 'Cannot insert';
        header('Location:../addcourse.php?errmsg='.$msg);
    }


  }

?>