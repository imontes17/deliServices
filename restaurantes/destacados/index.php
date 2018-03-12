<?php
session_start(); 
if(!isset($_SESSION["user"])){
	header("Location: http://".$_SERVER['HTTP_HOST']);
}
require_once "../../model/restaurantes/Read.php";
$restaurantes=getDestacados();
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
                    <li class="current"><a href="../"><i class="glyphicon glyphicon-pencil"></i> Restaurantes</a></li>                    
                    <li><a href="../../usuarios"><i class="glyphicon glyphicon-pencil"></i> Usuarios</a></li>							 			
										<li><a href="../../trivias"><i class="glyphicon glyphicon-pencil"></i> Trivias</a></li>							 												
										<li><a href="../../noticias"><i class="glyphicon glyphicon-pencil"></i> Noticias</a></li>							 												
										<li><a href="../../beneficios"><i class="glyphicon glyphicon-pencil"></i> Beneficios</a></li>							 												
									</ul>
             </div>
		  </div>
		  <div class="col-md-10">
		  	<div class="content-box-large">
				<div class="panel-body">
						<table class="table table-hover">
									<thead>
										<tr>
											<th>#</th>
											<th>Nombre</th>	
											<th>Categoria</th>																					
											<th>------</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach($restaurantes as $rest):?>
											<tr>
												<td><?php echo $rest["id_restaurant"];?></td>
												<td><?php echo $rest["name_restaurant"];?></td>
												<td><?php echo $rest["category"];?></td>
												<td><a class="changeDesta" href="" data-toggle="modal" data-target="#myModal" data-id="<?php echo $rest["id_restaurant"];?>">Cambiar</a></td>
											</tr>
										<?php endforeach;?>
									</tbody>
								</table>
					</div>				
		  	</div>
		  </div>
		</div>
    </div>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Restaurante Destacado</h4>
      </div>
      <div class="modal-body">
				<p> Categoria: 
					<select id="selectCat" class="form-control">
					<option value="">Selecciona una opción...</option>						
						<option value="Diamante">Diamante</option>
						<option value="Mixologia">Mixologia</option>
						<option value="Platino">Platino</option>
						<option value="Plata">Plata</option>
						<option value="Antojo">Antojo</option>
						<option value="Bares">Bares</option>
						<option value="Postres">Postres</option>
						<option value="Verdes">Verdes</option>
					</select>
				</p>
				<p> Restaurante:
					<select id="selectRest" class="form-control" disabled>
					</select>
				</p>
      </div>
      <div class="modal-footer">
				<button type="button" id="btnRest" class="btn btn-primary" data-dismiss="modal" disabled>Guardar</button>				
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
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
		<script>
			var oldDest=null;
			jQuery('#selectCat').on('change', function() {
				$('#selectRest').empty();
  			if(this.value!=''){
					var form_data = new FormData(); 
					form_data.append("cat", this.value);
					var url = "../../model/restaurantes/RestByCat.php"; // the script where you handle the form input.
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
						var opciones = $.parseJSON(data);
						$('#selectRest').attr("disabled", false);
						$('#btnRest').attr("disabled", false);						
						$.each(opciones, function (i, item) {
    				$('#selectRest').append($('<option>', { 
							value: item.id_restaurant,
							text : item.name_restaurant 
							}));
						});
					 }
         });
				}else{
					$('#selectRest').attr("disabled", true);
					$('#btnRest').attr("disabled", true);	
				$('#selectRest').empty();																			
				}
		});

		jQuery('.changeDesta').on('click', function() {
			oldDest=$(this).attr("data-id");
		});
		jQuery('#btnRest').on('click', function() {
			var form_data = new FormData(); 
					form_data.append("old", oldDest);
					form_data.append("new", $('#selectRest').val());					
					var url = "../../model/restaurantes/UpdateRestDestacados.php"; // the script where you handle the form input.
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
						 alert(data);
						 $('#selectRest').attr("disabled", true);
						 $('#btnRest').attr("disabled", true);						
						 $('#selectRest').empty();	
						 location.reload();
					 }
         });
		});
		</script>
  </body>
</html>