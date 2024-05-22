<?php 

    require __DIR__.'/vendor/autoload.php';

    use \Classes\Class\Prof;

    $professores = Prof::getProfessores();
    
    include __DIR__.'/includes/protect.php';
     include __DIR__.'/includes/header.php';
     echo '<h2 class="text-center pt-4"><strong>Professores</strong></h2>';
     include __DIR__.'/includes/listagem-professores.php';
     include __DIR__.'/includes/footer.php';   
?>