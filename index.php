<?php
/*
Plugin Name: Carousel Plugin
Description: A simple WordPress plugin that generates a Carousel/Slider.
Version: 1.0
Author: Andrew Hosegood
*/

// Function to enqueue stylesheets
function ah65_carousel_enqueue_styles() {
    // Enqueue your stylesheet
    wp_enqueue_style('ah65-carousel-style', plugin_dir_url(__FILE__) . 'css/style.css');
}

// Hook into WordPress enqueue scripts action
add_action('wp_enqueue_scripts', 'ah65_carousel_enqueue_styles');

function carousel_shortcode() {
    // Custom query to get carousel posts
    $carousel_posts = new WP_Query(array(
        'post_type' => 'carousel',
        'posts_per_page' => 3, // set a max limit of 4 posts
        'order'          => 'ASC', // Order posts by date in descending order
    ));

    $output = '<div class="ah65-carousel">';

    // Check if there are carousel posts
    if ($carousel_posts->have_posts()) {
        $count = 0;
        while ($carousel_posts->have_posts()) {
            $carousel_posts->the_post();
            $count ++;
            // Get post data
            $title = get_the_title();
            $excerpt = get_the_excerpt();
            $thumbnail = get_the_post_thumbnail();
            $total_posts = $carousel_posts->found_posts;
            
            // Output HTML for each carousel slide
            $output .= '<div class="ah65-carousel__slide-'.$count.'">
                            <div class="ah65-carousel__content">
                                <h1 class="ah65-carousel__heading">' . esc_html($title) . '</h1>
                                <div class="ah65-carousel__subheading">' . esc_html($excerpt) . '</div>
                                <a class="ah65-carousel__btn" href="' . esc_url(get_permalink()) . '">Find Out More</a>
                            </div>
                            <div class="ah65-carousel__img-'.$count.'">' . $thumbnail . '</div>
                        </div>';
        }
    } else {
        // Output a message if no carousel posts are found
        $output .= '<p class="ah65-carousel__nocarousel">No carousel posts found.</p>';
    }

    if($total_posts == 1){
        $output .= '<style>
        @keyframes banner_1 {
            0%   {opacity: 1;}
            14.2%  {opacity: 1;}
            28.4%  {opacity: 1;}
            42.6%  {opacity: 1}
            56.8%  {opacity: 1}
            71%  {opacity: 1}
            85.2%  {opacity: 1}
            100%  {opacity: 1}
        }
        </style>';
        $output .= '<style>
        @keyframes banner_image_1 {
            0%   {opacity: 1;}
            14.2%  {opacity: 1;}
            28.4%  {opacity: 1;}
            42.6%  {opacity: 1}
            56.8%  {opacity: 1}
            71%  {opacity: 1}
            85.2%  {opacity: 1}
            100%  {opacity: 1}
        }
        </style>';
    } elseif($total_posts == 2){
        $output .= '<style>
        @keyframes banner_1 {
            0%   {opacity: 1;}
            14.2%  {opacity: 1;}
            28.4%  {opacity: 1;}
            42.6%  {opacity: 1}
            56.8%  {opacity: 0}
            71%  {opacity: 0}
            85.2%  {opacity: 0}
            100%  {opacity: 0}
        }
        @keyframes banner_2 {
            0%   {opacity: 0;}
            14.2%  {opacity: 0;}
            28.4%  {opacity: 0;}
            42.6%  {opacity: 0}
            56.8%  {opacity: 1}
            71%  {opacity: 1}
            85.2%  {opacity: 1}
            100%  {opacity: 1}
        }
        </style>';
        $output .= '<style>
        @keyframes banner_image_1 {
            0%   {opacity: 1;}
            14.2%  {opacity: 1;}
            28.4%  {opacity: 1;}
            42.6%  {opacity: 1}
            56.8%  {opacity: 0}
            71%  {opacity: 0}
            85.2%  {opacity: 0}
            100%  {opacity: 0}
        }
        @keyframes banner_image_2 {
            0%   {opacity: 0;}
            14.2%  {opacity: 0;}
            28.4%  {opacity: 0;}
            42.6%  {opacity: 0}
            56.8%  {opacity: 1}
            71%  {opacity: 1}
            85.2%  {opacity: 1}
            100%  {opacity: 1}
        }
        </style>';
    } elseif($total_posts == 3) {
        $output .= '<style>
        @keyframes banner_1 {
            0%   {opacity: 1;}
            10%  {opacity: 1;}
            20%  {opacity: 1;}
            30%  {opacity: 1}
            40%  {opacity: 0}
            50%  {opacity: 0}
            60%  {opacity: 0}
            70%  {opacity: 0}
            80%  {opacity: 0}
            90%  {opacity: 0}
            100% {opacity: 0;}
        }
        @keyframes banner_2 {
            0%   {opacity: 0;}
            10%  {opacity: 0;}
            20%  {opacity: 0;}
            30%  {opacity: 0;}
            40%  {opacity: 1;}
            50%  {opacity: 1;}
            60%  {opacity: 1;}
            70%  {opacity: 0;}
            80%  {opacity: 0;}
            90%  {opacity: 0;}
            100% {opacity: 0;}
        }
        @keyframes banner_3 {
            0%   {opacity: 0;}
            10%  {opacity: 0;}
            20%  {opacity: 0;}
            30%  {opacity: 0;}
            40%  {opacity: 0;}
            50%  {opacity: 0;}
            60%  {opacity: 0;}
            70%  {opacity: 1;}
            80%  {opacity: 1;}
            90%  {opacity: 1;}
            100% {opacity: 1;}
        }
        </style>';
        $output .= '<style>
        @keyframes banner_image_1 {
            0%   {opacity: 1;}
            10%  {opacity: 1;}
            20%  {opacity: 1;}
            30%  {opacity: 1}
            40%  {opacity: 0}
            50%  {opacity: 0}
            60%  {opacity: 0}
            70%  {opacity: 0}
            80%  {opacity: 0}
            90%  {opacity: 0}
            100% {opacity: 0;}
        }
        @keyframes banner_image_2 {
            0%   {opacity: 0;}
            10%  {opacity: 0;}
            20%  {opacity: 0;}
            30%  {opacity: 0;}
            40%  {opacity: 1;}
            50%  {opacity: 1;}
            60%  {opacity: 1;}
            70%  {opacity: 0;}
            80%  {opacity: 0;}
            90%  {opacity: 0;}
            100% {opacity: 0;}
        }
        @keyframes banner_image_3 {
            0%   {opacity: 0;}
            10%  {opacity: 0;}
            20%  {opacity: 0;}
            30%  {opacity: 0;}
            40%  {opacity: 0;}
            50%  {opacity: 0;}
            60%  {opacity: 0;}
            70%  {opacity: 1;}
            80%  {opacity: 1;}
            90%  {opacity: 1;}
            100% {opacity: 1;}
        }
        </style>';
    }

    $output .= '</div>';

    // Reset post data
    wp_reset_postdata();

    return $output;
}

// Register the shortcode
add_shortcode('carousel_plugin', 'carousel_shortcode');

// Function to register custom post type
function register_carousel_post_type() {
    $labels = array(
        'name'               => _x('Carousels', 'post type general name', 'your-text-domain'),
        'singular_name'      => _x('Carousel', 'post type singular name', 'your-text-domain'),
        'menu_name'          => _x('Carousel', 'admin menu', 'your-text-domain'),
        'name_admin_bar'     => _x('Carousel', 'add new on admin bar', 'your-text-domain'),
        'add_new'            => _x('Add New', 'carousel', 'your-text-domain'),
        'add_new_item'       => __('Add New Carousel', 'your-text-domain'),
        'new_item'           => __('New Carousel', 'your-text-domain'),
        'edit_item'          => __('Edit Carousel', 'your-text-domain'),
        'view_item'          => __('View Carousel', 'your-text-domain'),
        'all_items'          => __('All Carousels', 'your-text-domain'),
        'search_items'       => __('Search Carousels', 'your-text-domain'),
        'parent_item_colon'  => __('Parent Carousels:', 'your-text-domain'),
        'not_found'          => __('No carousels found.', 'your-text-domain'),
        'not_found_in_trash' => __('No carousels found in Trash.', 'your-text-domain')
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'carousel'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array('title', 'thumbnail', 'excerpt'),
    );

    register_post_type('carousel', $args);
}

// Hook into the 'init' action
add_action('init', 'register_carousel_post_type');
?>
