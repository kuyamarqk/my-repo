<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentication</title>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
    <div class="container mb-5">
        <div class="text-end mb-5"><a href="users/logout"><button  class="btn btn-danger">Logout</button></a></div>
        <div class="card">
            <div class="card-title"><h5>Basic Information</h5></div>
            <div class="card-body ">
                
                <dl class="row form-control"> 
                    <dt class="col-sm-3">First Name: </dt>
                    <dd class="col-sm-9"><?= isset($first_name)? $first_name :'' ?></dd>
                    <dt class="col-sm-3">Last Name: </dt>
                    <dd class="col-sm-9"><?= isset($last_name)? $last_name :'' ?></dd>
                    <dt class="col-sm-3">Contact number:</dt>
                    <dd class="col-sm-9"><?= isset($contact_number)? $contact_number :'' ?></dd>
                    <dt class="col-sm-3">Last failed login: </dt>
                    <dd class="col-sm-9"><?= isset($last_login)? $last_login :'None' ?></dd>
                </dl>
            </div>
        </div>
    </div>
</body>
</html>