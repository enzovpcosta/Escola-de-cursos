<?php 

    require __DIR__.'/vendor/autoload.php';

    use \Classes\Class\Aluno;

    $alunos = Aluno::getAlunos();

     include __DIR__.'/includes/protect.php';
     include __DIR__.'/includes/header.php';
     echo '<h2 class="text-center pt-4"><strong>Alunos</strong></h2>';
     include __DIR__.'/includes/listagem-alunos.php';
     include __DIR__.'/includes/footer.php';   
?>