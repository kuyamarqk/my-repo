<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
        <a class="navbar-brand" href="<?= base_url('/')?>">My Store</a>
            <a href="" class="nav btn btn-warning" >Catalog</a>
            </div>
        </div>
        </nav>
        <div class="row">
            <table class="table table-striped table-border">
                <thead>
                    <td>Name</td>
                    <td>Price</td>
                    <td>Qty</td>
                </thead>
                <tbody>
                    <?php
                        if(!empty($in_cart)){
                            var_dump($in_cart);
                            foreach($in_cart as $key => $val){
                                echo '<tr>';
                                echo '<td>'. $val['name']. '</td>';
                                echo '<td>'. $val['price']. '</td>';
                                echo '<td>'. $val['qty']. '</td>';
                                echo '</tr>';
                        }    }
                        else{
                            echo '<tr><td colspan="4">No items in cart</td></tr>';
                        }?>
                        
                   
                    <tr></tr>
                </tbody>
            </table>
        </div>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>
</html>