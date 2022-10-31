<?php include_once('incl/header.php')?>
    <div class="row">
        <div class="col-sm-4 rounded border border mb-4">
            <?php include_once('incl/sidebar.php')?>
        </div>
        <div class="col-sm-8 rounded border border mb-4">
              <div class="row">
                <h1>LIST of SPORTS</h1>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if($sport !== null){
                        foreach($sport->result_array() as $key => $value){?>
                            <tr>
                                <td><?php echo $value['id'];?></td>
                                <td><?php echo $value['sport_name'];?></td>
                                <td>VIEW|EDIT|DELETE</td>
                            </tr>
                        <?php
                    }
                }else{
                        echo '<tr>
                            <td colspan="3">No Sports</td>
                        </tr>';
                    } ?>
                    </tbody>
                </table>
                
                    <form action="<?= base_url('addSport')?>" method="post">
                        <div class="col-sm-12">
                            <div class="form-group text-center">
                                <label for="inputText" class="mb-5 control-label mb-10">Name</label>
                                <input type="text" class="mb-5 form-control" name="name" id="input">
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Submit" class="btn btn-outline-primary">
                            </div>
                    </form>
              </div>
        </div>
    </div>

<?php include_once('incl/footer.php')?>