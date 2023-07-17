
<?php
get_header();

// $featured_url = fv_get_single_featured_image($post);
// $url = fv_get_single_featured_image($post);
$featured_url =  get_field('featured_image_field'); 
$others = fv_get_other_images($post);

$title = get_the_title($post);
$output = <<<EOD
<h1 class="single_title">$title</h1>
<div class="single_featured_image">
<img class='single_featured_image chevron_before chevron_after' src='$featured_url' /> 
</div>
<h2 class="more_images">Autres vues, ou images préparatoires</h2>
<div class="more_images">
$others;
</div>
EOD;
echo $output;




?>