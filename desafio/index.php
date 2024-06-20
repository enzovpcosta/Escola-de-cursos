<?php 
    
    if(isset($_COOKIE['professor']) || isset($_COOKIE['aluno'])) {
        header('location: dashboard.php');
    }

?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Escola de cursos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/js-cookie/3.0.1/js.cookie.min.js"></script>
    <script src="assets/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="assets/jquery.session.js"></script>
    <script src="assets/script.js"></script>
</head>
<body class="text-black">
    <div style="background-image: url('login.jpg'); background-size: cover;">
        <div style="backdrop-filter: brightness(70%);" class="min-vh-100 d-flex flex-column justify-content-center m-auto">
            <form style="width:40%; background-color: white; box-shadow: 0px 0px 40px rgba(0, 0, 0, 0.5)" class="p-4 rounded-4 m-auto" method="post" id="login">
                <h2 class="pb-3 text-center">Login</h2>
                <div class="alertLogin alert alert-danger text-center mx-4"></div>
                <div class="mb-3">
                    <label for="emailLogin" class="form-label">E-mail</label>
                    <input type="text" class="form-control" name="emailLogin" id="emailLogin">
                </div>
                <div class="mb-3">
                    <label for="senhaLogin" class="form-label">Senha</label>
                    <input type="password" class="form-control" name="senhaLogin" id="senhaLogin">
                </div>
                <div class="mb-3">
                    <label class="form-label">Logar como:</label>
                    <div>
                        <div class="form-check-inline">
                            <input type="radio" class="btn-check" name="tipo" id="option1" value="Professor" autocomplete="off" checked>
                            <label class="btn btn-outline-primary" for="option1">Professor</label>
                        </div>
                        <div class="form-check-inline">
                            <input type="radio" class="btn-check" name="tipo" id="option2" value="Aluno" autocomplete="off">
                            <label class="btn btn-outline-primary" for="option2">Aluno</label>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-center py-3">
                    <a href="recuperar.php" class="text-black">Recuperar senha</a>
                    <button style="width: 150px;" type="submit" class="btn btn-success">Logar</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>