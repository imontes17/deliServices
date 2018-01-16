<?php
require_once "../../model/beneficios/Read.php";
$beneficio=getBeneficio($_GET["id"]);
//Catch posible error
if(!is_array($beneficio)){
	header('Location: ../');
}
$imagesPath=getImagesPath($beneficio);
?>
<!DOCTYPE html>
<html  lang="es">
  <head>
	<title>Panel Deli</title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
		<link href="../../css/styles.css" rel="stylesheet">
		<link href="../../css/forms.css" rel="stylesheet">
		<!-- jQuery UI -->
		<link href="https://code.jquery.com/ui/1.10.3/themes/redmond/jquery-ui.css" rel="stylesheet" media="screen">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link href="../../vendors/form-helpers/css/bootstrap-formhelpers.min.css" rel="stylesheet">
    <link href="../../vendors/select/bootstrap-select.min.css" rel="stylesheet">
    <link href="../../vendors/tags/css/bootstrap-tags.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  	<div class="header">
	     <div class="container">
	        <div class="row">
	           <div class="col-md-5">
	              <!-- Logo -->
	              <div class="logo">
									<a href="/"><img src="../../images/delilogo2.png"  height="50" width="60"/></a>										
	              </div>
	           </div>
	           <div class="col-md-5">
	              <div class="row">
	                <div class="col-lg-12">
	                  
	                </div>
	              </div>
	           </div>
	           <div class="col-md-2">
	              <div class="navbar navbar-inverse" role="banner">
	                  <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
	                    <ul class="nav navbar-nav">
	                      <li class="dropdown">
	                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Mi cuenta <b class="caret"></b></a>
	                        <ul class="dropdown-menu animated fadeInUp">
	                          <li><a href="login.html">Cerrar Sesión</a></li>
	                        </ul>
	                      </li>
	                    </ul>
	                  </nav>
	              </div>
	           </div>
	        </div>
	     </div>
	</div>
    <div class="page-content">
    	<div class="row">
		  <div class="col-md-2">
		  	<div class="sidebar content-box" style="display: block;">
                <ul class="nav">
                    <!-- Main menu -->
                    <li><a href="/"><i class="glyphicon glyphicon-home"></i> Inicio</a></li>
                    <li><a href="../../restaurantes"><i class="glyphicon glyphicon-pencil"></i> Restaurantes</a></li>
										<li><a href="../../usuarios"><i class="glyphicon glyphicon-pencil"></i> Usuarios</a></li>							 			
										<li><a href="../../trivias"><i class="glyphicon glyphicon-pencil"></i> Trivias</a></li>	
										<li><a href="../../noticias"><i class="glyphicon glyphicon-pencil"></i> Noticias</a></li>							 																												 												
										<li class="current"><a href="../../beneficios"><i class="glyphicon glyphicon-pencil"></i> Beneficios</a></li>							 												
									</ul>
             </div>
		  </div>
		  <div class="col-md-10">
		  	<div class="content-box-large">
				<div class="panel-heading">
					  <div class="panel-title">Edición del Beneficio</div>
				</div>
			  				<div class="panel-body">
			  					<form id="update-bene" class="form-horizontal" role="form">
									<input type="hidden" name="beneId" value="<?php echo $_GET["id"]?>">									
									<input type="hidden" name="imgPOld" value="<?php echo $beneficio['img_principal']?>">									
									<input type="hidden" name="logoOld" value="<?php echo $beneficio['logo']?>">									
									<input type="hidden" name="imgS1Old" value="<?php echo $beneficio['img_sec1']?>">									
									<input type="hidden" name="imgS2old" value="<?php echo $beneficio['img_sec2']?>">
								  <div class="form-group">
								    <label class="col-sm-2 control-label">Nombre:</label>
								    <div class="col-sm-10">
								      <input type="text" class="form-control" name="beneName" value="<?php echo $beneficio['nombre']?>">
								    </div>
									</div>
									<div class="form-group">
								    <label class="col-sm-2 control-label">Tipo de Beneficio:</label>
								    <div class="col-sm-10">
										<select class="form-control" name="beneTipo" id="beneTipo">
  										<option value="Recursos Humanos">Recursos Humanos</option>
  										<option value="Compras">Compras</option>
  										<option value="Servicios">Servicios</option>
  										<option value="Networking">Networking</option>
										</select>
								    </div>
									</div>
									<div class="form-group">
								    <label class="col-sm-2 control-label">Categoria:</label>
								    <div class="col-sm-10">
										<select class="form-control" name="beneCat" id="beneCat">
  										<option value="Diamante">Diamante</option>
  										<option value="Mixologia">Mixologia</option>
  										<option value="Platino">Platino</option>
  										<option value="Plata">Plata</option>
											<option value="Antojo">Antojo</option>
  										<option value="Bares">Bares</option>
  										<option value="Postres">Postres</option>
  										<option value="Verdes">Verdes</option>
										</select>
								    </div>
								  </div>
									<div class="form-group">
								    <label class="col-sm-2 control-label">Zona:</label>
								    <div class="col-sm-10">
								      <input type="text" class="form-control" name="beneZona" value="<?php echo $beneficio['zona']?>">
								    </div>
									</div>
									<div class="form-group">
								    <label class="col-sm-2 control-label">Dirección:</label>
								    <div class="col-sm-10">
								      <input type="text" class="form-control" name="beneDir" value="<?php echo $beneficio['direccion']?>">
								    </div>
									</div>
									<div class="form-group">
								    <label class="col-sm-2 control-label">Beneficio:</label>
								    <div class="col-sm-10">
								      <input type="text" class="form-control" name="beneBen" value="<?php echo $beneficio['beneficio']?>">
								    </div>
									</div>
									<div class="form-group">
								    <label class="col-sm-2 control-label">Correo:</label>
								    <div class="col-sm-10">
								      <input type="text" class="form-control" name="beneEmail" value="<?php echo $beneficio['correo']?>">
								    </div>
									</div>
									<div class="form-group">
								    <label class="col-sm-2 control-label">Beneficio 1:</label>
								    <div class="col-sm-10">
											<textarea name="beneBene1" class="form-control" placeholder="Beneficio #1" rows="3"><?php echo $beneficio['beneficio1']?></textarea>
								    </div>
									</div>
									<div class="form-group">
								    <label class="col-sm-2 control-label">Beneficio 2:</label>
								    <div class="col-sm-10">
											<textarea name="beneBene2" class="form-control" placeholder="Beneficio #2" rows="3"><?php echo $beneficio['beneficio2']?></textarea>
								    </div>
									</div>
									<div class="form-group">
								    <label class="col-sm-2 control-label">Nosotros:</label>
								    <div class="col-sm-10">
											<textarea name="beneNos" class="form-control" placeholder="Nosotros" rows="3"><?php echo $beneficio['nosotros']?></textarea>
								    </div>
									</div>
									<div class="form-group">
								    <label class="col-sm-2 control-label">Parrafo 1:</label>
								    <div class="col-sm-10">
											<textarea name="beneP1" class="form-control" placeholder="Parrafo #2" rows="3"><?php echo $beneficio['p1']?></textarea>
								    </div>
									</div>
									<div class="form-group">
								    <label class="col-sm-2 control-label">Parrafo 2:</label>
								    <div class="col-sm-10">
											<textarea name="beneP2" class="form-control" placeholder="Parrafo #2" rows="3"><?php echo $beneficio['p2']?></textarea>
								    </div>
								  </div>
									<div class="form-group">
											<label class="col-md-2 control-label">Logo Marca:</label>
											<div class="col-md-10">
												<input type="file" class="btn btn-default file" name="beneLogo">
												<?php if(isset($imagesPath["logo"])):?>
												<p id="beneLogo-img" class="help-block">
												<img src="<?php echo $imagesPath["logo"]?>"  height="100" width="100"/>
													Imagen Previa.
												</p>
											<?php endif;?>
											</div>
									</div>
									<div class="form-group">
											<label class="col-md-2 control-label">Imagen Principal:</label>
											<div class="col-md-10">
												<input type="file" class="btn btn-default file" name="beneImgP">
												<?php if(isset($imagesPath["img_principal"])):?>
												<p id="beneImgP-img" class="help-block">
												<img src="<?php echo $imagesPath["img_principal"]?>"  height="100" width="100"/>
													Imagen Previa.
												</p>
											<?php endif;?>
											</div>
									</div>
									<div class="form-group">
								    <label class="col-sm-2 control-label">Link Video:</label>
								    <div class="col-sm-10">
								      <input type="text" class="form-control" name="beneLink"value="<?php echo $beneficio['video']?>">
								    </div>
									</div>	
									<div class="form-group">
											<label class="col-md-2 control-label">Imagen Secundaria 1:</label>
											<div class="col-md-10">
												<input type="file" class="btn btn-default file" name="beneImgSec1">
												<?php if(isset($imagesPath["img_sec1"])):?>
												<p id="beneImgSec1-img" class="help-block">
												<img src="<?php echo $imagesPath["img_sec1"]?>"  height="100" width="100"/>
													Imagen Previa.
												</p>
											<?php endif;?>
												<input type="text" class="form-control" name="beneDesc1" placeholder="Descripción" value="<?php echo $beneficio['desc_img_sec1']?>">												
											</div>
									</div>
									<div class="form-group">
											<label class="col-md-2 control-label">Imagen Secundaria 2:</label>
											<div class="col-md-10">
												<input type="file" class="btn btn-default file" name="beneImgSec2">
												<?php if(isset($imagesPath["img_sec2"])):?>
												<p id="beneImgSec2-img" class="help-block">
												<img src="<?php echo $imagesPath["img_sec2"]?>"  height="100" width="100"/>
													Imagen Previa.
												</p>
											<?php endif;?>
												<input type="text" class="form-control" name="beneDesc2" placeholder="Descripción" value="<?php echo $beneficio['desc_img_sec2']?>">												
											</div>
									</div>
									<div class="form-group">
								    <label class="col-sm-2 control-label">Frase:</label>
								    <div class="col-sm-10">
								      <input type="text" class="form-control" name="beneFrase" value="<?php echo $beneficio['frase']?>">
								    </div>
									</div>
									<div class="form-group">
								    <label class="col-sm-2 control-label">Latitud:</label>
								    <div class="col-sm-10">
								      <input type="text" class="form-control" name="beneLat" value="<?php echo $beneficio['latitud']?>">
								    </div>
									</div>
									<div class="form-group">
								    <label class="col-sm-2 control-label">Longitud:</label>
								    <div class="col-sm-10">
								      <input type="text" class="form-control" name="beneLon" value="<?php echo $beneficio['longitud']?>">
								    </div>
									</div>
									<div class="form-group">
								    <label class="col-sm-2 control-label">Horario de Atención:</label>
								    <div class="col-sm-10">
								      <input type="text" class="form-control" name="beneHora" value="<?php echo $beneficio['horario']?>">
								    </div>
									</div>
									<div class="form-group">
								    <label class="col-sm-2 control-label">Telefono de Contacto:</label>
								    <div class="col-sm-10">
								      <input type="text" class="form-control" name="beneTele" value="<?php echo $beneficio['telefonos']?>">
								    </div>
									</div>
									<div class="form-group">
								    <label class="col-sm-2 control-label">Pagina Web:</label>
								    <div class="col-sm-10">
								      <input type="text" class="form-control" name="beneSitio" value="<?php echo $beneficio['website']?>">
								    </div>
									</div>
									<div class="form-group">
								    <label class="col-sm-2 control-label">Redes Sociales:</label>
								    <div class="col-sm-10">
								      <textarea name="beneRedes" class="form-control" placeholder="Redes Sociales" rows="3"><?php echo $beneficio['social']?></textarea>
								    </div>
									</div>
								  <div class="form-group">
								    <div class="col-sm-offset-2 col-sm-10">
										<button id="btn-submit" class="btn btn-primary" type="button">
													Guardar
										</button>
								    </div>
								  </div>
								</form>
			  				</div>
		  	</div>
		  </div>
		</div>
    </div>

    <footer>
         <div class="container">
            <div class="copy text-center">
               Copyright 2018 <a href='#'>Deli</a>
            </div>    
         </div>
    </footer>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
		<script src="../../js/custom.js"></script>
    <!-- jQuery UI -->
    <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

    <script src="../../vendors/form-helpers/js/bootstrap-formhelpers.min.js"></script>

    <script src="../../vendors/select/bootstrap-select.min.js"></script>

    <script src="../../vendors/tags/js/bootstrap-tags.min.js"></script>

    <script src="../../vendors/mask/jquery.maskedinput.min.js"></script>

    <script src="../../vendors/moment/moment.min.js"></script>

    <script src="../../vendors/wizard/jquery.bootstrap.wizard.min.js"></script>

     <!-- bootstrap-datetimepicker -->
     <link href="../../vendors/bootstrap-datetimepicker/datetimepicker.css" rel="stylesheet">
     <script src="../../vendors/bootstrap-datetimepicker/bootstrap-datetimepicker.js"></script> 


    <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
	<script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>

    <script src="../../js/custom.js"></script>
    <script src="../../js/forms.js"></script>
		
		<script>
		//-------------------------------------------------------
		var tipoBeneficio="<?php echo $beneficio["tipo"]?>";
		jQuery("#beneTipo").val(tipoBeneficio);		
		//---------------------------------------------------------
				var categoria="<?php echo $beneficio["categoria"]?>";
				jQuery("#beneCat").val(categoria);		
		//---------------------------------------------------------
			jQuery(".file").change(function(element){
			var name = jQuery(element.target).attr("name");
			jQuery("#"+name+"-img").hide();
		});
		//----------------------------------------------------
		jQuery("#btn-submit").click(function(e){
			var formElement = document.getElementById("update-bene");
			var form_data = new FormData(formElement); 			
    	var url = "../../model/beneficios/Update.php"; // the script where you handle the form input.
    	jQuery.ajax({
					 dataType: 'text',  // what to expect back from the PHP script, if anything
           cache: false,
           contentType: false,
           processData: false,
           type: "POST",
           url: url,
           data: form_data, // serializes the form's elements.
           success: function(data)
           {
               alert(data); // show response from the php script.
					    window.location.href = '../';
					 }
         });
    		e.preventDefault(); // avoid to execute the actual submit of the form.
		});
		</script>
  </body>
</html>