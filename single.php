
<?php
theme_scriptsSingle();
add_action('wp_enqueue_scripts', 'theme_scriptsSingle');

// $featured_url = fv_get_single_featured_image($post);
// $url = fv_get_single_featured_image($post);
$featured_url =  get_field('featured_image_field'); 

$body =  get_the_content( $post->ID ) ;
$others = fv_get_other_images($post, $body);
$title = get_the_title($post);
$id = $post->ID;
$editUrl = get_edit_post_link( $id ); 

$next_post_obj  = get_adjacent_post( '', '', false );
$next_post_ID   = isset( $next_post_obj->ID ) ? $next_post_obj->ID : '';
$last_post_class = isset( $next_post_obj->ID ) ? '' : 'hide_chevron';
$next_post_link     = get_permalink( $next_post_ID );

$prev_post_obj  = get_adjacent_post( '', '', true );
$prev_post_ID   = isset( $prev_post_obj->ID ) ? $prev_post_obj->ID : '';
$first_post_class = isset( $prev_post_obj->ID ) ? '' : 'hide_chevron';
$prev_post_link     = get_permalink( $prev_post_ID );
$categories = get_the_category($id);
$fields = get_fields($post->ID);
$space = " - ";
 
$siteUrl = get_site_url();
$cat = "";
if ($fields)  
    {
    $category = $fields["artwork"][0]->name;
    if ($category) 
        {
        $catlink = "<a href='$siteUrl/category/$category' class='linkBackToCat' >&lt; back to $category</a>";
        echo $catlink;  
        $cat = $category;
        }
    }
$output = <<<EOD
<div class="singleImageBack"  style="text-align:center">
<img src='$featured_url' style="max-width:100vw; max-height: 100vh" />
</div>
<a href="$editUrl" class='editLink'>edit></a></div>

<h1 class="single_title">$title...</h1>



$others


<textarea id="nextUrl" style="display:none">$next_post_link</textarea>
<textarea id="prevUrl" style="display:none">$prev_post_link</textarea>
EOD;

echo $output;
get_header();




?>
<a href="<?php echo $prev_post_link; ?>" rel="prev" class="aaa  <?php echo $first_post_class; ?> bbb pagination-prev pagination">‹</a>
<a href="<?php echo $next_post_link; ?>" rel="next" class="aaa <?php echo $last_post_class; ?> <?php $wp_query->current_post ?>  
<?php echo $last_post_class; ?> bbb pagination-next pagination">›</a>




