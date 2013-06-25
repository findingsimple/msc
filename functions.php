<?php

// Adds a home link to your menu
// http://codex.wordpress.org/Template_Tags/wp_page_menu
function childtheme_menu_args($args) {
    $args = array(
        'show_home' => 'Home',
        'sort_column' => 'menu_order',
        'menu_class' => 'menu',
        'echo' => true
    );
	return $args;
}
add_filter('wp_page_menu_args','childtheme_menu_args');


function header_extra() { 
?>
	<div id="header-extra">Ph. (02) 6242 7030 <a href="http://mitchellservicecentre.com.au/book-now/"></a></div><!-- #header-extra -->
	<img src="/wp-content/themes/msc/images/logo-bw.gif" alt="" class="bwlogo" />
<?php }

add_action('thematic_header','header_extra',6);

function print_style() {
	?>
	<link rel="stylesheet" href="/wp-content/themes/msc/print.css" type="text/css" media="print" />
	<?php
}

add_action('wp_head','print_style',100);

function js_extra() { 
if (is_front_page()) {?>
<script type="text/javascript" src="/wp-content/themes/msc/js/jquery.cycle.all.min.js" ></script>
<script type="text/javascript">
jQuery(document).ready(function() {
    jQuery('#gallery').cycle({
    	fx:'fade',
    	speed:  300,
    	timeout: 4000,
    	pager:  '#nav',
		slideExpr: 'img'
    });
});
</script>
<?php }
}

add_action('wp_footer','js_extra',99);

function home_banner() {
if (is_front_page()) { ?>

<div id="banner-wrapper">

<div id="gallery">
	<div id="nav"></div>
	<img src="/wp-content/themes/msc/banner/CAR1.jpg" alt="Mitchell Service Centre" width="624" height="300"/>
	<img src="/wp-content/themes/msc/banner/CAR2.jpg" alt="Mitchell Service Centre" width="624" height="300"/>
	<img src="/wp-content/themes/msc/banner/CAR3.jpg" alt="Mitchell Service Centre" width="624" height="300"/>
	<img src="/wp-content/themes/msc/banner/CAR4.jpg" alt="Mitchell Service Centre" width="624" height="300"/>
	<img src="/wp-content/themes/msc/banner/CAR5.jpg" alt="Mitchell Service Centre" width="624" height="300"/>
</div>

<div id="banner-services">
<ul>
<li><a href="http://mitchellservicecentre.com.au/automotive-repairs/" title="Manufacturers Log Book Servicing">Manufacturers Log Book Servicing</a></li>
<li><a href="http://mitchellservicecentre.com.au/automotive-repairs/" title="Brake and Clutch Servicing and Repairs">Brake &amp; Clutch Servicing &amp; Repairs</a></li>
<li><a href="http://mitchellservicecentre.com.au/automotive-repairs/" title="All Mechanical Repairs and Servicing">All Mechanical Repairs &amp; Servicing</a></li>
<li><a href="http://mitchellservicecentre.com.au/automotive-repairs/" title="Engine Diagnostics and Repair">Engine Diagnostics &amp; Repair</a></li>
<li><a href="http://mitchellservicecentre.com.au/lpg-conversions/" title="LPG Tank Testing and Certificates">LPG Tank Testing &amp; Certificates</a></li>
<li><a href="http://mitchellservicecentre.com.au/lpg-conversions/" title="LPG Conversions Repair and Service">LPG Conversions Repair &amp; Service</a></li>
<li><a href="http://mitchellservicecentre.com.au/rego-inspections/" title="ACT Rego Inspections">ACT Rego Inspections</a></li>
<li><a href="http://mitchellservicecentre.com.au/rego-inspections/" title="NSW Pink Slips">NSW Pink Slips</a></li>
</ul>
</div>

</div>

<?php }
}

add_action('thematic_belowheader','home_banner');

//* First we will add the thumbnail feature *//
add_theme_support('post-thumbnails');
 
//Display excerpt for home page
function lp_content_filter($content) {
  if (is_home()) { 
  $content = 'excerpt';
  }
  return $content;
}
add_filter('thematic_content', 'lp_content_filter', $content);
?>
<?php 

//Display thumbnail
function msc_post_header($postheader) {
 if ((!is_single()) && (!is_page()) && (!is_404())) {
 $id = $post->ID;
 if (get_the_post_thumbnail($id)) {
 $thumbnail = '<a href="' . get_permalink($id) . '" title="' . get_the_title($id) .'" class="post-thumbnail">' . get_the_post_thumbnail($id)  .'</a>';
 $postheader = $thumbnail . thematic_postheader_posttitle();
 } else {
 $postheader = thematic_postheader_posttitle();
 }
 }
 return $postheader;
}
add_filter('thematic_postheader', 'msc_post_header', $postheader);

function childtheme_override_head_scripts() {
	/* Disable Dropdown JS */
}


function my_scripts_method() {
    wp_enqueue_script( 'jquery' );
}    
 
add_action('wp_enqueue_scripts', 'my_scripts_method');


?>