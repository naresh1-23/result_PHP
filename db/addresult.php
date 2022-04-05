<?php
  include('connect.php');
  if(isset($_POST['submit'])){
      $mark = $_POST['mark'];
      $subject = $_POST['subject'];
      $roll = $_POST['roll'];
      $name = $_POST['name'];


      if($name==''){
        $msg = "fill the required field";
        header('Location:../addresult.php?errmsg='+$msg);
    } 
    if($subject==''){
        $msg = "fill the required field";
        header('Location:../addresult.php?errmsg='+$msg);
    } 
    if($roll==''){
        $msg = "fill the required field";
        header('Location:../addresult.php?errmsg='+$msg);
    } 
    if($mark==''){
        $msg = "fill the required field";
        header('Location:../addresult.php?errmsg='+$msg);
    } 
    $studentquery = "SELECT * FROM student where studentName = '$name'";
    $studentresult = mysqli_query($conn, $studentquery);
    $studentid = mysqli_fetch_assoc($studentresult)['id'];
    $query = "INSERT INTO subresult(subjectName, mark, student_id) VALUES('$subject', '$mark', '$studentid')";
    $result = mysqli_query($conn,$query);
    if($result){
        $msg='inserted successfully';
        header("Location:../addresult.php?msg=".$msg);
    }else{
        $msg = 'Cannot insert';
        header('Location:../addresult.php?errmsg='.$msg);
    }


  }

?>