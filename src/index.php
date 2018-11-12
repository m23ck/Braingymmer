<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Braingymmer</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script type="text/javascript" src="main.js"></script>
</head>
<body>


<div class="navigation">
<button type="button" name="openloginform" id="openloginform" onclick="document.getElementById('registrationform').style.display='none'; document.getElementById('loginform').style.display='block';">Login</button>
<button type="button" name="openregistrationform" id="openregistrationform" onclick="document.getElementById('loginform').style.display='none'; document.getElementById('registrationform').style.display='block';">Register</button>
</div>


    <div class="container">
        <form action="home.php" method="POST" id="loginform">
            
            <input type="text" name="username" placeholder="Username">
            <br>
            <input type="password" name="password" placeholder="Password" >
            <br>
            <button type="submit">Login</button>
        </form>

        <form action="index.php" method="POST" style="display: none;" id="registrationform">
           
            <input type="text" name="username" placeholder="Username">
            <br>
            <input type="email" name="email" placeholder="Email">
            <br>
            <input type="password" name="password" placeholder="Password" >
            <br>
            <input type="password" name="retypePassword" placeholder="Retype Password">
            <button type="submit">Register</button>
        </form>
        


    </div>

</body>
</html>

