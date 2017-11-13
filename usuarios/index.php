<?php
require_once "../model/usuarios/Read.php";
$usuarios=getUsuarios();
?>
<!DOCTYPE html>
<html  lang="es">
  <head>
	<title>Panel Deli</title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="../css/styles.css" rel="stylesheet">

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
										<a href="/"><img src="../images/delilogo2.png"  height="50" width="60"/></a>										
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
	                          <li><a href="login">Cerrar Sesión</a></li>
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
										<li><a href="../restaurantes"><i class="glyphicon glyphicon-pencil"></i> Restaurantes</a></li>
                    <li class="current"><a href="usuarios"><i class="glyphicon glyphicon-pencil"></i> Usuarios</a></li>										
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
											<th>Nombre de Usuario</th>
											<th>Email</th>											
											<th>Token App</th>
											<th>Comida Favorita</th>
											<th>------</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach($usuarios as $user):?>
											<tr>
												<td><?php echo $user["id"];?></td>
												<td><?php echo $user["username"];?></td>
												<td><?php echo $user["email"];?></td>												
												<td><?php echo $user["token"];?></td>
												<td>************</td>
												<td><a href="" onclick="deleteUser(<?php echo $user["id"]?>)">Eliminar</a></td>												
											</tr>
										<?php endforeach;?>
									</tbody>
								</table>
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
    <script src="../bootstrap/js/bootstrap.min.js"></script>
		<script src="../js/custom.js"></script>
		<script>
			function deleteUser(id){
				var formData = new FormData();
				formData.append("userId",id);
				if (confirm("¿Desea Eliminar al Usuario?") == true) {
				var url = "../../model/usuarios/Delete.php"; // the script where you handle the form input.
    		jQuery.ajax({
					 dataType: 'text',  // what to expect back from the PHP script, if anything
           cache: false,
           contentType: false,
           processData: false,
           type: "POST",
           url: url,
           data: formData, // serializes the form's elements.
           success: function(data)
           {
               alert(data); // show response from the php script.
					     location.reload();
					 }
         });
    			e.preventDefault(); // avoid to execute the actual submit of the form.
				}
			}
		</script>
  </body>
</html>