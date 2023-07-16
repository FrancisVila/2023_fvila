

<?php



/* Template Name: dessin */
//Display the header



get_header();
?>
<div class="home_body">
<div class="home_container">
	<div class="home_item item1" style = "background-image:url(<?php echo get_template_directory_uri() ?>/tree.png)">
    <div class="inner">
        <h2 class="home_comment" >dessins  <?php echo latest_drawing()?></h2>
        </div>

	</div>
	<div class="home_item item2">
	</div>	
	<div class="home_item item3">
	</div>
	<div class="home_item item4">
	</div>
	<div class="home_item item5">
	</div>
</div>
</div>