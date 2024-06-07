<?php 

require __DIR__.'/vendor/autoload.php';
include __DIR__.'/includes/protect.php';
include __DIR__.'/config.php';

$sql = "SELECT idPresenca, alunos.Nome, aulas.Titulo, aulas.Professor, aulas.Curso, aulas.Data, presenca.Status FROM presenca JOIN alunos ON presenca.idAluno = alunos.idAluno JOIN aulas ON presenca.idAula = aulas.idAula";
$res = $conn->query($sql);
$qtd = $res->num_rows;

include __DIR__.'/includes/header.php';
echo '<h2 class="text-center pt-4"><strong>Presença</strong></h2>';
include __DIR__.'/includes/listagem-presenca.php';
include __DIR__.'/includes/footer.php';
?>