<?php

/**
 * Widget Name: Restaurant Menu
 * Description: Widget for Restaurant Menu
 * Author: WPArena
 * Author URI: wparena.com
 *
 * Class RESWP_Restaurant_Menu_Widget
 *
 * @package Restaurant_WP
 */
class RESWP_Restaurant_Menu_Widget extends SiteOrigin_Widget {
	function __construct() {
		$form_options = array(
			'some_tinymce_editor'     => array(
				'type'           => 'tinymce',
				'label'          => __( 'Visually edit, richly.', 'restaurant-wp' ),
				'default'        => 'An example of a long message.</br>It is even possible to add a few html tags.</br><a href="siteorigin.com" target="_blank"">Links!</a>',
				'rows'           => 10,
				'default_editor' => 'html',
				'button_filters' => array(
					'mce_buttons'        => array( $this, 'filter_mce_buttons' ),
					'mce_buttons_2'      => array( $this, 'filter_mce_buttons_2' ),
					'mce_buttons_3'      => array( $this, 'filter_mce_buttons_3' ),
					'mce_buttons_4'      => array( $this, 'filter_mce_buttons_5' ),
					'quicktags_settings' => array( $this, 'filter_quicktags_settings' ),
				),
			),
			'some_text'               => array(
				'type'    => 'text',
				'label'   => __( 'Some text goes here', 'restaurant-wp' ),
				'default' => 'Some default text.'
			),
			'some_url'                => array(
				'type'    => 'link',
				'label'   => __( 'Some URL goes here', 'restaurant-wp' ),
				'default' => 'http://www.example.com'
			),
			'some_color'              => array(
				'type'    => 'color',
				'label'   => __( 'Choose a color', 'restaurant-wp' ),
				'default' => '#bada55'
			),
			'some_number'             => array(
				'type'    => 'number',
				'label'   => __( 'Enter a number', 'restaurant-wp' ),
				'default' => '12654'
			),
			'some_long_message'       => array(
				'type'    => 'textarea',
				'label'   => __( 'Type a message', 'restaurant-wp' ),
				'default' => 'An example of a long message.</br>It is even possible to add a few html tags.</br><a href="siteorigin.com" target="_blank"">Links!</a></br><strong>Strong</strong> and <em>emphasized</em> text.',
				'rows'    => 5
			),
			'some_number_in_a_range'  => array(
				'type'    => 'slider',
				'label'   => __( 'Choose a number', 'restaurant-wp' ),
				'default' => 24,
				'min'     => 0,
				'max'     => 42
			),
			'some_selection'          => array(
				'type'    => 'select',
				'label'   => __( 'Choose a thing from a long list of things', 'restaurant-wp' ),
				'default' => 'the_other_thing',
				'options' => array(
					'this_thing'      => __( 'This thing', 'restaurant-wp' ),
					'that_thing'      => __( 'That thing', 'restaurant-wp' ),
					'the_other_thing' => __( 'The other thing', 'restaurant-wp' ),
					'thing_1'         => __( 'Thing One', 'restaurant-wp' ),
					'thing_2'         => __( 'Thing Two', 'restaurant-wp' ),
					'thing_3'         => __( 'Thing Three', 'restaurant-wp' ),
					'thing_4'         => __( 'Thing Four', 'restaurant-wp' ),
					'thing_5'         => __( 'Thing Five', 'restaurant-wp' ),
					'thing_6'         => __( 'Thing Six', 'restaurant-wp' ),
					'thing_7'         => __( 'Thing Seven', 'restaurant-wp' ),
					'thing_8'         => __( 'Thing Eight', 'restaurant-wp' ),
					'thing_9'         => __( 'Thing Nine', 'restaurant-wp' ),
					'thing_10'        => __( 'Thing Ten', 'restaurant-wp' ),
				)
			),
			'some_multiple_selection' => array(
				'type'     => 'select',
				'label'    => __( 'Choose many things from a long list of things', 'restaurant-wp' ),
				'multiple' => true,
				'default'  => 'the_other_thing',
				'options'  => array(
					'this_thing'      => __( 'This thing', 'restaurant-wp' ),
					'that_thing'      => __( 'That thing', 'restaurant-wp' ),
					'the_other_thing' => __( 'The other thing', 'restaurant-wp' ),
					'thing_1'         => __( 'Thing One', 'restaurant-wp' ),
					'thing_2'         => __( 'Thing Two', 'restaurant-wp' ),
					'thing_3'         => __( 'Thing Three', 'restaurant-wp' ),
					'thing_4'         => __( 'Thing Four', 'restaurant-wp' ),
					'thing_5'         => __( 'Thing Five', 'restaurant-wp' ),
					'thing_6'         => __( 'Thing Six', 'restaurant-wp' ),
					'thing_7'         => __( 'Thing Seven', 'restaurant-wp' ),
					'thing_8'         => __( 'Thing Eight', 'restaurant-wp' ),
					'thing_9'         => __( 'Thing Nine', 'restaurant-wp' ),
					'thing_10'        => __( 'Thing Ten', 'restaurant-wp' ),
				)
			),
			'another_selection'       => array(
				'type'    => 'select',
				'prompt'  => __( 'Choose a thing from a long list of things', 'restaurant-wp' ),
				'options' => array(
					'this_thing'      => __( 'This thing', 'restaurant-wp' ),
					'that_thing'      => __( 'That thing', 'restaurant-wp' ),
					'the_other_thing' => __( 'The other thing', 'restaurant-wp' ),
					'thing_1'         => __( 'Thing One', 'restaurant-wp' ),
					'thing_2'         => __( 'Thing Two', 'restaurant-wp' ),
					'thing_3'         => __( 'Thing Three', 'restaurant-wp' ),
					'thing_4'         => __( 'Thing Four', 'restaurant-wp' ),
					'thing_5'         => __( 'Thing Five', 'restaurant-wp' ),
					'thing_6'         => __( 'Thing Six', 'restaurant-wp' ),
					'thing_7'         => __( 'Thing Seven', 'restaurant-wp' ),
					'thing_8'         => __( 'Thing Eight', 'restaurant-wp' ),
					'thing_9'         => __( 'Thing Nine', 'restaurant-wp' ),
					'thing_10'        => __( 'Thing Ten', 'restaurant-wp' ),
				)
			),
			'some_boolean'            => array(
				'type'    => 'checkbox',
				'label'   => __( 'Allow this thing?', 'restaurant-wp' ),
				'default' => true
			),
			'radio_selection'         => array(
				'type'    => 'radio',
				'label'   => __( 'Choose a thing from a short list of things', 'restaurant-wp' ),
				'default' => 'that_thing',
				'options' => array(
					'this_thing'      => __( 'This thing', 'restaurant-wp' ),
					'that_thing'      => __( 'That thing', 'restaurant-wp' ),
					'the_other_thing' => __( 'The other thing', 'restaurant-wp' )
				)
			),
			'some_media'              => array(
				'type'     => 'media',
				'label'    => __( 'Choose a media thing', 'restaurant-wp' ),
				'choose'   => __( 'Choose image', 'restaurant-wp' ),
				'update'   => __( 'Set image', 'restaurant-wp' ),
				'library'  => 'image',//'image', 'audio', 'video', 'file'
				'fallback' => true
			),
			'some_posts'              => array(
				'type'  => 'posts',
				'label' => __( 'Some posts query', 'restaurant-wp' ),
			),
			'a_section'               => array(
				'type'   => 'section',
				'label'  => __( 'A section containing related fields.', 'restaurant-wp' ),
				'hide'   => true,
				'fields' => array(
					'grouped_text'     => array(
						'type'  => 'text',
						'label' => __( 'A grouped text field', 'restaurant-wp' )
					),
					'grouped_checkbox' => array(
						'type'  => 'checkbox',
						'label' => __( 'A grouped checkbox', 'restaurant-wp' )
					)
				)
			),
			'a_repeater'              => array(
				'type'         => 'repeater',
				'label'        => __( 'A repeating repeater.', 'restaurant-wp' ),
				'item_name'    => __( 'Repeater item', 'siteorigin-widgets' ),
				'scroll_count' => 10,
				'item_label'   => array(
					'selector'     => "[id*='repeat_text']",
					'update_event' => 'change',
					'value_method' => 'val'
				),
				'fields'       => array(
					'repeat_text'     => array(
						'type'  => 'text',
						'label' => __( 'A text field in a repeater item.', 'restaurant-wp' )
					),
					'repeat_checkbox' => array(
						'type'  => 'checkbox',
						'label' => __( 'A checkbox in a repeater item.', 'restaurant-wp' )
					)
				)
			),
			'some_widget'             => array(
				'type'  => 'widget',
				'label' => __( 'Button Widget', 'restaurant-wp' ),
				'class' => 'SiteOrigin_Widget_Button_Widget',
				'hide'  => true
			),
			'some_icon'               => array(
				'type'  => 'icon',
				'label' => __( 'Select an icon', 'restaurant-wp' ),
			),
			'some_font'               => array(
				'type'  => 'font',
				'label' => __( 'Select a font', 'restaurant-wp' ),
			),
			'some_date'               => array(
				'type'     => 'text',
				'label'    => __( 'Some date goes here', 'restaurant-wp' ),
				'sanitize' => 'date',
			),
		);

		add_filter( 'siteorigin_widgets_sanitize_field_date', array( $this, 'sanitize_date' ) );

		parent::__construct(
			'reswp_restaurant_menu_widget',
			__( 'Restaurant Menu', 'restaurant-wp' ),
			array(
				'description' => __( 'A blank widget which simply demonstrates the use of all the widget admin form fields.', 'restaurant-wp' ),
			),
			array(),
			$form_options,
			plugin_dir_path( __FILE__ )
		);
	}

	function filter_mce_buttons( $buttons, $editor_id ) {
		if ( ( $key = array_search( 'fullscreen', $buttons ) ) !== false ||
			( $key = array_search( 'dfw', $buttons ) ) !== false
		) {
			unset( $buttons[$key] );
		}

		return $buttons;
	}

	function filter_mce_buttons_2( $buttons, $editor_id ) {
		if ( ( $key = array_search( 'fullscreen', $buttons ) ) !== false ||
			( $key = array_search( 'dfw', $buttons ) ) !== false
		) {
			unset( $buttons[$key] );
		}

		return $buttons;
	}

	function filter_mce_buttons_3( $buttons, $editor_id ) {
		if ( ( $key = array_search( 'fullscreen', $buttons ) ) !== false ||
			( $key = array_search( 'dfw', $buttons ) ) !== false
		) {
			unset( $buttons[$key] );
		}

		return $buttons;
	}

	function filter_mce_buttons_4( $buttons, $editor_id ) {
		if ( ( $key = array_search( 'fullscreen', $buttons ) ) !== false ||
			( $key = array_search( 'dfw', $buttons ) ) !== false
		) {
			unset( $buttons[$key] );
		}

		return $buttons;
	}

	public function quicktags_settings( $settings, $editor_id ) {
		$settings['buttons'] = preg_replace( '/,fullscreen/', '', $settings['buttons'] );
		$settings['buttons'] = preg_replace( '/,dfw/', '', $settings['buttons'] );

		return $settings;
	}

	function sanitize_date( $date_to_sanitize ) {
		// Perform custom date sanitization here.
		$sanitized_date = sanitize_text_field( $date_to_sanitize );

		return $sanitized_date;
	}

	function get_template_name( $instance ) {
		return 'restaurant-menu';
	}

	function get_template_dir( $instance ) {
		return 'templates';
	}

	function get_style_name( $instance ) {
		return '';
	}
}

siteorigin_widget_register( 'reswp_restaurant_menu_widget', __FILE__, 'RESWP_Restaurant_Menu_Widget' );