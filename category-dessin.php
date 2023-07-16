<?php



/* Template Name: dessin */
//Display the header



get_header();
?>
<h2>LLLLLLLLLLL</h2>
<?php
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






?>




