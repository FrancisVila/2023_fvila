<!DOCTYPE html>
<html style="margin-top:0px !important;">
<head>

<title><?php echo wp_get_document_title(); ?></title>

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<meta name="viewport" content="width=device-width,height=device-height, initial-scale=1, user-scalable=no">
</style>



<?php wp_head(); ?>
<?php global $wp; $url = add_query_arg( $wp->query_vars, home_url( $wp->request ) ); ?>
<meta name='viewport' content='width=device-width'>
</head>
<body >



<div id="page">

<div id="header" role="banner">
<h1> 
	 </h1>
	<div id="headerimg">
		<?php show_menu($url, "") ?><div class="description"><?php bloginfo( 'description' ); ?></div>
	</div>
</div>

