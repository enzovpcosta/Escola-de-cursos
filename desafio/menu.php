<?php 
  include __DIR__.'/includes/protect.php';
  include __DIR__.'/includes/header.php';
  echo '<h1 class="text-center mt-3">Bem vindo, <strong>'.$_SESSION['nome'].'</strong>!</h1>';

  echo '<div class="d-flex justify-content-center align-center mt-3"><a href="logout.php" class="btn btn-danger">LOGOUT</a></div>';
  include __DIR__.'/includes/footer.php';
?>