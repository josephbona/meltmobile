<?php
/**
 * Plugin Name: Melt Mobile Check-in
 * Description: Track those Melt Trucks
 * Version: 1.0.0
 * Author: neeaagh, josephbona
 * Author URI: http://drivenlocal.com
 */

defined('ABSPATH') or die("Direct access blocked!");

function checkin_menu() {
	add_menu_page('Truck Location', 'Truck Location', 'manage_options', 'melt-checkin', 'melt_checkin_page', 'dashicons-location', 2);
}

function melt_checkin_scripts() {
	wp_register_style('melt_scripts', plugins_url('css/style.css',__FILE__ ));
	wp_enqueue_style('melt_scripts');
}
add_action( 'admin_init','melt_checkin_scripts');

function melt_checkin_page() {
	gmw_include_google_places_api();
	gmw_google_address_autocomplete();
	?>
	<div class="melt-check-in-page">
	<div class="wrap">
		<h2>Set Your Truck Location!</h2>
		<p class="description">
			Location info entered here will update your truck's location on the map.
		</p>
	</div>
	<div class="postbox-container">
	<div class="metabox-holder">
	    <div class="postbox">
	        <div class="inside">
	        	<h3><span>Set Truck Location</span></h3>
				<form method="post" action="options.php" onkeypress="return event.keyCode != 13;">
			    	<?php
			    		settings_fields( 'melt-checkin-settings-group' );
			    		do_settings_sections( 'melt-checkin-settings-group' );
			    		$street_address = esc_attr( get_option( 'melt-street-address' ) );
			    		$city = esc_attr( get_option( 'melt-city' ) );
			    		$state = esc_attr( get_option( 'melt-state' ) );
			    		$zipcode = esc_attr( get_option( 'melt-zipcode' ) );
			    		$latitude = esc_attr( get_option( 'melt-checkin-lat' ) );
			    		$longitude = esc_attr( get_option( 'melt-checkin-long' ) );
			    		$location_id = esc_attr( get_option( 'melt-checkin-location-id' ) );

			    		update_truck_location($latitude, $longitude, $location_id, $street_address, $city, $state, $zipcode);

						echo '<p>';
						echo '<label for="melt-checkin-map-autocomplete">Enter Address</label>';
					    echo '<input type="text" class="textinput" name="melt-checkin-map-autocomplete" id="melt-checkin-map-autocomplete" />';
					    echo '</p>';
					    echo '<h3><span>Location Details</span></h3>';
						echo '<p>';
						echo '<label for="melt-street-address">Street Address</label>';
					    echo '<input type="text" class="textinput" name="melt-street-address" id="melt-street-address" value="'.$street_address.'" />';
					    echo '</p>';
					    echo '<p>';
						echo '<label for="melt-city">City</label>';
					    echo '<input type="text" class="textinput" name="melt-city" id="melt-city" value="'.$city.'" />';
					    echo '</p>';
					    echo '<p>';
						echo '<label for="melt-state">State</label>';
					    echo '<input type="text" class="textinput" name="melt-state" id="melt-state" value="'.$state.'" />';
					    echo '</p>';
					    echo '<p>';
						echo '<label for="melt-zipcode">Zipcode</label>';
					    echo '<input type="text" class="textinput" name="melt-zipcode" id="melt-zipcode" value="'.$zipcode.'" />';
					    echo '</p>';
						echo '<p>';
						echo '<label for="melt-checkin-lat">Latitude</label>';
					    echo '<input type="text" class="textinput" name="melt-checkin-lat" id="melt-checkin-lat" value="'.$latitude.'" />';
					    echo '</p>';
				    	echo '<p>';
				    	echo '<label for="melt-checkin-long">Longitude</label>';
				        echo '<input type="text" class="textinput" name="melt-checkin-long" id="melt-checkin-long" value="'.$longitude.'" />';
				        echo '</p>';
				        echo '<h3><span>Franchisee Location Name</span></h3>';
				        render_locations_dropdown($location_id);

						submit_button();

					?>
				</form>
			</div>
		</div>
	</div>
	</div>
	</div>
	<?
}

function render_locations_dropdown($location_id) {
	global $wpdb;
	$results = $wpdb->get_results( 'SELECT * FROM wp_wpsl_stores WHERE active = 1', OBJECT );
	echo '<p>';
	// echo '<label for="melt-checkin-location-id">' . _e( "Location Name", 'example' ) . '</label>';
	echo '<select class="widefat" name="melt-checkin-location-id" id="melt-checkin-location-id">';
	foreach ($results as $location) {
		$selected = ($location->wpsl_id == $location_id) ? "selected" : "";
		echo '<option value="'.$location->wpsl_id.'" '.$selected.'>'.$location->store.'</option>';
	}
	echo '</select>';
	echo '</p>';
}

function update_truck_location($latitude, $longitude, $location_id, $street_address, $city, $state, $zipcode) {
	if( $_REQUEST['settings-updated'] == true ) {
		global $wpdb;
		$wpdb->update(
			'wp_wpsl_stores',
			array(
				'lat' => $latitude,
				'lng' => $longitude,
				'address' => $street_address,
				'city' => $city,
				'state' => $state,
				'zip' => $zipcode
			),
			array( 'wpsl_id' => $location_id ),
			array(
				'%f',
				'%f',
				'%s',
				'%s',
				'%s',
				'%d'
			),
			array( '%d' )
		);
		add_action( 'admin_notices', 'update_truck_notice' );
    }
}

function update_truck_notice() {
    ?>
    <div class="updated notice is-dismissable">
        <p><?php _e( 'Your truck location has been updated!', 'melt-check-in' ); ?></p>
    </div>
    <?php
}

function gmw_include_google_places_api() {

    //register google maps api if not already registered
    if ( !wp_script_is( 'google-maps', 'registered' ) ) {
        wp_register_script( 'google-maps', ( is_ssl() ? 'https' : 'http' ) . '://maps.googleapis.com/maps/api/js?libraries=places&sensor=false', array( 'jquery' ), false );
    }

    //enqueue google maps api if not already enqueued
    if ( !wp_script_is( 'google-maps', 'enqueued' ) ) {
        wp_enqueue_script( 'google-maps' );
    }
}

function gmw_google_address_autocomplete() {
	?>
	<script>
		jQuery(document).ready(function($) {
		function parseGoogleResponse(components) {
			var parsed_address = { street: '', number: '', city: '', state: '', zipcode: '' };
			$.each(components, function(index, component) {
				console.log(component);
				$.each(component.types, function(index2, type) {
					if (type === 'route') {
						parsed_address.street = component.long_name;
					}
					if (type === 'street_number') {
						parsed_address.number = component.long_name;
					}
					if (type === 'locality' || type == 'sublocality_level_1') {
						parsed_address.city = component.long_name;
					}
					if (type === 'administrative_area_level_1') {
						parsed_address.state = component.short_name;
					}
					if (type === 'postal_code') {
						parsed_address.zipcode = component.long_name;
					}
				})
			})

			return parsed_address;
		}
		//Array of input fields ID.
		var gacFields = ["melt-checkin-map-autocomplete"];

		$.each( gacFields, function( key, field ) {
			var input = document.getElementById(field);
			//verify the field
			if ( input != null ) {

				//basic options of Google places API.
				//see this page https://developers.google.com/maps/documentation/javascript/places-autocomplete
				//for other avaliable options
				var options = {
					types: ['geocode', 'establishment'],
				};

				var autocomplete = new google.maps.places.Autocomplete(input, options);

				google.maps.event.addListener(autocomplete, 'place_changed', function(e) {

					var place = autocomplete.getPlace();

					var parsed_address = parseGoogleResponse(place.address_components);

					if (!place.geometry) {
						return;
					}
					else {
						$('#melt-checkin-lat').val(place.geometry.location.lat());
						$('#melt-checkin-long').val(place.geometry.location.lng());
						$('#melt-street-address').val(parsed_address.number + " " + parsed_address.street);
						$('#melt-city').val(parsed_address.city);
						$('#melt-state').val(parsed_address.state);
						$('#melt-zipcode').val(parsed_address.zipcode);
					}
				});
			}
		});
	});
    </script>
    <?php
}

function register_melt_checkin_settings() {
	register_setting( 'melt-checkin-settings-group', 'melt-checkin-lat');
	register_setting( 'melt-checkin-settings-group', 'melt-checkin-long');
	register_setting( 'melt-checkin-settings-group', 'melt-checkin-location-id');
	register_setting( 'melt-checkin-settings-group', 'melt-street-address');
	register_setting( 'melt-checkin-settings-group', 'melt-city');
	register_setting( 'melt-checkin-settings-group', 'melt-state');
	register_setting( 'melt-checkin-settings-group', 'melt-zipcode');
}

if ( is_admin() ){
	add_action( 'admin_menu', 'checkin_menu' );
	add_action( 'admin_init', 'register_melt_checkin_settings' );
}

?>