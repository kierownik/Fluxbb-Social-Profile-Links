<?php

$spl_config = unserialize( $pun_config['o_social_profile_links'] );

$available_spl = array( 'github', 'facebook', 'youtube', 'twitter', 'google+', 'instagram' );

$spl_users = array();

foreach ( $available_spl AS $key )
{
  if ( !empty( $_POST['form'][$key] ) AND $spl_config[$key] == '1' )
  {
    $spl_users[$key] = pun_trim( $_POST['form'][$key] );
  }
}

$form = array( 'social_profile_links' => serialize( $spl_users ) );

// If the GitHub username contains anything other than alphanumeric and period it's invalid
if ( preg_match( '/[^A-Za-z0-9\.]{5,50}$/', $spl_users['github'] ) )
  message( $lang_spl['bad github'] );

// If the Facebook username contains anything other than alphanumeric and period it's invalid
if ( preg_match( '/[^A-Za-z0-9\.]{5,50}$/', $spl_users['facebook'] ) )
  message( $lang_spl['bad facebook'] );

// If the Youtube username contains anything other than alphanumeric, underscore, dash, apostrophe, period it's invalid
if ( preg_match( '/^[^A-Za-z0-9_\-.]{6,20}$/', $spl_users['youtube'] ) )
  message( $lang_spl['bad youtube'] );

// If the Twitter username contains anything other than alphanumeric and dashes it's invalid
if ( preg_match( '/^[^A-Za-z0-9_]{1,15}$/', $spl_users['twitter'] ) )
  message( $lang_spl['bad twitter'] );

// If the Google+ user id contains anything other than digits it's invalid
if ( preg_match( '%[^0-9]%', $spl_users['google+'] ) )
  message( $lang_spl['bad google+'] );

// If the instagram username is over 30 characters and contains anything other than alphanumeric or underscore it is invalid
if ( preg_match( '/^[^A-Za-z0-9_]{5,30}$/', $spl_users['instagram'] ) )
  message( $lang_spl['bad instagram'] );