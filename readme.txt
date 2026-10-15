=== UKM Twenty Seventeen ===
Contributors: Jamaludin Rajalu
Tags: ukm, hybrid-theme, block-editor, full-site-editing, custom-post-types, uikit3, elementor, cmb2, education, university, two-columns, three-columns, right-sidebar, custom-menu, custom-logo, featured-images, translation-ready
Requires at least: 6.3
Tested up to: 6.7
Requires PHP: 8.0
Stable tag: 2026.1015
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Tema WordPress Hibrid rasmi bagi laman web Universiti Kebangsaan Malaysia (UKM). Menyokong Full Site Editing (FSE) / Block Editor untuk halaman standard dan templat PHP Klasik untuk Custom Post Types.

== Description ==

UKM Twenty Seventeen adalah tema WordPress rasmi hibrid yang direka khas untuk portal, fakulti, institut, dan pusat di Universiti Kebangsaan Malaysia (UKM).

Tema ini menggabungkan kecekapan reka bentuk moden berasaskan Gutenberg / Block Editor (FSE) bersama keanjalan templat klasik (Classic PHP) bagi mengurus pelbagai Jenis Pos Tersuai (Custom Post Types) berkaitan keperluan institusi universiti.

= Ciri-ciri Utama =

* **Seni Bina Hibrid (Hybrid Architecture)**: Menggunakan `theme.json` (versi 3) dengan palet warna rasmi UKM, tipografi standard ("Poppins" & "Inter"), serta sokongan blok penuh (align-wide, block styles, responsive embeds).
* **13 Jenis Pos Tersuai (CPT) & Taksonomi**:
  - **Berita (News)**: Pengurusan berita universiti dengan taksonomi Kategori Berita (`newscat`).
  - **Direktori Staf (Staff)**: Profil staf akademik/pentadbiran dengan taksonomi Jabatan (`department`) dan Jawatan (`position`).
  - **Galeri Foto (Gallery)**: Koleksi album foto aktiviti dengan taksonomi Kategori Galeri (`galcat`).
  - **Soalan Lazim (FAQ)**: Arkib soal jawab dengan taksonomi Kategori FAQ (`faqcat`).
  - **Penerbitan (Publication)**: Senarai penerbitan ilmiah dan jurnal dengan taksonomi Kategori Penerbitan (`pubcat`).
  - **Kenyataan Media (Press)**: Arkib keratan akhbar dan siaran media.
  - **Persidangan (Conference)**: Pengumuman persidangan, seminar, dan kolokium.
  - **Galeri Video (Video)**: Senarai video dengan taksonomi Kategori Video (`vidcat`).
  - **Kelestarian (Kelestarian)**: Inisiatif kampus hijau & kelestarian dengan taksonomi Kategori (`lestaricat`) dan Tahun (`lestariyear`).
  - **Penghargaan (Penghargaan)**: Paparan anugerah dan pencapaian warga universiti.
  - **Kepakaran (Expertise)**: Pengkalan data kepakaran penyelidik/pensyarah.
  - **Slideset & Slideshow**: Banner dinamik hadapan.
* **UIkit 3 Framework**: Dibina bersama kerangka UIkit 3 untuk susun atur grid, kad, modal, off-canvas, dan animasi yang ringan serta pantas.
* **Metabox Terstruktur (CMB2)**: Integrasi medan borang khas untuk setiap jenis pos tersuai.
* **Widget Khas UKM**:
  - UKM Address & Social Media
  - UKM Appreciation (Penghargaan)
  - UKM Event Calendar
  - UKM News List
  - UKM Operating Hours (Waktu Operasi)
  - UKM Visitor Counter
* **Templat Halaman Pelbagai**:
  - Templat Piawai (Default Template)
  - Halaman Penuh / Lebar (Page Wide)
  - Halaman Tanpa Header/Footer (Page Blank)
  - Halaman Bersama Sidebar (Page with Sidebar)
  - Pembina Susun Atur (Page Layout Builder)
* **Sokongan Pembina Laman (Page Builders)**: Serasi sepenuhnya dengan Block Editor (Gutenberg), Elementor, dan Header Footer Elementor.
* **Kemas Kini Automatik (PUC)**: Dilengkapi dengan Plugin Update Checker (v5) untuk penerimaan kemas kini terus daripada repositori GitHub mmUKM.

== Installation ==

1. Muat turun fail arkib tema `.zip` daripada repositori GitHub atau keluaran rasmi.
2. Log masuk ke papan pemuka WordPress (Dashboard).
3. Navigasi ke **Appearance (Rupa)** > **Themes (Tema)** > **Add New (Tambah Baharu)** > **Upload Theme (Muat Naik Tema)**.
4. Pilih fail `.zip` tema dan klik **Install Now (Pasang Sekarang)**.
5. Klik **Activate (Aktifkan)** setelah selesai pemasangan.
6. Pasang plugin yang diperlukan seperti yang dipaparkan dalam notis admin:
   - **CMB2** (Wajib - untuk metabox data CPT).
   - **Elementor** (Pilihan - jika membina halaman secara visual).
   - **Header Footer Elementor** (Pilihan).
   - **Simple Page Ordering** (Pilihan - untuk susun halaman/pos secara seret & lepas).

== Frequently Asked Questions ==

= Adakah tema ini memerlukan plugin tambahan? =
Ya, tema ini memerlukan plugin **CMB2** untuk membolehkan pengisian medan khas (custom fields) pada Direktori Staf, Berita, Galeri, dan pos tersuai lain.

= Bagaimana cara mengemaskini tema ini? =
Tema ini mengandungi integrasi Plugin Update Checker (PUC). Apabila versi baharu dimuat naik ke repositori GitHub, anda akan menerima notis kemas kini terus pada papan pemuka WordPress anda di bawah menu **Dashboard** > **Updates**.

= Bagaimana menyesuaikan logo dan warna korporat UKM? =
Pergi ke **Appearance** > **Customize** (Penyesuai). Anda boleh memuat naik logo, menetapkan saiz tajuk portal, mengatur media sosial, dan memilih warna aksen mengikut panduan identiti visual UKM.

== Custom Post Types ==

1. **news**: Arkib berita universiti (Taxonomy: `newscat`).
2. **staff**: Direktori direktori warga kerja UKM (Taxonomies: `department`, `position`).
3. **gallery**: Album gambar dan aktiviti (Taxonomy: `galcat`).
4. **faq**: Soalan lazim pengguna (Taxonomy: `faqcat`).
5. **publication**: Senarai terbitan berkala, buku, dan jurnal (Taxonomy: `pubcat`).
6. **press**: Keratan akhbar dan siaran media.
7. **conference**: Info persidangan dan simposium.
8. **video**: Koleksi video rasmi (Taxonomy: `vidcat`).
9. **kelestarian**: Dokumentasi kelestarian kampus (Taxonomies: `lestaricat`, `lestariyear`).
10. **penghargaan**: Koleksi anugerah universiti.
11. **expertise**: Direktori bidang kepakaran.
12. **slideshow**: Banner slaid utama.
13. **slideset**: Slaid carousel bertema.

== Widgets & Sidebars ==

Tema menyediakan beberapa kawasan widget dinamik:
* **Primary Sidebar**: Sidebar utama untuk pos dan halaman bertemplat sidebar.
* **Frontpage Layout Builder**: Kawasan widget utama untuk membina halaman muka depan.
* **Frontpage 3 Block**: 3 ruang kad media di muka depan.
* **Frontpage 2 Block**: 2 ruang blok tambahan di bawah seksyen berita.
* **Off Canvas Widget**: Ruang kandungan sampingan mudah alih dan penukar bahasa.
* **Footer (Kolum 1, 2, 3)**: Alamat, pautan pantas, dan senarai pautan rujukan.

== Changelog ==

= 2026.1015 =
* Penstrukturan dan penambahbaikan templat arkib serta paparan tunggal buku/penerbitan (Publication).
* Penyelarasan dan kemas kini susun atur metabox CMB2 bagi penerbitan.
* Pengemaskinian dokumentasi dan organisasi fail aset tema.

= 2026.1014 =
* Pembaharuan struktur tema hibrid dengan sokongan `theme.json` v3 (WordPress 6.3 - 6.7).
* Penstrukturan semula folder templat (`/inc/` dan `/template-parts/`).
* Naik taraf komponen UIkit 3 dan sokongan ikon moden.
* Penambahbaikan keserasian PHP 8.0, 8.1, dan 8.2+.
* Kemas kini integrasi Plugin Update Checker (PUC) ke versi 5.
* Pengoptimuman prestasi aset CSS/JS dan penjimatan saiz bundle.
* Pengemaskinian templat direktori staf, berita, arkib kelestarian, dan galeri.

= 2017.2023 =
* Kemas kini sokongan WordPress 6.x dan PHP 8.x.
* Penambahbaikan widget dan metabox CMB2.

= 2017.1.0 =
* Versi pelancaran asal berasaskan WordPress Twenty Seventeen dengan pengkhususan portal UKM.

== Copyright & Credits ==

UKM Twenty Seventeen WordPress Theme
Hak Cipta (C) Jamaludin Rajalu / Universiti Kebangsaan Malaysia.
Dilesenkan di bawah GNU General Public License v2 atau lebih baharu.

Tema ini menyertakan perisian dan pustaka pihak ketiga berikut:

* **UIkit 3**
  Lesen: MIT License
  Hak Cipta: YOOtheme GmbH
  Pautan: https://github.com/uikit/uikit

* **Plugin Update Checker (PUC)**
  Lesen: MIT License
  Hak Cipta: Jānis Elsts
  Pautan: https://github.com/YahnisElsts/plugin-update-checker

* **YouTube TV (YTV)**
  Lesen: MIT License
  Hak Cipta: Albert Nadell
  Pautan: https://github.com/albertnadell/YouTube-TV

* **Inter & Poppins Fonts**
  Lesen: SIL Open Font License (OFL)
  Pautan: https://fonts.google.com