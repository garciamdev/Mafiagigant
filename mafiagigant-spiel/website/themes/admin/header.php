
<!DOCTYPE html>
<html>
	<head>
	   <link href="<?= BASE_URL;?>themes/admin/css/bootstrap.min.css" rel="stylesheet" />
	   <link href="<?= BASE_URL;?>themes/admin/css/admin.css" rel="stylesheet" />
	   <link rel="shortcut icon" href="<?= BASE_URL;?>themes/admin/images/icon.png" />
	   <link rel="stylesheet" href="<?= BASE_URL;?>themes/admin/3rdparty/sidebar/assets/css/jquery.mCustomScrollbar.min.css" />
	   <link rel="stylesheet" href="<?= BASE_URL;?>themes/admin/3rdparty/sidebar/assets/css/custom.css">
	   <link rel="stylesheet" href="<?= BASE_URL;?>themes/admin/3rdparty/sidebar/assets/css/custom-themes.css">
	   <link rel="stylesheet" href="<?= BASE_URL;?>themes/admin/3rdparty/datatables/datatables.min.css">
	   <link rel="stylesheet" href="<?= BASE_URL;?>themes/admin/3rdparty/summernote/summernote.css">
	   <link rel="stylesheet" href="<?= BASE_URL;?>themes/admin/css/styles.css">
	   <title>Admin</title>
	</head>
	<body>
		
		<nav class="navbar navbar-default navbar-static-top">
			<div class="container-fluid">
				<div class="navbar-header">
					<!-- <a href="?page=admin&module=admin" class="navbar-brand">
						<img src="themes/default/images/logo.png" /> SecretCrime ACP 
					</a> -->
				</div>
				<form class="navbar-form navbar-left" role="search" method="post" action="?page=admin&module=users&action=view">
					<div class="form-group">
						<input type="text" name="user" class="form-control" placeholder="Find User">
					</div>
					<button type="submit" class="btn btn-default">Submit</button>
				</form>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-9">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="?page=admin&module=admin"></a></li>
						<li><a href="/">Back To Game</a></li>
						<?php if($module != 'countrys'){?>
							<li><a href="/<?= $module;?>">View page</a></li>
							<?php } ?>
				 	</ul>
				</div>
		   </div>
		</nav>

		<div class="container-fluid">
			<div class="row">
				<div class="col-md-3 col-lg-2 navigation">
                        
                        <div class="list-group">
                            <div class="list-group-item heading">
                                Game Mechanics
                            </div>
                            
											<a href="/admin/crimes/" class="list-group-item ">
												- Crimes
											</a>
											<a href="/admin/robbery/" class="list-group-item ">
												- Robbery
											</a>
											<a href="/admin/suspicious-packages/" class="list-group-item ">
												- Suspicious packages
											</a>
                            
											<a href="/admin/drugs/" class="list-group-item ">
												- Drugs
											</a>
											<a href="/admin/shop/" class="list-group-item ">
												- Shop
											</a>
											<a href="/admin/exchange-office/" class="list-group-item ">
												- Exchange office
											</a>
											
											<a href="/admin/countrys/" class="list-group-item ">
												- Countrys
											</a>
											<a href="/admin/cars/" class="list-group-item ">
												- Cars
											</a>
											<a href="/admin/news/" class="list-group-item ">
												- news
											</a>
											
                        </div>

				 <div class="list-group">
                            <div class="list-group-item heading">
                                finished > not online
                            </div>
                            
											<a href="/admin/stock-exchange/" class="list-group-item ">
												- Stock exchange
											</a>
											<a href="/admin/wheel-of-fortune/" class="list-group-item ">
												- wheel of fortune
											</a>
											<a href="#" class="list-group-item ">
												- bullet factory (no adminpanel)
											</a>
											<a href="#" class="list-group-item ">
												- transport robery (no adminpanel)
											</a>
                        </div>
                        
                        
                        
				 <div class="list-group">
                            <div class="list-group-item heading">
                                not finished yet
                            </div>
											<a href="#" class="list-group-item ">
												- family part
											</a>
                        </div>
                        
				</div>
				
				

                        
                        
				<div class="col-md-9 col-lg-10">
					<div class="admin-page">