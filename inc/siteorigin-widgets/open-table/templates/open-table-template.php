<?php
$title         = $instance['title'];
$country       = $instance['country'];
$restaurant_ID = $instance['resID'];
?>
<div class="opentable-form">
	<div class="article_heading">
		<?php if ( isset( $instance['sub_title'] ) ) {
			echo '<div class="heading_secondary">' . $instance['sub_title'] . '</div>';
		} ?>
		<h2 class="heading_primary"><?php echo ent2ncr( $title ) ?></h2>
	</div>
	<?php if ( isset( $instance['desc'] ) ) {
		echo '<p class="description">' . $instance['desc'] . '</p>';
	} ?>
	<?php if ( ! empty( $restaurant_ID ) && intval( $restaurant_ID ) ) : ?>
		<form method="get" class="otw-widget-form" action="http://www.opentable.<?php echo ent2ncr( $country ); ?>/restaurant-search.aspx" target="_blank">
			<div class="otw-wrapper row">
				<div class="otw-date-li col-sm-3">
					<input id="date-otreservations" name="startDate" class="otw-reservation-date form-control" type="text" value="" autocomplete="off" placeholder="<?php _e( 'Date', 'restaurant-wp' ) ?>">
				</div>
				<div class="otw-time-wrap col-sm-3">
					<select id="time-otreservations" name="ResTime" class="otw-reservation-time selectpicker form-control">
						<?php
						//Time Loop
						$inc   = 30 * 60;
						$start = ( strtotime( '12:00AM' ) ); // 6  AM
						$end   = ( strtotime( '11:30PM' ) ); // 10 PM
						for ( $i = $start; $i <= $end; $i += $inc ) {
							// to the standart format
							$time      = date( 'g:i a', $i );
							$timeValue = date( 'g:ia', $i );
							$default   = "7:00pm";
							echo "<option value=\"$timeValue\" " . ( ( $timeValue == $default ) ? ' selected="selected" ' : "" ) . ">$time</option>" . PHP_EOL;
						}

						?>
					</select>

				</div>
				<div class="otw-party-size-wrap col-sm-3">
					<!--					<label for="party-otreservations">--><?php //echo( !empty( $labels ) ? __( 'Party Size', 'restaurant-wp' ) : '<i class="icon-user"></i>' ) ?><!--</label>-->
					<select id="party-otreservations" name="partySize" class="otw-party-size-select selectpicker form-control">
						<!--						<option value="">--><?php //_e( 'Guest Number', 'restaurant-wp' ); ?><!--</option>-->
						<option value="1"><?php _e( '1 Person', 'restaurant-wp' ); ?></option>
						<option value="2" selected="selected"><?php _e( '2 People', 'restaurant-wp' ); ?></option>
						<option value="3"><?php _e( '3 People', 'restaurant-wp' ); ?></option>
						<option value="4"><?php _e( '4 People', 'restaurant-wp' ); ?></option>
						<option value="5"><?php _e( '5 People', 'restaurant-wp' ); ?></option>
						<option value="6"><?php _e( '6 People', 'restaurant-wp' ); ?></option>
						<option value="7"><?php _e( '7 People', 'restaurant-wp' ); ?></option>
						<option value="8"><?php _e( '8 People', 'restaurant-wp' ); ?></option>
						<option value="9"><?php _e( '9 People', 'restaurant-wp' ); ?></option>
						<option value="10"><?php _e( '10 People', 'restaurant-wp' ); ?></option>
						<option value="11"><?php _e( '11 People', 'restaurant-wp' ); ?></option>
						<option value="12"><?php _e( '12 People', 'restaurant-wp' ); ?></option>
						<option value="13"><?php _e( '13 People', 'restaurant-wp' ); ?></option>
						<option value="14"><?php _e( '14 People', 'restaurant-wp' ); ?></option>
						<option value="15"><?php _e( '15 People', 'restaurant-wp' ); ?></option>
						<option value="16"><?php _e( '16 People', 'restaurant-wp' ); ?></option>
						<option value="17"><?php _e( '17 People', 'restaurant-wp' ); ?></option>
						<option value="18"><?php _e( '18 People', 'restaurant-wp' ); ?></option>
						<option value="19"><?php _e( '19 People', 'restaurant-wp' ); ?></option>
						<option value="20"><?php _e( '20 People', 'restaurant-wp' ); ?></option>
					</select>
				</div>

				<div class="otw-button-wrap col-sm-3">
					<input type="submit" class="otreservations-submit btn btn-block" value="<?php _e( 'BOOK A TABLE', 'restaurant-wp' ); ?>" />
				</div>
				<input type="hidden" name="RestaurantID" class="RestaurantID" value="<?php echo ent2ncr( $restaurant_ID ); ?>">
				<input type="hidden" name="rid" class="rid" value="<?php echo ent2ncr( $restaurant_ID ); ?>">
				<input type="hidden" name="GeoID" class="GeoID" value="15">
				<input type="hidden" name="txtDateFormat" class="txtDateFormat" value="<?php echo ! empty( $date_format ) ? $date_format : "MM/DD/YYYY"; ?>">
				<input type="hidden" name="RestaurantReferralID" class="RestaurantReferralID" value="<?php echo ent2ncr( $restaurant_ID ); ?>">

			</div>
		</form>
		<span class="otreservations-sub_title"><?php _e( 'Powered by OpenTable', 'restaurant-wp' ) ?></span>
	<?php else : ?>
		<span class="otreservations-error"><?php _e( 'You need to provide us with a valid numeric OpenTable restaurant ID.', 'restaurant-wp' ) ?></span>
	<?php endif; ?>
</div>