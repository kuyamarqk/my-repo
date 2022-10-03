<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentication II</title>
    <style type="text/css">
        *{
            padding:0 auto;
            margin:0 auto;
        }
        .container{
            width: 100%;
            display: inline-block;
            
        }
        .sign-up{
            width: 30%;
            height: auto;
            display: inline-block;
            border: 2px solid black;
            padding: 40px 10px ;
            margin: 50px 20px;
        }
        .sign-up h1{
            position:absolute;
            top: 25px;
            left: 25px;
            padding: 0 4px;
            background-color: white; 
        }
        
        .sign-up .signup-btn {
            position: absolute;
            top: 250px;
            left: 300px;
            background-color: green;
            color: white;
        }
        .login{
            width: 30%;
            height: auto;
            display:  inline-block;
            vertical-align: top;
            border: 2px solid black;
            padding: 40px 10px ;
            margin: 50px 20px;
        }
        .login h1{
            position:absolute;
            top: 25px;
            left: 490px;
            padding: 0 4px;
            background-color: white; 
        }
        .login .login-btn{
            position: absolute;
            top: 170px;
            left: 760px;
            background-color: green;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="sign-up">
            <h1>Sign up</h1>
            <form action="<?= base_url('users/create')?>" method="post">
                <table>
                    <tr><td>First name:</td><td><input type="text" name="firstname"></td><td><?= form_error('firstname')?></td></tr>
                    <tr><td>Last name:</td><td><input type="text" name="lastname"></td><td><?= form_error('first_name')?></tr>
                    <tr><td>Contact Number: </td><td><input type="text" name="number"></td><td><?= form_error('first_name')?></tr>   
                    <tr><td>Email: </td><td><input type="text" name="email"></td><td><?= form_error('first_name')?></tr>  
                    <tr><td>Password: </td><td><input type="password" name="password"></td><td><?= form_error('first_name')?></tr>   
                    <tr><td>Confirm Password: </td><td><input type="password" name="confirm-password"></td><td><?= form_error('first_name')?></tr>
                        
                    </tr>
                </table>
                <p><input type="submit" value="Submit" class="signup-btn"></p>
            </form>
        </div>
        <div class="login">
            <h1>Log In</h1>
        <form action="user/login" method="post">
                <table>
                    <tr><td>Contact Number or Email address </td><td><input type="text" name="number"></td></tr>
                    <tr><td>Password: </td><td><input type="password" name="password"></td></tr>
                </table>
                <p><input type="submit" value="Submit" class="login-btn"></p>
            </form>
        </div>
    </div>
</body>
</html>