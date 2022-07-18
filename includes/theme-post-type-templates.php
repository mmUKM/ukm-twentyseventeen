<?php
/**
 * Include single, archive and taxonomy from custom directory
 * @link http://codex.wordpress.org/Plugin_API/Filter_Reference/template_include
 * @link http://codex.wordpress.org/Plugin_API/Filter_Reference/single_template
 * @link http://codex.wordpress.org/Function_Reference/is_post_type_archive
 */

// POST TYPE FILES: Soalan Lazim

function archive_faq_page_template( $template_faq ) {
    if ( is_post_type_archive( 'faq' )  ) {
        $new_template_faq = get_template_directory() . '/templates/archive-faq.php';
        if ( '' != $new_template_faq ) {
            return $new_template_faq ;
        }
    }
    return $template_faq;
}
add_filter( 'template_include', 'archive_faq_page_template', 99 );

function get_faq_post_type_template( $single_faq_template ) {
    global $post;
    if ($post->post_type == 'faq') {
        $single_faq_template = get_template_directory() . '/templates/single-faq.php';
    }
    return $single_faq_template;
}
add_filter( 'single_template', 'get_faq_post_type_template' );

function taxonomy_faqcat_page_template( $template_faqcat ) {
    if ( is_tax( 'faqcat' )  ) {
        $new_template_faqcat = get_template_directory() . '/templates/taxonomy-faqcat.php';
        if ( '' != $new_template_faqcat ) {
            return $new_template_faqcat ;
        }
    }
    return $template_faqcat;
}
add_filter( 'template_include', 'taxonomy_faqcat_page_template', 99 );

// POST TYPE FILES: GALLERY

function get_gallery_post_type_template( $single_gallery_template ) {
    global $post;
        if ( $post->post_type == 'gallery' ) {
            $single_gallery_template = get_template_directory() . '/templates/single-gallery.php';
        }
        return $single_gallery_template;
}
add_filter( 'single_template', 'get_gallery_post_type_template' );

function archive_gallery_page_template( $template_gallery ) {
    if ( is_post_type_archive( 'gallery' )  ) {
        $new_template_gallery = get_template_directory() . '/templates/archive-gallery.php';
        if ( '' != $new_template_gallery ) {
            return $new_template_gallery ;
        }
    }
    return $template_gallery;
}
add_filter( 'template_include', 'archive_gallery_page_template', 99 );

function taxonomy_galcat_page_template( $template_galcat ) {
    if ( is_tax( 'galcat' )  ) {
        $new_template_galcat = get_template_directory() . '/templates/taxonomy-galcat.php';
        if ( '' != $new_template_galcat ) {
            return $new_template_galcat ;
        }
    }
    return $template_galcat;
}
add_filter( 'template_include', 'taxonomy_galcat_page_template', 99 );

// POST TYPE FILES: NEWS

function get_news_post_type_template($single_news_template) {
    global $post;
    if ( $post->post_type == 'news' ) {
        $single_news_template = get_template_directory() . '/templates/single-news.php';
    }
    return $single_news_template;
}
add_filter( 'single_template', 'get_news_post_type_template' );

function archive_news_page_template( $template_news ) {
    if ( is_post_type_archive( 'news' )  ) {
        $new_template_news = get_template_directory() . '/templates/archive-news.php';
        if ( '' != $new_template_news ) {
            return $new_template_news ;
        }
    }
    return $template_news;
}
add_filter( 'template_include', 'archive_news_page_template', 99 );

function taxonomy_news_page_template( $template_newscat ) {
    if ( is_tax( 'newscat' )  ) {
        $new_template_newscat = get_template_directory() . '/templates/taxonomy-newscat.php';
        if ( '' != $new_template_newscat ) {
            return $new_template_newscat ;
        }
    }
    return $template_newscat;
}
add_filter( 'template_include', 'taxonomy_news_page_template', 99 );

// POST TYPE FILES: STAFF

function get_staff_post_type_template($single_staff_template) {
    global $post;
        if ( $post->post_type == 'staff' ) {
            $single_staff_template = get_template_directory() . '/templates/single-staff.php';
        }
        return $single_staff_template;
}
add_filter( 'single_template', 'get_staff_post_type_template' );

function archive_staff_page_template( $template_staff ) {
    if ( is_post_type_archive( 'staff' )  ) {
        $new_template_staff = get_template_directory() . '/templates/archive-staff.php';
        if ( '' != $new_template_staff ) {
            return $new_template_staff ;
        }
    }
    return $template_staff;
}
add_filter( 'template_include', 'archive_staff_page_template', 99 );

function taxonomy_department_page_template( $template_department ) {
    if ( is_tax( 'department' )  ) {
        $new_template_department = get_template_directory() . '/templates/taxonomy-department.php';
        if ( '' != $new_template_department ) {
            return $new_template_department ;
        }
    }
    return $template_department;
}
add_filter( 'template_include', 'taxonomy_department_page_template', 99 );

function taxonomy_position_page_template( $template_position ) {
    if ( is_tax( 'position' )  ) {
        $new_template_position = get_template_directory() . '/templates/taxonomy-position.php';
        if ( '' != $new_template_position ) {
            return $new_template_position ;
        }
    }
    return $template_position;
}
add_filter( 'template_include', 'taxonomy_position_page_template', 99 );

// POST TYPE FILE: EXPERTISE

function get_expertise_post_type_template($single_expertise_template) {
    global $post;
    if ($post->post_type == 'expertise') {
        $single_expertise_template = get_template_directory() . '/templates/single-expertise.php';
    }
    return $single_expertise_template;
}
add_filter( 'single_template', 'get_expertise_post_type_template' );

function archive_expertise_page_template( $template_expertise ) {
    if ( is_post_type_archive( 'expertise' )  ) {
        $new_template_expertise = get_template_directory() . '/templates/archive-expertise.php';
        if ( '' != $new_template_expertise ) {
            return $new_template_expertise ;
        }
    }
    return $template_expertise;
}
add_filter( 'template_include', 'archive_expertise_page_template', 99 );

// POST TYPE FILES: PRESS RELEASE

function archive_press_page_template( $template_press ) {
    if ( is_post_type_archive( 'press' )  ) {
        $new_template_press = get_template_directory() . '/templates/archive-press.php';
        if ( '' != $new_template_press ) {
            return $new_template_press ;
        }
    }
    return $template_press;
}
add_filter( 'template_include', 'archive_press_page_template', 99 );

// POST TYPE FILES: PUBLICATION

function get_publication_post_type_template($single_publication_template) {
    global $post;
    if ($post->post_type == 'publication') {
        $single_publication_template = get_template_directory() . '/templates/single-publication.php';
    }
    return $single_publication_template;
}
add_filter( 'single_template', 'get_publication_post_type_template' );

function archive_publication_page_template( $template_publication ) {
    if ( is_post_type_archive( 'publication' )  ) {
        $new_template_publication = get_template_directory() . '/templates/archive-publication.php';
        if ( '' != $new_template_publication ) {
            return $new_template_publication ;
        }
    }
    return $template_publication;
}
add_filter( 'template_include', 'archive_publication_page_template', 99 );

function taxonomy_pubcat_page_template( $template_pubcat ) {
    if ( is_tax( 'pubcat' )  ) {
        $new_template_pubcat = get_template_directory() . '/templates/taxonomy-pubcat.php';
        if ( '' != $new_template_pubcat ) {
            return $new_template_pubcat ;
        }
    }
    return $template_pubcat;
}
add_filter( 'template_include', 'taxonomy_pubcat_page_template', 99 );

// POST TYPE FILES: VIDEO

function get_video_post_type_template($single_video_template) {
    global $post;
        if ( $post->post_type == 'video' ) {
            $single_video_template = get_template_directory() . '/templates/single-video.php';
        }
        return $single_video_template;
}
add_filter( 'single_template', 'get_video_post_type_template' );

function archive_video_page_template( $template_video ) {
    if ( is_post_type_archive( 'video' )  ) {
        $new_template_video = get_template_directory() . '/templates/archive-video.php';
            if ( '' != $new_template_video ) {
                return $new_template_video ;
            }
    }
    return $template_video;
}
add_filter( 'template_include', 'archive_video_page_template', 99 );

function taxonomy_vidcat_page_template( $template_vidcat ) {
    if ( is_tax( 'vidcat' )  ) {
        $new_template_vidcat = get_template_directory() . '/templates/taxonomy-vidcat.php';
        if ( '' != $new_template_vidcat ) {
            return $new_template_vidcat ;
        }
    }
    return $template_vidcat;
}

add_filter( 'template_include', 'taxonomy_vidcat_page_template', 99 );

// POST TYPE FILES: PEKELILING
function taxonomy_circat_page_template( $template_circat ) {
    if ( is_tax( 'circat' )  ) {
        $new_template_circat = get_template_directory() . '/templates/taxonomy-circat.php';
        if ( '' != $new_template_circat ) {
            return $new_template_circat ;
        }
    }
    return $template_circat;
}
add_filter( 'template_include', 'taxonomy_circat_page_template', 99 );

function archive_pekeliling_page_template( $template_pekeliling ) {
    if ( is_post_type_archive( 'pekeliling' )  ) {
        $new_template_pekeliling = get_template_directory() . '/templates/archive-pekeliling.php';
            if ( '' != $new_template_pekeliling ) {
                return $new_template_pekeliling ;
            }
    }
    return $template_pekeliling;
}
add_filter( 'template_include', 'archive_pekeliling_page_template', 99 );