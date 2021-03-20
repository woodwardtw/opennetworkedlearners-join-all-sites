<?php 
/*
Plugin Name: Open Networked Learning Join Multiple Sites 2020
Plugin URI:  https://github.com/
Description: Make sure that the signup adds ppl to facilitator sites and to univ sites
Version:     1.007
Author:      Tom Woodward
Author URI:  http://bionicteaching.com
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Domain Path: /languages
Text Domain: my-toolset

*/
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

add_action( 'gform_user_registered', 'many_site_registration_save', 10, 3 );

function many_site_registration_save( $user_id, $feed, $entry) {
    $sites = array(1,24); //should get home and onl201
    $member = rgar( $entry, '15'); 
    $univ = rgar( $entry, '16');       
   if ( $member === 'Facilitator' || $member === 'Co-facilitator'){ 
      array_push($sites,5);      
   }
   if ( $univ === 'Aalto University, Finland' ) {
      array_push($sites,38);          
   }
   else if ( $univ === 'Arcada University of Applied sciences, Finland' ) {
      array_push($sites,26);          
   }
   else if ( $univ === 'Educor, South Africa' ) {
      array_push($sites,27);          
   }
   else if ( $univ === 'IIE Varsity College, South Africa' ) {
      array_push($sites,28);          
   }
   else if ( $univ === 'Karlstad University, Sweden' ) {
      array_push($sites,29);          
   }
   else if ( $univ === 'Karolinska Institutet, Sweden' ) {
      array_push($sites,30);          
   }
   else if ( $univ === 'Linköping University, Sweden' ) {
      array_push($sites,31);          
   }
   else if ( $univ === 'Linnaeus University, Sweden' ) {
      array_push($sites,32);          
   }
   else if ( $univ === 'Luleå University of Technology, Sweden' ) {
      array_push($sites,39);          
   }
   else if ( $univ === 'Lund University, Sweden' ) {
      array_push($sites,33);          
   }
   else if ( $univ === 'Mälardalens University, Sweden' ) {
      array_push($sites,34);          
   }
   else if ( $univ === 'National University of Singapore' ) {
      array_push($sites,35);          
   }
   else if ( $univ === 'Stockholm university, Sweden' ) {
      array_push($sites,36);          
   }
   else if ( $univ === 'University of Oldenburg, Germany' ) {
      array_push($sites,40);          
   }
   else if ( $univ === 'ZHAW Zurich University of Applied Sciences' ) {
      array_push($sites,37);          
   }
    foreach ($sites as $site) {
        add_user_to_blog($site, $user_id, 'author'); //the last variable is the desired role for the user
    }
}


//LOGGER -- like frogger but more useful

if ( ! function_exists('write_log')) {
   function write_log ( $log )  {
      if ( is_array( $log ) || is_object( $log ) ) {
         error_log( print_r( $log, true ) );
      } else {
         error_log( $log );
      }
   }
}