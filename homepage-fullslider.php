    <?php
/**
 * Created by Adrian Holobut.
 * Date: 5/15/13
 * Time: 7:29 PM
 */
?>


<!--<link rel="stylesheet" hrsef="--><?php //echo get_template_directory_uri(); ?><!--/library/css/superslides.css">-->

<div id="slides">

</div>

<script type="text/javascript">

    jQuery(function($){

        $.supersized({

            // Functionality
            slideshow               :   1,			// Slideshow on/off
            autoplay				:	1,			// Slideshow starts playing automatically
            start_slide             :   1,			// Start slide (0 is random)
            stop_loop				:	0,			// Pauses slideshow on last slide
            random					: 	0,			// Randomize slide order (Ignores start slide)
            slide_interval          :   12000,		// Length between transitions
            transition              :   1, 			// 0-None, 1-Fade, 2-Slide Top, 3-Slide Right, 4-Slide Bottom, 5-Slide Left, 6-Carousel Right, 7-Carousel Left
            transition_speed		:	1000,		// Speed of transition
            new_window				:	1,			// Image links open in new window/tab
            pause_hover             :   0,			// Pause slideshow on hover
            keyboard_nav            :   1,			// Keyboard navigation on/off
            performance				:	1,			// 0-Normal, 1-Hybrid speed/quality, 2-Optimizes image quality, 3-Optimizes transition speed // (Only works for Firefox/IE, not Webkit)
            image_protect			:	1,			// Disables image dragging and right click with Javascript

            // Size & Position
            min_width		        :   0,			// Min width allowed (in pixels)
            min_height		        :   0,			// Min height allowed (in pixels)
            vertical_center         :   1,			// Vertically center background
            horizontal_center       :   1,			// Horizontally center background
            fit_always				:	0,			// Image will never exceed browser width or height (Ignores min. dimensions)
            fit_portrait         	:   0,			// Portrait images will not exceed browser height
            fit_landscape			:   0,			// Landscape images will not exceed browser width

            // Components
            slide_links				:	'blank',	// Individual links for each slide (Options: false, 'num', 'name', 'blank')
            thumb_links				:	0,			// Individual thumb links for each slide
            thumbnail_navigation    :   0,			// Thumbnail navigation

            slides 					:
            [			// Slideshow Images
                <?php
                $captions = array();
                $tmp = $wp_query;
                $slider = get_term_by('id', of_get_option('sc_slidertag'), 'sliders' ) ;
                $slider = $slider->slug;
                $wp_query = new WP_Query('post_type=featured&orderby=menu_order&order=ASC');
                $total_slides = $wp_query->post_count;
                $index = 1;
                if($wp_query->have_posts()) : while($wp_query->have_posts()) : $wp_query->the_post();

                    $fitemlink = get_post_meta($post->ID,'snbf_fitemlink',true);
                    $fitemcaption1 = get_post_meta($post->ID,'snbf_fitemcaption1',true);
                    $fitemcaption2 = get_post_meta($post->ID,'snbf_fitemcaption2',true);
                ?>

                <?php
                $thumbId = get_image_id_by_link ( get_post_meta($post->ID, 'snbf_slideimage_src', true) );
                $thumb = wp_get_attachment_image_src($thumbId, 'slide', false);
                ?>

                {
                    image : '<?php echo $thumb[0] ?>',
                    title :
                        '<h1 id="first-caption"><?php echo $fitemcaption1 ?></h1>' +
                            '<div class="nextslide-container">' +
                            '<a class="nextslide load-item"></a>' +
                            '</div>' +
                            '<h1 id="second-caption"><?php echo $fitemcaption2 ?></h1>',
                    thumb : '',
                    url : '<?php echo $fitemlink ?>'
                }<?php echo $index === $total_slides ? '' : ','; ?>

                <?php
                $index++;
                endwhile; wp_reset_query();
                endif;
                $wp_query = $tmp;
                ?>
            ]

        });
    });

</script>

    <!--End of styles-->

    <!--Thumbnail Navigation-->
    <div id="prevthumb"></div>
    <div id="nextthumb"></div>

    <!--Arrow Navigation-->
    <a id="prevslide" class="load-item"></a>


    <div id="thumb-tray" class="load-item">
        <div id="thumb-back"></div>
        <div id="thumb-forward"></div>
    </div>

    <div id="slidecaption">

    </div>

    <div id="next-slide-container">

    </div>



