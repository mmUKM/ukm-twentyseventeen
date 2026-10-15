<?php
/**
 * Template Name: Single Publication
 *
 * Struktur Halaman:
 * - Row 1: Tajuk Buku
 * - Row 2: Column Kiri (Maklumat Buku: Penulis, Penerbit, Tahun, ISBN, Harga, Pautan Beli/Download)
 *          Column Kanan (Gambar Kulit / Cover + Switch Thumbnail)
 * - Row 3: 4 Tab (Keterangan, Biografi, Ulasan, Kandungan)
 *
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header(); ?>

<div id="primary" class="wrap uk-section uk-section-xsmall">
    <div class="uk-container">
        <main id="main" class="site-main" role="main">
            <?php while ( have_posts() ) : the_post(); 

                // ------------------------------------------------------------------
                // 1. DATA GAMBAR & COVER SWITCHER
                // ------------------------------------------------------------------
                $pub_cover = get_post_meta( get_the_ID(), 'ut_publication_cover', true );
                if ( empty( $pub_cover ) && has_post_thumbnail() ) {
                    $pub_cover = get_the_post_thumbnail_url( get_the_ID(), 'large' );
                }

                $gallery_images = array();
                if ( ! empty( $pub_cover ) ) {
                    $gallery_images[] = $pub_cover;
                }

                $pub_gallery = get_post_meta( get_the_ID(), 'ut_publication_gallery', true );
                if ( ! empty( $pub_gallery ) && is_array( $pub_gallery ) ) {
                    foreach ( $pub_gallery as $att_id => $img_url ) {
                        if ( ! in_array( $img_url, $gallery_images, true ) ) {
                            $gallery_images[] = $img_url;
                        }
                    }
                }

                $pub_additional = get_post_meta( get_the_ID(), 'ut_publication_image', true );
                if ( ! empty( $pub_additional ) && is_array( $pub_additional ) ) {
                    foreach ( $pub_additional as $att_id => $img_url ) {
                        if ( ! in_array( $img_url, $gallery_images, true ) ) {
                            $gallery_images[] = $img_url;
                        }
                    }
                }

                // ------------------------------------------------------------------
                // 2. DATA MAKLUMAT BUKU
                // ------------------------------------------------------------------
                $author    = get_post_meta( get_the_ID(), 'ut_publication_author', true );
                $editor    = get_post_meta( get_the_ID(), 'ut_publication_editor', true );
                $publisher = get_post_meta( get_the_ID(), 'ut_publication_publisher', true );
                $year      = get_post_meta( get_the_ID(), 'ut_publication_year', true );
                $isbn      = get_post_meta( get_the_ID(), 'ut_publication_isbn', true );
                $price     = get_post_meta( get_the_ID(), 'ut_publication_price', true );
                $pages     = get_post_meta( get_the_ID(), 'ut_publication_pages', true );
                $ref       = get_post_meta( get_the_ID(), 'ut_publication_reference', true );
                $ref_title = get_post_meta( get_the_ID(), 'ut_publication_renamedownload', true );
                if ( empty( $ref_title ) ) {
                    $ref_title = __( 'Klik di sini', 'ukmtheme' );
                }

                // ------------------------------------------------------------------
                // 3. PAUTAN BELI / MUAT TURUN
                // ------------------------------------------------------------------
                $buy_links = array();

                // Shopee
                $shopee_enable = get_post_meta( get_the_ID(), 'ut_publication_shopee_enable', true );
                $shopee_url    = get_post_meta( get_the_ID(), 'ut_publication_shopee', true );
                if ( ( $shopee_enable === 'on' || ( empty( $shopee_enable ) && ! empty( $shopee_url ) ) ) && ! empty( $shopee_url ) ) {
                    $buy_links[] = array(
                        'name'  => __( 'Shopee', 'ukmtheme' ),
                        'url'   => $shopee_url,
                        'image' => get_template_directory_uri() . '/assets/images/pub-shopee.png',
                        'icon'  => 'cart',
                    );
                }

                // Amazon
                $amazon_enable = get_post_meta( get_the_ID(), 'ut_publication_amazon_enable', true );
                $amazon_url    = get_post_meta( get_the_ID(), 'ut_publication_amazon', true );
                if ( ( $amazon_enable === 'on' || ( empty( $amazon_enable ) && ! empty( $amazon_url ) ) ) && ! empty( $amazon_url ) ) {
                    $buy_links[] = array(
                        'name'  => __( 'Amazon', 'ukmtheme' ),
                        'url'   => $amazon_url,
                        'image' => get_template_directory_uri() . '/assets/images/pub-amazon.png',
                        'icon'  => 'cart',
                    );
                }

                // Lazada
                $lazada_enable = get_post_meta( get_the_ID(), 'ut_publication_lazada_enable', true );
                $lazada_url    = get_post_meta( get_the_ID(), 'ut_publication_lazada', true );
                if ( ( $lazada_enable === 'on' || ( empty( $lazada_enable ) && ! empty( $lazada_url ) ) ) && ! empty( $lazada_url ) ) {
                    $buy_links[] = array(
                        'name'  => __( 'Lazada', 'ukmtheme' ),
                        'url'   => $lazada_url,
                        'image' => get_template_directory_uri() . '/assets/images/pub-lazada.png',
                        'icon'  => 'cart',
                    );
                }

                // e-Sentral
                $esentral_enable = get_post_meta( get_the_ID(), 'ut_publication_esentral_enable', true );
                $esentral_url    = get_post_meta( get_the_ID(), 'ut_publication_esentral', true );
                if ( ( $esentral_enable === 'on' || ( empty( $esentral_enable ) && ! empty( $esentral_url ) ) ) && ! empty( $esentral_url ) ) {
                    $buy_links[] = array(
                        'name'  => __( 'e-Sentral', 'ukmtheme' ),
                        'url'   => $esentral_url,
                        'image' => get_template_directory_uri() . '/assets/images/pub-e-sentral.png',
                        'icon'  => 'cart',
                    );
                }

                // Muat Turun PDF
                $pdf_enable = get_post_meta( get_the_ID(), 'ut_publication_pdf_enable', true );
                $pdf_url    = get_post_meta( get_the_ID(), 'ut_publication_pdf', true );
                if ( ( $pdf_enable === 'on' || ( empty( $pdf_enable ) && ! empty( $pdf_url ) ) ) && ! empty( $pdf_url ) ) {
                    $buy_links[] = array(
                        'name'  => __( 'Muat Turun PDF', 'ukmtheme' ),
                        'url'   => $pdf_url,
                        'image' => '',
                        'icon'  => 'download',
                    );
                }

                // ------------------------------------------------------------------
                // 4. KONFIGURASI 4 TAB
                // ------------------------------------------------------------------
                $tabs = array();

                // Tab 1: Keterangan
                $t1_active = get_post_meta( get_the_ID(), 'ut_publication_tab1_active', true );
                $t1_title  = get_post_meta( get_the_ID(), 'ut_publication_tab1_title', true );
                $t1_desc   = get_post_meta( get_the_ID(), 'ut_publication_description', true );
                if ( empty( $t1_desc ) ) {
                    $t1_desc = get_the_content();
                }
                $t1_title = ! empty( $t1_title ) ? $t1_title : __( 'Keterangan', 'ukmtheme' );
                if ( ( $t1_active === 'on' || ( $t1_active !== 'off' && ! empty( $t1_desc ) ) ) && ! empty( $t1_desc ) ) {
                    $tabs[] = array( 'title' => $t1_title, 'content' => $t1_desc );
                }

                // Tab 2: Biografi
                $t2_active = get_post_meta( get_the_ID(), 'ut_publication_tab2_active', true );
                $t2_title  = get_post_meta( get_the_ID(), 'ut_publication_tab2_title', true );
                $t2_desc   = get_post_meta( get_the_ID(), 'ut_publication_biography', true );
                $t2_title  = ! empty( $t2_title ) ? $t2_title : __( 'Biografi', 'ukmtheme' );
                if ( ( $t2_active === 'on' || ( $t2_active !== 'off' && ! empty( $t2_desc ) ) ) && ! empty( $t2_desc ) ) {
                    $tabs[] = array( 'title' => $t2_title, 'content' => $t2_desc );
                }

                // Tab 3: Ulasan
                $t3_active = get_post_meta( get_the_ID(), 'ut_publication_tab3_active', true );
                $t3_title  = get_post_meta( get_the_ID(), 'ut_publication_tab3_title', true );
                $t3_desc   = get_post_meta( get_the_ID(), 'ut_publication_review', true );
                if ( empty( $t3_title ) || 'Review' === $t3_title ) {
                    $t3_title = __( 'Ulasan', 'ukmtheme' );
                }
                if ( ( $t3_active === 'on' || ( $t3_active !== 'off' && ! empty( $t3_desc ) ) ) && ! empty( $t3_desc ) ) {
                    $tabs[] = array( 'title' => $t3_title, 'content' => $t3_desc );
                }

                // Tab 4: Kandungan
                $t4_active = get_post_meta( get_the_ID(), 'ut_publication_tab4_active', true );
                $t4_title  = get_post_meta( get_the_ID(), 'ut_publication_tab4_title', true );
                $t4_desc   = get_post_meta( get_the_ID(), 'ut_publication_tab4_content', true );
                $t4_title  = ! empty( $t4_title ) ? $t4_title : __( 'Kandungan', 'ukmtheme' );
                if ( $t4_active === 'on' && ! empty( $t4_desc ) ) {
                    $tabs[] = array( 'title' => $t4_title, 'content' => $t4_desc );
                }
            ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class( 'uk-article uk-card uk-card-default uk-card-body publication-single-article' ); ?>>

                <!-- =======================================================
                     ROW 1: TAJUK BUKU
                     ======================================================= -->
                <header class="publication-header uk-margin-bottom">
                    <h1 class="uk-article-title uk-margin-remove-top uk-margin-small-bottom">
                        <?php the_title(); ?>
                    </h1>
                    <?php if ( get_the_term_list( get_the_ID(), 'pubcat' ) ) : ?>
                        <p class="uk-article-meta uk-margin-remove-top">
                            <span uk-icon="icon: tag; ratio: 0.85"></span> 
                            <?php echo get_the_term_list( get_the_ID(), 'pubcat', '', ', ', '' ); ?>
                        </p>
                    <?php endif; ?>
                </header>

                <hr class="uk-divider-icon uk-margin-small-top uk-margin-medium-bottom">

                <!-- =======================================================
                     ROW 2: GRID 2 COLUMN
                     Column Kiri : Maklumat Buku & Pautan Beli/Download
                     Column Kanan: Cover + Switch Thumbnail
                     ======================================================= -->
                <div uk-grid class="uk-grid-large uk-flex-middle@m">

                    <!-- COLUMN KIRI: MAKLUMAT BUKU -->
                    <div class="uk-width-3-5@m uk-width-2-3@l uk-width-1-1">
                        <div class="publication-meta-wrapper">
                            <h3 class="uk-heading-bullet uk-margin-small-bottom">
                                <?php _e( 'Maklumat Buku', 'ukmtheme' ); ?>
                            </h3>

                            <table class="uk-table uk-table-divider uk-table-small uk-margin-small-top publication-info-table">
                                <tbody>
                                    <?php if ( $author ) : ?>
                                        <tr>
                                            <td class="uk-table-shrink uk-text-bold uk-text-muted uk-text-nowrap">
                                                <?php _e( 'Penulis', 'ukmtheme' ); ?>
                                            </td>
                                            <td class="uk-table-expand">
                                                : <?php echo esc_html( $author ); ?>
                                            </td>
                                        </tr>
                                    <?php endif; ?>

                                    <?php if ( $editor ) : ?>
                                        <tr>
                                            <td class="uk-table-shrink uk-text-bold uk-text-muted uk-text-nowrap">
                                                <?php _e( 'Penyunting', 'ukmtheme' ); ?>
                                            </td>
                                            <td class="uk-table-expand">
                                                : <?php echo esc_html( $editor ); ?>
                                            </td>
                                        </tr>
                                    <?php endif; ?>

                                    <?php if ( $publisher ) : ?>
                                        <tr>
                                            <td class="uk-table-shrink uk-text-bold uk-text-muted uk-text-nowrap">
                                                <?php _e( 'Penerbit', 'ukmtheme' ); ?>
                                            </td>
                                            <td class="uk-table-expand">
                                                : <?php echo esc_html( $publisher ); ?>
                                            </td>
                                        </tr>
                                    <?php endif; ?>

                                    <?php if ( $year ) : ?>
                                        <tr>
                                            <td class="uk-table-shrink uk-text-bold uk-text-muted uk-text-nowrap">
                                                <?php _e( 'Tahun Terbitan', 'ukmtheme' ); ?>
                                            </td>
                                            <td class="uk-table-expand">
                                                : <?php echo esc_html( $year ); ?>
                                            </td>
                                        </tr>
                                    <?php endif; ?>

                                    <?php if ( $isbn ) : ?>
                                        <tr>
                                            <td class="uk-table-shrink uk-text-bold uk-text-muted uk-text-nowrap">
                                                <?php _e( 'ISBN', 'ukmtheme' ); ?>
                                            </td>
                                            <td class="uk-table-expand">
                                                : <?php echo esc_html( $isbn ); ?>
                                            </td>
                                        </tr>
                                    <?php endif; ?>

                                    <?php if ( $price ) : ?>
                                        <tr>
                                            <td class="uk-table-shrink uk-text-bold uk-text-muted uk-text-nowrap">
                                                <?php _e( 'Harga', 'ukmtheme' ); ?>
                                            </td>
                                            <td class="uk-table-expand">
                                                : <strong class="uk-text-primary"><?php echo esc_html( $price ); ?></strong>
                                            </td>
                                        </tr>
                                    <?php endif; ?>

                                    <?php if ( $pages ) : ?>
                                        <tr>
                                            <td class="uk-table-shrink uk-text-bold uk-text-muted uk-text-nowrap">
                                                <?php _e( 'Bilangan Muka Surat', 'ukmtheme' ); ?>
                                            </td>
                                            <td class="uk-table-expand">
                                                : <?php echo esc_html( $pages ); ?>
                                            </td>
                                        </tr>
                                    <?php endif; ?>

                                    <?php if ( $ref ) : ?>
                                        <tr>
                                            <td class="uk-table-shrink uk-text-bold uk-text-muted uk-text-nowrap">
                                                <?php _e( 'Pautan Rujukan', 'ukmtheme' ); ?>
                                            </td>
                                            <td class="uk-table-expand">
                                                : <a href="<?php echo esc_url( $ref ); ?>" target="_blank" rel="noopener noreferrer" class="uk-link-reset uk-text-primary">
                                                    <span uk-icon="icon: link; ratio: 0.8"></span> <?php echo esc_html( $ref_title ); ?>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>

                            <!-- Pautan Beli / Muat Turun -->
                            <?php if ( ! empty( $buy_links ) ) : ?>
                                <div class="uk-margin-medium-top publication-buy-section">
                                    <h4 class="uk-margin-small-bottom">
                                        <strong><?php _e( 'Pautan Pembelian &amp; Muat Turun:', 'ukmtheme' ); ?></strong>
                                    </h4>
                                    <div class="uk-flex uk-flex-middle uk-flex-wrap" style="gap: 10px;">
                                        <?php foreach ( $buy_links as $item ) : ?>
                                            <a href="<?php echo esc_url( $item['url'] ); ?>" target="_blank" rel="noopener noreferrer" class="uk-button uk-button-default uk-button-small uk-flex uk-flex-middle publication-buy-btn" style="height: auto; padding: 7px 14px; border-radius: 4px; box-shadow: 0 1px 3px rgba(0,0,0,0.06); text-decoration: none;">
                                                <?php if ( ! empty( $item['image'] ) ) : ?>
                                                    <img src="<?php echo esc_url( $item['image'] ); ?>" alt="<?php echo esc_attr( $item['name'] ); ?>" style="max-height: 22px; width: auto; margin-right: 6px; display: inline-block;">
                                                <?php else : ?>
                                                    <span uk-icon="icon: <?php echo esc_attr( $item['icon'] ); ?>" class="uk-margin-small-right"></span>
                                                <?php endif; ?>
                                                <span><?php echo esc_html( $item['name'] ); ?></span>
                                            </a>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- COLUMN KANAN: COVER + SWITCH THUMBNAIL -->
                    <div class="uk-width-2-5@m uk-width-1-3@l uk-width-1-1">
                        <div class="publication-cover-wrapper uk-text-center">
                            <?php if ( ! empty( $gallery_images ) ) : ?>
                                
                                <!-- Main Cover Switcher -->
                                <div uk-lightbox="animation: fade">
                                    <ul id="publication-cover-switcher" class="uk-switcher uk-margin-remove">
                                        <?php foreach ( $gallery_images as $index => $img_src ) : ?>
                                            <li<?php echo ( 0 === $index ) ? ' class="uk-active"' : ''; ?>>
                                                <a href="<?php echo esc_url( $img_src ); ?>" data-caption="<?php the_title_attribute(); ?>" class="publication-cover-frame uk-inline uk-border-rounded uk-box-shadow-medium uk-transition-toggle" style="background: #ffffff; padding: 10px; border: 1px solid #e2e8f0; border-radius: 8px; display: inline-block; cursor: zoom-in;">
                                                    <img src="<?php echo esc_url( $img_src ); ?>" alt="<?php the_title_attribute(); ?>" style="max-height: 420px; width: auto; max-width: 100%; object-fit: contain; display: block; border-radius: 4px; margin: 0 auto;" loading="lazy">
                                                    <div class="uk-transition-fade uk-position-bottom-right uk-overlay uk-overlay-primary uk-padding-xsmall" style="padding: 4px 8px; border-radius: 4px 0 4px 0;">
                                                        <span uk-icon="icon: expand; ratio: 0.8"></span>
                                                    </div>
                                                </a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>

                                <!-- Thumbnail Switcher Bar -->
                                <?php if ( count( $gallery_images ) > 1 ) : ?>
                                    <ul class="uk-thumbnav uk-grid-small uk-flex-center uk-margin-small-top uk-grid" uk-switcher="connect: #publication-cover-switcher; animation: uk-animation-fade">
                                        <?php foreach ( $gallery_images as $index => $thumb_src ) : ?>
                                            <li<?php echo ( 0 === $index ) ? ' class="uk-active"' : ''; ?>>
                                                <a href="#" class="pub-thumb-link" style="display: block; border: 2px solid #e2e8f0; border-radius: 6px; overflow: hidden; padding: 2px; background: #ffffff; transition: all 0.2s ease;">
                                                    <img src="<?php echo esc_url( $thumb_src ); ?>" alt="<?php the_title_attribute(); ?> thumbnail" style="width: 55px; height: 72px; object-fit: cover; display: block; border-radius: 3px;">
                                                </a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>

                            <?php else : ?>
                                <!-- Fallback jika tiada imej -->
                                <div class="publication-cover-frame uk-inline uk-border-rounded uk-box-shadow-small" style="background: #ffffff; padding: 10px; border: 1px solid #e2e8f0; border-radius: 8px; display: inline-block;">
                                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/placeholder_publication.svg" alt="<?php the_title_attribute(); ?>" style="max-height: 380px; width: auto; max-width: 100%; display: block; margin: 0 auto;">
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                </div><!-- /Row 2 Grid -->

                <!-- =======================================================
                     ROW 3: 4 TAB
                     ======================================================= -->
                <?php if ( ! empty( $tabs ) ) : ?>
                    <div class="publication-tabs-section uk-width-1-1 uk-margin-large-top">
                        <ul class="uk-tab uk-child-width-expand@s" uk-tab="animation: uk-animation-fade" id="publication-main-tabs">
                            <?php foreach ( $tabs as $index => $tab ) : ?>
                                <li<?php echo ( 0 === $index ) ? ' class="uk-active"' : ''; ?>>
                                    <a href="#" class="uk-text-bold"><?php echo esc_html( $tab['title'] ); ?></a>
                                </li>
                            <?php endforeach; ?>
                        </ul>

                        <div class="uk-switcher uk-margin-medium-top uk-card uk-card-default uk-card-body uk-border-rounded publication-tabs-content" style="border: 1px solid #e2e8f0; background: #fafbfc; border-radius: 6px;">
                            <?php foreach ( $tabs as $tab ) : ?>
                                <div class="entry-content">
                                    <?php echo wpautop( $tab['content'] ); ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <footer class="entry-footer uk-margin-top">
                    <?php get_template_part( 'template-parts/global/content', 'edit' ); ?>
                </footer>

            </article>

            <style>
                .publication-single-article {
                    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.05);
                    border: 1px solid #eef2f5;
                    border-radius: 8px;
                }
                .publication-info-table td {
                    padding: 8px 10px;
                    vertical-align: top;
                }
                .publication-cover-wrapper .pub-thumb-link:hover {
                    border-color: #94a3b8 !important;
                }
                .publication-cover-wrapper li.uk-active .pub-thumb-link {
                    border-color: #0073aa !important;
                    box-shadow: 0 0 0 2px rgba(0, 115, 170, 0.25);
                }
                .publication-buy-btn:hover {
                    background-color: #f8fafc;
                    border-color: #cbd5e1;
                }
                .publication-tabs-content {
                    min-height: 120px;
                    line-height: 1.7;
                }
            </style>

            <?php endwhile; ?>
        </main>
    </div>
</div>

<?php get_footer(); ?>