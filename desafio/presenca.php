<?php 

require __DIR__.'/vendor/autoload.php';

use \Classes\Class\Presenca;

$presencas = Presenca::getPresencas();


include __DIR__.'/includes/protect.php';
include __DIR__.'/includes/header.php';
include __DIR__.'/includes/listagem-presenca.php';
include __DIR__.'/includes/footer.php';
?>