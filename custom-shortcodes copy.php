<?php 


function loop_posts_function( $user_atts ) {
    $default_atts =  array(
        'category' => '',
    );
    $return_atts = shortcode_atts( $default_atts, $user_atts, 'loop_posts' );
    $category = $return_atts['category'];
    $args = array(
        'suppress_filters' => true,
        'post_type' => 'post',
        'posts_per_page' => 24,
        // 'post__in'      => $store_ids,
        'paged' => $paged,
        'post_status' => 'publish',
     );
    echo "<script>console.log(' $category -\$category- ')</script>";
    $ret = "";
    // WP_Query($args);
    query_posts("category_name=techno");  
    if ( have_posts() ) {
        print "<h1>FOUND POSTS</h1>";
    }
    while(have_posts())
    {
        print("<h2>");
        $ret = $ret.'FFFFFF '.the_title();
        the_title(); 
        print("</h2>");
    }
    return $ret  ;
}
add_shortcode( 'loop_posts', 'loop_posts_function' );

// example of use: [loop_posts category=”techno”]


?>