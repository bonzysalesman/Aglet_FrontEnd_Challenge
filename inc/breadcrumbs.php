<?php 
/**
 *
 * @package Glauss
 * @since Glauss 1.0
 */

function glauss_page_title() {
    $current_category = single_cat_title('', false);
	$current_tag = single_tag_title('', false);
    $current_term = single_term_title('', false);
    
if ( is_home() ) {
    echo '<h2 class="sub-header-title">' . esc_html__('Blog', 'glauss') . ' </h2>';
} elseif ( is_category() ) {
    echo '<h2 class="sub-header-title">' . $current_category . ' </h2>';
} elseif ( is_tag() ) {
    echo '<h2 class="sub-header-title">' . $current_tag . ' </h2>';
} elseif ( is_date() ) {
    echo '<h2 class="sub-header-title">' . get_the_date() . ' </h2>';
} elseif ( is_month() ) {
    echo '<h2 class="sub-header-title">' . get_the_date('F Y') . ' </h2>';
} elseif ( is_year() ) {
    echo '<h2 class="sub-header-title">' . get_the_date('Y') . ' </h2>';
} elseif ( is_author() ) {
    echo '<h2 class="sub-header-title">' . get_the_author() . '  </h2>';
} elseif ( is_search() ) {
    echo '<h2 class="sub-header-title">' . get_search_query() . '  </h2>';
} elseif ( is_404() ) {
    echo '<h2 class="sub-header-title">' . esc_html__('Page not found', 'glauss') . ' </h2>';
} else {
	if( class_exists( 'WooCommerce' ) ) {
		 if ( is_shop() ) {
			echo '<h2 class="sub-header-title">' . esc_html__('Shop', 'glauss') . '  </h2>';
		} elseif ( is_product() ) {
			echo '<h2 class="sub-header-title">' . get_the_title() . '  </h2>';
		} elseif ( get_post_type() == 'product' ) {
			echo '<h2 class="sub-header-title">' . $current_term . ' </h2>';
		} else {
			echo '<h2 class="sub-header-title">' . get_the_title() . ' </h2>';
		}
	} else {
		echo '<h1 class="sub-header-title">' . get_the_title() . ' </h1>';
	}
}
	

} 
 

/**/
function glauss_breadcrumb() {
    global $post;
    
    //schema link
    $home = '<i class="fa fa-home"></i>';
    $delimiter = ' \ ';
    $home_link = esc_url( home_url( '/' ) );
    $before = '<span class="current">';
    $after = '</span>';

    if (is_front_page()) {
    // no need for breadcrumbs in homepage
    }

    elseif (is_home()) {
        $title = get_option('page_for_posts') ? get_the_title(get_option('page_for_posts')) : esc_html__('Blog', 'glauss');
        echo '<div id="breadcrumbs"><a href="' . $home_link . '">' . $home . '</a> \ ' . $title . '</div>';
    } 

    else {
        echo '<div id="breadcrumbs">';
        // main breadcrumbs lead to homepage
        echo '<span><a href="' . $home_link . '">' . '<span>' . $home . '</span>' . '</a></span>' . $delimiter . ' ';
        // if blog page exists
        if (get_page_by_path('blog')) {
            if (!is_page()) {
                echo '<span><a href="' . get_permalink(get_page_by_path('blog')) . '">' . '<span>Blog</span></a></span>' . $delimiter . ' ';
            }
        }
		

if ( function_exists( 'woocommerce_breadcrumb' ) ) {
    if( is_woocommerce() ){
        $defaults = array(
            'delimiter'  => $delimiter,
            'wrap_before'  => $before,
            'wrap_after' => $after,
            'before'   => '',
            'after'   => '',
            'home'    => null
        );

        woocommerce_breadcrumb($defaults); 
        return false;
    }
} 

		
        if (is_category()) {
            $thisCat = get_category(get_query_var('cat'), false);
            if ($thisCat->parent != 0) {
                $category_link = get_category_link($thisCat->parent);
                echo '<span><a href="' . $category_link . '">' . '<span>' . get_cat_name($thisCat->parent) . '</span>' . '</a></span>' . $delimiter . ' ';
            }
            $category_id = get_cat_ID(single_cat_title('', false));
            $category_link = get_category_link($category_id);
            echo '<span><a href="' . $category_link . '"></a>' . '<span>' . esc_html__('Archive by category: "', 'glauss') . single_cat_title('', false) . '"</span>' . '</span>';
        }

        elseif (is_search()) {
            echo esc_html__('Search results for: "', 'glauss') . get_search_query() . esc_html__('"', 'glauss');
        }

        elseif (is_single() && !is_attachment()) {
            if (get_post_type() != 'post') {
                $post_type = get_post_type_object(get_post_type());
                $slug = $post_type->rewrite;
                echo '<span><a href="' . $home_link . '/' . $slug['slug'] . '">' . '<span>' . $post_type->labels->singular_name . '</span>' . '</a></span>';
                echo ' ' . $delimiter . ' ' . get_the_title();
            }
            else {
                $category = get_the_category();
                if ($category) {
                    foreach ($category as $cat) {
                        echo '<span><a href="' . get_category_link($cat->term_id) . '">' . '<span>' . $cat->name . '</span>' . '</a></span>' . $delimiter . ' ';
                    }
                }
                $parent_title = get_the_title( $post->post_parent );
 
    if ( $parent_title != the_title( ' ', ' ', false ) ) {
        echo '<a href="' . esc_url( get_permalink( $post->post_parent ) ) . '" alt="' . esc_attr( $parent_title ) . '">' . $parent_title . '</a> ';
    }
            }
        }
        elseif (!is_single() && !is_page() && get_post_type() != 'post' && !is_404()) {
            $post_type = get_post_type_object(get_post_type());
			echo esc_html( $post_type )->labels->singular_name;
        }
        elseif (is_attachment()) {
            $parent = get_post($post->post_parent);
            $cat = get_the_category($parent->ID);
            $cat = $cat[0];
            echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
            echo '<span>
			<a href="' . esc_url( get_permalink() ) . '" rel="bookmark" alt="' . esc_attr( the_title_attribute() ) . '">'.'<span>' . the_title() . '</span>'.'</a>

			</span>';
            echo ' ' . $delimiter . ' ' . get_the_title();
        }
        elseif (is_page() && !$post->post_parent) {
            $get_post_slug = $post->post_name;
            $post_slug = str_replace('-', ' ', $get_post_slug);
            echo '<span><a href="' . get_permalink() . '">' . '<span>' . ucfirst($post_slug) . '</span>' . '</a></span>';
        }
        elseif (is_page() && $post->post_parent) {
            $parent_id = $post->post_parent;
            $breadcrumbs = array();
            while ($parent_id) {
                $page = get_page($parent_id);
                $breadcrumbs[] = '<span><a href="' . get_permalink($page->ID) . '">' . '<span>' . get_the_title($page->ID) . '</span>' . '</a></span>';
                $parent_id = $page->post_parent;
            }
            $breadcrumbs = array_reverse($breadcrumbs);
            for ($i = 0; $i < count($breadcrumbs); $i++) {
			   echo ''.$breadcrumbs[$i];
                if ($i != count($breadcrumbs) - 1)
                    echo ' ' . $delimiter . ' ';
            }
            echo esc_html( $delimiter ) . '<span><span class="current">' . the_title_attribute('echo=0') . '</span></span>';
        }
        elseif (is_tag()) {
            $tag_id = get_term_by('name', single_cat_title('', false), 'post_tag');
            if ($tag_id) {
                $tag_link = get_tag_link($tag_id->term_id);
            }
            echo '<span><a href="' . $tag_link . '"></a><span>' . esc_html__('Posts tagged: "', 'glauss') . single_tag_title('', false) . '"</span>' . '</span>';
        }
        elseif (is_author()) {
            global $author;
            $userdata = get_userdata($author);
            echo '<span><a href="' . get_author_posts_url($userdata->ID) . '"></a><span>' . esc_html__('Author', 'glauss') . ': "' . $userdata->display_name . '"</span>' . '</span>';
        }
        elseif (is_404()) {
            echo  esc_html__('Error 404', 'glauss');
        }

        elseif (is_day()) {
            echo '<span><a href="' . get_year_link(get_the_time('Y')) . '">' . '<span>' . get_the_time('Y') . '</span>' . '</a></span>' . $delimiter . ' ';
            echo '<span><a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . '<span>' . get_the_time('F') . '</span>' . '</a></span>' . $delimiter . ' ';
            echo '<span><a href="' . get_day_link(get_the_time('Y'), get_the_time('m'), get_the_time('d')) . '">' . '<span>' . get_the_time('d') . '</span>' . '</a></span>';
        }
        elseif (is_month()) {
            echo '<span><a href="' . get_year_link(get_the_time('Y')) . '">' . '<span>' . get_the_time('Y') . '</span>' . '</a></span>' . $delimiter . ' ';
            echo '<span><a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . '<span>' . get_the_time('F') . '</span>' . '</a></span>';
        }
        elseif (is_year()) {
            echo '<span><a href="' . get_year_link(get_the_time('Y')) . '">' . '<span>' . get_the_time('Y') . '</span>' . '</a></span>';
        }
        if (get_query_var('paged')) {
            if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author())
                echo ' (';
                    echo esc_html__('Page', 'glauss') . ' ' . get_query_var('paged');
                    if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author())
                        echo ')';
        }
        echo '</div>';
    }
}
