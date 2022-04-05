<?php
  include('db/connect.php');
  if(isset($_POST['submit'])){
      $coursename = $_POST['course'];
      $query = "SELECT * FROM course WHERE courseName = '$coursename'";
      $result = mysqli_query($conn, $query);
      $data = mysqli_fetch_assoc($result);
      $courseid = $data['id'];
      $subjectquery = "SELECT * FROM subject WHERE course_id = '$courseid'";
      $subjectresult = mysqli_query($conn, $subjectquery);

    }
?>
<html>
    <head>
        <title>

        </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="result.php">Result</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="addcourse.php"> Add Course</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="addstudent.php"> Add student</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="addresult.php">Add Result</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="addsubject.php">Add Subject</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="db/logout.php">logout</a>
                    </li>
                </ul>
                </div>
            </div>
        </nav>
        <br><br><br>
        <form action="db/addresult.php" method="post">
            <div class="input-group input-group-lg">
                <span class="input-group-text" id="inputGroup-sizing-lg">Enter the Name of student</span>
                <input type="text" class="form-control" name="name" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
            </div><br>
            <div class="input-group input-group-lg">
                <span class="input-group-text" id="inputGroup-sizing-lg">Enter the Roll number</span>
                <input type="text" class="form-control" name="roll" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
            </div><br>
            <div class="input-group input-group-lg">
                <span class="input-group-text" id="inputGroup-sizing-lg">Enter the name of subject</span>
                <select name="subject" id="cars">
                    <?php while($row = mysqli_fetch_assoc($subjectresult)){ ?>
                    <option value="<?php echo $row['subjectName']; ?>"><?php echo $row['subjectName']; ?></option>
                    <?php } ?>
                </select>
            </div><br>
            <div class="input-group input-group-lg">
                <span class="input-group-text" id="inputGroup-sizing-lg">Enter the marks</span>
                <input type="text" class="form-control" name="mark" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
            </div><br><br>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
        <?php include('include/message.php'); ?>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>