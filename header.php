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
		<h1>bb <a href="<?php echo home_url(); ?>/"><?php bloginfo( 'name' ); ?></a></h1>
		<div class="description"><?php bloginfo( 'description' ); ?></div>
	</div>
</div>

