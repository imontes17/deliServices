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
						<li class="current"><a href="../../trivias"><i class="glyphicon glyphicon-pencil"></i> Trivias</a></li>							 												
					</ul>
        </div>
		  </div>
		  <div class="col-md-10">
		  	<div class="content-box-large">
				<div class="row">
					<div class="col-md-12">
						<div class="content-box-large">
		  				<div class="panel-heading">
								<div class="panel-title">Sección de Trivias</div>
						  </div>
		  				<div class="panel-body">
		  					<div id="rootwizard">
									<div class="navbar">
								  	<div class="navbar-inner">
								    	<div class="container">
												<ul class="nav nav-pills">
								  				<li class="active"><a href="#tab1" data-toggle="tab">Datos Generales</a></li>
													<li><a href="#tab2" data-toggle="tab">Preguntas</a></li>
												</ul>
								 			</div>
								  	</div>
									</div>
									<div class="tab-content">
								    <div class="tab-pane active" id="tab1">
											<form id="new-triv" class="form-horizontal" role="form">
								  			<div class="form-group">
								    			<label for="restName" class="col-sm-2 control-label">Nombre:</label>
								    			<div class="col-sm-10">
								      			<input type="text" class="form-control" name="trivName" placeholder="Nombre">
								    			</div>
								  			</div>
												<div class="form-group">
								    			<label for="trivFecha" class="col-sm-2 control-label">Fecha:</label>
								    			<div class="col-sm-10">
								      			<input type="text" class="form-control" name="trivFecha" placeholder="Fecha">
								    			</div>
												</div>									
								  			<div class="form-group">
								    			<label class="col-sm-2 control-label">Incluye:</label>
								    			<div class="col-sm-10">
								      			<textarea name="trivInclu" class="form-control" placeholder="Incluye" rows="3"></textarea>
								    			</div>
												</div>
												<div class="form-group">
								    			<label for="trivVig" class="col-sm-2 control-label">Vigencia:</label>
								    			<div class="col-sm-10">
								      			<input type="text" class="form-control" name="trivVig" placeholder="Vigencia">
								    			</div>
												</div>	
												<div class="form-group">
								    			<label for="trivPremio" class="col-sm-2 control-label">Premio:</label>
								    			<div class="col-sm-10">
								      			<input type="number" class="form-control" min="1" name="trivPremio" placeholder="$">
								    			</div>
												</div>
												<div class="form-group">
													<label class="col-md-2 control-label">Logo Blanco:</label>
													<div class="col-md-10">
														<input type="file" class="btn btn-default" name="trivLogoB">
														<p class="help-block">
															Ingresa una imagen con formato .png
														</p>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-2 control-label">Logo Negro:</label>
													<div class="col-md-10">
														<input type="file" class="btn btn-default" name="trivLogoN">
														<p class="help-block">
															Ingresa una imagen con formato .png
														</p>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-2 control-label">Imagen Principal:</label>
													<div class="col-md-10">
														<input type="file" class="btn btn-default" name="trivImgP">
														<p class="help-block">
															Ingresa una imagen con formato .png
														</p>
													</div>
												</div>			
											</form>
										</div>
										<div class="tab-pane" id="tab2">
											<form class="form-horizontal" role="form">
											<div class="qSection">
								  				<div class="form-group">
								    				<label class="col-sm-2 control-label">Pregunta 1:</label>
								    				<div class="col-sm-10">
								      					<input type="text" class="form-control question" placeholder="Pregunta">
								    				</div>
								  				</div>
												<div class="form-group">
								    				<label class="col-sm-2 control-label">Respuestas:</label>
								    				<div class="col-sm-3">
								      					<input type="text" class="form-control asw1" placeholder="Respuesta 1">
													</div>
													<div class="col-sm-3">
								      					<input type="text" class="form-control asw2" placeholder="Respuesta 2">
													</div>
													<div class="col-sm-3">
								      					<input type="text" class="form-control asw3" placeholder="Respuesta 3">
								    				</div>
												</div>
											</div><div class="qSection">
								  				<div class="form-group">
								    				<label class="col-sm-2 control-label">Pregunta 2:</label>
								    				<div class="col-sm-10">
								      					<input type="text" class="form-control question" placeholder="Pregunta">
								    				</div>
								  				</div>
												<div class="form-group">
								    				<label class="col-sm-2 control-label">Respuestas:</label>
								    				<div class="col-sm-3">
								      					<input type="text" class="form-control asw1" placeholder="Respuesta 1">
													</div>
													<div class="col-sm-3">
								      					<input type="text" class="form-control asw2" placeholder="Respuesta 2">
													</div>
													<div class="col-sm-3">
								      					<input type="text" class="form-control asw3" placeholder="Respuesta 3">
								    				</div>
												</div>
											</div><div class="qSection">
								  				<div class="form-group">
								    				<label class="col-sm-2 control-label">Pregunta 3:</label>
								    				<div class="col-sm-10">
								      					<input type="text" class="form-control question" placeholder="Pregunta">
								    				</div>
								  				</div>
												<div class="form-group">
								    				<label class="col-sm-2 control-label">Respuestas:</label>
								    				<div class="col-sm-3">
								      					<input type="text" class="form-control asw1" placeholder="Respuesta 1">
													</div>
													<div class="col-sm-3">
								      					<input type="text" class="form-control asw2" placeholder="Respuesta 2">
													</div>
													<div class="col-sm-3">
								      					<input type="text" class="form-control asw3" placeholder="Respuesta 3">
								    				</div>
												</div>
											</div><div class="qSection">
								  				<div class="form-group">
								    				<label class="col-sm-2 control-label">Pregunta 4:</label>
								    				<div class="col-sm-10">
								      					<input type="text" class="form-control question" placeholder="Pregunta">
								    				</div>
								  				</div>
												<div class="form-group">
								    				<label class="col-sm-2 control-label">Respuestas:</label>
								    				<div class="col-sm-3">
								      					<input type="text" class="form-control asw1" placeholder="Respuesta 1">
													</div>
													<div class="col-sm-3">
								      					<input type="text" class="form-control asw2" placeholder="Respuesta 2">
													</div>
													<div class="col-sm-3">
								      					<input type="text" class="form-control asw3" placeholder="Respuesta 3">
								    				</div>
												</div>
											</div><div class="qSection">
								  				<div class="form-group">
								    				<label class="col-sm-2 control-label">Pregunta 5:</label>
								    				<div class="col-sm-10">
								      					<input type="text" class="form-control question" placeholder="Pregunta">
								    				</div>
								  				</div>
												<div class="form-group">
								    				<label class="col-sm-2 control-label">Respuestas:</label>
								    				<div class="col-sm-3">
								      					<input type="text" class="form-control asw1" placeholder="Respuesta 1">
													</div>
													<div class="col-sm-3">
								      					<input type="text" class="form-control asw2" placeholder="Respuesta 2">
													</div>
													<div class="col-sm-3">
								      					<input type="text" class="form-control asw3" placeholder="Respuesta 3">
								    				</div>
												</div>
											</div><div class="qSection">
								  				<div class="form-group">
								    				<label class="col-sm-2 control-label">Pregunta 6:</label>
								    				<div class="col-sm-10">
								      					<input type="text" class="form-control question" placeholder="Pregunta">
								    				</div>
								  				</div>
												<div class="form-group">
								    				<label class="col-sm-2 control-label">Respuestas:</label>
								    				<div class="col-sm-3">
								      					<input type="text" class="form-control asw1" placeholder="Respuesta 1">
													</div>
													<div class="col-sm-3">
								      					<input type="text" class="form-control asw2" placeholder="Respuesta 2">
													</div>
													<div class="col-sm-3">
								      					<input type="text" class="form-control asw3" placeholder="Respuesta 3">
								    				</div>
												</div>
											</div><div class="qSection">
								  				<div class="form-group">
								    				<label class="col-sm-2 control-label">Pregunta 7:</label>
								    				<div class="col-sm-10">
								      					<input type="text" class="form-control question" placeholder="Pregunta">
								    				</div>
								  				</div>
												<div class="form-group">
								    				<label class="col-sm-2 control-label">Respuestas:</label>
								    				<div class="col-sm-3">
								      					<input type="text" class="form-control asw1" placeholder="Respuesta 1">
													</div>
													<div class="col-sm-3">
								      					<input type="text" class="form-control asw2" placeholder="Respuesta 2">
													</div>
													<div class="col-sm-3">
								      					<input type="text" class="form-control asw3" placeholder="Respuesta 3">
								    				</div>
												</div>
											</div><div class="qSection">
								  				<div class="form-group">
								    				<label class="col-sm-2 control-label">Pregunta 8:</label>
								    				<div class="col-sm-10">
								      					<input type="text" class="form-control question" placeholder="Pregunta">
								    				</div>
								  				</div>
												<div class="form-group">
								    				<label class="col-sm-2 control-label">Respuestas:</label>
								    				<div class="col-sm-3">
								      					<input type="text" class="form-control asw1" placeholder="Respuesta 1">
													</div>
													<div class="col-sm-3">
								      					<input type="text" class="form-control asw2" placeholder="Respuesta 2">
													</div>
													<div class="col-sm-3">
								      					<input type="text" class="form-control asw3" placeholder="Respuesta 3">
								    				</div>
												</div>
											</div><div class="qSection">
								  				<div class="form-group">
								    				<label class="col-sm-2 control-label">Pregunta 9:</label>
								    				<div class="col-sm-10">
								      					<input type="text" class="form-control question" placeholder="Pregunta">
								    				</div>
								  				</div>
												<div class="form-group">
								    				<label class="col-sm-2 control-label">Respuestas:</label>
								    				<div class="col-sm-3">
								      					<input type="text" class="form-control asw1" placeholder="Respuesta 1">
													</div>
													<div class="col-sm-3">
								      					<input type="text" class="form-control asw2" placeholder="Respuesta 2">
													</div>
													<div class="col-sm-3">
								      					<input type="text" class="form-control asw3" placeholder="Respuesta 3">
								    				</div>
												</div>
											</div><div class="qSection">
								  				<div class="form-group">
								    				<label class="col-sm-2 control-label">Pregunta 10:</label>
								    				<div class="col-sm-10">
								      					<input type="text" class="form-control question" placeholder="Pregunta">
								    				</div>
								  				</div>
												<div class="form-group">
								    				<label class="col-sm-2 control-label">Respuestas:</label>
								    				<div class="col-sm-3">
								      					<input type="text" class="form-control asw1" placeholder="Respuesta 1">
													</div>
													<div class="col-sm-3">
								      					<input type="text" class="form-control asw2" placeholder="Respuesta 2">
													</div>
													<div class="col-sm-3">
								      					<input type="text" class="form-control asw3" placeholder="Respuesta 3">
								    				</div>
												</div>
											</div>											
											</form>
										</div>
								<div class="form-group">
								  <div class="col-sm-offset-2 col-sm-10">
										<button id="btn-submit" class="btn btn-primary" type="button">
													Guardar Trivia
										</button>
								  </div>
								</div>
							</div>
		  			</div>
		  		</div>
				</div>
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
			var trivia= new Array();
			$(".qSection").each(function(){
			var pregunta = {question:$(this).find(".question").val(), asw1:$(this).find(".asw1").val(), asw2:$(this).find(".asw2").val(), asw3:$(this).find(".asw3").val()};				
			trivia.push(pregunta);	
			});			
			var formElement = document.getElementById("new-triv");
			var form_data = new FormData(formElement); 
			form_data.append("trivCont",JSON.stringify(trivia));
			
    	var url = "../../model/trivias/Create.php"; // the script where you handle the form input.
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