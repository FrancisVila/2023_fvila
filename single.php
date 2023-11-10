
<?php
get_header();

// $featured_url = fv_get_single_featured_image($post);
// $url = fv_get_single_featured_image($post);
$featured_url =  get_field('featured_image_field'); 
$others = fv_get_other_images($post);

$title = get_the_title($post);
$id = $post->ID;
$editUrl = get_edit_post_link( $id ); 
$output = <<<EOD
<h1 class="single_title">$title </h1>
<div class="single_featured_image">

<img class='single_featured_image chevron_before chevron_after' src='$featured_url' /> 
<a href="$editUrl" class='editLink'>edit></a>
</div>
<div class="more_images">
$others
</div>
EOD;
echo $output;

$next_post_obj  = get_adjacent_post( '', '', false );
$next_post_ID   = isset( $next_post_obj->ID ) ? $next_post_obj->ID : '';
$last_post_class = isset( $next_post_obj->ID ) ? '' : 'hide_chevron';

$next_post_link     = get_permalink( $next_post_ID );

$prev_post_obj  = get_adjacent_post( '', '', true );
$prev_post_ID   = isset( $prev_post_obj->ID ) ? $prev_post_obj->ID : '';
$first_post_class = isset( $prev_post_obj->ID ) ? '' : 'hide_chevron';
$prev_post_link     = get_permalink( $prev_post_ID );


?>
<a href="<?php echo $prev_post_link; ?>" rel="prev" class="aaa  <?php echo $first_post_class; ?> bbb pagination-prev pagination">‹</a>
<a href="<?php echo $next_post_link; ?>" rel="next" class="aaa <?php echo $last_post_class; ?> <?php $wp_query->current_post ?>  <?php echo $last_post_class; ?> bbb pagination-next pagination">›</a>


