<?php
    include '../../../includes/conexion.php';

    $sql = "SELECT COUNT(*) FROM ENCUESTADOS";
    $resultado = mysqli_query($con,$sql);
    while($reg = mysqli_fetch_array($resultado)){    
        echo $reg[0] . "-";
    }

    $sql = "SELECT AVG(TOTAL) FROM RESULTADOS";
    $resultado = mysqli_query($con,$sql);
    while($reg = mysqli_fetch_array($resultado)){    
        echo $reg[0]. "-";
    }
    

    $sql = "SELECT COUNT(*) FROM ENCUESTADOS WHERE SEXO='Mujer'";
    $resultado = mysqli_query($con,$sql);
    while($reg = mysqli_fetch_array($resultado)){    
        echo $reg[0] . "-";
    }

    $sql = "SELECT AVG(TOTAL) FROM ENCUESTADOS as E,RESULTADOS as R WHERE SEXO='Mujer' AND E.ID=R.ID";
    $resultado = mysqli_query($con,$sql);
    while($reg = mysqli_fetch_array($resultado)){    
        echo $reg[0] . "-";
    }

    $sql = "SELECT COUNT(*) FROM ENCUESTADOS WHERE SEXO='Hombre'";
    $resultado = mysqli_query($con,$sql);
    while($reg = mysqli_fetch_array($resultado)){    
        echo $reg[0] . "-";
    }

    $sql = "SELECT AVG(TOTAL) FROM ENCUESTADOS as E,RESULTADOS as R WHERE SEXO='Hombre' AND E.ID=R.ID";
    $resultado = mysqli_query($con,$sql);
    while($reg = mysqli_fetch_array($resultado)){    
        echo $reg[0];
    }

    $con->close();
?>