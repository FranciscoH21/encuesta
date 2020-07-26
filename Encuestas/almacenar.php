<?php 
    include '../includes/conexion.php';

    mysqli_set_charset($con,'utf8');

    // Obtener los datos
    $Id = $_POST['Id'];
    $Sexo = $_POST['Sexo'];
    $Edad = $_POST['Edad'];
    $EdoCv = $_POST['EdoCv'];
    $Anti = $_POST['Anti'];;
    $Esco = $_POST['Esco'];
    $Turno1 = $_POST['Turno1'];
    $Turno2 = $_POST['Turno2'];
    $Plaza = $_POST['Plaza'];
    $Disca = $_POST['Disca'];
    $Sector = $_POST['Sector'];

    // Realizar la query
    $sql = "INSERT INTO ENCUESTADOS VALUES('$Id','$Sexo','$Edad','$EdoCv','$Anti','$Esco','$Turno1','$Turno2','$Plaza','$Disca','$Sector')";
    echo mysqli_query($con,$sql);
    echo mysqli_error($con);

    // Datos para tercera query (preguntas extra de los datos generales)
    $E1 = $_POST['E1'];
    $E2 = $_POST['E2'];
    $E3 = $_POST['E3'];
    $E4 = $_POST['E4'];

    $sql = "INSERT INTO PREGUNTASEXTRA VALUES('$Id','$E1','$E2','$E3','$E4')";
    echo mysqli_query($con,$sql);
    echo mysqli_error($con);

    //Obtener datos para la tercera query
    $datosB1 = json_decode($_POST['bloque1']);
    $bloque1 = array_sum($datosB1);
    $sql = "INSERT INTO BLOQUE1 VALUES('$Id',$datosB1[0],$datosB1[1],$datosB1[2],$datosB1[3])";
    echo mysqli_query($con,$sql);
    echo mysqli_error($con);

    $datosB2 = json_decode($_POST['bloque2']);
    $bloque2 = array_sum($datosB2);
    $sql = "INSERT INTO BLOQUE2 VALUES('$Id',$datosB2[0],$datosB2[1],$datosB2[2],$datosB2[3])";
    echo mysqli_query($con,$sql);
    echo mysqli_error($con);

    $datosB3 = json_decode($_POST['bloque3']);
    $bloque3 = array_sum($datosB3);
    $sql = "INSERT INTO BLOQUE3 VALUES('$Id',$datosB3[0],$datosB3[1],$datosB3[2],$datosB3[3],$datosB3[4],$datosB3[5])";
    echo mysqli_query($con,$sql);
    echo mysqli_error($con);

    $datosB4 = json_decode($_POST['bloque4']);
    $bloque4 = array_sum($datosB4);
    $sql = "INSERT INTO BLOQUE4 VALUES('$Id',$datosB4[0],$datosB4[1],$datosB4[2],$datosB4[3],$datosB4[4],$datosB4[5],$datosB4[6],$datosB4[7],$datosB4[8])";
    echo mysqli_query($con,$sql);
    echo mysqli_error($con);

    $datosB5 = json_decode($_POST['bloque5']);
    $bloque5 = array_sum($datosB5);
    $sql = "INSERT INTO BLOQUE5 VALUES('$Id',$datosB5[0],$datosB5[1],$datosB5[2],$datosB5[3],$datosB5[4],$datosB5[5],$datosB5[6],$datosB5[7],$datosB5[8],$datosB5[9],$datosB5[10],$datosB5[11],$datosB5[12],$datosB5[13])";
    echo mysqli_query($con,$sql);
    echo mysqli_error($con);

    $datosB6 = json_decode($_POST['bloque6']);
    $bloque6 = array_sum($datosB6);
    $sql = "INSERT INTO BLOQUE6 VALUES('$Id',$datosB6[0],$datosB6[1],$datosB6[2],$datosB6[3],$datosB6[4],$datosB6[5],$datosB6[6],$datosB6[7])";
    echo mysqli_query($con,$sql);
    echo mysqli_error($con);

    $datosB7 = json_decode($_POST['bloque7']);
    $bloque7 = array_sum($datosB7);
    $sql = "INSERT INTO BLOQUE7 VALUES('$Id',$datosB7[0],$datosB7[1],$datosB7[2],$datosB7[3],$datosB7[4])";
    echo mysqli_query($con,$sql);
    echo mysqli_error($con);

    $datosB8 = json_decode($_POST['bloque8']);
    $bloque8 = array_sum($datosB8);
    $sql = "INSERT INTO BLOQUE8 VALUES('$Id',$datosB8[0],$datosB8[1])";
    echo mysqli_query($con,$sql);
    echo mysqli_error($con);

    $datosB9 = json_decode($_POST['bloque9']);
    $bloque9 = array_sum($datosB9);
    $sql = "INSERT INTO BLOQUE9 VALUES('$Id',$datosB9[0],$datosB9[1],$datosB9[2],$datosB9[3])";
    echo mysqli_query($con,$sql);
    echo mysqli_error($con);

    //$bloque1 = $_POST['bloque1'];
    /*$bloque2 = $_POST['bloque2'];
    $bloque3 = $_POST['bloque3'];
    $bloque4 = $_POST['bloque4'];
    $bloque5 = $_POST['bloque5'];
    $bloque6 = $_POST['bloque6'];
    $bloque7 = $_POST['bloque7'];
    $bloque8 = $_POST['bloque8'];
    $bloque9 = $_POST['bloque9'];*/
    $total = $bloque1 + $bloque2 + $bloque3 + $bloque4 + $bloque5 + $bloque6 + $bloque7 + $bloque8 + $bloque9;
    
    // Ejecutar tercera query
    $sql = "INSERT INTO RESULTADOS VALUES('$Id',$bloque1,$bloque2,$bloque3,$bloque4,$bloque5,$bloque6,$bloque7,$bloque8,$bloque9,$total)";
    echo mysqli_query($con,$sql);
    echo mysqli_error($con);
    $con->close();
?>