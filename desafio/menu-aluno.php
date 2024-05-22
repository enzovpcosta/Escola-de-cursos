<?php 
  include __DIR__.'/includes/protect.php';
  include __DIR__.'/includes/header-aluno.php';
  echo '<h1 class="text-center py-5">Bem vindo, <strong>'.$_SESSION['nome'].'</strong>!</h1>';

  
  include __DIR__.'/includes/footer.php';
?>