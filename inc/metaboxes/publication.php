<?php
/**
 * Metaboxes: publication
 *
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */

if ( ! defined( 'ABSPATH' ) ) exit;

function ukmtheme_publication_metaboxes() {

    $publication = new_cmb2_box( array(
        'id'            => 'publication_metabox',
        'title'         => esc_html__( 'Publication Information', 'ukmtheme' ),
        'object_types'  => array( 'publication' ),
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true,
    ) );

    // ==========================================
    // CONTENT TABS (TABS 1 - 4)
    // ==========================================

    // --- TAB 1 ---
    $publication->add_field( array(
        'name' => esc_html__( 'Tab 1: Description', 'ukmtheme' ),
        'desc' => esc_html__( 'Settings for Tab 1', 'ukmtheme' ),
        'id'   => 'ut_publication_tab1_header',
        'type' => 'title',
    ) );

    $publication->add_field( array(
        'name'    => esc_html__( 'Enable Tab 1', 'ukmtheme' ),
        'desc'    => esc_html__( 'Check to enable this tab on the book page.', 'ukmtheme' ),
        'id'      => 'ut_publication_tab1_active',
        'type'    => 'checkbox',
        //'default' => 'on',
    ) );

    $publication->add_field( array(
        'name'    => esc_html__( 'Tab 1 Title', 'ukmtheme' ),
        'desc'    => esc_html__( 'Tab title (default: Description)', 'ukmtheme' ),
        'id'      => 'ut_publication_tab1_title',
        'type'    => 'text',
        'default' => esc_html__( 'Description', 'ukmtheme' ),
    ) );

    $publication->add_field( array(
        'name'    => esc_html__( 'Tab 1 Content', 'ukmtheme' ),
        'desc'    => esc_html__( 'Synopsis or full description of the publication.', 'ukmtheme' ),
        'id'      => 'ut_publication_description',
        'type'    => 'wysiwyg',
        'options' => array( 'textarea_rows' => 5 ),
    ) );

    // --- TAB 2 ---
    $publication->add_field( array(
        'name' => esc_html__( 'Tab 2: Biography', 'ukmtheme' ),
        'desc' => esc_html__( 'Settings for Tab 2', 'ukmtheme' ),
        'id'   => 'ut_publication_tab2_header',
        'type' => 'title',
    ) );

    $publication->add_field( array(
        'name'    => esc_html__( 'Enable Tab 2', 'ukmtheme' ),
        'desc'    => esc_html__( 'Check to enable this tab on the book page.', 'ukmtheme' ),
        'id'      => 'ut_publication_tab2_active',
        'type'    => 'checkbox',
        //'default' => 'on',
    ) );

    $publication->add_field( array(
        'name'    => esc_html__( 'Tab 2 Title', 'ukmtheme' ),
        'desc'    => esc_html__( 'Tab title (default: Biography)', 'ukmtheme' ),
        'id'      => 'ut_publication_tab2_title',
        'type'    => 'text',
        'default' => esc_html__( 'Biography', 'ukmtheme' ),
    ) );

    $publication->add_field( array(
        'name'    => esc_html__( 'Tab 2 Content', 'ukmtheme' ),
        'desc'    => esc_html__( 'Author biography or brief background.', 'ukmtheme' ),
        'id'      => 'ut_publication_biography',
        'type'    => 'wysiwyg',
        'options' => array( 'textarea_rows' => 5 ),
    ) );

    // --- TAB 3 ---
    $publication->add_field( array(
        'name' => esc_html__( 'Tab 3: Reviews', 'ukmtheme' ),
        'desc' => esc_html__( 'Settings for Tab 3', 'ukmtheme' ),
        'id'   => 'ut_publication_tab3_header',
        'type' => 'title',
    ) );

    $publication->add_field( array(
        'name'    => esc_html__( 'Enable Tab 3', 'ukmtheme' ),
        'desc'    => esc_html__( 'Check to enable this tab on the book page.', 'ukmtheme' ),
        'id'      => 'ut_publication_tab3_active',
        'type'    => 'checkbox',
        //'default' => 'on',
    ) );

    $publication->add_field( array(
        'name'    => esc_html__( 'Tab 3 Title', 'ukmtheme' ),
        'desc'    => esc_html__( 'Tab title (default: Reviews)', 'ukmtheme' ),
        'id'      => 'ut_publication_tab3_title',
        'type'    => 'text',
        'default' => esc_html__( 'Reviews', 'ukmtheme' ),
    ) );

    $publication->add_field( array(
        'name'    => esc_html__( 'Tab 3 Content', 'ukmtheme' ),
        'desc'    => esc_html__( 'Reviews or appraisal for the book/publication.', 'ukmtheme' ),
        'id'      => 'ut_publication_review',
        'type'    => 'wysiwyg',
        'options' => array( 'textarea_rows' => 5 ),
    ) );

    // --- TAB 4 ---
    $publication->add_field( array(
        'name' => esc_html__( 'Tab 4: Table of Contents', 'ukmtheme' ),
        'desc' => esc_html__( 'Settings for Tab 4', 'ukmtheme' ),
        'id'   => 'ut_publication_tab4_header',
        'type' => 'title',
    ) );

    $publication->add_field( array(
        'name' => esc_html__( 'Enable Tab 4', 'ukmtheme' ),
        'desc' => esc_html__( 'Check to enable this tab on the book page.', 'ukmtheme' ),
        'id'   => 'ut_publication_tab4_active',
        'type' => 'checkbox',
    ) );

    $publication->add_field( array(
        'name'    => esc_html__( 'Tab 4 Title', 'ukmtheme' ),
        'desc'    => esc_html__( 'Tab title (default: Table of Contents)', 'ukmtheme' ),
        'id'      => 'ut_publication_tab4_title',
        'type'    => 'text',
        'default' => esc_html__( 'Table of Contents', 'ukmtheme' ),
    ) );

    $publication->add_field( array(
        'name'    => esc_html__( 'Tab 4 Content', 'ukmtheme' ),
        'desc'    => esc_html__( 'Additional content, chapter list, or further details.', 'ukmtheme' ),
        'id'      => 'ut_publication_tab4_content',
        'type'    => 'wysiwyg',
        'options' => array( 'textarea_rows' => 5 ),
    ) );

    // ==========================================
    // MAKLUMAT PENERBITAN
    // ==========================================
    $publication->add_field( array(
        'name' => esc_html__( 'Book & Publication Details', 'ukmtheme' ),
        'id'   => 'ut_publication_details_header',
        'type' => 'title',
    ) );

    $publication->add_field( array(
        'name'  => esc_html__( 'Book Cover Image', 'ukmtheme' ),
        'desc'  => esc_html__( 'Upload book cover image or enter URL. Recommended size: 300x380 pixels.', 'ukmtheme' ),
        'id'    => 'ut_publication_cover',
        'type'  => 'file',
        'allow' => array( 'url' ),
    ) );

    $publication->add_field( array(
        'name'         => esc_html__( 'Book Image Gallery', 'ukmtheme' ),
        'desc'         => esc_html__( 'Upload images for thumbnail switcher (Cover & Selected Pages)', 'ukmtheme' ),
        'id'           => 'ut_publication_gallery',
        'type'         => 'file_list',
        'preview_size' => array( 100, 100 ),
    ) );

    $publication->add_field( array(
        'name' => esc_html__( 'Author', 'ukmtheme' ),
        'desc' => esc_html__( 'Example: Jamaludin Rajalu', 'ukmtheme' ),
        'id'   => 'ut_publication_author',
        'type' => 'text',
    ) );

    $publication->add_field( array(
        'name' => esc_html__( 'Editor', 'ukmtheme' ),
        'desc' => esc_html__( 'Editor name if applicable. Example: Prof. Dr. Ismail Ahmad', 'ukmtheme' ),
        'id'   => 'ut_publication_editor',
        'type' => 'text',
    ) );

    $publication->add_field( array(
        'name' => esc_html__( 'Publisher', 'ukmtheme' ),
        'desc' => esc_html__( 'Example: Penerbit Universiti Kebangsaan Malaysia', 'ukmtheme' ),
        'id'   => 'ut_publication_publisher',
        'type' => 'text',
    ) );

    $publication->add_field( array(
        'name' => esc_html__( 'Publication Year', 'ukmtheme' ),
        'desc' => esc_html__( 'Example: 2024', 'ukmtheme' ),
        'id'   => 'ut_publication_year',
        'type' => 'text',
    ) );

    $publication->add_field( array(
        'name' => esc_html__( 'ISBN', 'ukmtheme' ),
        'desc' => esc_html__( 'Example: 978-967-251-123-4', 'ukmtheme' ),
        'id'   => 'ut_publication_isbn',
        'type' => 'text',
    ) );

    $publication->add_field( array(
        'name' => esc_html__( 'Price', 'ukmtheme' ),
        'desc' => esc_html__( 'Example: RM 45.00', 'ukmtheme' ),
        'id'   => 'ut_publication_price',
        'type' => 'text',
    ) );

    $publication->add_field( array(
        'name'       => esc_html__( 'Card Button Label (Archive & Category)', 'ukmtheme' ),
        'desc'       => esc_html__( 'Button label on archive/category page (Default: Get Copy / follows Customizer settings).', 'ukmtheme' ),
        'id'         => 'ut_publication_btn_label',
        'type'       => 'text',
        'attributes' => array(
            'placeholder' => esc_html__( 'Get Copy', 'ukmtheme' ),
        ),
    ) );

    $publication->add_field( array(
        'name' => esc_html__( 'Number of Pages', 'ukmtheme' ),
        'desc' => esc_html__( 'Example: 280 pp', 'ukmtheme' ),
        'id'   => 'ut_publication_pages',
        'type' => 'text',
    ) );

    $publication->add_field( array(
        'name' => esc_html__( 'Reference / Download Link', 'ukmtheme' ),
        'desc' => esc_html__( 'Example: https://www.ukm.my', 'ukmtheme' ),
        'id'   => 'ut_publication_reference',
        'type' => 'text_url',
    ) );

    $publication->add_field( array(
        'name' => esc_html__( 'Reference Link Text', 'ukmtheme' ),
        'desc' => esc_html__( 'Example: Get Now! / Click here', 'ukmtheme' ),
        'id'   => 'ut_publication_renamedownload',
        'type' => 'text',
    ) );

    // ==========================================
    // PAUTAN BELI ATAU MUAT TURUN
    // ==========================================
    $publication->add_field( array(
        'name' => esc_html__( 'Purchase or Download Links', 'ukmtheme' ),
        'desc' => esc_html__( 'Select the platforms to display and enter the respective URL links / files.', 'ukmtheme' ),
        'id'   => 'ut_publication_links_header',
        'type' => 'title',
    ) );

    // Shopee
    $publication->add_field( array(
        'name' => esc_html__( 'Shopee', 'ukmtheme' ),
        'desc' => esc_html__( 'Enable Shopee link', 'ukmtheme' ),
        'id'   => 'ut_publication_shopee_enable',
        'type' => 'checkbox',
    ) );

    $publication->add_field( array(
        'name' => esc_html__( 'Shopee Link (URL)', 'ukmtheme' ),
        'desc' => esc_html__( 'Example: https://shopee.com.my/...', 'ukmtheme' ),
        'id'   => 'ut_publication_shopee',
        'type' => 'text_url',
    ) );

    // Amazon
    $publication->add_field( array(
        'name' => esc_html__( 'Amazon', 'ukmtheme' ),
        'desc' => esc_html__( 'Enable Amazon link', 'ukmtheme' ),
        'id'   => 'ut_publication_amazon_enable',
        'type' => 'checkbox',
    ) );

    $publication->add_field( array(
        'name' => esc_html__( 'Amazon Link (URL)', 'ukmtheme' ),
        'desc' => esc_html__( 'Example: https://www.amazon.com/...', 'ukmtheme' ),
        'id'   => 'ut_publication_amazon',
        'type' => 'text_url',
    ) );

    // Lazada
    $publication->add_field( array(
        'name' => esc_html__( 'Lazada', 'ukmtheme' ),
        'desc' => esc_html__( 'Enable Lazada link', 'ukmtheme' ),
        'id'   => 'ut_publication_lazada_enable',
        'type' => 'checkbox',
    ) );

    $publication->add_field( array(
        'name' => esc_html__( 'Lazada Link (URL)', 'ukmtheme' ),
        'desc' => esc_html__( 'Example: https://www.lazada.com.my/...', 'ukmtheme' ),
        'id'   => 'ut_publication_lazada',
        'type' => 'text_url',
    ) );

    // e-Sentral
    $publication->add_field( array(
        'name' => esc_html__( 'e-Sentral', 'ukmtheme' ),
        'desc' => esc_html__( 'Enable e-Sentral link', 'ukmtheme' ),
        'id'   => 'ut_publication_esentral_enable',
        'type' => 'checkbox',
    ) );

    $publication->add_field( array(
        'name' => esc_html__( 'e-Sentral Link (URL)', 'ukmtheme' ),
        'desc' => esc_html__( 'Example: https://www.e-sentral.com/...', 'ukmtheme' ),
        'id'   => 'ut_publication_esentral',
        'type' => 'text_url',
    ) );

    // PDF
    $publication->add_field( array(
        'name' => esc_html__( 'PDF Download', 'ukmtheme' ),
        'desc' => esc_html__( 'Enable PDF download', 'ukmtheme' ),
        'id'   => 'ut_publication_pdf_enable',
        'type' => 'checkbox',
    ) );

    $publication->add_field( array(
        'name'  => esc_html__( 'PDF File / URL Link', 'ukmtheme' ),
        'desc'  => esc_html__( 'Upload PDF file or enter file URL.', 'ukmtheme' ),
        'id'    => 'ut_publication_pdf',
        'type'  => 'file',
        'allow' => array( 'url' ),
    ) );

}

// Hook CMB2
add_action( 'cmb2_init', 'ukmtheme_publication_metaboxes' );

/**
 * Simpan status aktif/tak aktif bagi tab penerbitan secara eksplisit ('on' atau 'off')
 */
function ukmtheme_save_publication_tabs_status( $post_id ) {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }
    if ( ! isset( $_POST['action'] ) || $_POST['action'] !== 'editpost' ) {
        return;
    }

    for ( $i = 1; $i <= 4; $i++ ) {
        $key = 'ut_publication_tab' . $i . '_active';
        if ( isset( $_POST[ $key ] ) ) {
            update_post_meta( $post_id, $key, 'on' );
        } else {
            update_post_meta( $post_id, $key, 'off' );
        }
    }
}
add_action( 'save_post_publication', 'ukmtheme_save_publication_tabs_status', 20 );
