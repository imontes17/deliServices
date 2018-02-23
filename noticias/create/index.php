<?php
session_start(); 
if(!isset($_SESSION["user"])){
	header("Location: http://".$_SERVER['HTTP_HOST']);
}
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
										<li class="current"><a href="../../noticias"><i class="glyphicon glyphicon-pencil"></i> Noticias</a></li>							 																												 												
										<li><a href="../../beneficios"><i class="glyphicon glyphicon-pencil"></i> Beneficios</a></li>							 												
									</ul>
             </div>
		  </div>
		  <div class="col-md-10">
		  	<div class="content-box-large">
				<div class="panel-heading">
					  <div class="panel-title">Información de la Noticia</div>
				</div>
			  				<div class="panel-body">
			  					<form id="new-noti" class="form-horizontal" role="form">
								  <div class="form-group">
								    <label for="restName" class="col-sm-2 control-label">Nombre:</label>
								    <div class="col-sm-10">
								      <input type="text" class="form-control" name="notiName" placeholder="Nombre">
								    </div>
								  </div>
									<div class="form-group">
								    <label for="notiCat" class="col-sm-2 control-label">Categoria:</label>
								    <div class="col-sm-10">
										<select class="form-control" name="notiCat">
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
											<label class="col-md-2 control-label">Imagen Autor:</label>
											<div class="col-md-10">
												<input type="file" class="btn btn-default" name="notiImgAutor">
												<p class="help-block">
												Ingresa una imagen con formato .png o jpg
												</p>
											</div>
									</div>
									<div class="form-group">
								    <label class="col-sm-2 control-label">Autor:</label>
								    <div class="col-sm-10">
								      <input type="text" class="form-control" name="notiAutor" placeholder="Autor">
								    </div>
									</div>
									<div class="form-group">
								    <label class="col-sm-2 control-label">Subtitulo:</label>
								    <div class="col-sm-10">
								      <input type="text" class="form-control" name="notiSub" placeholder="Subtitulo">
								    </div>
									</div>
									<div class="form-group">
								    <label class="col-sm-2 control-label">Fecha:</label>
								    <div class="col-sm-10">
								      <input type="text" class="form-control" name="notiFecha" placeholder="DD/MM/AAAA">
								    </div>
									</div>									
								  
									<div class="form-group">
								    <label class="col-sm-2 control-label">Introducción:</label>
								    <div class="col-sm-10">
								      <textarea name="notiIntro" class="form-control" placeholder="Introducción" rows="3"></textarea>
								    </div>
									</div>
									<div class="form-group">
								    <label class="col-sm-2 control-label">Encabezado:</label>
								    <div class="col-sm-10">
								      <textarea name="notiEnca" class="form-control" placeholder="Encabezado" rows="3"></textarea>
								    </div>
									</div>
									<div class="form-group">
								    <label class="col-sm-2 control-label">Parrafo 1:</label>
								    <div class="col-sm-10">
								      <textarea name="notiP1" class="form-control" placeholder="Parrafo 1" rows="3"></textarea>
								    </div>
									</div>
									<div class="form-group">
								    <label class="col-sm-2 control-label">Parrafo 2:</label>
								    <div class="col-sm-10">
								      <textarea name="notiP2" class="form-control" placeholder="Parrafo 2" rows="3"></textarea>
								    </div>
									</div><div class="form-group">
								    <label class="col-sm-2 control-label">Parrafo 3:</label>
								    <div class="col-sm-10">
								      <textarea name="notiP3" class="form-control" placeholder="Parrafo 3" rows="3"></textarea>
								    </div>
									</div>
									<div class="form-group">
								    <label class="col-sm-2 control-label">Parrafo 4:</label>
								    <div class="col-sm-10">
								      <textarea name="notiP4" class="form-control" placeholder="Parrafo 4" rows="3"></textarea>
								    </div>
									</div>
									<div class="form-group">
											<label class="col-md-2 control-label">Logo:</label>
											<div class="col-md-10">
												<input type="file" class="btn btn-default" name="notiLogo">
												<p class="help-block">
												Ingresa una imagen con formato .png o jpg
												</p>
											</div>
									</div>
									<div class="form-group">
											<label class="col-md-2 control-label">Imagen Principal:</label>
											<div class="col-md-10">
												<input type="file" class="btn btn-default" name="notiImgP">
												<p class="help-block">
												Ingresa una imagen con formato .png o jpg
												</p>
											</div>
									</div>
									<div class="form-group">
								    <label class="col-sm-2 control-label">Link Video:</label>
								    <div class="col-sm-10">
								      <input type="text" class="form-control" name="notiVideo" placeholder="Link">
								    </div>
									</div>	
									<div class="form-group">
											<label class="col-md-2 control-label">Imagen Secundaria 1:</label>
											<div class="col-md-10">
												<input type="file" class="btn btn-default" name="notiImgSec1">
												<p class="help-block">
												Ingresa una imagen con formato .png o jpg
												</p>
												<input type="text" class="form-control" name="notiDesc1" placeholder="Descripcion de la imagen">												
											</div>
									</div>
									<div class="form-group">
											<label class="col-md-2 control-label">Imagen Secundaria 2:</label>
											<div class="col-md-10">
												<input type="file" class="btn btn-default" name="notiImgSec2">
												<p class="help-block">
												Ingresa una imagen con formato .png o jpg
												</p>
												<input type="text" class="form-control" name="notiDesc2" placeholder="Descripcion de la imagen">												
											</div>
									</div><div class="form-group">
											<label class="col-md-2 control-label">Imagen Secundaria 3:</label>
											<div class="col-md-10">
												<input type="file" class="btn btn-default" name="notiImgSec3">
												<p class="help-block">
												Ingresa una imagen con formato .png o jpg
												</p>
												<input type="text" class="form-control" name="notiDesc3" placeholder="Descripcion de la imagen">												
											</div>
									</div>
									<div class="form-group">
								    <label class="col-sm-2 control-label">Frase:</label>
								    <div class="col-sm-10">
								      <input type="text" class="form-control" name="notiFrase" placeholder="Frase">
								    </div>
									</div>
									<div class="form-group">
								    <label class="col-sm-2 control-label">Editorial:</label>
								    <div class="col-sm-10">
								      <input type="text" class="form-control" name="notiEdit" placeholder="Editorial">
								    </div>
									</div>
									<div class="form-group">
											<label class="col-md-2 control-label">Logo Editorial:</label>
											<div class="col-md-10">
												<input type="file" class="btn btn-default" name="notiLogoEdit">
												<p class="help-block">
												Ingresa una imagen con formato .png o jpg
												</p>
											</div>
									</div>
									<div class="form-group">
								    <label class="col-sm-2 control-label">Sugeridos:</label>
								    <div class="col-sm-10">
								      <textarea name="notiSuge" class="form-control" placeholder="Sugeridos" rows="3"></textarea>
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
		jQuery("#btn-submit").click(function(e){
			var formElement = document.getElementById("new-noti");
			var form_data = new FormData(formElement); 			
    	var url = "../../model/noticias/Create.php"; // the script where you handle the form input.
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