<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <nav>
            <h1>Blog</h1>
            <ul>
                <li>Welcome <? (isset($_SESSION['firstName'])? $_SESSION['firstName']: ''); ?></li>
                <li><a href="login.php">Log in</a></li>
            </ul>
        </nav>
        <main>
        <div class="registration">
<?php       if(isset($_SESSION['errors'])){
                foreach($_SESSION['errors'] as $row => $key){ ?>
                    <p class="error"><?= $key?></p>
<?php                }
} ?>
            <h2>Register</h2>
            <form action="process.php" method="post">
                <input type="hidden" name="action" value="register">
                <table>
                    <tr><td><label >Firstname:</label> </td><td> <input type="text" name="firstName" id=""></td></tr>
                    <tr><td><label >Lastname: </label> </td><td> <input type="text" name="lastName" id=""></label></td></tr>
                    <tr><td><label >Email Address: </label> </td><td> <input type="text" name="email" id=""></label></td></tr>
                    <tr><td><label >Password: </label> </td><td> <input type="password" name="password" id=""></label></td></tr>
                    <tr><td><label >Confirm Password:</label> </td><td>  <input type="password" name="confirmPassword" id=""></label></td></tr>
                    
                </table>
                <p><input type="submit" value="Register" class="botton"></p>
            </form>
        </div>
        <div class="login">
            <h2>Login</h2>
            <form action="process.php" method="post">
                <input type="hidden" name="action" value="login">
                <table>
                    <tr><td><label >Email Address: </label> </td><td> <input type="text" name="email" id=""></label></td></tr>
                    <tr><td><label >Password: </label> </td><td> <input type="password" name="password" id=""></label></td></tr>
                    
                </table>
                
                <p><input type="submit" name="Login" value="Login" class="botton"></p>
            </form>
        </div>
        </main>
       
    </div>
    
    
</body>
</html>