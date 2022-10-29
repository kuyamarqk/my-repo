<?php include_once('incl/header.php')?>
    <div class="row">
        <div class="col-sm-4 md-2 rounded border border mb-4">
            <?php include_once('incl/sidebar.php')?>
        </div>
        <div class="col-sm-8 md-6 rounded border border mb-4">
            <form action="<?= base_url('create_player')?>" method="post">
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
                        <div class="form-group">
                            <label>Image Link</label>
                            <input type="text" class="form-control" name="img_link">
                        </div>
                        <fieldset class="form-group">
                            <div class="radioGroup">
                                <label>
                                    <input type="radio" name="gender" value="male" checked>
                                    Male
                                </label>
                                <label>
                                    <input type="radio" name="gender" value="female" >
                                    Female
                                </label>
                            </div>
                        </fieldset>
                        
                        <h3>Sports</h3>
                        <?php foreach($all->result_array() as $key => $value){ ?>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="sport[<?= $key?>]" id="sport" value="<?= $value['id']?>" >
                                    <?= $value['name']?>
                                </label>
                            </div>
                        <?php }?>
                            <div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        
                    </div>

            </form>     
        </div>
    </div>

<?php include_once('incl/footer.php')?>