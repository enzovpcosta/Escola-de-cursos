<?php 

    require __DIR__.'/vendor/autoload.php';
    
    use Classes\Class\Aula;

    $aulas = Aula::getAulas();

     include __DIR__.'/includes/protect.php';
     include __DIR__.'/includes/header-aluno.php';
     echo '<h2 class="text-center pt-4"><strong>Aulas</strong></h2>';
     include __DIR__.'/includes/a-listagem-aulas.php';
     include __DIR__.'/includes/footer.php';   
?>