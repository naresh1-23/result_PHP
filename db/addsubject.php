<?php
  include('connect.php');
  if(isset($_POST['submit'])){
      $coursename = $_POST['course'];
      $subjectname = $_POST['subjectname'];
      $coursequery = "SELECT * FROM course WHERE CourseName = '$coursename'";
      $courseresult = mysqli_query($conn, $coursequery);
      $coursedata = mysqli_fetch_assoc($courseresult);
      $courseid= $coursedata['id'];
      if($coursename==''){
          $msg = "fill the required field";
          header('Location:../addsubject.php?errmsg='+$msg);
      } 
      if($coursename==''){
        $msg = "fill the required field";
        header('Location:../addsubject.php?errmsg='+$msg);
    } 

    $query = "INSERT INTO subject(subjectName, course_id) VALUES('$subjectname', '$courseid')";
    $result = mysqli_query($conn,$query);
    if($result){
        $msg='inserted successfully';
        header("Location:../addsubject.php?msg=".$msg);
    }else{
        $msg = 'Cannot insert';
        header('Location:../addsubject.php?errmsg='.$msg);
    }


  }

?>