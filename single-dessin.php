<?php/* Template Name: dessin 
Template Post Type: artwork
*/
//Display the header ?>

<h1>single-dessin file </h1>
<?php






get_header();
artworks3();
fv_art_gallery("dessin");


function fv_get_attachment($post) {
$l_images = "";
$counter = 1;
$images =& get_children( 'post_type=attachment&post_mime_type=image&post_parent=' . $post->ID );
foreach( $images as $imageID => $imagePost )
{
if ($counter==1)
	$l_images .="<h4>Voir dessins préparatoires et commentaires</h4>";
	if ($counter > 3 )
		break ;
	else
		$counter++;
		$l_images .= wp_get_attachment_image($imageID, array(60,60), false) ;
}
return $l_images;
}
?>
</div>
<span class="debugSmall">category-dessin.php</span>
<?php
//Display the footer
get_footer();



function artworks3() {
	global $post; 
	// define( 'WP_DEBUG', true );
	echo '<script>console.log(" function artwork ")</script>';
	$args = array( 
	'post_type' => 'artwork'
	);
	$get_posts_args = array(
		"showposts"=>-1,
				'post_parent' => $post->ID,
		"what_to_show"=>"posts",
		"post_status"=>"inherit",
		"post_type"=>"attachment",
		"orderby"=>"date",
		"order"=>"DESC",
		"format" => "1",
		"post_mime_type"=>"image/jpeg,image/jpg,image/gif,image/png"
		/* fvila added to display only media attached to this page - */
		);


	echo '<script>console.log(" function artwork 2")</script>';
	$query = new WP_Query( $args );
	$postcount = 0;
	//  if ($query->have_posts()) {
	// 	echo '<script>console.log(" function artwork 3")</script>';
		while ($query->have_posts())
			{
				$query->the_post();
				echo '<script>console.log(" function artwork 4")</script>';
				echo "<script>console.log(\"postcount = $postcount\")</script>";
			$postcount++;
			echo "<h1>$postcount gg</h1>";
		} 
	// }
	//loop here
	// wp_reset_query();
	// define( 'WP_DEBUG', false );
}



?>




