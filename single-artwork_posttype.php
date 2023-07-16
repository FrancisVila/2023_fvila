
<?php 

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

// ‹
// ›
// &lsaquo;
// &rsaquo;
// stumbled on this way of getting value of taxonomy
// ACF renders the ID of the taxonomy value, not its name!
$tax = get_field("artwork");
$catlist = "";
// comma-separated list of taxonomies
if ($tax){
$catlist = "(";
foreach ($tax as $key=>$value) {
    $catlist = $catlist . get_category( $category=$value )->name ;
    if ($key !== array_key_last($tax)) {
        $catlist = $catlist . ", ";
    }
  } 
  $catlist = $catlist . ")";

}

// $index = array_keys($tax); // return array list


$output = <<<EOD
<div class="artwork_body">

    <div class="next_post next_prev_post">
        $next_post
   </div>
   <div class="prev_post next_prev_post">
   $prev_post
</div>
   <div class="main_image">
   <h1> $post->post_title $catlist</h1>

   <p>

   <img class="single_artwork" src="$image_a" />
  
   </p>
   <div class="description">
   $post->description 
   </div>
   $other_images_title
   <div class="more_images">
   $image_2 $image_2 $image_2 $image_2 $image_2 $image_2 $image_2 $image_3 $image_4 $image_5 $image_6 $image_7 $image_8 $image_9 $image_10
   </div>
   </div>
</div>
EOD;
echo $output;
?>
