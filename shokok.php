<?php
/*
Plugin Name: Shokok
Plugin URI: http://shokok.com
description: Shokok handles the installments in the simplest way
Version: 1.2
Author: El ka7yaneen
Author URI: http://shokok.com
License: GPL2
*/
require_once 'shokok_post_types.php';
require_once 'fields_to_REST_injector.php';
require_once 'shokok_endpoints.php';

//Register Google maps to ACF
function my_acf_google_map_api($api)
{
    $api['key'] = 'AIzaSyB0KhffiMteHVLTmx5bdgG4_m2gI5YAFgw';
    return $api;
}

add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');

/*
 *The following code explains how we can store the address programatically to be a valid ACF google map field
 * This will help the mobile app developer to compose the address field before sending it to us
 */

//$value = array("address" => 'Al Faiyum Governorate Desert, Faiyum Governorate, Egypt', "lat" => 29.689972678519435, "lng" => 30.947166718749948, "zoom" => 5);
//$value = array("address" => 'Al Wadi Al Gadid Desert, New Valley Governorate, Egypt', "lat" => 24.92032795312705, "lng" => 32.22158078124995, "zoom" => 5);
//update_field('location', $value, 5);