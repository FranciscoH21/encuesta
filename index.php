<?php include("includes/header.html"); ?>
<?php include("includes/footer.html"); ?>

<script>
	// - - - - - - - - - - - -> FUNCIONES DE LA PAGINA 


	// - CARGA DE PAGINA DE INICIO
	$(document).ready(function () {
		$('#contenido').load('Encuestas/Inicio.html');
		// menu(1);
		// Admin(1);
	});

	// - MENSAJE DE ADVERTENCIA AL INTENTAR RECARGAR PAG
	window.onbeforeunload = function() {
		return "";
	};

</script>

<script>
	// - - - - - - - - - - - -> MENU DE ENCUESTA

	function menu(op){

		//TE MANDA AL PRINCIPIO DE LA PAGINA
		window.scrollTo(0, 0);

		switch(op){

			case 0:
				$("#contenido").load("Encuestas/datosgenerales.html");
			break;
			
			case 1:
				$("#contenido").load("Encuestas/Encuestas1.html");
			break;

			case 2:
				$("#contenido").load("Encuestas/Encuestas2.html");
			break;
			
			case 3:
				$("#contenido").load("Encuestas/Encuestas3.html");
			break;
			
			case 4:
				$("#contenido").load("Encuestas/Encuestas4.html");
			break;

			case 5:
				$("#contenido").load("Encuestas/Encuestas5.html");
			break;
			
			case 6:
				$("#contenido").load("Encuestas/Encuestas6.html");
			break;
			
			case 7:
				$("#contenido").load("Encuestas/Encuestas7.html");
			break;
			
			case 8:
				$("#contenido").load("Encuestas/Encuestas8.html");
			break;
			
			case 9:
				$("#contenido").load("Encuestas/Encuestas9.html");
			break;

			case 10:
				$("#contenido").load("Encuestas/Finalizar.html");
			break;

		}
	}
</script>


<script>
	// - - - - - - - - - - - -> MENU MODO ADMINISTRADOR

	function Admin(op){

		//TE MANDA AL PRINCIPIO DE LA PAGINA
		window.scrollTo(0, 0);

		switch(op){

			case 0:
				$("#contenido").load("Estadisticas/Login/Login.html");
			break;

			case 1:
				$("#contenido").load("Estadisticas/Estadisticas/Estadisticas.html");
			break;
		}

	}

</script>
