<?php 

    include_once('connection.php');

    $id_user = $_GET['id_user'];
    
    $sql = "DELETE FROM usuarios
            WHERE id_user = $id_user";
        
    $result = mysqli_query($conn, $sql);

    if($result) {
        echo "<script type='javascript'>alert('Deletado com sucesso!');</script>";
        header("location: /login/select.php");
    } else {
        echo "Falha ao deletar: " . $sql . "<br>" . mysqli_error($conn) . "<br>";
    }

?>