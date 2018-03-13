<?php
if(isset($_POST['email'])) {
 
    // dirección de correo y asunto
 
    $email_to = "gabrieltzur@gmail.com";
 
    $email_subject = "Curso de Fotografia";   
 
    function died($error) {
 
        // si hay algún error, el formulario puede desplegar su mensaje de aviso
 
        echo "Lo sentimos, hay un error en sus datos y el formulario no puede ser enviado. ";
 
        echo "Detalle de los errores.<br /><br />";
        
        echo $error."<br /><br />";
 
        echo "Porfavor corrije los errores e inténtelo de nuevo.<br /><br />";
        die();
    }
 
    // Se valida que los campos del formulairo estén llenos
 
    if(!isset($_POST['first_name']) ||
 
        !isset($_POST['last_name']) ||
 
        !isset($_POST['email']) ||
 
        !isset($_POST['telephone']) ||
 
        !isset($_POST['message'])) {
 
        died('Lo sentimos pero parece haber un problema con los datos enviados.');       
 
    }
 //Valor "name" nos sirve para crear las variables que recolectaran la información de cada campo
    
    $first_name = $_POST['first_name']; // requerido
 
    $last_name = $_POST['last_name']; // requerido
 
    $email_from = $_POST['email']; // requerido
 
    $telephone = $_POST['telephone']; // no requerido 

    $message = $_POST['message']; // requerido
 
    $error_message = "Error";

//Verificar que la dirección de correo sea válida 
    
   $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
 
    $error_message .= 'La dirección de correo proporcionada no es válida.<br />';
 
  }

//Validadacion de cadenas de texto

    $string_exp = "/^[A-Za-z .'-]+$/";

  if(!preg_match($string_exp,$first_name)) {
 
    $error_message .= 'El formato del nombre no es válido<br />';
 
  }
 
  if(!preg_match($string_exp,$last_name)) {
 
    $error_message .= 'el formato del apellido no es válido.<br />';
 
  }
 
  if(strlen($message) < 2) {
 
    $error_message .= 'El formato del texto no es válido.<br />';
 
  }
 
  if(strlen($error_message) < 0) {
 
    died($error_message);
 
  }
 
//Plantilla de mensaje

    $email_message = "Contenido del Mensaje.\n\n";
 
     
 
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    
 
    }

   $email_message .= "Nombre: ". clean_string($first_name)."\n";
 
    $email_message .= "Apellido: ". clean_string($last_name)."\n";
 
    $email_message .= "Email: ". clean_string($email_from)."\n";
 
    $email_message .= "Teléfono: " . clean_string($telephone)."\n";
 
    $email_message .= "Mensaje: ". clean_string($message)."\n";
  
   
//Encabezados
 
$headers = 'From: '.$email_from."\r\n".
 
'Reply-To: '.$email_from."\r\n" .
 
'X-Mailer: PHP/' . phpversion();
 
@mail($email_to, $email_subject, $email_message, $headers);  
   
   
  
 
 
 
?>
 
<!-- Mensaje de Éxito
<script>
     window.location.href='index.html';
</script> -->
<!DOCTYPE HTML>

<html lang="es">
	<head>
		<title>Curso de Fotografia</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link href="images/favico.png" rel="shortcut icon">
	</head>
	<body>

		<!-- Header -->
			<header id="header">
				<div class="logo">Mensaje enviado</div>
			</header>

		<!-- principal -->
			<section id="main">
				<h1>x</h1>
				<div class="inner">

				<!-- 1 -->
					<section id="one" class="wrapper style1">

						<div class="image fit flush">
							<img src="images/pic02.jpg" alt="foto1" />
						</div>
						<header class="special">
							<h2>Sobre mi</h2>
							<p>"camino recorrido"</p>
						</header>
						<div class="content">
							<p>Fotógrafa madrileña nacida en 1984 Licenciada en Bellas Artes en la Universidad de Castilla la Mancha (Cuenca) donde tuvo la suerte de ser alumna de Luis Baylón, quien claramente la impulsó a dedicarse de manera profesional a la fotografía. </p>
							<p>Experta en fotografía publicitaria y moda por la Escuela CES. En la actualidad compagina su trabajo como fotógrafa y retocadora con una de sus grandes pasiones, la docencia.</p>
						</div>
					</section>

				<!-- 2 -->
					<section id="two" class="wrapper style2">
						<header>
							<h2>Composicion</h2>
							<p>Tipos y estilos</p>
						</header>
						<div class="content">
							<div class="gallery">
								<div>
									<div class="image fit flush">
										<a href="images/pic03.jpg"><img src="images/pic03.jpg" alt="foto2" /></a>
									</div>
								</div>
								<div>
									<div class="image fit flush">
										<a href="images/pic01.jpg"><img src="images/pic01.jpg" alt="foto3" /></a>
									</div>
								</div>
								<div>
									<div class="image fit flush">
										<a href="images/pic04.jpg"><img src="images/pic04.jpg" alt="foto4" /></a>
									</div>
								</div>
								<div>
									<div class="image fit flush">
										<a href="images/pic05.jpg"><img src="images/pic05.jpg" alt="foto5" /></a>
									</div>
								</div>
							</div>
						</div>
					</section>

				<!-- 3 -->
					<section id="three" class="wrapper">
						<div class="spotlight">
							<div class="image flush"><img src="images/pic06.jpg" alt="foto6" /></div>
							<div class="inner">
								<h3>Fotografia artistica</h3>
								<p>La fotografía como arte, ciencia y experiencia humana fueron evolucionado en paralelo durante este tiempo. En cuanto fue posible hacer de la cámara un dispositivo móvil fácil de manejar apareció la posibilidad de influir en el espectador mediante la posición de la cámara y su enfoque.</p>
							</div>
						</div>
						<div class="spotlight alt">
							<div class="image flush"><img src="images/pic07.jpg" alt="foto7" /></div>
							<div  class="inner">
								<h3>Fotografia Actual</h3>
								<p>Hoy la fotografía es practicada por millones de personas en todo el mundo armados con buenas cámaras fotográficas. Actualmente se prefieren las cámaras con una buena óptica y muchas opciones que añadan flexibilidad, frente a las cámaras orientadas al consumidor, donde la óptica y el obturador quedan dirigidos por la electrónica restando al hecho de hacer una foto gran parte de su imprevisibilidad.</p>
							</div>
						</div>
						<div class="spotlight">
							<div class="image flush"><img src="images/pic08.jpg" alt="foto8" /></div>
							<div class="inner">
								<h3>Fotografia digital</h3>
								<p>La aparición de las cámaras digitales, cámaras mixtas con vídeo y la fotografía en entornos de realidad virtual complican, enriqueciendo, el futuro de este arte.</p>
							</div>
						</div>
					</section>

				</div>
			</section>

		<!-- Footer -->
			<footer id="footer">
				<div class="container">
					<ul class="icons">
						<li><a href="formulario.html" class="icon fa-envelope-o"><span class="label">Email</span></a></li>
					</ul>
				</div>
				
			</footer>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.poptrox.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html> 



<?php 
}

?>