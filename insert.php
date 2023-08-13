<?php
if(isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['senha']) ) {
    include_once("connection.php");

    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    $email = $_POST['email'];

    $sql = "INSERT INTO usuarios 
            VALUES (default, '$nome', '$senha', '$email')";
    $result = mysqli_query($conn, $sql);

    if($result) {
        echo 'Inserido com sucesso!';
    }else {
        echo "Falha ao inserir os dados: " . $sql . "<br>" . mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/insert.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
    rel="stylesheet">
    <title>Inserir</title>
</head>
<body>
    <main>
        <form action="insert.php" method="post">
            <h1>Cadastrar</h1>
            <div class="campos">
            <label for="email">
                    <span id="icon" class="material-icons">face</span>
                </label>
                <input type="text" name="nome" id="nome" placeholder="nome completo" required>
            </div>
            <div class="campos">
                <label for="email">
                    <span id="icon" class="material-icons">mail</span>
                </label>
                <input type="email" name="email" id="email" placeholder="example@gmail.com" required>
            </div>
            <div class="campos">
            <label for="email">
                    <span id="icon" class="material-icons">lock</span>
                </label>
                <input type="password" name="senha" id="senha" placeholder="digite sua senha" required>
            </div>
            <div id="actions">
                <input type="submit" value="Enviar">
                <input type="reset" value="Limpar">
                <button id="dados">Dados</button>
            </div>
        </form>
    </main>
    
    <script>
        const btnDados = document.querySelector('button#dados');
        btnDados.addEventListener('click', () => {
            location.assign('http://localhost/login/select.php');
        })
    </script>
</body>
</html>