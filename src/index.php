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

    <div class="container" style="align:'center;'">

        <div class="navigation">
            <button type="button" name="openloginform" id="openloginform" onclick="document.getElementById('registrationform').style.display='none'; document.getElementById('loginform').style.display='block';">Login</button>
            <button type="button" name="openregistrationform" id="openregistrationform" onclick="document.getElementById('loginform').style.display='none'; document.getElementById('registrationform').style.display='block';">Register</button>
            <br></br>
        </div>


        <form action="home.php" method="POST" id="loginform">
            
            <input type="text" name="username" placeholder="Username">
            <br></br>
            <input type="password" name="password" placeholder="Password" >
            <br></br>
            <a href="">forgot password</a>
            <br></br>
            <button type="submit" name="btn_login">Login</button>
        </form>

        <form action="../backend/user_registration1.php" method="POST" style="display: none;" id="registrationform">
           
            <input type="text" name="username" placeholder="Username">
            <br></br>
            <input type="email" name="email" placeholder="Email">
            <br></br>
            <input type="password" name="password" placeholder="Password" >
            <br></br>
            <input type="password" name="retype_password" placeholder="Retype Password">
            <br></br>
            <button type="submit" name="btn_register">Register</button>
        </form>
        


    </div>

</body>
</html>

