<?php
class Elementor_UKMTheme_Video_Channel extends \Elementor\Widget_Base {

	public function get_name() {
		return 'ukmtheme_video_channel';
	}

	public function get_title() {
		return esc_html__( 'UKM: Video Channel', 'elementor-addon' );
	}

	public function get_icon() {
		return 'eicon-video-playlist';
	}

	public function get_categories() {
		return [ 'basic' ];
	}

	public function get_keywords() {
		return [ 'hello', 'world' ];
	}

    protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'ukmtheme' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'channel',
			[
				'label' => esc_html__( 'Channel ID', 'ukmtheme' ),
                'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'user&#58;&nbsp;&#39;ptmukm&#39;', 'ukmtheme' ),
				'placeholder' => esc_html__( 'user&#58;&nbsp;&#39;ptmukm&#39;', 'ukmtheme' ),
                'description' => esc_html__( 'Semak sama ada channel anda menggunakan username atau ID. Ubah user&#58;&nbsp;&#39;namauser&#39; kepada channelId&#58;&nbsp;&#39;UCXXXXXXXXXXXXXXXXXXXXXX&#39; ', 'ukmtheme' ),
            ]
		);

		$this->end_controls_section();

	}

	protected function render() {

		?>  
        
            <div class="wrap uk-padding">
                <div id="ptmukm-tv-responsive"></div>
                <script>
                    window.onload = function(){
                        
                        window.controller = new YTV('ptmukm-tv-responsive', {
                            <?php
                                $settings = $this->get_settings_for_display();
                                echo $settings['channel']; ?>,
                            accent: '#ffa500',
                            browsePlaylists: true,
                            autoplay: false,
                            playerTheme: 'light',
                            listTheme: 'light',
                            responsive: true
                        });
                
                    };
                </script>
            </div>

    <?php } //END YOUTUBE PLAYLIST 
}