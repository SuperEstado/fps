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
		<div class="span12">
			<div class="tabbable"> <!-- Only required for left/right tabs -->
				<ul class="nav nav-tabs">
					<li class="active"><a href="#tab1" data-toggle="tab">Buscador Beneficios</a></li>
					<li><a href="#tab2" data-toggle="tab">Reclama por tu FPS</a></li>
				</ul>
				<div class="tab-content">
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
					<div class="tab-pane active" id="tab1">
						<p>Este es tu puntaje FPS <span class="label label-success"><?=$valorFPS?></span> y puedes postular 
						a <span class="label label-info"><?=$nFichas?></span> beneficios, disponibles para <span class="label label-warning"><?=$personas?></span> personas en Chile</p>

						<br/>
						<div class="accordion" id="accordion2">
							<div class="accordion-group">
								<? foreach($fichas as $ficha) {?>
								<div class="accordion-heading">
									<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse<?=$ficha['id']?>">
										<h3><?=$ficha['titulo']?></h3>
									</a>
								</div>
								<div id="collapse<?=$ficha['id']?>" class="accordion-body collapse" style="height: 0px; ">
									<div class="accordion-inner">
										<div class="row caja">
											<div class="span9">
												<dl class="dl-horizontal">
													<dt>Descripción:</dt>
													<dd><?=$ficha['objetivo']?></dd>
													<dt>Beneficiarios:</dt>
													<dd><?=$ficha['beneficiarios']?></dd>
													<dt>Documentos:</dt>
													<dd><?=$ficha['doc_requeridos']?></dd>
												</dl>
											</div>

											<div class="span2">
												<? if(isset($ficha['guia_online_url'])&&$ficha['guia_online_url']!='') { ?>
												<a href="<?=$ficha['guia_online_url']?>" class="btn" target="_blank" >Realiza el trámite online</a>
												<? } else { ?>
												<a href="http://www.chilesinpapeleo.cl/digitalizacion/formulario?origen=<?=$ficha['codigo']?>&tipo=p&tipo_tramite=online" class="btn" target="_blank" >Pide este trámite online</a>
												<? } //Cierre del if-else del boton del tramite ?>
											</div>
										</div>
									</div>
								</div>
								<? } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

		<?=$this->load->view('footer');?>

  </body>
</html>
