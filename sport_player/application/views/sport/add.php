<?php include_once('incl/header.php')?>
    <div class="row">
        <div class="col-sm-4 rounded border border mb-4">
            <?php include_once('incl/sidebar.php')?>
        </div>
        <div class="col-sm-8 rounded border border mb-4">
            <form action="" method="post">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" class="form-control" name="first_name">
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" class="form-control" name="last_name">
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="gender " id="male" value="male" >
                            Male
                          </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="gender" id="female" value="female">
                            Female
                          </label>
                        </div>
                    </div>

            </form>     
        </div>
    </div>

<?php include_once('incl/footer.php')?>