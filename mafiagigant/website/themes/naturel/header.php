<!doctype html>
<html lang="nl">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?=$htmlmeta;?>">

    <title><?=$htmltitle;?></title> 
    <!-- Bootstrap CSS -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:500,700&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= THEMES_URL;?>naturel/assets/css/css5a5c.css?files=bootstrap.css,bootstrap-icons.css,style.css&amp;v=1.15">

	<?php $head = isset($setting['head']) ? $setting['head'] : '';
	echo $head;?>

  </head>
  <body >



  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
 
 
 
 
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center">
        <a href="<?= $base_url;?>" class="logo me-auto"> <?=$setting['site_title'];?></a>

			
			<?php 
			$menu['header'] = isset($menu['header']) ? $menu['header'] : '';
			if($menu['header'] != ''){
			echo $menu['header'];
			}else{ ?>
			
			<nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li>
                        <a href="/" class="nav-link menu-item-index">Home</a>
                    </li>
                    <li>
                        <a href="/blog/" class="nav-link menu-item-anatomie">Blog</a>
                    </li>
                   
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
			
			<?php } ?>
            
            
        </div>
    </header>
    
    
    <main id="main">
        <section id="s_content" class="s_content">
            <div class="container">



