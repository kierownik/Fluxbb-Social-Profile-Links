<?php

$spl_config = unserialize( $pun_config['o_social_profile_links'] );

$link_options = array( 'github', 'facebook', 'youtube', 'twitter', 'google+', 'instagram' );

$spl_users = array();

foreach ( $link_options AS $key )
{
  if ( !empty( $_POST['form'][$key] ) AND $spl_config[$key] == '1' )
  {
    $spl_users[$key] = pun_trim( $_POST['form'][$key] );
  }
}

// Check if input box of GitHub is not empty and spl_config is set to 1 before doing the regex
if ( !empty( $spl_users['github'] ) AND $spl_config['github'] == '1' )
{
  // If the GitHub username contains anything other than alphanumeric and period it's invalid
  if ( !preg_match( '/[A-Za-z0-9\.]{3,50}$/', $spl_users['github'] ) )
    message( $lang_spl['bad github'] );
}

// Check if input box of Facebook is not empty and spl_config is set to 1 before doing the regex
if ( !empty( $spl_users['facebook'] ) AND $spl_config['facebook'] == '1' )
{
  // If the Facebook username contains anything other than alphanumeric and period it's invalid
  if ( !preg_match( '/[A-Za-z0-9\.]{5,50}$/', $spl_users['facebook'] ) )
    message( $lang_spl['bad facebook'] );
}

// Check if input box of Twitter is not empty and spl_config is set to 1 before doing the regex
if ( !empty( $spl_users['twitter'] ) AND $spl_config['twitter'] == '1' )
{
  // If the Twitter username contains anything other than alphanumeric and dashes it's invalid
  if ( !preg_match( '/[A-Za-z0-9_]{1,15}$/', $spl_users['twitter'] ) )
    message( $lang_spl['bad twitter'] );
}

// Check if input box of YouTube is not empty and spl_config is set to 1 before doing the regex
if ( !empty( $spl_users['youtube'] ) AND $spl_config['youtube'] == '1' )
{
  // If the YouTube username contains anything other than alphanumeric, underscore, dash, apostrophe, period it's invalid
  if ( !preg_match( '/[A-Za-z0-9_\-.]{6,20}$/', $spl_users['youtube'] ) )
    message( $lang_spl['bad youtube'] );
}

// Check if input box of Google+ is not empty and spl_config is set to 1 before doing the regex
if ( !empty( $spl_users['google+'] ) AND $spl_config['google+'] == '1' )
{
  // If the Google+ user id contains anything other than digits it's invalid
  if ( preg_match( '%[^0-9]%', $spl_users['google+'] ) )
    message( $lang_spl['bad google+'] );
}

// Check if input box of Instagram is not empty and spl_config is set to 1 before doing the regex
if ( !empty( $spl_users['instagram'] ) AND $spl_config['instagram'] == '1' )
{
  // If the Instagram username is over 30 characters and contains anything other than alphanumeric or underscore it is invalid
  if ( !preg_match( '/[A-Za-z0-9_]{5,30}$/', $spl_users['instagram'] ) )
    message( $lang_spl['bad instagram'] );
}

$form = array( 'social_profile_links' => ( !empty( $spl_users ) ) ? serialize( $spl_users ) : NULL );