<?php
/* Template Name: techno */
//Display the header
get_header();
//Display the page content/body
query_posts("category_name=techno");  ?>
<div style="padding:20px;" class="flexContainer">
<?php
if ( have_posts() ) 
while ( have_posts() )
{the_post();
// printf( "<div class='paintingInList'>");

   // printf( "<div class='techno'>");
    // copié de http://codex.wordpress.org/Function_Reference/the_post_thumbnail
         if ( has_post_thumbnail()) {

        //  $title = the_title_attribute('echo=0');
            $large_image_url_array = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large');
            $large_image_url=$large_image_url_array[0];
           $medium_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'medium');
		$expandUrl = "/wp-content/uploads/images/expand2.png";
	global $more;
        $more = 0;
       // $c = the_content();
         $s_divOpen = sprintf(        '<div href="%s" class="square technoInList">', $large_image_url		);
         $s_mainImage = sprintf(          '<img src="%s" alt="" class="mainImage" />', $medium_image_url[0]			);
         $s_innerDiv =						'<div class="squareInner" style="position:absolute;top:0px; left:0px;">';
         $s_title  = sprintf(				'<h2>%s</h2>', get_the_title() 							);
         $s_content =    sprintf(				'<a href="%s"><div class="content">%s</div></a>', get_permalink(), get_the_excerpt() );  
		 $s_expand = sprintf(					'<a href="%s"><div class="expand"><img src="%s" alt="plein écran"> </div></a>', $large_image_url , $expandUrl);
         $s_closeDiv=          '</div></div>' ;
          echo $s_divOpen .$s_innerDiv . $s_title . $s_content .  $s_closeDiv ;
 }
}


function fv_get_attachment($post) {
$l_images = "";
$counter = 1;
$images =& get_children( 'post_type=attachment&post_mime_type=image&post_parent=' . $post->ID );
foreach( $images as $imageID => $imagePost )
{
if ($counter==1)
	$l_images .="<h4>Voir technos préparatoires et commentaires</h4>";
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

<?php
//Display the footer
get_footer();
?>



<span class="debugSmall">category-techno.php</span>