<?php
session_start(); 
?>
<!DOCTYPE html>
<html  lang="es">
  <head>
	<title>Panel Deli</title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="css/styles.css" rel="stylesheet">

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
										<a href=""><img src="images/delilogo2.png"  height="50" width="60"/></a>
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
	                          <li><a href="model/Logout.php">Cerrar Sesión</a></li>
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
			<?php if(isset($_SESSION["user"])):?>
    	<div class="row">
		  <div class="col-md-2">
		  	<div class="sidebar content-box" style="display: block;">
                <ul class="nav">
                    <!-- Main menu -->
                    <li class="current"><a href="/"><i class="glyphicon glyphicon-home"></i> Inicio</a></li>
										<li class="submenu">
										<a href=""><i class="glyphicon glyphicon-pencil"></i> Restaurantes</a>
                         <ul>
												 		<li><a href="restaurantes">Lista de restaurantes</a></li>													 
                            <li><a href="restaurantes/destacados">Destacados</a></li>
                        </ul>
										</li>
                    <li><a href="usuarios"><i class="glyphicon glyphicon-pencil"></i> Usuarios</a></li>										
                    <li><a href="trivias"><i class="glyphicon glyphicon-pencil"></i> Trivias</a></li>																				
                    <li><a href="noticias"><i class="glyphicon glyphicon-pencil"></i> Noticias</a></li>																														
                    <li><a href="beneficios"><i class="glyphicon glyphicon-pencil"></i> Beneficios</a></li>																																								
									</ul>
             </div>
		  </div>
		  <div class="col-md-10">
		  	<div class="content-box-large">
				Curabitur bibendum accumsan felis, in cursus lectus porttitor sed. Aliquam quis est sit amet libero pretium suscipit a vitae velit. Cras sollicitudin suscipit justo ac consectetur. Nam vel iaculis enim. Quisque ut tristique sem. Suspendisse feugiat dignissim nisi nec luctus. Etiam tincidunt id nulla vel mollis. Pellentesque convallis velit at luctus vulputate. Suspendisse potenti. Nam eu elementum tellus, sit amet varius tortor. Aliquam erat volutpat. In mi magna, mattis id bibendum id, viverra quis mauris.
				<br /><br />
				Nulla sed sem quis odio hendrerit rutrum ac sed nisl. Nulla sit amet nibh orci. Donec ornare mollis elit quis egestas. Sed euismod mollis accumsan. In dapibus arcu arcu, id condimentum lacus accumsan eget. Vivamus in sapien non nulla ultricies molestie. Fusce volutpat tellus quis mi laoreet accumsan. Nulla nec neque aliquet lorem scelerisque eleifend eu et leo.
				<br /><br />
				Pellentesque id arcu et odio imperdiet laoreet. Nulla sed eros risus. Sed tellus odio, faucibus et odio eu, eleifend aliquet nisl. In porttitor odio pulvinar ligula tempor, bibendum lacinia metus mattis. Donec venenatis, tellus non aliquet lobortis, magna lorem ullamcorper urna, nec posuere metus lacus non tellus. Aenean condimentum, velit ac tincidunt volutpat, dolor metus pulvinar lacus, a commodo massa dolor eget magna. Ut hendrerit lectus sit amet malesuada tincidunt.
				<br /><br />
				Curabitur bibendum accumsan felis, in cursus lectus porttitor sed. Aliquam quis est sit amet libero pretium suscipit a vitae velit. Cras sollicitudin suscipit justo ac consectetur. Nam vel iaculis enim. Quisque ut tristique sem. Suspendisse feugiat dignissim nisi nec luctus. Etiam tincidunt id nulla vel mollis. Pellentesque convallis velit at luctus vulputate. Suspendisse potenti. Nam eu elementum tellus, sit amet varius tortor. Aliquam erat volutpat. In mi magna, mattis id bibendum id, viverra quis mauris.
				<br /><br />
				Nulla sed sem quis odio hendrerit rutrum ac sed nisl. Nulla sit amet nibh orci. Donec ornare mollis elit quis egestas. Sed euismod mollis accumsan. In dapibus arcu arcu, id condimentum lacus accumsan eget. Vivamus in sapien non nulla ultricies molestie. Fusce volutpat tellus quis mi laoreet accumsan. Nulla nec neque aliquet lorem scelerisque eleifend eu et leo.
				<br /><br />
				Pellentesque id arcu et odio imperdiet laoreet. Nulla sed eros risus. Sed tellus odio, faucibus et odio eu, eleifend aliquet nisl. In porttitor odio pulvinar ligula tempor, bibendum lacinia metus mattis. Donec venenatis, tellus non aliquet lobortis, magna lorem ullamcorper urna, nec posuere metus lacus non tellus. Aenean condimentum, velit ac tincidunt volutpat, dolor metus pulvinar lacus, a commodo massa dolor eget magna. Ut hendrerit lectus sit amet malesuada tincidunt.
				<br /><br />				Curabitur bibendum accumsan felis, in cursus lectus porttitor sed. Aliquam quis est sit amet libero pretium suscipit a vitae velit. Cras sollicitudin suscipit justo ac consectetur. Nam vel iaculis enim. Quisque ut tristique sem. Suspendisse feugiat dignissim nisi nec luctus. Etiam tincidunt id nulla vel mollis. Pellentesque convallis velit at luctus vulputate. Suspendisse potenti. Nam eu elementum tellus, sit amet varius tortor. Aliquam erat volutpat. In mi magna, mattis id bibendum id, viverra quis mauris.
				<br /><br />
				Nulla sed sem quis odio hendrerit rutrum ac sed nisl. Nulla sit amet nibh orci. Donec ornare mollis elit quis egestas. Sed euismod mollis accumsan. In dapibus arcu arcu, id condimentum lacus accumsan eget. Vivamus in sapien non nulla ultricies molestie. Fusce volutpat tellus quis mi laoreet accumsan. Nulla nec neque aliquet lorem scelerisque eleifend eu et leo.
				<br /><br />
				Pellentesque id arcu et odio imperdiet laoreet. Nulla sed eros risus. Sed tellus odio, faucibus et odio eu, eleifend aliquet nisl. In porttitor odio pulvinar ligula tempor, bibendum lacinia metus mattis. Donec venenatis, tellus non aliquet lobortis, magna lorem ullamcorper urna, nec posuere metus lacus non tellus. Aenean condimentum, velit ac tincidunt volutpat, dolor metus pulvinar lacus, a commodo massa dolor eget magna. Ut hendrerit lectus sit amet malesuada tincidunt.
				<br /><br />
		  	</div>
		  </div>
		</div>
		<?php else:?>
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="login-wrapper">
			        <div class="box">
			            <div class="content-wrap">
			                <h6>Inicio de Sesión</h6>
			                <input class="form-control" type="text" placeholder="Username">
			                <input class="form-control" type="password" placeholder="Password">
			                <div class="action">
			                    <a class="btn btn-primary signup" href="model/Login.php">Login</a>
			                </div>                
			            </div>
			        </div>
			    </div>
			</div>
		</div>
		<?php endif;?>		
    </div>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
  </body>
</html>