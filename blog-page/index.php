<?php
    session_start();
    include('newConn.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>the Blog Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <nav>
            <h1>Blog</h1>
            <ul>
<?php           if(isset($_SESSION['firstName'])){ ?>
                <li>Welcome  <?= $_SESSION['firstName']; ?></li>
                <li><a href="process.php">Log off</a></li>
<?php           } else { ?>
                <li>Welcome  </li>
                <li><a href="login.php">Log in</a></li>
<?php           } ?>                
            </ul>
        </nav>
        <main>
            <h1>Title</h1>
<?php       if(isset($_SESSION['errors'])){
                foreach($_SESSION['errors'] as $row => $key){ ?>
                    <p class="error"><?= $key?></p>
<?php           }
            } ?>
<?php       if(isset($_SESSION['message'])){
                foreach($_SESSION['message'] as $row => $key){ ?>
                    <p class="success"><?= $key?></p>
<?php           }
            } ?>
            <div class="content">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt modi sint recusandae porro voluptate quibusdam saepe soluta. Temporibus maxime ea placeat? Aliquam, tempora itaque. Quae cupiditate odio sunt ab eaque!</p>
            </div>
        </main>
<?php   if(isset($_SESSION['firstName'])){ ?>
        <div class="comment-box">
            <h1>Leave a Review</h1>
            <form action="process.php" method="post">
                <input type="hidden" name="action" value="comment">
                <input type="hidden" name="userId" value="<?= (isset($_SESSION['userid'])) ? $_SESSION['userid']: '' ?>">
                <input type="text" name="comment" >
                <p><input type="submit" value="Post a review" name="post"></p>
            </form>    
        </div>
<?php   } ?>
                   
        
        
        <div class="comments">
<?php       
            $query = "Select users.id,users.firstname, users.lastname, reviews.id,reviews.content,reviews.created_at 
                            from reviews left join users on reviews.user_id = users.id
                            order by reviews.created_at desc";
            $reviews = fetch_all($query);
            foreach($reviews as $row => $key){ ?>
                <h3><?= $key['firstname']?> <?= $key['lastname']?> (<?= $key['created_at']?>)</h3> 
                <p><?= $key['content']?></p>  
                <div class="reply-box">    
<?php                       
                $repQuery = "SELECT users.firstname, users.lastname, reviews.id, replies.created_at, reviews.content,replies.content FROM replies 
	                                left join users 
                                    on replies.user_id = users.id
                                    left join reviews 
                                    on replies.review_id = reviews.id 
                                    where reviews.id = '".$key['id']."'";
                                    
                    $replies = fetch_all($repQuery);
                    foreach($replies as $row => $rkey){ ?>
                        <h3><?= $rkey['firstname']?> <?= $rkey['lastname']?> (<?= $rkey['created_at']?>)</h3> 
                        <p><?= $rkey['content']?></p>  
                   <?php }
                    ?>   
                     
<?php           if(isset($_SESSION['firstName'])){ ?>
                    
                        <form action="process.php" method="post">
                            <input type="hidden" name="action" value="reply">
                            <input type="hidden" name="reviewId" value="<?= $key['id']?>">
                            <input type="hidden" name="userId" value="<?= (isset($_SESSION['userid'])) ? $_SESSION['userid']: '' ?>">
                            <input type="text" name="reply" >
                            <p><input type="submit" value="Post a Reply" name="post"></p>
                        </form>    
<?php           } ?>
                </div>
<?php } ?>

        </div>
    </div>
</body>
</html>