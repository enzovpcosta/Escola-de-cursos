<?php 

require __DIR__.'/vendor/autoload.php';

use \Classes\Class\Presenca;

$presencas = Presenca::getPresencas();

include __DIR__.'/includes/protect.php';
include __DIR__.'/includes/header-aluno.php';
echo '<h2 class="text-center pt-4"><strong>Presença</strong></h2>';
include __DIR__.'/includes/a-listagem-presenca.php';
include __DIR__.'/includes/footer.php';
?>