<?php

/**
 * Class JPFT_Share_Taringa
 *
 * @since 0.0.7
 */
class JPFT_Share_Taringa extends Sharing_Source {
	public $shortname = 'taringa';
	public $genericon = '';

	public function __construct( $id, array $settings ) {
		parent::__construct( $id, $settings );

		$this->smart = 'official' == $this->button_style;
	}

	public function get_name() {
		return 'Taringa';
	}

	public function get_display( $post ) {
		if ( $this->smart ) {
			return '<t:sharer data-url="' . rawurlencode( $this->get_share_url( $post->ID ) ) . '" data-layout="medium_simple"></t:sharer>';
		} else {
			return $this->get_link( $this->get_process_request_url( $post->ID ), esc_html_x( 'Taringa', 'share to', 'jetpack' ), esc_html__( 'Click to share on Taringa', 'jetpack' ), 'share=taringa' );
		}
	}

	public function get_sharejs() {
		return plugins_url( 'js/share.js', JPFT__PLUGIN_FILE );
	}

	public function process_request( $post, array $post_data ) {
		$taringa_url = 'http://taringa.net/widgets/share.php?url=' . rawurlencode( $this->get_share_url( $post->ID ) );

		// Record stats
		parent::process_request( $post, $post_data );

		// Redirect to Taringa
		wp_redirect( $taringa_url );
		die();
	}

	public function display_footer() {
		if ( $this->smart ) {
			echo '<script type="text/javascript">(function(){var x=document.createElement(\'script\'),s=document.getElementsByTagName(\'script\')[0];x.async=true;x.src=\'' . $this->get_sharejs() . '\';s.parentNode.insertBefore(x,s)})()</script>';
		} else {
			$this->js_dialog( $this->shortname, array( 'height' => 350 ) );
		}
	}
}