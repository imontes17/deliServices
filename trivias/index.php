<?php
require_once "../model/trivias/Read.php";
$trivias=getTrivias();
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
                    <li><a href="../usuarios"><i class="glyphicon glyphicon-pencil"></i> Usuarios</a></li>							 			
                    <li class="current"><a><i class="glyphicon glyphicon-pencil"></i> Trivias</a></li>							 												
									</ul>
             </div>
		  </div>
		  <div class="col-md-10">
		  	<div class="content-box-large">
					<a href="create"><button type="button" class="btn btn-lg btn-block btn-primary">Agregar Trivia</button></a>	
					<div class="panel-body">
						<table class="table table-hover">
									<thead>
										<tr>
											<th>#</th>
											<th>Nombre</th>
											<th>Label Fecha</th>
											<th>Valor Premio</th>
											<th>Vigencia</th>		
											<th>Status</th>										
										</tr>
									</thead>
									<tbody>
										<?php foreach($trivias as $trivia):?>
											<tr>
												<td><?php echo $trivia["id"];?></td>
												<td><?php echo $trivia["name"];?></td>
												<td><?php echo $trivia["fecha"];?></td>
												<td>$ <?php echo $trivia["premio"];?></td>
												<td><?php echo $trivia["vigencia"];?></td>
												<td><?php echo $trivia["status"];?></td>												
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
  </body>
</html>