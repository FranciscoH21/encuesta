<?php
    include '../../includes/conexion.php';

    $user = $_POST['USER'];
    $password = $_POST['PASSWORD'];

    $sql = "SELECT * FROM ADMINISTRADORES WHERE USUARIO='$user' and CONTRASENIA=PASSWORD('$password') ";

    $resultado = mysqli_query($con,$sql);

    if($resultado->num_rows == 1){
        echo true;
    }else{
        echo mysqli_error($con);
    }

    $con->close();
?>