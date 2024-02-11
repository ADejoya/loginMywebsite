
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> MY PROFILE</title>
    <link rel="stylesheet" href="style1.css">
    <ul>
        <li><a class="active" href="#home" onclick="navigateTo('index.php')">Home</a>
      </ul>
</head>
<body>

<div class="container2">
    <div class="row">
        <div class="col">
            <h1>ANTON DE JOYA</h1>
            <p>BSIT NU-FAIRVIEW</p>

         

        </div>
        <h1>CONTACT ME HERE</h1>
        <div class="col">
           <div class="card cardc1" >
            <a href="https://www.facebook.com/anton.dejoya03/" target="_blank">Facebook</a>
           </div>
           <div class="card cardc2">
            <a href="https://www.instagram.com/antondejoya/" target="_blank">Instagram</a>
           </div>
           <div class="card cardc3">
            <a href="https://www.linkedin.com/in/antonio-de-joya-787881249/" target="_blank">Linkedin </a>
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