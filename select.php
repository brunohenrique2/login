<?php

    include_once("connection.php");

    $sql = "SELECT * FROM usuarios 
    ORDER BY nome";

    $result = mysqli_query($conn, $sql);

    if($result) {
        echo 'Selecionado com sucesso!';
    }else {
        echo "Falha ao selecionar os dados: " . $sql . "<br>" . mysqli_error($conn);
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/select.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
    rel="stylesheet">
    <title>Visualizar</title>
</head>
<body>
    <main>
        <h1>Visualizar Dados</h1>
        <table>
            <thead>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Senha</th>
                <th colspan="2">Opções</th>
            </thead>
            <tbody>
                <?php foreach ($result as $row) { ?>
                <tr id="tr">
                    <td id="id_user"><?= $row['id_user'] ?></td>
                    <td><?= $row['nome'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td><?= $row['senha'] ?></td>
                    <td id="update"><span id="tbIcon" class="material-icons tbIcon">edit</span></td>
                    <td id="delete"><span class="material-icons tbIcon">delete</span></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <div id="actions">
            <button id="btnCad">Cadastrar</button>
        </div>
    </main>

    <script>
        const tr_dados = document.querySelectorAll('tr#tr');
        const id_user = document.querySelectorAll('td#id_user');
        const btnUpdate = document.querySelectorAll('td#update');
        const btnDelete = document.querySelectorAll('td#delete');
        const windowUpdate = document.getElementById('window-update');
        const btnCloseModal = document.getElementById('btnCloseModal');
        const btnCad = document.querySelector('button#btnCad');

        btnCad.addEventListener('click', () => {
            location.assign('http://localhost/login/insert.php');
        });

        for(let i=0; i<id_user.length; i++) {
            btnUpdate[i].addEventListener('click', () => {
                location.assign(`http://localhost/login/pre-update.php?id_user=${id_user[i].innerText}`);
            })
        }

        for(let i=0; i<id_user.length; i++) {
            btnDelete[i].addEventListener('click', () => {
               location.assign(`http://localhost/login/delete.php?id_user=${id_user[i].innerText}`);
            })
        }

        btnCloseModal.addEventListener('click', () => {
            windowUpdate.close();
        });


    </script>
</body>
</html>