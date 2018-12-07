<?php
// Post image
add_theme_support('post-thumbnails');
add_image_size('blog-thumbnail', 182, 268, true);
set_post_thumbnail_size(182, 268);

// Read more
function custom_excerpt_length($length){
    return 20;
}
add_filter('excerpt_length', 'custom_excerpt_length');
function new_excerpt_more($more){
    return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

// Menu
function register_my_menu(){
    register_nav_menu('header-menu', __('Header Menu'));
}
add_action('init', 'register_my_menu');

// Nav Walker
require_once get_template_directory().'/includes/class-wp-bootstrap-navwalker.php';

// Widget
function fitor_widgets_init(){
    register_sidebar(array(
        'name' => __( 'Sidebar', 'sidebar-rg' ),
        'id' => 'sidebar-rg',
        'description' => __( 'Ở đây sẽ chứa những widget của Fitor', 'sidebar-rg' ),
        'before_widget' => '<div id="%1$s" class="card my-4 %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h5 class="card-header">',
        'after_title' => '</h5>',
    ));
}
add_action('widgets_init', 'fitor_widgets_init');

// Pagination
function fitor_pagination(){
    global $wp_query;
    $pages = paginate_links(array(
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages,
        'type' => 'array',
        'show_all' => false,
        'end_size' => 3,
        'mid_size' => 1,
        'prev_next' => true,
        'prev_text' => __('< Trước'),
        'next_text' => __('Sau >'),
    ));
    if(is_array($pages)){
        $paged = (get_query_var('paged') == 0) ? 1 : get_query_var('paged');
        $pagination = '<nav aria-label="Page navigation"><ul class="pagination">';
        foreach($pages as $page){
            $pagination .= '<li class="page-item'.(strpos($page, 'current') ? ' active' : '').'">'.str_replace('page-numbers', 'page-link', $page).'</li>';
        }
        $pagination .= '</ul></nav>';
        echo $pagination;
    }
}

// Related post
function fitor_related_post($title, $count){
    global $post;
        $tag_ids = array();
        $current_cat = get_the_category($post->ID);
        $current_cat = $current_cat[0]->cat_ID;
        $this_cat = '';
        $tags = get_the_tags($post->ID);
        if ( $tags ) {
            foreach($tags as $tag) {
                $tag_ids[] = $tag->term_id;
            }
        } else {
            $this_cat = $current_cat;
        }

        $args = array(
            'post_type'   => get_post_type(),
            'numberposts' => $count,
            'orderby'     => 'rand',
            'tag__in'     => $tag_ids,
            'cat'         => $this_cat,
            'exclude'     => $post->ID
        );
        $related_posts = get_posts($args);

        if ( empty($related_posts) ) {
            $args['tag__in'] = '';
            $args['cat'] = $current_cat;
            $related_posts = get_posts($args);
        }
        if ( empty($related_posts) ) {
            return;
        }
        $post_list = '';
        foreach($related_posts as $related) {

            $post_list .= '<div class="media mb-4 ">';
              $post_list .= '<img class="mr-3 img-thumbnail" style="width: 150px" src="'.get_the_post_thumbnail_url($related->ID, 'post-small').'" alt="Generic placeholder image">';
                $post_list .= '<div class="media-body align-self-center">';
                    $post_list .= '<h5 class="mt-0"><a href="'.get_permalink($related->ID).'">'.$related->post_title.'</a></h5>';
                    $post_list .= get_the_category( $related->ID )[0]->cat_name;

              $post_list .= '</div>';
            $post_list .= '</div>';
        }

        return sprintf('
            <div class="card my-4">
                <h4 class="card-header">%s</h4>
                <div class="card-body">%s</div>
            </div>
        ', $title, $post_list );
}
?>
