<?php echo  $this->extend('Admin/layout/principal'); ?>




<?php echo$this->section('titulo'); ?><?php echo $titulo ;?><?php echo $this->endSection(); ?>






<?php echo $this->section('estilos') ?>

<!--Area de Estilos enviados para o template principal-->


<?php echo $this->endSection() ?>



<?php echo $this->section('conteudo');?>

<?php echo $titulo;?>


<?php echo $this->endSection();?>





<?php echo $this->section('scripts'); ?>

<!--Area de Scripts  enviados para o template principal-->




<?php echo $this->endSection(); ?>