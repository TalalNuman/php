<?php
    $insert=false;
if (isset($_POST['name'])) {

    $server = "localhost";
    $username = "root";
    $password = "";
   

    $con = mysqli_connect($server, $username, $password);
    if (!$con) {
        die("connection to this database failed due to " . mysqli_connect_error());
    }
    // echo "connected to DB"
    $name = $_POST['name'];
    $age  = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $sql = "INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`) VALUES ('$name', '$age', '$gender', '$email');";
    
    if ($con->query($sql) == true) {
        $insert = true;
    } else {
        echo "Error: $sql <br> $con->error";
    }
    
    $con->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Travel Form</title>
</head>

<body class="bg-info container mt-5">
    <center>
        <h1>Welcome to the Trip Form</h1>
        <h3>Enter Your Data to participate in the Trip with us</h3>
        <?php
        if ($insert == true) {
            echo "<h2 class='text-success'>Thank You for partcipating</h2>";
            
        }
        ?>
    </center>
    <form action="index.php" method="post">
          <div class="mb-1">
            <label for="name" class="form-label">Name</label>
            <input type="name" name="name" class="form-control" id="name">
        </div>
        <div class="mb-1">
            <label for="age" class="form-label">Age</label>
            <input type="text" name="age" id="age" class="form-control">
        </div>
        <div class="mb-1">
            <label for="gender" class="form-label">gender</label>
            <input type="gender" name="gender" id="gender" class="form-control">
        </div>
        <div class="mb-1">
            <label for="email" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
        </div>
        <button type="submit" class="btn btn-success ">Submit</button>
    </form>
</body>

</html>
