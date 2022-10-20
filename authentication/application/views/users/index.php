<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentication</title>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>    
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <?php if($this->session->flashdata('errors') !== null){ ?>
                <div class="alert alert-danger" id="alert" role="alert">
                    <?= $this->session->flashdata('errors');?>
                    <span id='closeButton' class="btn btn-close" onclick='$(this).parent().hide(); return false;'></span>
            </div>   
            <?php } ?>
            <?php if($this->session->flashdata('success') !== null){ ?>
                <div class="alert alert-success" id="alert" role="alert">
                    <?= $this->session->flashdata('success');?>
                    <span id='closeButton' class="btn btn-close" onclick='$(this).parent().hide(); return false;'></span>
            </div>   
            <?php } ?>
            
            <div class="col-sm-6">  
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Sign - up</h5>
                        <p class="card-text">
                            <div class="form-control">
<?php echo form_open('/register');?>
                                <div class="form-group">
                                    <label for="first_name">First Name:</label>
                                    <input type="text" name="first_name" class="form-control" value="<?php echo $this->input->post('first_name'); ?>" />
<?php echo form_error('first_name');  ?>
                                </div>
                                <div class="form-group">
                                    <label for="last_name">Last Name:</label>
                                    <input type="text" name="last_name" class="form-control" value="<?php echo $this->input->post('last_name'); ?>" />
<?php echo form_error('last_name');  ?>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="text" name="email" class="form-control" value="<?php echo $this->input->post('email'); ?>" />
<?php echo form_error('email');  ?>
                                </div>
                                <div class="form-group">
                                    <label for="number">Contact Number:</label>
                                    <input type="text" name="number" class="form-control" value="<?php echo $this->input->post('number'); ?>" />
<?php echo form_error('number');  ?>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password:</label>
                                    <input type="password" name="password" class="form-control" value="<?php echo $this->input->post('password'); ?>" />
<?php echo form_error('password');  ?>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="cpassword">Confirm Password:</label>
                                    <input type="password" name="cpassword" class="form-control" value="<?php echo $this->input->post('cpassword'); ?>" />
<?php echo form_error('cpassword');  ?>
                                </div>
                                <div class="form-group mb-3"><input class="btn btn-success" type="submit" value="Register "/> </div>
<?php echo  form_close();?>
                            </div>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Login</h5>
                        <p class="card-text">
<?php echo form_open('user/profile')?>                            
                            <div class="form-group">
                                <label for="log_username">Username:</label>
                                <input type="text" name="log_username" class="form-control" value="<?php echo $this->input->post('username'); ?>" />
<?php echo form_error('log_username');  ?>
                                </div>
                                <div class="form-group">
                                    <label for="log_password">Password:</label>
                                    <input type="password" name="log_password" class="form-control" value="<?php echo $this->input->post('password'); ?>" />
<?php echo form_error('log_password');  ?>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="submit" value="Login" class="btn btn-outline-success">
                                </div> 
<?php echo  form_close();?>
                        </p>
                    </div>
                </div>
            </div>   
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>