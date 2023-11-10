<?php
// Register Theme Features
// function custom_theme_features()  {

//     // Add theme support for Featured Images
//     add_theme_support( 'post-thumbnails' );
// }

// // Hook into the 'after_setup_theme' action
// add_action( 'after_setup_theme', 'custom_theme_features' );
function theme_scripts() {

	// wp_dequeue_script( 'jquery');
    // wp_deregister_script( 'jquery'); // Fatal error: Allowed memory size of 268435456 bytes exhausted (tried to allocate 262144 bytes) in C:\Users\fvila\Local Sites\fvilaphp2\app\public\wp-includes\class-wp-scripts.php on line 649
	# wp_deregister_script( 'jquery' ); // deregisters the default WordPress jQuery 
    wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js', array('jquery'),'1.0.0',true  ); 
    wp_enqueue_script( 'jquery' );

	wp_register_script( 'gallery', get_theme_root_uri() . '/2023_fvila/js/gallery.js'  ); 
    wp_enqueue_script( 'gallery' );
	wp_enqueue_script( 'media-upload' );
    wp_enqueue_script( 'thickbox' );
    wp_enqueue_style( 'thickbox' );
	wp_register_script( 'isotope', '//npmcdn.com/isotope-layout@3/dist/isotope.pkgd.js'  );
	// wp_register_script( 'isotope', get_theme_root_uri() . '/2023_fvila/js/isotope.pkgd.min.js'  );
	
	wp_enqueue_script( 'isotope' );
	wp_register_script( 'imageload', '//npmcdn.com/imagesloaded@4/imagesloaded.pkgd.js'  );
	wp_enqueue_script( 'imageload' );
	wp_register_script( 'toto', get_theme_root_uri() . '/2023_fvila/js/toto.js' ); 
    wp_enqueue_script( 'toto' );
}

theme_scripts();
add_action('wp_enqueue_scripts', 'theme_scripts');

function theme_scripts2() {

}
theme_scripts2();
add_action('wp_enqueue_scripts', 'theme_scripts2');

# XXX wp_enqueue_style( 'child-style', get_template_directory_uri().'/style.css' );
# echo '<script>console.log("postcount = $postcount")</script>';

add_action( 'wp_enqueue_style', 'my_theme_enqueue_styles' );
do_action( 'wp_enqueue_style' );
function get_url_from_thumbnail_id($id, $size='medium') {
	echo ' id='.$id;
	$post_thumbnail_id = get_post_thumbnail_id($id, 'thumbnail');
	echo ' post_thumbnail_id=' . $post_thumbnail_id;
	$large_image_url_array = wp_get_attachment_image_src( $post_thumbnail_id);
	
	if ($large_image_url_array) {
		return $large_image_url_array[0];
	}
	else return " AAAAAA ";
}



function render_recent_post_featured_image_with_condition($post_type, $meta_key, $meta_value) {
    // Get the most recent post of the given custom post type that satisfies the condition
    $args = array(
        'post_type' => $post_type,
        // 'meta_query' => array(
        //     array(
        //         'key' => $meta_key,
        //         'value' => $meta_value,
        //     ),
        // ),
        'orderby' => 'date',
        'order' => 'DESC',
        'posts_per_page' => 1,
    );
	echo 1;
    $recent_posts = new WP_Query($args);

    if ($recent_posts->have_posts()) {
		$title = get_the_title();
		echo 2;
		echo $title;
        $recent_posts->the_post();
		echo 3;
        // Get the featured image URL
		
        $post_thumbnail_id = get_post_thumbnail_id(get_the_ID());
		$id = get_the_ID();
		$url = get_url_from_thumbnail_id($id, 'medium');
		$large_image_url_array = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large');
        $post_thumbnail_url = wp_get_attachment_image_src($post_thumbnail_id, 'full');
		echo esc_url($post_thumbnail_url[0]);
		echo ' - 4 ';
		echo $post_thumbnail_url[0];
		echo ' - 5 ';
		echo $post_thumbnail_url[1];
		echo ' - 6 ';
		echo $post_thumbnail_url[2];

		echo ' - 10 ';
		echo $post_thumbnail_id;
		echo get_the_ID();
        if ($post_thumbnail_url) {
            // Render the featured image
            return esc_url($post_thumbnail_url[0]);
        }

        wp_reset_postdata();
    }
}

function latest_drawing() {
	echo render_recent_post_featured_image_with_condition('artwork','artwork' , 'sculpture') ;
}


// copy - pasted from http://fvilaphp2.local/wp-admin/admin.php?page=cptui_tools&action=get_code#artwork
function cptui_register_my_taxes_artwork() {

	/**
	 * Taxonomy: artworks.
	 */

	$labels = [
		"name" => esc_html__( "artworks", "custom-post-type-ui" ),
		"singular_name" => esc_html__( "artwork", "custom-post-type-ui" ),
	];

	
	$args = [
		"label" => esc_html__( "artworks", "custom-post-type-ui" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => false,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'artwork', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "artwork",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => false,
		"sort" => false,
		"show_in_graphql" => false,
	];
	register_taxonomy( "artwork", [ "post", "artwork" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes_artwork' );

function my_enqueue_scripts() {
    wp_enqueue_media();
	
}
add_action( 'wp_enqueue_scripts', 'my_enqueue_scripts' );

function my_media_button_shortcode() {
    if ( current_user_can( 'manage_options' ) ) {
		$upload_iframe_src = esc_url( get_upload_iframe_src() );
        $title = esc_attr__( 'Add Media' );
        $text = esc_html__( 'Add Media' );
        // Only display the button for logged in administrators
        $button = <<<EOD
            <a href="{$upload_iframe_src}" class="button" data-editor="content" title="{$title}">
                {$text}
            </a>
        EOD;
		

        return $button;
		
    }
}
my_enqueue_scripts();

add_shortcode( 'my_media_button', 'my_media_button_shortcode' );





function php_log($message) {
	error_log("$message",3, "../../logs/php.log");
}

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
	// EXPLANATION: parent-style comes from the local style.css 
	// Template: parent-style
	wp_enqueue_style( 'parent-style', get_stylesheet_directory_uri() .'/style.css' );
	// from https://wordpress.stackexchange.com/questions/136971/modify-the-wordpress-admin-bar-css
	// avoid margin top of page
	add_theme_support( 'admin-bar', array( 'callback' => '__return_false' ) );
	
}

// https://stackoverflow.com/questions/36909663/load-stylesheets-from-parent-them-in-wordpress
function xyz_enqueue_parent_css() {

    wp_enqueue_style( 'animate', get_template_directory_uri() . '/assets/css/animate.css' );
    wp_enqueue_style( 'custom-controls', get_template_directory_uri() . '/assets/css/custom-controls.css' ); 
}
add_action( 'wp_enqueue_scripts', 'xyz_enqueue_parent_css' );


function load_animate_css() {
	// Load Boostrap CSS
	wp_enqueue_style( 'animate-css', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css' );
  
	// Load Css
	wp_enqueue_style( 'style', get_stylesheet_uri() );
  
  }

  add_action( 'wp_enqueue_scripts', 'load_animate_css' );

  // purpose: change favicon for admin 
  function favicon4admin() {
	$wpurl = get_bloginfo('wpurl');
	$link = <<<EOD
	<link rel="Shortcut Icon" type="image/x-icon" href="$wpurl/wp-content/images/faviconAdmin.png" />
	EOD;
	echo $link;
	}
add_action( 'admin_head', 'favicon4admin' );

function artworks() {
	// define( 'WP_DEBUG', true );
	echo '<script>console.log(" function artwork ")</script>';
	$args = array( 
	'post_type' => 'artwork'
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
			echo "<h1>$postcount</h1>";
		} 
	// }
	//loop here
	// wp_reset_query();
	// define( 'WP_DEBUG', false );
}


function fv_show_other_images($post) {
	$output = fv_get_other_images($post);
	echo $output;
}

function fv_get_other_images($post) {
	get_post_meta($post->ID);
	$fimage   = get_the_post_thumbnail( $post->ID, 'thumbnail' );
	$image_a  = get_field('featured_image_field');
	$image_2  = get_field("image_2");
	$image_3  = get_field("image_3");
	$image_4  = get_field("image_4");
	$image_5  = get_field("image_5");
	$image_6  = get_field("image_6");
	$image_7  = get_field("image_7");
	$image_8  = get_field("image_8");
	$image_9  = get_field("image_9");
	$image_10 = get_field("image_10");
	$other_images_title = "";
	if ($image_2 or $image_3 or $image_4 or $image_5 or $image_6 or $image_7 or $image_8 or $image_9 or $image_10)
		{$other_images_title = '<h2>Dessins préparatoires, autres vues... </h2>'; }
	if ($image_2) {$image_2 = '<img src="' . $image_2 . '" class="more_images" />' ;}
	if ($image_3) {$image_3 = '<img src="' . $image_3 . '" class="more_images" />' ;}
	if ($image_4) {$image_4 = '<img src="' . $image_4 . '" class="more_images" />' ;}
	if ($image_5) {$image_5 = '<img src="' . $image_5 . '" class="more_images" />' ;}
	if ($image_6) {$image_6 = '<img src="' . $image_6 . '" class="more_images" />' ;}
	if ($image_7) {$image_7 = '<img src="' . $image_7 . '" class="more_images" />' ;}
	if ($image_8) {$image_8 = '<img src="' . $image_8 . '" class="more_images" />' ;}
	if ($image_9) {$image_9 = '<img src="' . $image_9 . '" class="more_images" />' ;}
	if ($image_10) {$image_10 = '<img src="' . $image_10 . '" class="more_images" />' ;}
	$next_post = get_next_post_link( $format = '%link',  $link = '&rsaquo;' );
	$prev_post = get_previous_post_link($format = '%link',  $link = '&lsaquo;' );
	$output = <<<EOD
		$other_images_title
	   $image_2 $image_3 $image_4 $image_5 $image_6 $image_7 $image_8 $image_9 $image_10

	EOD;
	return $output;  
	}

// function fv_get_single_featured_image($post) {
// 	$url = get_field('featured_image_field');
// 	return $url;
// 	// echo "toto=" . $toto;
// 	// echo "<img src=" ;
// 	// the_field( 'featured_image_field');
// 	// echo  " />";
// 	// return "<img class='single_featured_image' src='" . $url . "' />";
// 	// $url = get_field( 'featured_image_field' );
// 	// echo $url;
// 	// $title = get_the_title($post);
// 	// // renders an id (??)
// 	// // $fimage = get_post_field( 'featured_image_field', $post );
// 	// echo the_field('featured_image_field');
// 	// return;
// 	// return "VVV<img class='main_image' src='$src' />XXX";
// 	// return "<img class='main_image' src=\"". the_field('featured_image_field') . "\" />" ;
// } 

// function fv_show_single_featured_image($post) {
// 	 echo fv_get_single_featured_image($post);
// }

function fv_artworks($type='sculpture') {
	$tax_arr = array( 1, 2, 3, 4, 5,6, 7, 8, 9 );
	$the_query = new WP_Query( array(
		'post_type' => 'artwork',
		'tax_query' => array(
			array (
				'taxonomy' => 'artwork',
				'field' => 'name',
				'terms' => $type,
			)
		),
	) );
	// $query2 = new WP_Query(array('artwork' => 8));
	echo '<div class="home_container">';
	while ( $the_query->have_posts() ) :
		 

		$the_query->the_post();
		$title = get_the_title();
		$fimage = get_post_field( 'featured_image_field' );
		// the_field( 'featured_image_field' ); // echoes url of featured image 
		$url = get_field( 'featured_image_field' );
		$output = <<<EOD
			<a class=" item1 grid-item outer_inner_shadow" href="<?php echo get_site_url() ?>/category/dessins">
				<div class="inner color1 inner_shadow">
					<img class="category" src="$url">
				</div>
			</a>
		EOD;
		echo $output;



	endwhile;
	echo '</div>';


}

function fv_select_class($url, $menu_item) {
	
if (strpos( $url, $menu_item ) !== false) {
	echo 'selected_menu'; }
else
	{echo 'unselect';}

}


function fv_artworks2($type='sculpture') {
	$tax_arr = array( 1, 2, 3, 4, 5,6, 7, 8, 9 );
	$the_query = new WP_Query( array(
		'post_type' => 'artwork',
        'posts_per_page' => '30',
		'tax_query' => array(
			array (
				'taxonomy' => 'artwork',
				'field' => 'name',
				'terms' => $type,
			)
		),
	) );
	// $query2 = new WP_Query(array('artwork' => 8));
	echo '<div class="grid2 ">';
	echo '<div class="grid-sizer2"></div>';
	while ( $the_query->have_posts() ) :
		$the_query->the_post();
		$title = get_the_title();
		$fimage = get_post_field( 'featured_image_field' );
		// the_field( 'featured_image_field' ); // echoes url of featured image 
		$url = get_field( 'featured_image_field' );
		$perma = get_permalink();
		$output = <<<EOD
		
		

		<a href="$perma">
		<div class="grid-item-4-isotope">

		  <img src="$url"  class="category" />
			  <p class="comments comments2 anim2">$title </p>

		</div>
		</a>



		EOD;
		echo $output;
	endwhile;
	echo '</div>';


}

function fv_art_gallery($category) {
	$wpQuery = new WP_Query( array(
		'post_type'         => array( 'post' ),
		'post_status'       => array( 'publish' ),
		'posts_per_page'    => -1,
	) );
	
	
	query_posts("category_name=$category");  
	?>
	<h1><?php echo $category ?></h1>
<div style="padding:20px;" class="flexContainer pure-portfolio-blog-section-wrapper">
<?php
$count = 0;
if ( have_posts() ) 
while ( have_posts() )
{the_post();
  $count = $count +1;
// printf( "<div class='paintingInList'>");

   // printf( "<div class='dessin'>");
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
         $title = get_the_title();
         $link = get_permalink();
         // echo $s_divOpen .$s_innerDiv . $s_title . $s_content .  $s_closeDiv ;
         $date = get_the_date();
$output2 = <<<EOD
<div 
    class="
	slide-in
      square technoInList  
      pure-portfolio-blog-single 
      wow 
	  fadeIn "  
    style="
	    visibility: visible; 
		animation-delay: 400ms; 
		animation-name: slideIn;
	">
	<div 
	    class="  squareInner  pure-portfolio-blog-img" 
				style="
					background-image: url('$large_image_url'); 
					background-size: cover ; 
					height:100%; 
					background-position-x: center; 
					background-position-y: center; 
					line-height:14px; 
					vertical-align:bottom; ">
				<div class="hover_background">
					<a href="$link"> 
						<span style="height:100%; 
						width:100%;
						position: absolute; 
						top: 0;
						left: 0;
						z-index: 1;">.</span></a>
						<h3 class="pure-portfolio-blog-title"> 
								$title 
						</h3>
					<p class="pure-portfolio-blog-date">$date</p>	
					</a>
			</div>
	</div>
</div>
EOD;

echo $output2;
 }
}
}

/**
 * Render Blog Section.
 */
function pure_portfolio_render_dessins( $args ) {
	echo '<script>console.log(" entering pure_portfolio_render_blog_section ")</script>';
	$section_title     = "dessins";
	$section_text      = "texte dessins";
	$post_button_label = "post_button_label";
	$button_label      = "button_label";
	$button_link       = "button_link";
	// $newArgs = {array('date' =>'DESC','menu_order'=>'ASC' ), ...args}
	$query = new WP_Query( $args );
	if ( $query->have_posts() ) :
		?>
		<section id="pure_portfolio_blog_section" class="pure-portfolio-frontpage-section pure-portfolio-blog-section blog-style-2">
			<?php
			if ( is_customize_preview() ) :
				pure_portfolio_section_link( 'pure_portfolio_blog_section' );
			endif;
			?>
			<div class="ascendoor-wrapper">
				<?php if ( ! empty( $section_title || $section_text ) ) { ?>
				<div class="section-header-subtitle">
					<h3 class="section-title"><?php echo esc_html( $section_title ); ?></h3>
					<p class="section-subtitle"><?php echo esc_html( $section_text ); ?></p>
				</div>
				<?php } ?>
				<div class="pure-portfolio-section-body">
					<div class="pure-portfolio-blog-section-wrapper">
						<?php
						$i = 1;
						while ( $query->have_posts() ) :
							$query->the_post();
							?>
							<div class="pure-portfolio-blog-single wow fadeIn" data-wow-delay="<?php echo esc_attr( $i * 200 ); ?>ms">
								<div class="pure-portfolio-blog-img">
									<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
								</div>
								<div class="pure-portfolio-detail">
									<div class="pure-portfolio-meta">
										<?php echo esc_html( get_the_date() ); ?>
									</div>
									<h3 class="pure-portfolio-blog-title">
										<a class="magic-hover magic-hover__square" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
									</h3>
									<div class="pure-portfolio-description">
										<?php echo wp_kses_post( wp_trim_words( get_the_content(), 30 ) ); ?>
									</div>
									<?php if ( ! empty( $post_button_label ) ) : ?>
										<div class="pure-portfolio-button pure-portfolio-readmore pure-portfolio-button-noborder-noalternate">
											<a class="magic-hover magic-hover__square" href="<?php the_permalink(); ?>"><?php echo esc_html( $post_button_label ); ?></a>
										</div>
									<?php endif; ?>
								</div>
							</div>
							<?php
							$i++;
						endwhile;
						wp_reset_postdata();
						?>
					</div>
					<?php if ( ! empty( $button_label ) ) { ?>
						<div class="pure-portfolio-blog-view-all pure-portfolio-button">
							<a class="magic-hover magic-hover__square" href="<?php echo esc_url( $button_link ); ?>"><?php echo esc_html( $button_label ); ?></a>
						</div>
					<?php } ?>
				</div>
			</div>
		</section>
		<?php
	endif;
}