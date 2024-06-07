<?php 

    require __DIR__.'/vendor/autoload.php';
    include __DIR__.'/config.php';
    include __DIR__.'/includes/protect.php';
    include __DIR__.'/includes/header.php';

    define('TITLE','Cadastrar presença');

    use \Classes\class\Presenca;
    $obPresenca = new Presenca;
    
    if(isset($_POST['aluno'],$_POST['aula'],$_POST['status'])){
        if(isset($_POST['aluno'])){
            $sql = 'SELECT * FROM alunos WHERE idAluno = '.$_POST['aluno'];
            $res = $conn->query($sql);
            $rows = $res->num_rows;
            if($rows == 0){
                echo '<div class="alert alert-danger text-center">idAluno inválido</div>';
                include __DIR__.'/includes/formulario-presenca.php';
                include __DIR__.'/includes/footer.php'; 
                exit; 
            } else {
            $obPresenca->idAluno = $_POST['aluno'];   
            }
        }

        if(isset($_POST['aula'])){
            $sql = 'SELECT * FROM aulas WHERE idAula = '.$_POST['aula'];
            $res = $conn->query($sql);
            $rows = $res->num_rows;
            if($rows == 0){
                echo '<div class="alert alert-danger text-center">idAula inválido</div>';
                include __DIR__.'/includes/formulario-presenca.php';
                include __DIR__.'/includes/footer.php';
                exit; 
            } else {
            $obPresenca->idAula = $_POST['aula'];   
            }
        }

        $obPresenca->Status = $_POST['status'];
        $obPresenca->cadastrar();
       
        header('location: presenca.php?status=success');
        exit;
    }

    include __DIR__.'/includes/formulario-presenca.php';
    include __DIR__.'/includes/footer.php';   
?>