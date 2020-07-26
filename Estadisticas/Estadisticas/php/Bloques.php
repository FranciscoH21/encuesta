<?php
    include '../../../includes/conexion.php';
    include './Querys.php';
    include './Preguntas.php';
    include './LlavesPuntajes.php';

    $Inicio = 0;
    $Fin = 0;
    $op = $_POST[ 'op' ];
    
    if( $op == "1. Reclutamiento y selección de personal"){ $Inicio = 1; $Fin = 4; }

    if( $op == "2. Formación y capacitación" ){ $Inicio = 5; $Fin = 8; }

    if( $op == "3. Permanencia y ascenso" ){ $Inicio = 9; $Fin = 14; }

    if( $op == "4. Corresponsabilidad en la vida laboral, familiar y personal" ){ $Inicio = 15; $Fin = 23; }

    if( $op == "5. Clima laboral libre de violencia" ){ $Inicio = 24; $Fin = 37; }

    if( $op == "6. Acoso y hostigamiento" ){ $Inicio = 38; $Fin = 45; }

    if( $op == "7. Accesibilidad" ){ $Inicio = 46; $Fin = 50; }

    if( $op == "8. Respeto a la diversidad" ){ $Inicio = 51; $Fin = 52; }

    if( $op == "9. Condiciones generales de trabajo" ){ $Inicio = 53; $Fin = 56; }

    if( $op == "full" ){ $Inicio = 1; $Fin = 56; }

    $puntajes = array(
        ' = 0 pts',' = 3 pts',	//CASE 1 si NO 0-1
        ' = 3 pts',' = 0 pts',	//CASE 2 no SI 2-3
        ' = 3 pts',' = 2 pts',' = 1 pts',' = 0 pts', //CASE 3 	     4-7	
        ' = 0 pts',' = 1 pts',' = 2 pts',' = 3 pts',  // case 4     8-11
    );

    $total;
    $res = mysqli_query( $con, $Querys[ 0 ] ); 
    
    if( mysqli_num_rows( $res ) != 0) {

        $fila = $res -> fetch_row();
        $total = $fila[0];
    }

    $aux = "[";
    for( $x = $Inicio; $x <= $Fin; $x++ ){

        $res = mysqli_query( $con, $Querys[ $x ] ); 
        
        if( $res ){ 
            if( mysqli_num_rows( $res ) != 0) {

                $fila = $res -> fetch_row();

                if( sizeof($fila) == 4 ){

                    $nunca;
                    $algunas;
                    $frecuencia;
                    $siempre;
                    if($llaves[$x-1] == 3){
                        $nunca = "</b> prs = 3 pts";
                        $algunas = "</b> prs = 2 pts";
                        $frecuencia = "</b> prs = 1 pts";
                        $siempre = "</b> prs = 0 pts";
                    }
                    else if($llaves[$x-1] == 4){
                        $nunca = "</b> prs = 0 pts";
                        $algunas = "</b> prs = 1 pts";
                        $frecuencia = "</b> prs = 2 pts";
                        $siempre = "</b> prs = 3 pts";
                    }
                    
                    if( $x != $Fin ){
                        $aux = $aux.'{ "PREGUNTA" : "'.$Preguntas[ $x ].'", "NUNCA" : "<b>'.($fila[0].$nunca).'", "ALGUNASVECES" : "<b>'.($fila[1].$algunas).'", "CONFRECUENCIA" : "<b>'.($fila[2].$frecuencia).'", "SIEMPRE" : "<b>'.($fila[3].$siempre).'" },';
                    }else{
                        $aux = $aux.'{ "PREGUNTA" : "'.$Preguntas[ $x ].'", "NUNCA" : "<b>'.($fila[0].$nunca).'", "ALGUNASVECES" : "<b>'.($fila[1].$algunas).'", "CONFRECUENCIA" : "<b>'.($fila[2].$frecuencia).'", "SIEMPRE" : "<b>'.($fila[3].$siempre).'" }';
                    }
                }
                elseif ( sizeof($fila) == 2){

                    $si;
                    $no;
                    if($llaves[$x-1] == 1){
                        $si = "</b> prs = 0 pts";
                        $no = "</b> prs = 3 pts";
                    }
                    else if($llaves[$x-1] == 2){
                        $si = "</b> prs = 3 pts";
                        $no = "</b> prs = 0 pts";
                    }
                    if( $x != $Fin ){
                        $aux = $aux.'{ "PREGUNTA" : "'.$Preguntas[ $x ].'", "SI" : "<b>'.($fila[0].$si).'", "NO" : "<b>'.($fila[1].$no).'" },';
                    }else{
                        $aux = $aux.'{ "PREGUNTA" : "'.$Preguntas[ $x ].'", "SI" : "<b>'.($fila[0].$si).'", "NO" : "<b>'.($fila[1].$no).'" }';
                    }
                }

            }else{
                $aux = $aux.'0';
            }
        }else{
            echo "\n\nError[".$x."] : ".mysqli_error( $con ); 
        }  
    }

    $aux = $aux."]";
    echo $aux ;
    
    $con->close();
?>

