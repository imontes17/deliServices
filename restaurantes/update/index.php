<?php
session_start(); 
if(!isset($_SESSION["user"])){
	header("Location: http://".$_SERVER['HTTP_HOST']);
}
require_once "../../model/restaurantes/Read.php";
$restaurante=getSingleRestaurant($_GET["id"]);
//Catch posible error
if(!is_array($restaurante)){
	header('Location: ../');
}
$imagesPath=getImagesPath($restaurante);
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
	                          <li><a href="../../model/Logout.php">Cerrar Sesión</a></li>
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
                    <li class="current"><a href="../../restaurantes"><i class="glyphicon glyphicon-pencil"></i> Restaurantes</a></li>
                    <li><a href="../../usuarios"><i class="glyphicon glyphicon-pencil"></i> Usuarios</a></li>							 											
										<li><a href="../../trivias"><i class="glyphicon glyphicon-pencil"></i> Trivias</a></li>							 												
										<li><a href="../../noticias"><i class="glyphicon glyphicon-pencil"></i> Noticias</a></li>							 												
										<li><a href="../../beneficios"><i class="glyphicon glyphicon-pencil"></i> Beneficios</a></li>							 												
									</ul>
             </div>
		  </div>
		  <div class="col-md-10">
		  	<div class="content-box-large">
				<div class="panel-heading">
					  <div class="panel-title">Edición del Restaurante</div>
				</div>
			  				<div class="panel-body">
			  					<form id="update-rest" class="form-horizontal" role="form">
									<input type="hidden" name="restId" value="<?php echo $_GET["id"]?>">									
									<input type="hidden" name="imgPrecioOld" value="<?php echo $restaurante['img_price']?>">									
									<input type="hidden" name="logoOld" value="<?php echo $restaurante['logo']?>">									
									<input type="hidden" name="imgpOld" value="<?php echo $restaurante['imagen_principal']?>">									
									<input type="hidden" name="img2Old" value="<?php echo $restaurante['imagen_2']?>">									
									<input type="hidden" name="img3Old" value="<?php echo $restaurante['imagen_3']?>">									
									<input type="hidden" name="logoEditOld" value="<?php echo $restaurante['logo_editorial']?>">									
									<input type="hidden" name="thumbnailOld" value="<?php echo $restaurante['thumbnail']?>">									
								  
									<div class="form-group">
								    <label for="restName" class="col-sm-2 control-label">Nombre:</label>
								    <div class="col-sm-10">
								      <input type="text" class="form-control" name="restName" placeholder="Nombre" value="<?php echo $restaurante['name_restaurant']?>">
								    </div>
								  </div>
									<div class="form-group">
								    <label for="restCat" class="col-sm-2 control-label">Categoria:</label>
								    <div class="col-sm-10">
										<select id="categories" class="form-control" name="restCat">
  										<option value="1-Diamante">Diamante</option>
  										<option value="2-Mixologia">Mixologia</option>
  										<option value="3-Platino">Platino</option>
  										<option value="4-Plata">Plata</option>
											<option value="5-Antojo">Antojo</option>
  										<option value="6-Bares">Bares</option>
  										<option value="7-Postres">Postres</option>
  										<option value="8-Verdes">Verdes</option>
										</select>
								    </div>
									</div>
									<div class="form-group">
								    <label for="restZone" class="col-sm-2 control-label">Zona:</label>
								    <div class="col-sm-10">
								      <input type="text" class="form-control" name="restZone" placeholder="Zona" value="<?php echo $restaurante['zona']?>">
								    </div>
									</div>									
								  <div class="form-group">
								    <label class="col-sm-2 control-label">Dirección:</label>
								    <div class="col-sm-10">
								      <textarea name="restAddr" class="form-control" placeholder="Direccion" rows="3"><?php echo $restaurante['direccion']?></textarea>
								    </div>
									</div>
									<div class="form-group">
								    <label for="restTcom" class="col-sm-2 control-label">Tipo de comida:</label>
								    <div class="col-sm-10">
								      <input type="text" class="form-control" name="restTcom" placeholder="Tipo" value="<?php echo $restaurante['tipo_comida']?>">
								    </div>
									</div>
									<div class="form-group">
								    <label for="restPrice" class="col-sm-2 control-label">Precio:</label>
								    <div class="col-sm-10">
								      <input type="number" class="form-control" min="1" name="restPrice" placeholder="$" value="<?php echo $restaurante['precio']?>">
								    </div>
									</div>
									<div class="form-group">
											<label class="col-md-2 control-label">Imagen Precio:</label>
											<div class="col-md-10">
												<input type="file" class="btn btn-default file" name="restImgPrecio">
												<?php if(isset($imagesPath[restImgPrecio])):?>
													<p id="restImgPrecio-img" class="help-block">
													<img src="<?php echo $imagesPath[restImgPrecio]?>"  height="100" width="100"/>
														Imagen Previa.
													</p>
												<?php endif;?>
											</div>
									</div>
									<div class="form-group">
								    <label class="col-sm-2 control-label">Incluye:</label>
								    <div class="col-sm-10">
								      <textarea name="restInclu" class="form-control" placeholder="Incluye" rows="3"><?php echo $restaurante['incluye']?></textarea>
								    </div>
									</div>
									<div class="form-group">
								    <label class="col-sm-2 control-label">Introducción:</label>
								    <div class="col-sm-10">
								      <textarea name="restIntro" class="form-control" placeholder="Introducción" rows="3"><?php echo $restaurante['introduccion']?></textarea>
								    </div>
									</div>
									<div class="form-group">
								    <label class="col-sm-2 control-label">Parrafo 1:</label>
								    <div class="col-sm-10">
								      <textarea name="restP1" class="form-control" placeholder="Parrafo 1" rows="3"><?php echo $restaurante['p1']?></textarea>
								    </div>
									</div>
									<div class="form-group">
								    <label class="col-sm-2 control-label">Parrafo 2:</label>
								    <div class="col-sm-10">
								      <textarea name="restP2" class="form-control" placeholder="Parrafo 2" rows="3"><?php echo $restaurante['p2']?></textarea>
								    </div>
									</div>
									<div class="form-group">
								    <label class="col-sm-2 control-label">Parrafo 3:</label>
								    <div class="col-sm-10">
								      <textarea name="restP3" class="form-control" placeholder="Parrafo 3" rows="3"><?php echo $restaurante['p3']?></textarea>
								    </div>
									</div>
									<div class="form-group">
											<label class="col-md-2 control-label">Logo</label>
											<div class="col-md-10">
												<input type="file" class="btn btn-default file" name="restLogo">
												<?php if(isset($imagesPath[restLogo])):?>
													<p id="restLogo-img" class="help-block">
													<img  src="<?php echo $imagesPath[restLogo]?>"  height="100" width="100"/>
														Imagen Previa.
													</p>
												<?php endif;?>
											</div>
									</div>
									<div class="form-group">
											<label class="col-md-2 control-label">Imagen Principal</label>
											<div class="col-md-10">
												<input type="file" class="btn btn-default file" name="restImgp">
												<?php if(isset($imagesPath[restImgp])):?>
													<p id="restImgp-img" class="help-block">
													<img  src="<?php echo $imagesPath[restImgp]?>"  height="100" width="100"/>
														Imagen Previa.
													</p>
												<?php endif;?>
											</div>
									</div>
									<div class="form-group">
								    <label for="restVideo" class="col-sm-2 control-label">Link Video</label>
								    <div class="col-sm-10">
								      <input type="text" class="form-control" name="restVideo" placeholder="Video"value="<?php echo $restaurante['link_video']?>">
								    </div>
									</div>
									<div class="form-group">
											<label class="col-md-2 control-label">Imagen 2</label>
											<div class="col-md-10">
												<input type="file" class="btn btn-default file" name="restImg2">
												<?php if(isset($imagesPath[restImg2])):?>
													<p id="restImg2-img" class="help-block">
													<img  src="<?php echo $imagesPath[restImg2]?>"  height="100" width="100"/>
														Imagen Previa.
													</p>
												<?php endif;?>
											</div>
									</div>
									<div class="form-group">
									<label class="col-md-2 control-label">Imagen 3</label>
									<div class="col-md-10">
										<input type="file" class="btn btn-default file" name="restImg3">
										<?php if(isset($imagesPath[restImg3])):?>
											<p id="restImg3-img" class="help-block">
											<img  src="<?php echo $imagesPath[restImg3]?>"  height="100" width="100"/>
												Imagen Previa.
											</p>
										<?php endif;?>
									</div>
								</div>
									<div class="form-group">
								    <label class="col-sm-2 control-label">Frase:</label>
								    <div class="col-sm-10">
								      <textarea name="restFrase" class="form-control" placeholder="Frase" rows="3"><?php echo $restaurante['frase']?></textarea>
								    </div>
									</div>
									<div class="form-group">
								    <label class="col-sm-2 control-label">Editorial:</label>
								    <div class="col-sm-10">
								      <textarea name="restEdit" class="form-control" placeholder="Editorial" rows="3"><?php echo $restaurante['editorial']?></textarea>
								    </div>
									</div>
									<div class="form-group">
											<label class="col-md-2 control-label">Logo Editorial</label>
											<div class="col-md-10">
												<input type="file" class="btn btn-default file" id="restLogoEdit" name="restLogoEdit">
												<?php if(isset($imagesPath[restLogoEdit])):?>
												<p id="restLogoEdit-img" class="help-block">
												<img  src="<?php echo $imagesPath[restLogoEdit]?>"  height="100" width="100"/>
													Imagen Previa.
												</p>
											<?php endif;?>
											</div>
									</div>
									<div class="form-group">
								    <label class="col-sm-2 control-label">Sugeridos:</label>
								    <div class="col-sm-10">
								      <textarea name="restSug" class="form-control" placeholder="Sugeridos" rows="3"><?php echo $restaurante['sugeridos']?></textarea>
								    </div>
									</div>
									<div class="form-group">
								    <label for="restCoord" class="col-sm-2 control-label">URL Google Maps:</label>
								    <div class="col-sm-10">
								      <input type="text" class="form-control" name="restCoord" placeholder="url" value="<?php echo $restaurante['google_maps']?>">
								    </div>
									</div>
									<div class="form-group">
								    <label for="restCoord" class="col-sm-2 control-label">Latitud:</label>
								    <div class="col-sm-10">
								      <input type="text" class="form-control" name="restLat" placeholder="Latitud" value="<?php echo $restaurante['latitud']?>">
								    </div>
									</div>
									<div class="form-group">
								    <label for="restCoord" class="col-sm-2 control-label">Longitud:</label>
								    <div class="col-sm-10">
								      <input type="text" class="form-control" name="restLong" placeholder="Longitud" value="<?php echo $restaurante['longitud']?>">
								    </div>
									</div>
									<div class="form-group">
								    <label for="restOrdDeli" class="col-sm-2 control-label">Ordenes Deli:</label>
								    <div class="col-sm-10">
								      <input type="number" class="form-control" min="0" name="restOrdDeli" placeholder="#" value="<?php echo $restaurante['no_ordenes_deli']?>">
								    </div>
									</div>
									<div class="form-group">
								    <label for="restOrdAdi" class="col-sm-2 control-label">Ordenes Adicionales:</label>
								    <div class="col-sm-10">
								      <input type="number" class="form-control" min="0" name="restOrdAdi" placeholder="#" value="<?php echo $restaurante['no_ordenes_adicionales']?>">
								    </div>
									</div>
									<div class="form-group">
								    <label  class="col-sm-2 control-label">Dias sin servicio:</label>
								    <div class="col-sm-10">
										<p>
			  							<select id="restDays" class="selectpicker" multiple>
												<option value="0">Domingo</option>												
									      <option value="1">Lunes</option>
									      <option value="2">Martes</option>
												<option value="3">Miercoles</option>
									      <option value="4">Jueves</option>
									      <option value="5">Viernes</option>
									      <option value="6">Sabado</option>
									  </select>
			  						</p>
								    </div>
									</div>
									<div class="form-group">
								    <label  class="col-sm-2 control-label">Horarios sin servicio:</label>
								    <div class="col-sm-10">
										<p>
			  							<select id="restHours" class="selectpicker" multiple>
									      <option value="0">00:00</option>
									      <option value="1">01:00</option>
												<option value="2">02:00</option>
									      <option value="3">03:00</option>
									      <option value="4">04:00</option>
									      <option value="5">05:00</option>
									      <option value="6">06:00</option>
									      <option value="7">07:00</option>
									      <option value="8">08:00</option>
									      <option value="9">09:00</option>
									      <option value="10">10:00</option>
									      <option value="11">11:00</option>
									      <option value="12">12:00</option>
									      <option value="13">13:00</option>
									      <option value="14">14:00</option>
									      <option value="15">15:00</option>
									      <option value="16">16:00</option>
									      <option value="17">17:00</option>
									      <option value="18">18:00</option>
									      <option value="19">19:00</option>
									      <option value="20">20:00</option>
									      <option value="21">21:00</option>
									      <option value="22">22:00</option>
									      <option value="23">23:00</option>
									  </select>
			  						</p>
								    </div>
									</div>
									<div class="form-group">
											<label class="col-md-2 control-label">Thumbnail</label>
											<div class="col-md-10">
												<input type="file" class="btn btn-default file" id="restThumb" name="restThumb">
												<?php if(isset($imagesPath[restThumb])):?>
												<p id="restThumb-img" class="help-block">
												<img  src="<?php echo $imagesPath[restThumb]?>"  height="100" width="100"/>
													Imagen Previa.
												</p>
											<?php endif;?>
											</div>
									</div>
									<div class="form-group">
								    <label class="col-sm-2 control-label">Tag:</label>
								    <div class="col-sm-10">
								      <input type="text" class="form-control" name="restTag" placeholder="Tag" value="<?php echo $restaurante['tag']?>">
								    </div>
								  </div>
									<div class="form-group">
								    <label class="col-sm-2 control-label">Tolerancia:</label>
								    <div class="col-sm-10">
								      <input type="text" class="form-control" name="restTol" placeholder="Tolerancia" value="<?php echo $restaurante['tolerancia']?>">
								    </div>
								  </div>
									<div class="form-group">
								    <label class="col-sm-2 control-label">Nickname:</label>
								    <div class="col-sm-10">
								      <input type="text" class="form-control" name="restNick" placeholder="Nickname" value="<?php echo $restaurante['nickname']?>">
								    </div>
								  </div>
								  <div class="form-group">
								    <div class="col-sm-offset-2 col-sm-10">
										<button id="btn-submit" class="btn btn-primary" type="button">
													Actualizar
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
               Copyright 2017 <a href='#'>Deli</a>
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
		jQuery(".file").change(function(element){
			var name = jQuery(element.target).attr("name");
			jQuery("#"+name+"-img").hide();
		});
		//----------------------------------------------------
		try{
		var daysBlocked = "<?php echo $restaurante["days"]?>";
		var days = daysBlocked.split(",");
		$.each(days, function( index, value ) {
			$('#restDays option[value='+value+']').attr('selected','selected');
		});
		}catch(e){

		}
		//----------------------------------------------------
		try{
		var hoursBlocked = "<?php echo $restaurante["hours"]?>";
		var hours = hoursBlocked.split(",");
		$.each(hours, function( index, value ) {
			$('#restHours option[value='+value+']').attr('selected','selected');
		});
		}catch(e){}
		//-------------------------------------------------------
		var categorySelected = <?php echo $restaurante["deli_categories_id_category"]?>;		
		var categories = document.getElementById("categories");
		categories.options.selectedIndex = categorySelected - 1;
		//---------------------------------------------------------
		jQuery("#btn-submit").click(function(e){
			var formElement = document.getElementById("update-rest");
			var form_data = new FormData(formElement); 
			form_data.append("restDays", $("#restDays").val());
			form_data.append("restHours", $("#restHours").val());
    	var url = "../../model/restaurantes/Update.php"; // the script where you handle the form input.
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