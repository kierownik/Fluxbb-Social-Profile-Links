<?php

/**
************************************************************************
*  Author: kierownik
*  Date: 2013-06-15
*  Description: Adds Social links to the profile and viewtopic pages
*               where users can add their usernames.
*  Copyright (C) Daniel Rokven ( rokven@gmail.com )
*  License: http://www.gnu.org/licenses/gpl.html GPL version 2 or higher
*
************************************************************************
**/

$spl_config = unserialize( $pun_config['o_social_profile_links'] );

$link_options = array(
  'care2',
  'facebook',
  'github',
  'google+',
  'instagram',
  'tumblr',
  'twitter',
  'youtube',
);

$spl_users = array();

foreach ( $link_options AS $key )
{
  if ( !empty( $_POST['form'][$key] ) AND $spl_config[$key] != '0' )
  {
    $spl_users[$key] = pun_trim( $_POST['form'][$key] );
  }
}

$preg_array = array();

// Check if input box of care2 is not empty and spl_config is set higher than 0 before doing adding regex
if ( !empty( $spl_users['care2'] ) AND $spl_config['care2'] != '0' )
{
  $preg_array['care2'] = array(
    'position'    => $spl_config['care2'],
    'preg_match'  => !preg_match( '/[0-9]{3,9}$/', $spl_users['care2'] ),
    'message'     => $lang_spl['bad care2'],
  );
}

// Check if input box of Facebook is not empty and spl_config is set higher than 0 before doing adding regex
if ( !empty( $spl_users['facebook'] ) AND $spl_config['facebook'] != '0' )
{
  $preg_array['facebook'] = array(
    'position'    => $spl_config['facebook'],
    'preg_match'  => !preg_match( '/[A-Za-z0-9\.]{5,50}$/', $spl_users['facebook'] ),
    'message'     => $lang_spl['bad facebook'],
  );
}

// Check if input box of GitHub is not empty and spl_config is set higher than 0 before doing adding regex
if ( !empty( $spl_users['github'] ) AND $spl_config['github'] != '0' )
{
  $preg_array['github'] = array(
    'position'    => $spl_config['github'],
    'preg_match'  => !preg_match( '/[A-Za-z0-9\.]{3,50}$/', $spl_users['github'] ),
    'message'     => $lang_spl['bad github'],
  );
}

// Check if input box of Google+ is not empty and spl_config is set higher than 0 before doing adding regex
if ( !empty( $spl_users['google+'] ) AND $spl_config['google+'] != '0' )
{
  $preg_array['google+'] = array(
    'position'    => $spl_config['google+'],
    'preg_match'  => preg_match( '%[^0-9]%', $spl_users['google+'] ),
    'message'     => $lang_spl['bad google+'],
  );
}

// Check if input box of Instagram is not empty and spl_config is set higher than 0 before doing adding regex
if ( !empty( $spl_users['instagram'] ) AND $spl_config['instagram'] != '0' )
{
  $preg_array['instagram'] = array(
    'position'    => $spl_config['instagram'],
    'preg_match'  => !preg_match( '/[A-Za-z0-9_]{5,30}$/', $spl_users['instagram'] ),
    'message'     => $lang_spl['bad instagram'],
  );
}

// Check if input box of tumblr is not empty and spl_config is set higher than 0 before doing adding regex
if ( !empty( $spl_users['tumblr'] ) AND $spl_config['tumblr'] != '0' )
{
  $preg_array['tumblr'] = array(
    'position'    => $spl_config['tumblr'],
    'preg_match'  => !preg_match( '/[A-Za-z0-9_]{3,32}$/', $spl_users['tumblr'] ),
    'message'     => $lang_spl['bad tumblr'],
  );
}

// Check if input box of Twitter is not empty and spl_config is set higher than 0 before doing adding regex
if ( !empty( $spl_users['twitter'] ) AND $spl_config['twitter'] != '0' )
{
  $preg_array['twitter'] = array(
    'position'    => $spl_config['twitter'],
    'preg_match'  => !preg_match( '/[A-Za-z0-9_]{1,15}$/', $spl_users['twitter'] ),
    'message'     => $lang_spl['bad twitter'],
  );
}

// Check if input box of YouTube is not empty and spl_config is set higher than 0 before doing adding regex
if ( !empty( $spl_users['youtube'] ) AND $spl_config['youtube'] != '0' )
{
  $preg_array['youtube'] = array(
    'position'    => $spl_config['youtube'],
    'preg_match'  => !preg_match( '/[A-Za-z0-9_\-.]{6,20}$/', $spl_users['youtube'] ),
    'message'     => $lang_spl['bad youtube'],
  );
}

array_multisort( $preg_array );
// Here we check if the entered usernames or user id's are valid
foreach ( $preg_array AS $key )
{
  if ( $key['preg_match'] )
    message( $key['message'] );
}

$form = array( 'social_profile_links' => ( !empty( $spl_users ) ) ? serialize( $spl_users ) : NULL );