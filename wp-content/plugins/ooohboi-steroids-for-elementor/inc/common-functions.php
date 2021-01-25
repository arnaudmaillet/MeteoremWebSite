<?php
/* Common task helpers */

if( ! defined( 'ABSPATH' ) ) exit;

$options_page = array(
	'ob-settings-page'	=> array(
        'page_title'	=> 'Steroids for Elementor', 
        'parent_slug'	=> 'options-general.php', 
		'sections'		=> array(
			'section-ob-options' => array(
                'title'			=> ' ', 
                'text'			=> sprintf( __( '<img src="%s" alt="RemPro.nl" /><br/><br/><p>The following extensions are currently available with Steroids for Elementor add-on.<br/>Enable or disable particular extension by switching it ON or OFF.</p>', 'ooohboi-steroids' ), 
                plugin_dir_url( __DIR__ ) . 'assets/img/RemPro.png' ), 
				'fields'		=> array(
					'ob_use_harakiri' => array(
						'title'			=> 'HARAKIRI',
						'type'			=> 'checkbox',
                        'text'			=> esc_attr__( 'Allows you to change the writing mode of the Heading and Text Editor widgets', 'ooohboi-steroids' ),
                        'checked'       => 1, 
                    ),
                    'ob_use_poopart' => array(
						'title'			=> 'POOPART',
						'type'			=> 'checkbox',
                        'text'			=> esc_attr__( 'Add an overlay or underlay ghost-element to any Elementor Widget', 'ooohboi-steroids' ), 
                        'checked'       => 1, 
                    ),
                    'ob_use_overlaiz' => array(
						'title'			=> 'OVERLAIZ',
						'type'			=> 'checkbox',
                        'text'			=> esc_attr__( 'An awesome set of options for the Background Overlay element manipulation', 'ooohboi-steroids' ), 
                        'checked'       => 1, 
                    ),
                    'ob_use_paginini' => array(
						'title'			=> 'PAGININI',
						'type'			=> 'checkbox',
                        'text'			=> esc_attr__( 'It allows you to style up the posts pagination in Elementor', 'ooohboi-steroids' ), 
                        'checked'       => 1, 
                    ),
                    'ob_use_breakingbad' => array(
						'title'			=> 'BREAKING BAD',
						'type'			=> 'checkbox',
                        'text'			=> esc_attr__( 'A must to have extension for the Section and Columns', 'ooohboi-steroids' ), 
                        'checked'       => 1, 
                    ),
                    'ob_use_glider' => array(
						'title'			=> 'GLIDER',
						'type'			=> 'checkbox',
                        'text'			=> esc_attr__( 'The content slider made out of Section and Columns (Swiper)', 'ooohboi-steroids' ), 
                        'checked'       => 1, 
                    ),
                    'ob_use_photogiraffe' => array(
						'title'			=> 'PHOTOGIRAFFE',
						'type'			=> 'checkbox',
                        'text'			=> esc_attr__( 'Make the Image widget full-height of the container', 'ooohboi-steroids' ), 
                        'checked'       => 1, 
                    ),
                    'ob_use_teleporter' => array(
						'title'			=> 'TELEPORTER',
						'type'			=> 'checkbox',
                        'text'			=> esc_attr__( 'The Column hover controls for an exceptional effects', 'ooohboi-steroids' ), 
                        'checked'       => 1, 
                    ),
                    'ob_use_searchcop' => array(
						'title'			=> 'SEARCH COP',
						'type'			=> 'checkbox',
                        'text'			=> esc_attr__( 'Decide what to search for; posts only, pages only or everything', 'ooohboi-steroids' ), 
                        'checked'       => 1, 
                    ),
                    'ob_use_videomasq' => array(
						'title'			=> 'VIDEOMASQ',
						'type'			=> 'checkbox',
                        'text'			=> esc_attr__( 'Add the SVG mask to the Section video background and let the video play inside any shape', 'ooohboi-steroids' ), 
                        'checked'       => 1, 
                    ),
                    'ob_use_butterbutton' => array(
						'title'			=> 'BUTTER BUTTON',
						'type'			=> 'checkbox',
                        'text'			=> esc_attr__( 'Design awesome buttons in Elementor', 'ooohboi-steroids' ), 
                        'checked'       => 1, 
                    ),
                    'ob_use_perspektive' => array(
						'title'			=> 'PERSPEKTIVE',
						'type'			=> 'checkbox',
                        'text'			=> esc_attr__( 'A small set of options that allow you to move widgets in 3D space', 'ooohboi-steroids' ), 
                        'checked'       => 1, 
                    ),
                    'ob_use_shadough' => array(
						'title'			=> 'SHADOUGH',
						'type'			=> 'checkbox',
                        'text'			=> esc_attr__( 'Create the shadow that conforms the shape', 'ooohboi-steroids' ), 
                        'checked'       => 1, 
                    ),
                    'ob_use_photomorph' => array(
						'title'			=> 'PHOTO MORPH',
						'type'			=> 'checkbox',
                        'text'			=> esc_attr__( 'Allows you to add the clip-path to the Image widget for Normal and Hover state.', 'ooohboi-steroids' ), 
                        'checked'       => 1, 
                    ),
                    'ob_use_commentz' => array(
						'title'			=> 'COMMENTZ',
						'type'			=> 'checkbox',
                        'text'			=> esc_attr__( 'Allows you to style up the post comments.', 'ooohboi-steroids' ), 
                        'checked'       => 1, 
                    ),
                    'ob_use_spacerat' => array(
						'title'			=> 'SPACERAT',
						'type'			=> 'checkbox',
                        'text'			=> esc_attr__( 'Adds new shine to the Spacer widget.', 'ooohboi-steroids' ), 
                        'checked'       => 1, 
                    ),
                    'ob_use_imbox' => array(
						'title'			=> 'IMBOX',
						'type'			=> 'checkbox',
                        'text'			=> esc_attr__( 'Image Box widget extra controls', 'ooohboi-steroids' ), 
                        'checked'       => 1, 
                    ),
                    'ob_use_hoveranimator' => array(
						'title'			=> 'HOVER ANIMATOR',
						'type'			=> 'checkbox',
                        'text'			=> esc_attr__( 'Animate widgets on columns mouse-over event', 'ooohboi-steroids' ), 
                        'checked'       => 1, 
                    ),
                    'ob_use_kontrolz' => array(
						'title'			=> 'KONTROLZ',
						'type'			=> 'checkbox',
                        'text'			=> esc_attr__( 'Allows you to additionaly style Image Carousel and Media Carousel controls', 'ooohboi-steroids' ), 
                        'checked'       => 1, 
                    ),
				),
			),
		),
	),
);
$option_page = new RationalOptionPages( $options_page );