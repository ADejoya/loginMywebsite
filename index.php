
<?php
    session_start();
    if(!isset($_SESSION["users"])){
        header("Location: login.php");
        }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> MY PROFILE</title>
    <link rel="stylesheet" href="style1.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
</head>
<body>

<div class="container">
    

    <div class="row">
        <div class="col">
            <h1>ANTON DE JOYA</h1>
            
            <p>BSIT NU-FAIRVIEW </p>
            <a href="logout.php" class="btn btn-warning">Logout</a>
            

        </div>
        <div class="col">
           <div class="card card1" onclick="navigateTo('aboutme.php')">
            <h5>About me</h5>
            <p> </p>
           </div>
           <div class="card card2" onclick="navigateTo('resume.php')">
            <h5>Resume</h5>
            <p> </p>
           </div>
           <div class="card card3" onclick="navigateTo('education.php')">
            <h5>Education</h5>
            <p> </p>
           </div>
           <div class="card card4" onclick="navigateTo('contacts.php')">
            <h5>Contact information</h5>
           
            <p> </p>       
        
            
        
        </div>
         </div>
     </div>
 </div>
 

 <script>
    function navigateTo(page) {
        window.location.href = page;
    }
</script>




</body>
</html>