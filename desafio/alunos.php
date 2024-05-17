<?php 

    require __DIR__.'/vendor/autoload.php';

    use \Classes\Class\Aluno;

    $alunos = Aluno::getAlunos();

     include __DIR__.'/includes/protect.php';
     include __DIR__.'/includes/header.php';
     include __DIR__.'/includes/listagem-alunos.php';
     include __DIR__.'/includes/footer.php';   
?>