<?php
  include('connect.php');
  if(isset($_POST['submit'])){
      $coursename = $_POST['course'];
      $studentname = $_POST['name'];
      $roll = $_POST['roll'];
      $coursequery = "SELECT * FROM course WHERE CourseName = '$coursename'";
      $courseresult = mysqli_query($conn, $coursequery);
      $coursedata = mysqli_fetch_assoc($courseresult);
      $courseid= $coursedata['id'];
      if($coursename==''){
          $msg = "fill the required field";
          header('Location:../addstudent.php?errmsg='+$msg);
      } 
      if($studentname==''){
        $msg = "fill the required field";
        header('Location:../addstudent.php?errmsg='+$msg);
    } 
    if($roll==''){
        $msg = "fill the required field";
        header('Location:../addstudent.php?errmsg='+$msg);
    } 
    $query = "INSERT INTO student(studentName, Roll, course_id) VALUES('$studentname', '$roll', '$courseid')";
    $result = mysqli_query($conn,$query);
    if($result){
        $msg='inserted successfully';
        header("Location:../addstudent.php?msg=".$msg);
    }else{
        $msg = 'Cannot insert';
        header('Location:../addstudent.php?errmsg='.$msg);
    }


  }

?>