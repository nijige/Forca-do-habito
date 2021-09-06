<?php
echo  $this->extend('Admin/layout/principal'); ?>




<?php echo $this->section('titulo'); ?><?php echo $titulo; ?><?php echo $this->endSection(); ?>






<?php echo $this->section('estilos') ?>





<?php echo $this->endSection() ?>



<?php echo $this->section('conteudos'); ?>



<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
                <p class="card- title"><?php echo $titulo; ?></p>

            </div>

        </div>
    </div>
</div>
</div>





<?php echo $this->endSection(); ?>






<?php echo $this->section('scripts'); ?>






<?php echo $this->endSection(); ?>