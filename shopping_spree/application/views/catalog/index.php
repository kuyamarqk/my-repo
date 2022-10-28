<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalog</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-dark bg-dark mb-5">
            <div class="container-fluid">
                <a class="navbar-brand" href="<?= base_url('catalog')?>">My Store</a>
                <a class="navbar-brand text-end" href="<?= base_url('cart')?>">Cart(<?= ($this->session->userdata('products') !== null ) ? count($this->session->userdata('products')) : ''?>)</a>
            </div>
        </nav>
        <div class="row card-group mb-5">
<?php           foreach($all->result()as $row){ ?>
                    <div class="col-sm-4">
                        <div class="card mb-3" style="width:  200px;">
                            <div class="card-title" style="text-align: center"><h5><?= $row->name?></h5></div>
                            <img class="card-img-top" src="..." alt="<?= $row->name?> image">
                            <div class="card-footer">
                                <small class="text-muted">
                                    <form class="row g-2" action="<?= base_url('add_to_cart')?>" method="post">
                                        <input type="number" name="qty"value="1" class="form-control col-sm" style="width: 100px" id="quantity" placeholder="quantity" />
                                        <input type="hidden" name="name" value="<?= $row->name?>">
                                        <input type="hidden" name="price" value="<?= $row->price?>">
                                        <input type="hidden" name="id" value="<?= $row->id?>">
                                        <input type="submit" value="add to cart" class="btn btn-outline-success col-sm" >
                                    </form>
                                </small>   
                            </div>
                        </div>
                    </div>
<?php           }?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>
</html>