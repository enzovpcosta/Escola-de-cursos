<?php 

    require __DIR__.'/vendor/autoload.php';

    use \Classes\Class\Prof;

    $professores = Prof::getProfessores();
    
    include __DIR__.'/includes/protect.php';
     include __DIR__.'/includes/header.php';
     include __DIR__.'/includes/listagem-professores.php';
     include __DIR__.'/includes/footer.php';   
?>