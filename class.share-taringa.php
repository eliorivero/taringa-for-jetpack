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

		if ( 'official' == $this->button_style ) {
			$this->smart = true;
		} else {
			$this->smart = false;
		}
	}

	public function get_name() {
		return 'Taringa';
	}

	public function get_display( $post ) {
		if ( $this->smart ) {
			return '<script type="text/javascript">(function(){var x=document.createElement(\'script\'), s=document.getElementsByTagName(\'script\')[0];x.async=true;x.src=\'' . $this->http() . '://widgets.itaringa.net/share.js\';s.parentNode.insertBefore(x,s)})()</script>
<t:sharer data-url="' . rawurlencode( $this->get_share_url( $post->ID ) ) . '" data-layout="medium_simple"></t:sharer>';
		} else {
			return $this->get_link( $this->get_process_request_url( $post->ID ), esc_html_x( 'Taringa', 'share to', 'jetpack' ), esc_html__( 'Click to share on Taringa', 'jetpack' ), 'share=taringa' );
		}
	}

	public function process_request( $post, array $post_data ) {
		$taringa_url = $this->http() . '://taringa.com/submit?url=' . rawurlencode( $this->get_share_url( $post->ID ) ) . '&title=' . rawurlencode( $this->get_share_title( $post->ID ) );

		// Record stats
		parent::process_request( $post, $post_data );

		// Redirect to Taringa
		wp_redirect( $taringa_url );
		die();
	}
}