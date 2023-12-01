<?php
/* Template Name: techno */
//Display the header
get_header();
//Display the page content/body
query_posts("category_name=technique");  ?>
<div style="padding:20px;" class="flexContainer">

<?php

fv_techniques();
echo "<h1>++++++++++++++++++++++++++++++++++++</h1>";



//Display the footer
get_footer();
?>



<span class="debugSmall">category-techno.php</span>