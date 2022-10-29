<form action="<?= base_url('filter')?>" method="post">
    <div class="form-group mb-4">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name">
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
                                    <input type="checkbox" class="form-check-input" name="sport[<?= $key?>]" id="sport" value=" <?= $value['id']?>" >
                                    <?= $value['name']?>
                                </label>
                            </div>
                        <?php }?>                <input type="submit" value="Search" class="btn btn-outline-primary text-end">
                      
                    
                
        
            </form>