<!DOCTYPE html>
<html style="margin-top:0px !important;">
<head>

<title><?php echo wp_get_document_title(); ?></title>

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />


</style>



<?php wp_head(); ?>
</head>
<body >



<div id="page">

<div id="header" role="banner">
	<div id="headerimg">
		<div class="menu_container">
		<a href="<?php echo home_url(); ?>"><img class="menu_logo" src="<?php echo get_template_directory_uri() ?>/images/fvila_fr2.png)"></a>	
	<img class="menu_item" src="<?php echo get_template_directory_uri() ?>/images/dessins.png)">
	<img class="menu_item" src="<?php echo get_template_directory_uri() ?>/images/sculpture.png)">
	<img class="menu_item" src="<?php echo get_template_directory_uri() ?>/images/numerique.png)">
	<img class="menu_item" src="<?php echo get_template_directory_uri() ?>/images/tableaux.png)">
	<img class="menu_item" src="<?php echo get_template_directory_uri() ?>/images/technique.png)">
</div>
		<div class="description"><?php bloginfo( 'description' ); ?></div>
	</div>
</div>

