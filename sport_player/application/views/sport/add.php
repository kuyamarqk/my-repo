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
                        <?php foreach($gender->result_array() as $key => $value){ 
                            
                            ?>
                            <div class="form-check">
                                <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="gender" id="gender" value="<?= $value['id']?>" >
                                <?= $value['gender_name']?>
                              </label>
                            </div>
                        <?php }?>
                        </fieldset>
                        
                        <h3>Sports</h3>
                        <?php foreach($sport->result_array() as $key => $value){ ?>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="sport[<?= $key?>]" id="sport" value="<?= $value['id']?>" >
                                    <?= $value['sport_name']?>
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