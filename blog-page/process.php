<?php
    session_start();
    require('newConn.php');

    if(isset($_POST['action']) && $_POST['action'] == 'register'){
        registerUser($_POST);
    }
    elseif(isset($_POST['action']) && $_POST['action'] == 'login'){
        loginUser($_POST);
    }
    elseif(isset($_POST['action']) && $_POST['action'] == 'comment'){
        postComment($_POST);
    }
    elseif(isset($_POST['action']) && $_POST['action'] == 'reply'){
        postReply($_POST);
    }
    else{
        session_destroy();
        header('location: index.php');
        die();
    }


    function registerUser($post){
        
        $_SESSION['errors'] = array();
        echo strlen($post['firstName']);
        if(empty($post['firstName'])){
            $_SESSION['errors'][] = "the first name can't be blank!";
        }
        else{
            if(strlen($post['firstName']) <= 2){
                $_SESSION['errors'][] = "Firstname must have atleast 2 letters";
            }else{
                for($i = 0; $i< strlen($post['firstName']); $i++){
                    if(ctype_digit($post['firstName'][$i])){
                        $_SESSION['errors'][] = "Firstname has numbers";
                    }
                    else{
                        $firstName = $post['firstName']; 
                    }
                }   
            }
        }
        if(empty($post['lastName'])){
            $_SESSION['errors'][] = "the Last name can't be blank!";
        }else{
            if(strlen($post['lastName']) <= 2){
                $_SESSION['errors'][] = "Last name must have atleast 2 letters";
            }else{
                for($i = 0; $i< strlen($post['lastName']); $i++){
                    if(ctype_digit($post['lastName'][$i])){
                        $_SESSION['errors'][] = "Last name has numbers";
                    }
                    else{
                        $lastName = $post['lastName'];
                    }
                }   
            }
        }
        if(empty($post['email'])){
            $_SESSION['errors'][] = "the email can't be blank!";
        }else{
            if(!filter_var($post['email'],FILTER_VALIDATE_EMAIL)){
                $_SESSION['errors'][] = "invalid email format";
            }else{
                $email = $post['email'];
            }
        }if(empty($post['password']) && empty($post['confirmPassword'])){
            $_SESSION['errors'][] ="the password is required!";

        }
        if($post['password'] !== $post['confirmPassword']){
            $_SESSION['errors'][] = "The passwords must match!";
        }else{
            if(strlen($post['password']) < 8){
                $_SESSION['errors'][] = "Password must be more than 8 characters";
            }else{
                $salt = bin2hex(openssl_random_pseudo_bytes(22));
                $password = md5($post['password']).''.$salt;
            }
        }
        
        if(count($_SESSION['errors']) < 1){
            $_SESSION['message'] = array();
            $query = "INSERT INTO users (firstname,lastname,email,password,created_at,updated_at,salt) 
                                VALUES ('$firstName','$lastName','$email','$password',NOW(),NOW(),'$salt')";
            if(run_mysql_query($query)){
                $_SESSION['message'][] = "Successfully registered!";
                header('location: index.php');
                die();
            }else{
                $_SESSION['message'][] = "registration Failed!";
                echo $query;
            }
        }


    }
    function loginUser($post){
        $_SESSION['errors'] = array();
        $salt = bin2hex(openssl_random_pseudo_bytes(22));
        if(empty($post['email']) || empty($post['password'])){
            $_SESSION['errors'][] = "this 2 is required";
        }else {
            $salt = bin2hex(openssl_random_pseudo_bytes(22));
            $query = "SELECT * FROM users where users.email='". $post['email'] . "'";
            $user = fetch_record($query);
            if(!empty($user)){
                $encrypted_password = md5($post['password']).''.$user['salt'];
                if($user['password'] == $encrypted_password){
                    $_SESSION['userid'] = $user['id'];
                    $_SESSION['firstName'] = $user['firstname'];
                    header('location: index.php');
                }
            }
        }
    }
    function postComment($post){
        if(empty($post['userId'])){
            $_SESSION['errors'][] = "you should be logged in";
            header("location: login.php");
            die();
        }else{
            if(empty($post['comment'])){
                var_dump($post);
                $_SESSION['errors'][] = "Comment is required";
                header("location: index.php");
                die();
            }else{
                $userId = escape_this_string($post['userId']);
                $content = escape_this_string($post['comment']);

                $query = "INSERT INTO reviews (user_id,content,created_at,updated_at) values('$userId','$content',NOW(),NOW())";
                if(run_mysql_query($query)){
                    $_SESSION['message'][] = "successfully publish";
                    header("location: index.php");
                    die();
                }else{
                    $_SESSION['errors'][] = "There is a problem";
                    header("location: index.php");
                    die();
                }
            }
        }
    }
    function postReply($post){
        if(empty($post['userId'])){
            $_SESSION['errors'][] = "you should be logged in";
            header("location: login.php");
            die();
        }else{
            if(empty($post['reply'])){
                var_dump($post);
                $_SESSION['errors'][] = "Comment is required";
                header("location: index.php");
                die();
            }else{
                $userId = escape_this_string($post['userId']);
                $reviewId = escape_this_string($post['reviewId']);
                $content = escape_this_string($post['reply']);

                $query = "INSERT INTO replies (review_id,user_id,content,created_at,updated_at) values('$reviewId','$userId','$content',NOW(),NOW())";
                if(run_mysql_query($query)){
                    $_SESSION['message'][] = "successfully publish";
                    header("location: index.php");
                    die();
                }else{
                    $_SESSION['errors'][] = "There is a problem";
                    header("location: index.php");
                    die();
                }
            }
        }
    }
?>