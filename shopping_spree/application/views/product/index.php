<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Spree</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
<div class="container-fluid">
    <nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= base_url('/')?>">My Store</a>
        <a href="<?= base_url('/cart')?>" class="nav btn btn-warning" >Cart()</a>
        </div>
    </div>
    </nav>
    <div class="row">
        <?php
        foreach($all as $key => $val){ ?>
          <div class="col sm-4">
            <div class="card ">
                <div class="card-header">
                    <h3 class="card-title"><?= $val->name?></h3>
                </div>
                <form action="<?= base_url('product/add_to_cart')?>" method="post">
                    <div class="card-body">
                        <div class="table-responsive">
                        Price: <?= $val->price?>
                        </div>
                        <div class="table-responsive">
                        Quantity: <?= $val->qty?>
                        </div>
                    </div>
                    <div class="card-footer">
                        <input type="number" name="qty" id="qty" value='1'>
                        <input type="hidden" name="name" value="<?= $val->name?>">
                        <input type="hidden" name="id" value="<?= $val->id?>">
                        <input type="hidden" name="price" value="<?= $val->price?>">
                        <button type="submit" class="btn btn-success">Add</button>
                    </div>
                </form>
            
            </div>
        </div>
       <?php }
           
        ?>    
</div>
</div> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>
</html>