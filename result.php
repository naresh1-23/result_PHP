<html>
    <head>
        <title>

        </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="home.php">Home</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="login.php">ADMIN</a>
                    </li>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown link
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="login.php">Result</a></li>
                        <li><a class="dropdown-item" href="course.php">Course</a></li>
                    </ul>
                    </li>
                </ul>
                </div>
            </div>
        </nav>
        <?php include('db/connect.php'); 
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
          $query = "SELECT * FROM student WHERE studentName = '$username' AND Roll = '$roll'";
          $result = mysqli_query($conn,$query);
            $id = mysqli_fetch_assoc($result)['id'];

          $row = mysqli_num_rows($result);
          if($row==1){
              $resultquery = "SELECT * FROM subresult WHERE student_id = '$id'";
              $resultt = mysqli_query($conn, $resultquery); $num=0; $total = 0;?>
              <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?php echo 'Name : '.$username; ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?php echo 'Roll No : '.$roll; ?></h6>
                </div>
               </div>
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">S.no</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Marks</th>
                            </tr>
                        </thead>
                        <tbody><?php while($row = mysqli_fetch_assoc($resultt)){ $num = $num+1;?>
                            <tr>
                            <th><?php echo $num; ?></th>
                            <td><?php echo $row['subjectName']; ?></td>
                            <td><?php echo $row['mark']; ?></td>
                            </tr>
                            <?php $total = $total +$row['mark'];  } $percentage = ($total/500)*100; ?>
                            <tr>
                            <td></td>
                            <td>Total</td>
                            <td><?php echo $total; ?></td>
                            </tr>
                            <tr>
                            <td></td>
                            <td>Percentage</td>
                            <td><?php echo $percentage.'%'; ?></td>
                            </tr>
                        </tbody>
                    </table>
              <?php  
          }else{
              header('Location:../login.php?errmsg=email and password does not match');
          }
      
      
        }
        ?>

    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>