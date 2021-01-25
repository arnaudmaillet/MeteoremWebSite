<?php
/**
 * Loop start template
 */
$options   = $this->get_advanced_carousel_options();
$title_tag = $this->get_settings_for_display( 'title_html_tag' );

?>
<div class="jet-carousel jet-carousel elementor-slick-slider" data-slider_options="<?php echo htmlspecialchars( json_encode( $options ) ); ?>" dir="ltr">