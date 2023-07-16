<h1>single.php bbb</h1>
<?php
get_header();
$value = get_field( "artwork" );
echo $value[0]. " ". $value[1]  ;
$value = get_field( "featured_image_field" );
echo $value  ;

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
fv_show_other_images($post);
fv_artworks('dessin');
global $post;

?>