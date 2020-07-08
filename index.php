<?php // Silence is golden

add_action( 'wp_dashboard_setup', 'ci_dashboard_add_widgets' );
function ci_dashboard_add_widgets() {
	wp_add_dashboard_widget( 'dw_dashboard_widget_news', __( 'CSSIgniter News', 'dw' ), 'dw_dashboard_widget_news_handler' );
}

function dw_dashboard_widget_news_handler() {
	_e( 'This is some text.', 'dw' );
}