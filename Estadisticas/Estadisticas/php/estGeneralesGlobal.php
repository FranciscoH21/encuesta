<?php
    include '../../../includes/conexion.php';
    include './Preguntas.php';
    include './Querys.php';

    $res = mysqli_query( $con, $Querys[ 0 ] ); 
    $Total = mysqli_fetch_array($res);  
    $Total = $Total[0];

    $json = '[';

    //SEXO
    $res = mysqli_query( $con, $Querys[ 57 ] ); 
    $AuxArray = mysqli_fetch_array($res);  
    $json = $json.' { "Catego": "<b>1.</b> Sexo", "Atr1": "Hombre<br><b>'.$AuxArray[0].' prs ó '.AVGS( $AuxArray[0], $Total ).'<b></br>", "Atr2": "Mujer<br><b>'.$AuxArray[1].' prs ó '.AVGS( $AuxArray[1], $Total ).'<b></br>", "Atr3": "<br><b>'.$AuxArray[2].'<b></br>", "Atr4": "<br><b>'.$AuxArray[3].'<b></br>", "Atr5": "<br><b>'.$AuxArray[4].'<b></br>", "Atr6": "<br><b>'.$AuxArray[5].'<b></br>", "Atr7": "<br><b>'.$AuxArray[6].'<b></br>", "Atr8": "<br><b>'.$AuxArray[7].'<b></br>" }, ';

    //EDAD
    $res = mysqli_query( $con, $Querys[ 58 ] ); 
    $AuxArray = mysqli_fetch_array($res);  
    $json = $json.' { "Catego": "<b>2.</b> Edad", "Atr1": "15 a 29<br><b>'.$AuxArray[0].' prs ó '.AVGS( $AuxArray[0], $Total ).'<b></br>", "Atr2": "30 a 39<br><b>'.$AuxArray[1].' prs ó '.AVGS( $AuxArray[1], $Total ).'<b></br>", "Atr3": "40 a 49<br><b>'.$AuxArray[2].' prs ó '.AVGS( $AuxArray[2], $Total ).'<b></br>", "Atr4": "50 a 59<br><b>'.$AuxArray[3].' prs ó '.AVGS( $AuxArray[3], $Total ).'<b></br>", "Atr5": "60 y más<br><b>'.$AuxArray[4].' prs ó '.AVGS( $AuxArray[4], $Total ).'<b></br>", "Atr6": "<br><b>'.$AuxArray[5].'<b></br>", "Atr7": "<br><b>'.$AuxArray[6].'<b></br>", "Atr8": "<br><b>'.$AuxArray[7].'<b></br>" }, ';


    //ESTADO CIVIL
    $res = mysqli_query( $con, $Querys[ 59 ] ); 
    $AuxArray = mysqli_fetch_array($res); 
    $json = $json.' { "Catego": "<b>3.</b> Estado civil o conyugal", "Atr1": "Soltera (o)<br><b>'.$AuxArray[0].' prs ó '.AVGS( $AuxArray[0], $Total ).'<b></br>", "Atr2": "Casada (o)<br><b>'.$AuxArray[1].' prs ó '.AVGS( $AuxArray[1], $Total ).'<b></br>", "Atr3": "Unión libre<br><b>'.$AuxArray[2].' prs ó '.AVGS( $AuxArray[2], $Total ).'<b></br>", "Atr4": "Divorciada (o)<br><b>'.$AuxArray[3].' prs ó '.AVGS( $AuxArray[3], $Total ).'<b></br>", "Atr5": "Viuda (o)<br><b>'.$AuxArray[4].' prs ó '.AVGS( $AuxArray[4], $Total ).'<b></br>", "Atr6": "<br><b>'.$AuxArray[5].'<b></br>", "Atr7": "<br><b>'.$AuxArray[6].'<b></br>", "Atr8": "<br><b>'.$AuxArray[7].'<b></br>" }, ';


    //ANTIGUEDAD
    $res = mysqli_query( $con, $Querys[ 60 ] ); 
    $AuxArray = mysqli_fetch_array($res); 
    $json = $json.' { "Catego": "<b>4.</b> Años de antigüedad en el centro de trabajo", "Atr1": "Menos de un año<br><b>'.$AuxArray[0].' prs ó '.AVGS( $AuxArray[0], $Total ).'<b></br>", "Atr2": "De 1 a 3 años<br><b>'.$AuxArray[1].' prs ó '.AVGS( $AuxArray[1], $Total ).'<b></br>", "Atr3": "De 4 a 9 años<br><b>'.$AuxArray[2].' prs ó '.AVGS( $AuxArray[2], $Total ).'<b></br>", "Atr4": "Más de 10 años<br><b>'.$AuxArray[3].' prs ó '.AVGS( $AuxArray[3], $Total ).'<b></br>", "Atr5": "<br><b>'.$AuxArray[4].'<b></br>", "Atr6": "<br><b>'.$AuxArray[5].'<b></br>", "Atr7": "<br><b>'.$AuxArray[6].'<b></br>", "Atr8": "<br><b>'.$AuxArray[7].'<b></br>" }, ';


    //ESCOLARIDAD
    $res = mysqli_query( $con, $Querys[ 61 ] ); 
    $AuxArray = mysqli_fetch_array($res);  
    $json = $json.' { "Catego": "<b>5.</b> Escolaridad", "Atr1": "Sin escolaridad<br><b>'.$AuxArray[0].' prs ó '.AVGS( $AuxArray[0], $Total ).'<b></br>", "Atr2": "Primaria<br><b>'.$AuxArray[1].' prs ó '.AVGS( $AuxArray[1], $Total ).'<b></br>", "Atr3": "Secundaria<br><b>'.$AuxArray[2].' prs ó '.AVGS( $AuxArray[2], $Total ).'<b></br>", "Atr4": "Bachillerato o preparatoria<br><b>'.$AuxArray[3].' prs ó '.AVGS( $AuxArray[3], $Total ).'<b></br>", "Atr5": "Carrera técnica<br><b>'.$AuxArray[4].' prs ó '.AVGS( $AuxArray[4], $Total ).'<b></br>", "Atr6": "Licenciatura<br><b>'.$AuxArray[5].' prs ó '.AVGS( $AuxArray[5], $Total ).'<b></br>", "Atr7": "Maestría<br><b>'.$AuxArray[6].' prs ó '.AVGS( $AuxArray[6], $Total ).'<b></br>", "Atr8": "Doctorado<br><b>'.$AuxArray[7].' prs ó '.AVGS( $AuxArray[7], $Total ).'<b></br>" }, ';

    
    //PLAZA
    $res = mysqli_query( $con, $Querys[ 62 ] ); 
    $AuxArray = mysqli_fetch_array($res);  
    $json = $json.' { "Catego": "<b>6.</b> Tipo de plaza", "Atr1": "Base<br><b>'.$AuxArray[0].' prs ó '.AVGS( $AuxArray[0], $Total ).'<b></br>", "Atr2": "Honorarios<br><b>'.$AuxArray[1].' prs ó '.AVGS( $AuxArray[1], $Total ).'<b></br>", "Atr3": "Confianza<br><b>'.$AuxArray[2].' prs ó '.AVGS( $AuxArray[2], $Total ).'<b></br>", "Atr4": "Interinato<br><b>'.$AuxArray[3].' prs ó '.AVGS( $AuxArray[3], $Total ).'<b></br>", "Atr5": "Otro<br><b>'.$AuxArray[4].' prs ó '.AVGS( $AuxArray[4], $Total ).'<b></br>", "Atr6": "<br><b>'.$AuxArray[5].'<b></br>", "Atr7": "<br><b>'.$AuxArray[6].'<b></br>", "Atr8": "<br><b>'.$AuxArray[7].'<b></br>" }, ';

    
    //DISCAPACIDAD
    $res = mysqli_query( $con, $Querys[ 63 ] ); 
    $AuxArray = mysqli_fetch_array($res); 
    $json = $json.' { "Catego": "<b>7.</b> Discapacidad", "Atr1": "No<br><b>'.$AuxArray[0].' prs ó '.AVGS( $AuxArray[0], $Total ).'<b></br>", "Atr2": "Intelectual<br><b>'.$AuxArray[1].' prs ó '.AVGS( $AuxArray[1], $Total ).'<b></br>", "Atr3": "Motriz<br><b>'.$AuxArray[2].' prs ó '.AVGS( $AuxArray[2], $Total ).'<b></br>", "Atr4": "Auditiva<br><b>'.$AuxArray[3].' prs ó '.AVGS( $AuxArray[3], $Total ).'<b></br>", "Atr5": "Visual<br><b>'.$AuxArray[4].' prs ó '.AVGS( $AuxArray[4], $Total ).'<b></br>", "Atr6": "<br><b>'.$AuxArray[5].'<b></br>", "Atr7": "<br><b>'.$AuxArray[6].'<b></br>", "Atr8": "<br><b>'.$AuxArray[7].'<b></br>" }, ';


    // //SECTOR
    $res = mysqli_query( $con, $Querys[ 64 ] ); 
    $AuxArray = mysqli_fetch_array($res); 
    $json = $json.' { "Catego": "<b>8.</b> Sector de la población", "Atr1": "No<br><b>'.$AuxArray[0].' prs ó '.AVGS( $AuxArray[0], $Total ).'<b></br>", "Atr2": "Diversidad sexual<br><b>'.$AuxArray[1].' prs ó '.AVGS( $AuxArray[1], $Total ).'<b></br>", "Atr3": "Indígenas<br><b>'.$AuxArray[2].' prs ó '.AVGS( $AuxArray[2], $Total ).'<b></br>", "Atr4": "Afrodescendientes<br><b>'.$AuxArray[3].' prs ó '.AVGS( $AuxArray[3], $Total ).'<b></br>", "Atr5": "Adultos mayores<br><b>'.$AuxArray[4].' prs ó '.AVGS( $AuxArray[4], $Total ).'<b></br>", "Atr6": "Otro<br><b>'.$AuxArray[5].' prs ó '.AVGS( $AuxArray[5], $Total ).'<b></br>", "Atr7": "<br><b>'.$AuxArray[6].'<b></br>", "Atr8": "<br><b>'.$AuxArray[7].'<b></br>" } ';

    $json = $json.']';
    echo $json ;

    $con->close();

    function AVGS( $per, $Total ){
        return round( ( $per * 100 ) / $Total , 2  ).'%';
    }

    
?>