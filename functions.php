<?php ob_start(); ?>

<?php
require_once('library/siteframework.php');		// core functions
require('theme-options.php');          			// theme options
//require_once('custom_slider.php');

add_action( 'add_meta_boxes', 'laband_action_add_meta_boxes', 10, 2 );

function laband_action_add_meta_boxes() {
	global $_wp_post_type_features;
	if (isset($_wp_post_type_features['post']['editor']) && $_wp_post_type_features['post']['editor']) {
		unset($_wp_post_type_features['post']['editor']);
		add_meta_box(
			'description_section',
			__('Editor'),
			'laband_inner_custom_box',
			'post', 'normal', 'default'
		);
	}

	if (isset($_wp_post_type_features['page']['editor']) && $_wp_post_type_features['page']['editor']) {
		unset($_wp_post_type_features['page']['editor']);
		add_meta_box(
			'description_sectionid',
			__('Editor'),
			'laband_inner_custom_box',
			'page', 'normal', 'default'
		);
	}
}

function laband_inner_custom_box( $post ) {
	wp_editor($post->post_content, 'content');
}

//include another function files
include("admin/inc/widget-flickr.php");


//set multiple custom excerpts
function excerpt($limit) {
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'...';
    } else {
        $excerpt = implode(" ",$excerpt);
    }
    $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
    return $excerpt;
}

function excerpt_content($limit) {
    $content = explode(' ', get_the_content(), $limit);
    if (count($content)>=$limit) {
        array_pop($content);
        $content = implode(" ",$content).'...';
    } else {
        $content = implode(" ",$content);
    }
    $content = preg_replace('/[.+]/','', $content);
    $content = apply_filters('the_content', $content);
    $content = str_replace(']]>', ']]&gt;', $content);
    return $content;
}

function laband_load_javascript_functions() {
    // jQuery.browser shim — jQuery 1.9+ bu özelliği kaldırdı; eski tema scriptleri
    // ($.browser.msie) kullandığından TypeError veriyordu. jQuery'den hemen sonra ekle.
    wp_enqueue_script('jquery');
    wp_add_inline_script('jquery-core',
        'if(window.jQuery&&!jQuery.browser){var _ua=navigator.userAgent.toLowerCase();'
        . 'jQuery.browser={msie:/msie|trident/.test(_ua),webkit:/webkit/.test(_ua),'
        . 'mozilla:/mozilla/.test(_ua)&&!/(compatible|webkit)/.test(_ua),'
        . 'version:(/(?:msie |rv:)(\\d+(\\.\\d+)?)/.exec(_ua)||[0,"0"])[1]};}',
        'after'
    );

    wp_enqueue_script('mixitup', get_template_directory_uri() . '/library/js/jquery.mixitup.js', array('jquery'), false, true);
    wp_enqueue_script( 'behaviours-js', get_template_directory_uri() .'/library/js/behaviours.js', array( 'jquery' ), false, true );
    wp_enqueue_script('scripts', get_template_directory_uri() . '/library/js/scripts.js', array(), null, true);
    wp_enqueue_script('custom', get_template_directory_uri() . '/library/js/custom.js', array(), null, true);

    if (is_front_page() || is_home() || is_page_template('home.php')) {
        wp_enqueue_script('easing', get_template_directory_uri() . '/library/js/supersized/jquery.easing.min.js');
        wp_enqueue_script('supersized', get_template_directory_uri() . '/library/js/supersized/supersized.3.2.7.js');
        wp_enqueue_script('supersized-shutter', get_template_directory_uri() . '/library/js/supersized/supersized.shutter.js');
    }

    if(is_admin()) {
        wp_enqueue_script('custom-meta-boxes', get_template_directory_uri() . '/admin/js/custom.metaboxes.js', array('jquery'),'', true);
    }
}

function laband_load_stylesheets() {
    wp_enqueue_style('boxes', get_template_directory_uri().'/lib/shortcodes/css/boxes.css');
    wp_enqueue_style('lists', get_template_directory_uri().'/lib/shortcodes/css/lists.css');
    wp_enqueue_style('social', get_template_directory_uri().'/lib/shortcodes/css/social.css');
    wp_enqueue_style('slider', get_template_directory_uri().'/lib/shortcodes/css/slider.css');
    wp_enqueue_style('viewers', get_template_directory_uri().'/lib/shortcodes/css/viewers.css');
    wp_enqueue_style('tabs', get_template_directory_uri().'/lib/shortcodes/css/tabs.css');
    wp_enqueue_style('toggles', get_template_directory_uri().'/lib/shortcodes/css/toggles.css');
    wp_enqueue_style('button', get_template_directory_uri().'/lib/shortcodes/css/buttons.css');
    wp_enqueue_style('social-icons', get_template_directory_uri().'/lib/shortcodes/css/social-icons.css');
    wp_enqueue_style('columns', get_template_directory_uri().'/lib/shortcodes/css/columns.css');

    if (is_front_page() || is_home() || is_page_template('home.php')) {
        wp_enqueue_style('supersized', get_template_directory_uri() . '/library/css/supersized.css');
        wp_enqueue_style('supersized-shutter', get_template_directory_uri() . '/library/css/supersized.shutter.css');
    }

    if (is_admin()) {
        wp_enqueue_style('post-formats', OPTIONS_FRAMEWORK_DIRECTORY .'css/post-formats.css');
    }
}

add_action('wp_enqueue_scripts', 'laband_load_stylesheets');
add_action('wp_enqueue_scripts', 'laband_load_javascript_functions');

require_once('fullwidth-audio-player/fullwidth-audio-player.php');

global $pagenow;
if ( is_admin() && isset( $_GET['activated'] ) && $pagenow == 'themes.php' )
{
    $fap->activate_fap_plugin();
    wp_redirect( admin_url( 'admin.php?page=options-framework' ) );
    exit;
}
?>