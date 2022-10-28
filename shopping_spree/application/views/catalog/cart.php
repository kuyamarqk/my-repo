<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-dark bg-dark mb-5">
            <div class="container-fluid">
                <a class="navbar-brand" href="<?= base_url('catalog')?>">My Store</a>
                <a class="navbar-brand text-end" href="<?= base_url('catalog')?>">Catalog</a>
            </div>
        </nav>
        <div class="row">
            <h5> Check Out </h5>
            <p class="text-end">Total: $<?= $this->session->userdata('price')?></p>
            <table class="table table-striped">
                <thead>
                    <th>Item name</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php if($in_carts){
                        //var_dump($in_carts);
                        foreach($in_carts as $key => $value){ ?>
                            <tr>
                                <td><?= $value['name']?></td>
                                <td><?= $value['qty']?></td>
                                <td><?= $value['price']?></td>
                                <td><a href="<?= base_url('cart/remove/'.$key.'')?>"><i class="bi bi-x-octagon-fill"></i></a></td>
                            </tr>
                    <?php } 
                
                } else {  ?>
                    <h1 class="text-center mb-5">There are no item in the cart</h1>
               <?php }?>
                    
                </tbody>
            </table>
        </div>
        <div class="row">
            <h5>Billing Info</h5>
            <form action="<?= base_url('add_product')?>" method="post" class="form-control">
                
                
                <div class=" col-8 mb3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" name="name" class="form-control" id="">
                </div>
                <div class=" col-8 mb3">
                    <label for="address" class="form-label">Address:</label>
                    <input type="text" name="address" class="form-control" id="">
                </div>
                <div class="col-8 mb3">
                    <label for="card" class="form-label">Card Number:</label>
                    <input type="text" name="card" class="form-control mb-3" id="">
                </div>
                <div class="col-8 mb-3">
                    <input type="submit" value="Submit Order" class="btn btn-outline-primary">
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>
</html>