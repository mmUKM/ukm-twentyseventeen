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
        'title'         => esc_html__( 'Maklumat Penerbitan', 'ukmtheme' ),
        'object_types'  => array( 'publication' ),
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true,
    ) );

    // ==========================================
    // TAB KANDUNGAN (TABS 1 - 4)
    // ==========================================

    // --- TAB 1 ---
    $publication->add_field( array(
        'name' => esc_html__( 'Tab 1: Keterangan', 'ukmtheme' ),
        'desc' => esc_html__( 'Tetapan untuk Tab 1', 'ukmtheme' ),
        'id'   => 'ut_publication_tab1_header',
        'type' => 'title',
    ) );

    $publication->add_field( array(
        'name'    => esc_html__( 'Aktifkan Tab 1', 'ukmtheme' ),
        'desc'    => esc_html__( 'Tandakan untuk aktifkan tab ini di halaman buku.', 'ukmtheme' ),
        'id'      => 'ut_publication_tab1_active',
        'type'    => 'checkbox',
        'default' => 'on',
    ) );

    $publication->add_field( array(
        'name'    => esc_html__( 'Tajuk Tab 1', 'ukmtheme' ),
        'desc'    => esc_html__( 'Tajuk tab (lalai: Keterangan)', 'ukmtheme' ),
        'id'      => 'ut_publication_tab1_title',
        'type'    => 'text',
        'default' => esc_html__( 'Keterangan', 'ukmtheme' ),
    ) );

    $publication->add_field( array(
        'name'    => esc_html__( 'Kandungan Tab 1', 'ukmtheme' ),
        'desc'    => esc_html__( 'Sinopsis atau keterangan lengkap penerbitan.', 'ukmtheme' ),
        'id'      => 'ut_publication_description',
        'type'    => 'wysiwyg',
        'options' => array( 'textarea_rows' => 5 ),
    ) );

    // --- TAB 2 ---
    $publication->add_field( array(
        'name' => esc_html__( 'Tab 2: Biografi', 'ukmtheme' ),
        'desc' => esc_html__( 'Tetapan untuk Tab 2', 'ukmtheme' ),
        'id'   => 'ut_publication_tab2_header',
        'type' => 'title',
    ) );

    $publication->add_field( array(
        'name'    => esc_html__( 'Aktifkan Tab 2', 'ukmtheme' ),
        'desc'    => esc_html__( 'Tandakan untuk aktifkan tab ini di halaman buku.', 'ukmtheme' ),
        'id'      => 'ut_publication_tab2_active',
        'type'    => 'checkbox',
        'default' => 'on',
    ) );

    $publication->add_field( array(
        'name'    => esc_html__( 'Tajuk Tab 2', 'ukmtheme' ),
        'desc'    => esc_html__( 'Tajuk tab (lalai: Biografi)', 'ukmtheme' ),
        'id'      => 'ut_publication_tab2_title',
        'type'    => 'text',
        'default' => esc_html__( 'Biografi', 'ukmtheme' ),
    ) );

    $publication->add_field( array(
        'name'    => esc_html__( 'Kandungan Tab 2', 'ukmtheme' ),
        'desc'    => esc_html__( 'Biografi atau latar belakang ringkas penulis.', 'ukmtheme' ),
        'id'      => 'ut_publication_biography',
        'type'    => 'wysiwyg',
        'options' => array( 'textarea_rows' => 5 ),
    ) );

    // --- TAB 3 ---
    $publication->add_field( array(
        'name' => esc_html__( 'Tab 3: Ulasan', 'ukmtheme' ),
        'desc' => esc_html__( 'Tetapan untuk Tab 3', 'ukmtheme' ),
        'id'   => 'ut_publication_tab3_header',
        'type' => 'title',
    ) );

    $publication->add_field( array(
        'name'    => esc_html__( 'Aktifkan Tab 3', 'ukmtheme' ),
        'desc'    => esc_html__( 'Tandakan untuk aktifkan tab ini di halaman buku.', 'ukmtheme' ),
        'id'      => 'ut_publication_tab3_active',
        'type'    => 'checkbox',
        'default' => 'on',
    ) );

    $publication->add_field( array(
        'name'    => esc_html__( 'Tajuk Tab 3', 'ukmtheme' ),
        'desc'    => esc_html__( 'Tajuk tab (lalai: Ulasan)', 'ukmtheme' ),
        'id'      => 'ut_publication_tab3_title',
        'type'    => 'text',
        'default' => esc_html__( 'Ulasan', 'ukmtheme' ),
    ) );

    $publication->add_field( array(
        'name'    => esc_html__( 'Kandungan Tab 3', 'ukmtheme' ),
        'desc'    => esc_html__( 'Ulasan atau reviu buku/penerbitan.', 'ukmtheme' ),
        'id'      => 'ut_publication_review',
        'type'    => 'wysiwyg',
        'options' => array( 'textarea_rows' => 5 ),
    ) );

    // --- TAB 4 ---
    $publication->add_field( array(
        'name' => esc_html__( 'Tab 4: Kandungan', 'ukmtheme' ),
        'desc' => esc_html__( 'Tetapan untuk Tab 4', 'ukmtheme' ),
        'id'   => 'ut_publication_tab4_header',
        'type' => 'title',
    ) );

    $publication->add_field( array(
        'name' => esc_html__( 'Aktifkan Tab 4', 'ukmtheme' ),
        'desc' => esc_html__( 'Tandakan untuk aktifkan tab ini di halaman buku.', 'ukmtheme' ),
        'id'   => 'ut_publication_tab4_active',
        'type' => 'checkbox',
    ) );

    $publication->add_field( array(
        'name'    => esc_html__( 'Tajuk Tab 4', 'ukmtheme' ),
        'desc'    => esc_html__( 'Tajuk tab (lalai: Kandungan)', 'ukmtheme' ),
        'id'      => 'ut_publication_tab4_title',
        'type'    => 'text',
        'default' => esc_html__( 'Kandungan', 'ukmtheme' ),
    ) );

    $publication->add_field( array(
        'name'    => esc_html__( 'Kandungan Tab 4', 'ukmtheme' ),
        'desc'    => esc_html__( 'Kandungan tambahan, senarai bab, atau maklumat lanjut.', 'ukmtheme' ),
        'id'      => 'ut_publication_tab4_content',
        'type'    => 'wysiwyg',
        'options' => array( 'textarea_rows' => 5 ),
    ) );

    // ==========================================
    // MAKLUMAT PENERBITAN
    // ==========================================
    $publication->add_field( array(
        'name' => esc_html__( 'Maklumat Buku & Penerbitan', 'ukmtheme' ),
        'id'   => 'ut_publication_details_header',
        'type' => 'title',
    ) );

    $publication->add_field( array(
        'name'  => esc_html__( 'Gambar Kulit Buku (Cover)', 'ukmtheme' ),
        'desc'  => esc_html__( 'Muat naik imej kulit buku atau masukkan URL. Saiz disyorkan: 300x380 piksel.', 'ukmtheme' ),
        'id'    => 'ut_publication_cover',
        'type'  => 'file',
        'allow' => array( 'url' ),
    ) );

    $publication->add_field( array(
        'name'         => esc_html__( 'Galeri Gambar Buku', 'ukmtheme' ),
        'desc'         => esc_html__( 'Muat naik imej untuk penukar thumbnail (Cover & Halaman Pilihan)', 'ukmtheme' ),
        'id'           => 'ut_publication_gallery',
        'type'         => 'file_list',
        'preview_size' => array( 100, 100 ),
    ) );

    $publication->add_field( array(
        'name' => esc_html__( 'Penulis', 'ukmtheme' ),
        'desc' => esc_html__( 'Contoh: Jamaludin Rajalu', 'ukmtheme' ),
        'id'   => 'ut_publication_author',
        'type' => 'text',
    ) );

    $publication->add_field( array(
        'name' => esc_html__( 'Penyunting', 'ukmtheme' ),
        'desc' => esc_html__( 'Nama penyunting jika ada. Contoh: Prof. Dr. Ismail Ahmad', 'ukmtheme' ),
        'id'   => 'ut_publication_editor',
        'type' => 'text',
    ) );

    $publication->add_field( array(
        'name' => esc_html__( 'Penerbit', 'ukmtheme' ),
        'desc' => esc_html__( 'Contoh: Penerbit Universiti Kebangsaan Malaysia', 'ukmtheme' ),
        'id'   => 'ut_publication_publisher',
        'type' => 'text',
    ) );

    $publication->add_field( array(
        'name' => esc_html__( 'Tahun Terbitan', 'ukmtheme' ),
        'desc' => esc_html__( 'Contoh: 2024', 'ukmtheme' ),
        'id'   => 'ut_publication_year',
        'type' => 'text',
    ) );

    $publication->add_field( array(
        'name' => esc_html__( 'ISBN', 'ukmtheme' ),
        'desc' => esc_html__( 'Contoh: 978-967-251-123-4', 'ukmtheme' ),
        'id'   => 'ut_publication_isbn',
        'type' => 'text',
    ) );

    $publication->add_field( array(
        'name' => esc_html__( 'Harga', 'ukmtheme' ),
        'desc' => esc_html__( 'Contoh: RM 45.00', 'ukmtheme' ),
        'id'   => 'ut_publication_price',
        'type' => 'text',
    ) );

    $publication->add_field( array(
        'name'       => esc_html__( 'Label Butang Kad (Arkib & Kategori)', 'ukmtheme' ),
        'desc'       => esc_html__( 'Label butang di halaman arkib/kategori (Lalai: Dapatkan / mengikut tetapan Penyesuai).', 'ukmtheme' ),
        'id'         => 'ut_publication_btn_label',
        'type'       => 'text',
        'attributes' => array(
            'placeholder' => esc_html__( 'Dapatkan', 'ukmtheme' ),
        ),
    ) );

    $publication->add_field( array(
        'name' => esc_html__( 'Bilangan Muka Surat', 'ukmtheme' ),
        'desc' => esc_html__( 'Contoh: 280 ms', 'ukmtheme' ),
        'id'   => 'ut_publication_pages',
        'type' => 'text',
    ) );

    $publication->add_field( array(
        'name' => esc_html__( 'Pautan Rujukan / Muat Turun', 'ukmtheme' ),
        'desc' => esc_html__( 'Contoh: https://www.ukm.my', 'ukmtheme' ),
        'id'   => 'ut_publication_reference',
        'type' => 'text_url',
    ) );

    $publication->add_field( array(
        'name' => esc_html__( 'Teks Pautan Rujukan', 'ukmtheme' ),
        'desc' => esc_html__( 'Contoh: Dapatkan Sekarang! / Klik di sini', 'ukmtheme' ),
        'id'   => 'ut_publication_renamedownload',
        'type' => 'text',
    ) );

    // ==========================================
    // PAUTAN BELI ATAU MUAT TURUN
    // ==========================================
    $publication->add_field( array(
        'name' => esc_html__( 'Pautan Beli atau Muat Turun', 'ukmtheme' ),
        'desc' => esc_html__( 'Tandakan platform yang ingin dipaparkan dan masukkan pautan URL / fail berkaitan.', 'ukmtheme' ),
        'id'   => 'ut_publication_links_header',
        'type' => 'title',
    ) );

    // Shopee
    $publication->add_field( array(
        'name' => esc_html__( 'Shopee', 'ukmtheme' ),
        'desc' => esc_html__( 'Aktifkan pautan Shopee', 'ukmtheme' ),
        'id'   => 'ut_publication_shopee_enable',
        'type' => 'checkbox',
    ) );

    $publication->add_field( array(
        'name' => esc_html__( 'Pautan Shopee (URL)', 'ukmtheme' ),
        'desc' => esc_html__( 'Contoh: https://shopee.com.my/...', 'ukmtheme' ),
        'id'   => 'ut_publication_shopee',
        'type' => 'text_url',
    ) );

    // Amazon
    $publication->add_field( array(
        'name' => esc_html__( 'Amazon', 'ukmtheme' ),
        'desc' => esc_html__( 'Aktifkan pautan Amazon', 'ukmtheme' ),
        'id'   => 'ut_publication_amazon_enable',
        'type' => 'checkbox',
    ) );

    $publication->add_field( array(
        'name' => esc_html__( 'Pautan Amazon (URL)', 'ukmtheme' ),
        'desc' => esc_html__( 'Contoh: https://www.amazon.com/...', 'ukmtheme' ),
        'id'   => 'ut_publication_amazon',
        'type' => 'text_url',
    ) );

    // Lazada
    $publication->add_field( array(
        'name' => esc_html__( 'Lazada', 'ukmtheme' ),
        'desc' => esc_html__( 'Aktifkan pautan Lazada', 'ukmtheme' ),
        'id'   => 'ut_publication_lazada_enable',
        'type' => 'checkbox',
    ) );

    $publication->add_field( array(
        'name' => esc_html__( 'Pautan Lazada (URL)', 'ukmtheme' ),
        'desc' => esc_html__( 'Contoh: https://www.lazada.com.my/...', 'ukmtheme' ),
        'id'   => 'ut_publication_lazada',
        'type' => 'text_url',
    ) );

    // e-Sentral
    $publication->add_field( array(
        'name' => esc_html__( 'e-Sentral', 'ukmtheme' ),
        'desc' => esc_html__( 'Aktifkan pautan e-Sentral', 'ukmtheme' ),
        'id'   => 'ut_publication_esentral_enable',
        'type' => 'checkbox',
    ) );

    $publication->add_field( array(
        'name' => esc_html__( 'Pautan e-Sentral (URL)', 'ukmtheme' ),
        'desc' => esc_html__( 'Contoh: https://www.e-sentral.com/...', 'ukmtheme' ),
        'id'   => 'ut_publication_esentral',
        'type' => 'text_url',
    ) );

    // PDF
    $publication->add_field( array(
        'name' => esc_html__( 'Muat Turun PDF', 'ukmtheme' ),
        'desc' => esc_html__( 'Aktifkan muat turun PDF', 'ukmtheme' ),
        'id'   => 'ut_publication_pdf_enable',
        'type' => 'checkbox',
    ) );

    $publication->add_field( array(
        'name'  => esc_html__( 'Fail PDF / Pautan URL', 'ukmtheme' ),
        'desc'  => esc_html__( 'Muat naik fail PDF atau masukkan URL fail.', 'ukmtheme' ),
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
