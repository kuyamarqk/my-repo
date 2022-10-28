<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <ul class="nav nav-tabs "  style="background-color: #e3f2fd;">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Active</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled">Disabled</a>
            </li>
        </ul>
        <div class="row">

            <table class="table table-striped">
                <thead>
                    <th>Item name</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Action</th>
                </thead>
                <tbody>
<?php
                        foreach($all->result() as $row){ ?>
                        <tr>
                        <td><?= $row->name;?></td>
                        <td><?= $row->qty;?></td>
                        <td><?= $row->price;?></td>
                        <td><i class="bi bi-x-octagon-fill"></i></td>
                        </tr>
                           
<?php                    }?>
                    
                </tbody>
            </table>
        </div>
        <div class="row">
            <h5>Add Product</h5>
            <form action="<?= base_url('admin/add')?>" class="form-control"method="post">
                <div class=" col-8 mb3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" name="name" class="form-control" id="">
                </div>
                <div class=" col-8 mb3">
                    <label for="qty" class="form-label">Quantity:</label>
                    <input type="text" name="qty" class="form-control" id="">
                </div>
                <div class="col-8 mb3">
                    <label for="price" class="form-label">Price:</label>
                    <input type="text" name="price" class="form-control" id="">
                </div>
                <div class="col-8 mb-3">
                    <input type="submit" value="Add" class="btn btn-outline-primary">
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>
</html>