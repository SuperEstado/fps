<!DOCTYPE html>
<html lang="en">
	<head>
		<?=$this->load->view('head');?>
	</head>
<body>
	<header>
		<?=$this->load->view('header');?>
	</header>

<div class="container">
<div class="row">
	<div class="span8">
		<div class="tabbable"> <!-- Only required for left/right tabs -->
			<ul class="nav nav-tabs">
				<li class="active"><a href="#tab1" data-toggle="tab">Buscador Beneficios</a></li>
				<li><a href="#tab2" data-toggle="tab">Reclama por tu FPS</a></li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane active" id="tab1">
					<p>Descubre los beneficios según tu puntaje FPS</p>
					<form class="navbar-form offset2" action="<?=base_url('fps/resultado')?>" method="POST">
						<input type="text" class="span2" class="search-query large" name="nameFPS" placeholder="Ingresar puntaje FPS">
						<button type="submit" class="btn btn-large">Encontrar beneficios</button>
						<p><a href="https://fichaproteccionsocial.mideplan.cl/fps_consulta/views/usuarios/login.php" target="blank">No sé mi puntaje</a></p>
					</form>
				</div>
				<div class="tab-pane" id="tab2">
					Ud. tiene derecho a 	
					<ul>
						<li>Recibir una atención y respuesta oportuna.</li>
						<li>Recibir un trato igualitario, digno y respetuoso.</li>
						<li>Obtener información pública gratuita. Se exceptúa costos de medios de reproducción.</li>
						<li>Conocer el estado de sus requerimientos y persona responsable de ellos.</li>
						<li>Contar con espacios para formular sus consultas, reclamos y sugerencias de los servicios y atención recibida de parte del Ministerio.</li>
						<li>Exigir confidencialidad en el uso de la información proporcionada.</li>
						<li>Exigir transparencia en los procedimientos.</li>
						<li>Facilitar el acceso a sus servicios a través de diferentes medios (atención personal, virtual, telefónica).</li>
						<li>Recibir las explicaciones pertinentes y compensación como se indica más adelante en esta carta, en caso de que se vulneren sus derechos.</li>
					</ul>
					Si Ud. siente que sus derechos han sido vulnerados por favor tome <contacto directo> con la OIRS del Ministerio de Desarrollo Social indicando su denuncia.

				</div>
			</div>
		</div>
	</div>
	<div class="span4">
		<h2>Video de presentación</h2>
		<iframe src="http://player.vimeo.com/video/53735075?badge=0" width="100%" height="210" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
	</div>
</div>
</div>
		<?=$this->load->view('footer');?>

  </body>
</html>
