<?php
/*
Plugin Name: Wordpress Carousel Free
Plugin URI: http://lazypersons.com/plugins/wordpress-carousel-free
Description: This plugin will enable carousel features in your wordpress site. 
Author: Lazy Persons
Author URI: http://lazypersons.com
Version: 1.0
*/

/* Adding Latest jQuery from Wordpress */
function LAZY_P_WP_FREE_CAROUSEL_free_jquery() {
	wp_enqueue_script('jquery');
}
add_action('init', 'LAZY_P_WP_FREE_CAROUSEL_free_jquery');

/*Some Set-up*/
define('LAZY_P_WP_FREE_CAROUSEL', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' );



/* Including all files */
function LAZY_P_WP_FREE_CAROUSEL_files() {
wp_enqueue_script('lazy-p-carousel-free-main', LAZY_P_WP_FREE_CAROUSEL.'inc/owl-carousel/owl.carousel.min.js', array('jquery'), 1.0, true);
wp_enqueue_style('wp-carousel-free-css-main', LAZY_P_WP_FREE_CAROUSEL.'inc/owl-carousel/owl.carousel.css');
wp_enqueue_style('wp-carousel-free-css-transition', LAZY_P_WP_FREE_CAROUSEL.'inc/owl-carousel/owl.transitions.css');
wp_enqueue_style('wp-carousel-free-css-theme', LAZY_P_WP_FREE_CAROUSEL.'inc/owl-carousel/owl.theme.css');
wp_enqueue_style('wcf-fontello-css', LAZY_P_WP_FREE_CAROUSEL.'inc/fontello/css/fontello.css');
}
add_action( 'wp_enqueue_scripts', 'LAZY_P_WP_FREE_CAROUSEL_files' );


// Redirect after active

function my_plugin_active_redirect( $plugin ) {
    if( $plugin == plugin_basename( __FILE__ ) ) {
        exit( wp_redirect( admin_url( 'options-general.php' ) ) );
    }
}
add_action( 'activated_plugin', 'my_plugin_active_redirect' );


// Registering shortcode
function wp_carousel_free_shortcode( $attr ) {
	$post = get_post();

	static $instance = 0;
	$instance++;

	if ( ! empty( $attr['ids'] ) ) {
		if ( empty( $attr['orderby'] ) )
			$attr['orderby'] = 'post__in';
		$attr['include'] = $attr['ids'];
	}

	$output = apply_filters( 'post_gallery', '', $attr );
	if ( $output != '' )
		return $output;

	if ( isset( $attr['orderby'] ) ) {
		$attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
		if ( !$attr['orderby'] )
			unset( $attr['orderby'] );
	}

	$html5 = current_theme_supports( 'html5', 'gallery' );
	extract(shortcode_atts(array(
		'id'         => '',
		'size'       => 'thumbnail',
		'include'    => '',
		'exclude'    => '',
	), $attr, 'gallery'));

	$id = intval($id);
	if ( 'RAND' == $order )
		$orderby = 'none';

	if ( !empty($include) ) {
		$_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

		$attachments = array();
		foreach ( $_attachments as $key => $val ) {
			$attachments[$val->ID] = $_attachments[$key];
		}
	} elseif ( !empty($exclude) ) {
		$attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	} else {
		
	}

	if ( empty($attachments) )
		return '';

	if ( is_feed() ) {
		$output = "\n";
		foreach ( $attachments as $att_id => $attachment )
			$output .= wp_get_attachment_link($att_id, $size, true) . "\n";
		return $output;
	}


	$gallery_style = $gallery_div = '';



	$size_class = sanitize_html_class( $size );
	$gallery_div = "
	
	<style type='text/css'>
		div#lazywpcarouselpro$id div.single_wcf_item img{box-shadow:0 0 0;border-radius:0;float:left;width:100%;height:auto}
	</style>
	
    <script type='text/javascript'>
    jQuery(document).ready(function() {
		jQuery('#lazywpcarouselpro$id').owlCarousel({
			navigation: true,
			navigationText: ['','']
		});
    });
    </script>
	
	<div id='lazywpcarouselpro$id' class='owl-carousel'>";

	$output = apply_filters( 'gallery_style', $gallery_style . $gallery_div );

	$i = 0;
	foreach ( $attachments as $id => $attachment ) {
		
		$wcf_image_url  = wp_get_attachment_image_src( $id, 'medium', false);
		
		$wcf_image_title = $attachment->post_title;

		
		$output .= "
		<div class='single_wcf_item'>
			<img src='$wcf_image_url[0]' alt='$wcf_image_title' />
		</div>
		";	


	}

	$output .= "
		</div>\n";

	return $output;
}


add_shortcode('wcfgallery', 'wp_carousel_free_shortcode');




function add_wcffree_options_framwrork()  
{  
	add_options_page('WP Carousel Free Help', '', 'manage_options', 'wcf-settings','wcf_options_framwrork');  
}  
add_action('admin_menu', 'add_wcffree_options_framwrork');

add_action( 'admin_enqueue_scripts', 'scrollbar_ppm_color_pickr_function' );
function scrollbar_ppm_color_pickr_function( $hook_suffix ) {
    // first check that $hook_suffix is appropriate for your admin page
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'my-script-handle', plugins_url('js/color-pickr.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
}

// Default options values
$wcf_options = array(
	'cursor_color' => '#666',
	'cursor_width' => '10px',
	'border_radius' => '0px',	
	'cursor_border' => '0px solid #000',	
	'scroll_speed' => '60',
	'auto_hide_mode' => 'true'
);

if ( is_admin() ) : // Load only if we are viewing an admin page

function wcf_register_settings() {
	// Register settings and call sanitation functions
	register_setting( 'wcf_p_options', 'wcf_options', 'wcf_validate_options' );
}

add_action( 'admin_init', 'wcf_register_settings' );


// Store layouts views in array
$auto_hide_mode = array(
	'auto_hide_yes' => array(
		'value' => 'true',
		'label' => 'Activate auto hide'
	),
	'auto_hide_no' => array(
		'value' => 'false',
		'label' => 'Deactivate auto hide'
	),
);


// Function to generate options page
function wcf_options_framwrork() {
	global $wcf_options, $auto_hide_mode;

	if ( ! isset( $_REQUEST['updated'] ) )
		$_REQUEST['updated'] = false; // This checks whether the form has just been submitted. ?>


	
<div class="wrap">
	<style type="text/css">
		.welcome-panel-column p{padding-right:20px}
		.installing_message h2{background: none repeat scroll 0 0 green;
color: #fff;
line-height: 30px;
padding: 20px;
text-align: center;}
	</style>
	<div class="installing_message">
		<h2>Thank you for installing our free plugin</h2>
	</div>
	

	<div class="welcome-panel" id="welcome-panel">
		
		<div class="welcome-panel-content">
			<h3>Want some cool features of this plugin?</h3>
			<p class="about-description">We've added 100+ extra features in our premium version of this plugin. Let see some amazing features.</p>
	<div class="welcome-panel-column-container">
		<div class="welcome-panel-column">
			<h4>Link to carousel items</h4>
			<p>You can link to each carousel item easily. You can add link to each carousel in media manager. Just add your link there, your carousel items will lined to that URL.</p>
			<a href="http://lazypersons.com/plugins/wordpress-carousel-pro/" target="_blank" class="button button-primary">See link to carousel demo here</a>
		</div>
		
		<div class="welcome-panel-column">
			<h4>Items customizing</h4>
			<p>You can customize how many carousel item will show in your carousel. You just have to add an attribute in carousel shortcode.</p>
			<a href="http://lazypersons.com/plugins/wordpress-carousel-pro/wordpress-carousel-pro-customizations/" target="_blank" class="button button-primary">See item customizing demo here</a>
		</div>
		
		<div class="welcome-panel-column welcome-panel-last">
			<h4>One page carousel slider</h4>
			<p>You are able to build one item carousel slider. Its like image slider. You can add slider title & description too. You can change slider colors too!</p>
			<a href="http://lazypersons.com/plugins/wordpress-carousel-pro/single-image-slider-with-wordpress-carousel-pro/" target="_blank" class="button button-primary">See single item carousel demo here</a>
		</div>
	</div>
	
	<div class="welcome-panel-column-container">
		
		<div class="welcome-panel-column">
			<h4>Unlimited colors</h4>
			<p>Premium version of this plugin supports unlimited colors! You can add any color that match your current theme. You can use color name or color HEX code.</p>
			<a href="http://lazypersons.com/plugins/wordpress-carousel-pro/wordpress-carousel-pro-customizations/" target="_blank" class="button button-primary">See color customization demo here</a>
		</div>
		
		<div class="welcome-panel-column">
			<h4>Lightbox in carousel slider</h4>
			<p>We've added lightbox features in premium version of this plugin. You only have to turn on lightbox via shortcode. Its responsive!</p>
			<a href="http://lazypersons.com/plugins/wordpress-carousel-pro/" target="_blank" class="button button-primary">See color customization demo here</a>
		</div>
		
		<div class="welcome-panel-column welcome-panel-last">
			<h4>Post excerpt slider</h4>
			<p>You can create post excerpt carousel slider as well. This will show featured image, some amount of post content & a readmore button. This is cool!</p>
			<a href="http://lazypersons.com/plugins/wordpress-carousel-pro/carousel-form-post/" target="_blank" class="button button-primary">See color customization demo here</a>
		</div>
		
	</div>
	
	<div class="welcome-panel-column-container">
		
		<div class="welcome-panel-column">
			<h4>Custom post excerpt slider</h4>
			<p>You can build excerpt slider form page or custom post too. Just you have to define post_type in carousel shortcode. Its easy!</p>
			<a href="http://lazypersons.com/plugins/wordpress-carousel-pro/carousel-form-post/" target="_blank" class="button button-primary">See color customization demo here</a>
		</div>
		
		<div class="welcome-panel-column">
			<h4>Woocommerce product slider</h4>
			<p>Using this premium version plugin, you can add woocommerce product slider too. This will show product image, product description & read more button. </p>
			<a href="http://lazypersons.com/plugins/wordpress-carousel-pro/carousel-form-woocommerce/" target="_blank" class="button button-primary">See color customization demo here</a>
		</div>
		
		<div class="welcome-panel-column welcome-panel-last">
			<h4>Image carousel form post or custom post</h4>
			<p>You can create image only carousel form post, page or custom post. This will get featured image in carousel. </p>
			<a href="http://lazypersons.com/plugins/wordpress-carousel-pro/carousel-form-post/" target="_blank" class="button button-primary">See color customization demo here</a>
		</div>
		
	</div>
	<br/><br/>
		<h3>Cool! you are ready to enable those features in only $10. </h3>
		<p class="about-description">Watch demo before purchase. I know you like the demos. Thanks for reading features. Good luck with creating carousels in your wordpress site.</p>

		<a href="http://lazypersons.com/plugins/wordpress-carousel-pro/" class="button button-primary button-hero">Purchase premium plugin now. Only $10</a><br/><br/>
	
	
		</div>
	</div>


</div>
	


	<?php
}



endif;  // EndIf is_admin()


register_activation_hook(__FILE__, 'my_plugin_activate');
add_action('admin_init', 'my_plugin_redirect');

function my_plugin_activate() {
    add_option('my_plugin_do_activation_redirect', true);
}

function my_plugin_redirect() {
    if (get_option('my_plugin_do_activation_redirect', false)) {
        delete_option('my_plugin_do_activation_redirect');
        if(!isset($_GET['activate-multi']))
        {
            wp_redirect("options-general.php?page=wcf-settings");
        }
    }
}

?>