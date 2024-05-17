<?php 

    require __DIR__.'/vendor/autoload.php';
    
    use Classes\Class\Aula;

    $aulas = Aula::getAulas();

     include __DIR__.'/includes/protect.php';
     include __DIR__.'/includes/header.php';
     include __DIR__.'/includes/listagem-aulas.php';
     include __DIR__.'/includes/footer.php';   
?>