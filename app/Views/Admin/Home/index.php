<?php echo  $this->extend('Admin/layout/principal'); ?>

<!--Area de Estilos-->
<?php echo $this->section('estilos') ?>

<?php echo $this->endSection() ?>




<!--Area de Conteudo-->
<?php echo$this->section('conteudo') ?>

  <?php echo $titulo ?>

<?php echo $this->endSection() ?>




<!--Area de Scripts-->
<?php echo $this->section('scripts') ?>

<?php echo $this->endSection() ?>