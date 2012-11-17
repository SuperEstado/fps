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
				<li><a href="<?=base_url('fps/reclamo')?>" data-toggle="tab">Buscador Beneficios</a></li>
				<li class="active"><a href="#tab2" data-toggle="tab">Reclama por tu FPS</a></li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane active" id="tab2">
					<form class="form-horizontal" action="/trading-floor.php" method="POST">
					<div class="control-group">
					<label for="nombre" class="control-label">Nombre Completo<span class="required">*</span></label>
					<div class="controls">
					<input type="text" class="span2" name="nombre" value="">
					</div>
					</div>
					<div class="control-group">
					<label for="run" class="control-label">RUN<span class="required">*</span></label>
					<div class="controls">
					<input type="text" class="span2" name="RUN" value="">
					</div>
					<br/>
					<div class="control-group">
					<label for="email" class="control-label">E-mail <span class="required">*</span></label>
					<div class="controls">
					<input type="text" class="span2" name="email" value="">
					</div>
					<div class="control-group">
					<div class="controls">
					<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1">
					Aún no me han encuestado
					</div>
					<div class="control-group">
					<label class="radio"></label>
					<div class="controls">
					<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
					Quiero revisión de mi puntaje                      </div>
					<div class="control-group">
					<label class="radio"></label>
					<div class="controls">
					<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
					Denuncia fraude en FPS</div>
					<div class="control-group">
					<label for="reclamo" class="control-label">Reclamo <span class="required">*</span></label>
					<div class="controls">
						<textarea rows="5"></textarea>
					</div>
					<br/>
					<div class="control-group">
					<label for="municipio" class="control-label">Municipio <span class="required">*</span></label>
					<div class="controls">
					<select name="Municipio" id="municipio" size="1" class="span2">
					<option>Peñalolen</option><option>Santiago</option>
					</select>
					</div>
					</div>
					<hr>
					<div class="control-group">
					<div class="controls">
					<button type="submit" class="btn btn-success btn-large" name="submit" value="submit"><i class="icon-envelope icon-white"></i> Envía tu reclamo
					</button>
					</div>
					</div>
					<input type="hidden" value="1353131677" name="renderTime"/>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</div>

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="<?=base_url('js/bootstrap.js')?>"></script>

  </body>
</html>
