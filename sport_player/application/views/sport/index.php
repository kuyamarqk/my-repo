<?php include_once('incl/header.php')?>
    <div class="row">
        <div class="col-sm-4 rounded border border mb-4">
            <?php include_once('incl/sidebar.php')?>
        </div>
        <div class="col-sm-8 md-6 rounded border border mb-4">
        <div class="row">
            <?php foreach($players as $key => $value){?>
            <div class="col-sm-4 col-md-8 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <p class="image"><img src="<?= $value['img']?>" style="max-width: 100%; height: auto" alt="<?= $value['first_name']?> <?= $value['last_name']?>"></p>
                        <p class="card-text"><?= $value['first_name']?><?= $value['last_name']?></p>
                    </div>
                </div>
            </div>
            <?php }?>
        </div>
    </div>

<?php include_once('incl/footer.php')?>