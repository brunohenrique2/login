<?php

    include_once("connection.php");

    $id_user = $_POST['id_user'];
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    $email = $_POST['email'];

    $sql = "UPDATE usuarios 
            set nome = '$nome', senha = '$senha', email = '$email'
            WHERE id_user = $id_user";

    $result = mysqli_query($conn, $sql);

    if($result) {
        echo 'Atualizado com sucesso!';
        header("location: /login/select.php");
    }else {
        echo "Falha ao inserir os dados: " . $sql . "<br>" . mysqli_error($conn);
    }

?>