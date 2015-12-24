<?php
/**
 * Created by PhpStorm.
 * User: Tu TV
 * Date: 10/12/2015
 * Time: 1:35 AM
 */

/**
 * Adds Restaurant_WP_Social_Widget widget.
 */
class Restaurant_WP_Social_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'reswp_social_widget', // Base ID
			__( 'Restaurant WP: Socials', 'restaurant-wp' ), // Name
			array( 'description' => esc_html__( 'Restaurant WP: Socials', 'restaurant-wp' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		?>
		<div class="social-links">
			<ul class="list-links">
				<?php
				if ( $instance['facebook'] != '' ) {
					echo '<li><a class="facebook followLink" href="' . $instance['facebook'] . '"><i class="fa fa-facebook"></i></a></li>';
				}
				if ( $instance['twitter'] != '' ) {
					echo '<li><a class="twitter followLink" href="' . $instance['twitter'] . '"><i class="fa fa-twitter"></i></a></li>';
				}
				if ( $instance['skype'] != '' ) {
					echo '<li><a class="skype followLink" href="' . $instance['skype'] . '"><i class="fa fa-skype"></i></a></li>';
				}
				if ( $instance['pinterest'] != '' ) {
					echo '<li><a class="pinterest followLink" href="' . $instance['pinterest'] . '"><i class="fa fa-pinterest"></i></a></li>';
				}
				if ( $instance['tripadvisor'] != '' ) {
					echo '<li><a class="tripadvisor followLink" href="' . $instance['tripadvisor'] . '"><i class="fa fa-tripadvisor"></i></a></li>';
				}
				?>
			</ul>
		</div>
		<?php
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$facebook = ! empty( $instance['facebook'] ) ? $instance['facebook'] : esc_html__( '', 'restaurant-wp' );
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'facebook' ); ?>"><?php esc_html_e( 'Facebook URL:', 'restaurant-wp' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'facebook' ); ?>" name="<?php echo $this->get_field_name( 'facebook' ); ?>" type="text" value="<?php echo esc_attr( $facebook ); ?>">
		</p>
		<?php

		$twitter = ! empty( $instance['twitter'] ) ? $instance['twitter'] : esc_html__( '', 'restaurant-wp' );
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'twitter' ); ?>"><?php esc_html_e( 'Twitter URL:', 'restaurant-wp' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'twitter' ); ?>" name="<?php echo $this->get_field_name( 'twitter' ); ?>" type="text" value="<?php echo esc_attr( $twitter ); ?>">
		</p>
		<?php

		$skype = ! empty( $instance['skype'] ) ? $instance['skype'] : esc_html__( '', 'restaurant-wp' );
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'skype' ); ?>"><?php esc_html_e( 'Skype URL:', 'restaurant-wp' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'skype' ); ?>" name="<?php echo $this->get_field_name( 'skype' ); ?>" type="text" value="<?php echo esc_attr( $skype ); ?>">
		</p>
		<?php

		$pinterest = ! empty( $instance['pinterest'] ) ? $instance['pinterest'] : esc_html__( '', 'restaurant-wp' );
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'pinterest' ); ?>"><?php esc_html_e( 'Pinterest URL:', 'restaurant-wp' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'pinterest' ); ?>" name="<?php echo $this->get_field_name( 'pinterest' ); ?>" type="text" value="<?php echo esc_attr( $pinterest ); ?>">
		</p>
		<?php

		$tripadvisor = ! empty( $instance['tripadvisor'] ) ? $instance['tripadvisor'] : esc_html__( '', 'restaurant-wp' );
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'tripadvisor' ); ?>"><?php esc_html_e( 'Tripadvisor URL:', 'restaurant-wp' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'tripadvisor' ); ?>" name="<?php echo $this->get_field_name( 'tripadvisor' ); ?>" type="text" value="<?php echo esc_attr( $tripadvisor ); ?>">
		</p>
		<?php
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance                = array();
		$instance['facebook']    = ! empty( $new_instance['facebook'] ) ? strip_tags( $new_instance['facebook'] ) : '';
		$instance['twitter']     = ! empty( $new_instance['twitter'] ) ? strip_tags( $new_instance['twitter'] ) : '';
		$instance['skype']       = ! empty( $new_instance['skype'] ) ? strip_tags( $new_instance['skype'] ) : '';
		$instance['pinterest']   = ! empty( $new_instance['pinterest'] ) ? strip_tags( $new_instance['pinterest'] ) : '';
		$instance['tripadvisor'] = ! empty( $new_instance['tripadvisor'] ) ? strip_tags( $new_instance['tripadvisor'] ) : '';

		return $instance;
	}
} // class Restaurant_WP_Social_Widget

// register Restaurant_WP_Social_Widget widget
function restaurant_wp_social_widget() {
	register_widget( 'Restaurant_WP_Social_Widget' );
}

add_action( 'widgets_init', 'restaurant_wp_social_widget' );