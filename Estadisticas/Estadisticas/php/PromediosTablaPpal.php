<?php
    include '../../../includes/conexion.php';
    $query = 'SELECT
                (SELECT AVG(BLOQUE1) FROM RESULTADOS) AS "B1",
                (SELECT AVG(BLOQUE2) FROM RESULTADOS) AS "B2",
                (SELECT AVG(BLOQUE3) FROM RESULTADOS) AS "B3",
                (SELECT AVG(BLOQUE4) FROM RESULTADOS) AS "B4",
                (SELECT AVG(BLOQUE5) FROM RESULTADOS) AS "B5",
                (SELECT AVG(BLOQUE6) FROM RESULTADOS) AS "B6",
                (SELECT AVG(BLOQUE7) FROM RESULTADOS) AS "B7",
                (SELECT AVG(BLOQUE8) FROM RESULTADOS) AS "B8",
                (SELECT AVG(BLOQUE9) FROM RESULTADOS) AS "B9",
                (SELECT AVG(TOTAL) FROM RESULTADOS) AS "TOTAL"';
    
        $res = mysqli_query( $con, $query); 

        $reg = mysqli_fetch_array($res);  
        echo $reg[0] . "-";
        echo $reg[1] . "-";
        echo $reg[2] . "-";
        echo $reg[3] . "-";
        echo $reg[4] . "-";
        echo $reg[5] . "-";
        echo $reg[6] . "-";
        echo $reg[7] . "-";
        echo $reg[8] . "-";
        echo $reg[9];
        $con->close();
?>
