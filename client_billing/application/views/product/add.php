<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Add Product</h1>
        <div class="jumbotron">
            <p class="lead" style="font-size:1em;">Add Product</p>
            <hr class="my-4">
        </div>
        <form method="post" action="<?= base_url('product/addProduct')?>">
            <div class="form-group row mb-5">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name">
                </div>
            </div>
            <div class="form-group row mb-5">
                <label for="name" class="col-sm-2 col-form-label">Price</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="price">
                </div>
            </div>
            <div class="form-group row mb-5">
                <label for="name" class="col-sm-2 col-form-label">Qty</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="qty">
                </div>
            </div>
            <div class="form-group row mb-5">
                <button type="submit" class="btn btn-outline-primary">Add</button>
            </div>
        </form>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>
</html>