<?php



/* Template Name: dessin */
//Display the header

?>
<?php wp_head(); ?>
<div class="home_body">
	<div class="home_container">
		<div class=" home_item logo_item_simple">
			<img src="<?php echo get_template_directory_uri() ?>/images/fvila_fr3.png)">
		</div>
		<a class="home_item item1 grid-item outer_inner_shadow" href="<?php echo get_site_url() ?>/category/dessins">
			<div class="inner color1 inner_shadow">
				<img class="category" src="<?php echo get_template_directory_uri() ?>/images/dessins.svg)">
			</div>

		</a>
		<a class="home_item item2 grid-item outer_inner_shadow" href="<?php echo get_site_url() ?>/category/sculpture">
			<div class="inner color2 inner_shadow">
				<img class="category" src="<?php echo get_template_directory_uri() ?>/images/sculpture.svg">
			</div>
		</a>
		<a class="home_item item3 grid-item outer_inner_shadow" href="<?php echo get_site_url() ?>/category/artnum">
			<div class="inner color3 inner_shadow">
				<img class="category" src="<?php echo get_template_directory_uri() ?>/images/artnum.svg)">
			</div>

		</a>
		<a class="home_item item4 grid-item outer_inner_shadow" href="<?php echo get_site_url() ?>/category/tableaux">
			<div class="inner color4 inner_shadow">
				<img class="category" src="<?php echo get_template_directory_uri() ?>/images/tableaux.svg)">
			</div>

		</a>

		<a class="home_item item5 grid-item outer_inner_shadow" href="<?php echo get_site_url() ?>/category/technique">
			<div class="inner color5 inner_shadow">
				<img class="category" src="<?php echo get_template_directory_uri() ?>/images/technique.svg)">
			</div>

		</a>

		<div class="home_item   outer_inner_shadow grid-item dernieres" style="width:80%; margin-left:10%">
			<div class="inner color6 inner_shadow">
				<div class="dernieres_category"><img  src="<?php echo get_template_directory_uri() ?>/images/dernieres.svg)"></div>

					<?php
					$recent_posts = wp_get_recent_posts(array('post_type' => 'artwork', 'numberposts' => '10'));
					foreach ($recent_posts as $recent) {
						$recentID =  $recent['ID'] ;
						$src = get_field('featured_image_field', $recentID);
						$link = get_permalink($recentID);
						echo "<a  href='$link'><img class='dernieres' src='$src'/></a>";
						// update_post_meta($recentID, '_thumbnail_id', $value->ID);
						// echo ' --- recentID=' . $recentID;  // returns the ID, OK
						// echo ' --- post_title='. $recent["post_title"]; // returns the custom post title, OK
						// echo ' --- get_permalink='.   get_permalink($recentID) ; // returns the right permalink, OK
						// echo ' --- get_post_thumbnail_id=' . get_post_thumbnail_id($recentID); // returns 0
						// echo ' --- get_post_thumbnail_id=' . get_post_thumbnail_id($recent); // return nothing
						// echo ' --- acf_get_post_thumbnail=' . acf_get_post_thumbnail($recentID)['url'] ; // return nothing
						// echo ' --- get_url_from_thumbnail_id=' . get_url_from_thumbnail_id($recentID); // re;turns nothing
						// echo ' --- get_the_post_thumbnail( $recentID )='. get_the_post_thumbnail( $recentID );
						// get_the_post_thumbnail( $recentID );
						// // the_post_thumbnail(); // returns the same image several times. the image is a featured image of a post of a non-custom post
					    // $attachment_id = get_post_thumbnail_id($recentID);
						// echo ' --- attachment_id=' . $attachment_id; // returns nothing
						// $image = wp_get_attachment_image($attachment_id, 'thumbnail');
						// echo ' --- image='. $image;
						
						// the_post_thumbnail(); // same image all the time
						{{/*  echo $recent["ID"].$recent["ID"];
						echo get_url_from_thumbnail_id($recent["ID"]);



						foreach ($recent as $key => $value) {
							echo $key . "=" .$value;
							if ($key !== array_key_last($recent)) {
								echo ', ';
							}
						}
						echo '<li>' . '  <a href="'  . get_permalink($recent["ID"]) . '" title="Look ' . esc_attr($recent["post_title"]) . '" >' . $recent["post_title"] . '</a> </li> ';  */}}
					}
					?>
				

			</div>
		</div>
	</div>

</div>