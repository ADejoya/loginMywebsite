<?php
    session_start();
    if(isset($_SESSION["users"])){
        header("Location: index.php");
        }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css">
</head>
<body>
<div class="container">
    <?php
    if (isset($_POST["submit"])) {
        $Last_Name = $_POST["LastName"];
        $First_Name = $_POST["FirstName"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $RepeatPassword = $_POST["repeat_password"];

        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $errors = array();
    
        if (empty($Last_Name) || empty($First_Name) || empty($email) || empty($password) || empty($RepeatPassword)) {
            array_push($errors, "All fields are required");
        }
    
        // Validate if the email is valid
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "Email is not valid");
        }
    
        if (strlen($password) < 8) {
            array_push($errors, "Password must be at least 8 characters long");
        }
    
        // Check if passwords match
        if ($password != $RepeatPassword) {
            array_push($errors, "Passwords do not match");
        }
        //To give warning that there is only 1 email only per register
        require_once "database.php";
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);
        $rowCount = mysqli_num_rows($result);
        if ($rowCount>0) {
            array_push($errors, "Email Already Exists!");
        }

        if (count($errors) > 0) {
            foreach ($errors as $error) {
                echo "<div class='alert alert-danger'>$error</div>";
            }
        } else {
            // Insert into database
            // You need to add your database insertion code here
            require_once "database.php";
            $sql = "INSERT INTO users (Last_Name, First_Name, email, password) VALUES (?, ?, ?, ?)";
            $stmt = mysqli_stmt_init($conn);
            $preparestmt = mysqli_stmt_prepare($stmt, $sql);
            if ($preparestmt){
                mysqli_stmt_bind_param($stmt, "ssss", $Last_Name, $First_Name, $email, $passwordHash);
                mysqli_stmt_execute($stmt);
                echo "<div class = 'alert alert-success'> Your are Registered Successfully! </div>";
            }else {
                die("Something went wrong");
            }
        }
    }
    ?>

    <form action="registration.php" method="post">
        <div class="form-group"> 
            <input type="text" class="form-control" name="LastName" placeholder="Last Name: "> 
        </div>
        <div class="form-group"> 
            <input type="text" class="form-control" name="FirstName" placeholder="First Name: "> 
        </div>
        <div class="form-group"> 
            <input type="email" class="form-control" name="email" placeholder="Email: "> 
        </div>
        <div class="form-group"> 
            <input type="password" class="form-control" name="password" placeholder="Password: "> 
        </div>
        <div class="form-group"> 
            <input type="text" class="form-control" name="repeat_password" placeholder="Repeat Password: "> 
        </div>
        <input type="submit" class="btn btn-primary" value="Register" name="submit"> 
    </form>
    <div><p>Already registered? <a href="login.php">Login Here</a></div>
</div>

    <script src="script.js"></script>
</body>
</html>