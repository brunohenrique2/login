<?php

include_once('connection.php');

if(isset($_GET['id_user'])) {
    $id_user = $_GET['id_user'];

    $sql = "SELECT * FROM usuarios 
                   WHERE id_user = $id_user";

    $result = mysqli_query($conn, $sql);
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
    rel="stylesheet">
    <link rel="stylesheet" href="css/pre-update.css">
    <title>Document</title>
</head>
<body>
    <main>
        <form action="update.php" method="post">
            <h1>Atualizar Dados</h1>
            <?php foreach($result as $dados) {?>
            <input type="hidden" name="id_user" value="<?=$dados['id_user']?>">
            <div class="campos">
                <label for="nome">
                <span id="icon" class="material-icons">face</span>
                </label>
                <input type="text" name="nome" id="nome" value="<?=$dados['nome']?>" required>
            </div>
            <div class="campos">
                <label for="email">
                <span id="icon" class="material-icons">mail</span>
                </label>
                <input type="email" name="email" id="email" value="<?=$dados['email']?>" required>
            </div>
            <div class="campos">
                <label for="senha">
                <span id="icon" class="material-icons">lock</span>
                </label>
                <input type="password" name="senha" id="senha" value="<?=$dados['senha']?>" required>
            </div>
            <div id="actions">
                <input type="submit" value="Atualizar">
                <input type="reset" value="Limpar">
                <button id="return">Retornar</button>
            </div>
            <?php } ?>
        </form>
    </main>

    <script>
        const btnReturn = document.getElementById('return');
        btnReturn.addEventListener('click', () => {
            location.assign('http://localhost/login/select.php');
        })
    </script>
</body>
</html>