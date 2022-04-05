<?php
    include('db/connect.php');
?>

<html>
    <head>
        <title>

        </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>
    <nav class="nav nav-pills flex-column flex-sm-row">
        <a class="flex-sm-fill text-sm-center nav-link" href="home.php">Home</a>
        <a class="flex-sm-fill text-sm-center nav-link" href="result.php">Result</a>
    </nav><hr>
    <form method = "POST" action = "db/login.php">
        <div class="for_admin">
            <h1>Admin</h1>
        </div>
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Username</label>
            <div class="col-sm-3">
            <input type="text" name="username" class="form-control" id="inputEmail3">
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-3">
            <input type="password" name="password" class="form-control" id="inputPassword3">
            </div>
        </div>
        
        <button type="submit" name="loginsubmit" class="btn btn-primary">Sign in</button>
    </form><br><hr><br>
    <form method = "POST" action = "result.php">
        <div class="for_admin">
            <h1>Student</h1>
        </div>
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Enter the name</label>
            <div class="col-sm-6">
            <input type="text" name="name" class="form-control" id="inputEmail3">
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Roll</label>
            <div class="col-sm-6">
            <input type="text" name="roll" class="form-control" id="inputPassword3">
            </div>
        </div>
        
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>