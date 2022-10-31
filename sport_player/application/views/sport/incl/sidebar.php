<form action="<?= base_url('filter')?>" method="post">
    <div class="form-group mb-4">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name">
                </div>
                <fieldset class="form-group">
                            <?php foreach($gender->result_array() as $key => $value){ 
                                ?>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="gender[<?= $key?>]" id="gender" value=" <?= $value['id']?>" >
                                    <?= $value['gender_name']?>
                                </label>
                            </div>
                        <?php }?>  
                        </fieldset>
                 <h3>Sports</h3>
                 <?php foreach($sport->result_array() as $key => $value){ ?>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="sport[<?= $key?>]" id="sport" value=" <?= $value['id']?>" >
                                    <?= $value['sport_name']?>
                                </label>
                            </div>
                        <?php }?>               
                         <input type="submit" value="Search" class="btn btn-outline-primary text-end">
                      
                    
                
        
            </form>