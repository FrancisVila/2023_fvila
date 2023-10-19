<!DOCTYPE html>
<html style="margin-top:0px !important;">
<head>

<title><?php echo wp_get_document_title(); ?></title>

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />


</style>



<?php wp_head(); ?>
<?php global $wp; $url = add_query_arg( $wp->query_vars, home_url( $wp->request ) ); ?>
</head>
<body >



<div id="page">

<div id="header" role="banner">
<h1> 
	 </h1>
	<div id="headerimg">
		<div class="menu_container">
		<a href="<?php echo home_url(); ?>"><img class="menu_logo" src="<?php echo get_template_directory_uri() ?>/images/fvila_fr2.png)"></a>	
		<a class="" href="<?php echo get_site_url() ?>/category/dessins">
			<img class="<?php fv_select_class($url, "dessins")?> menu_item" src="<?php echo get_template_directory_uri() ?>/images/dessins.png)">
		</a>
		<a class="" href="<?php echo get_site_url() ?>/category/sculpture">
			<img class="<?php fv_select_class($url, "sculpture")?> menu_item" src="<?php echo get_template_directory_uri() ?>/images/sculpture.png)">
		</a>
		<a class="" href="<?php echo get_site_url() ?>/category/artnum">
			<img class="<?php fv_select_class($url, "artnum")?> menu_item" src="<?php echo get_template_directory_uri() ?>/images/numerique.png)">
		</a>
		<a class="" href="<?php echo get_site_url() ?>/category/tableaux">
			<img class="<?php fv_select_class($url, "tableaux")?> menu_item" src="<?php echo get_template_directory_uri() ?>/images/tableaux.png)">
		</a>
		<a class="" href="<?php echo get_site_url() ?>/category/technique">
			<img class="<?php fv_select_class($url, "technique")?> menu_item" src="<?php echo get_template_directory_uri() ?>/images/technique.png)">
		</a>
</div>
		<div class="description"><?php bloginfo( 'description' ); ?></div>
	</div>
</div>

