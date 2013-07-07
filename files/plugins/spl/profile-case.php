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
  'delicious',
  'deviantart',
  'facebook',
  'github',
  'google+',
  'instagram',
  'pinterest',
  'stumbleupon',
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

// Check if input box of Care2 is not empty and spl_config is set higher than 0 before doing adding regex
if ( !empty( $spl_config['care2'] ) AND isset( $spl_users['care2'] ) )
{
  $preg_array['care2'] = array(
    'position'    => $spl_config['care2'],
    'preg_match'  => !preg_match( '/[0-9]{3,9}$/', $spl_users['care2'] ),
    'message'     => $lang_spl['bad care2'],
  );
}

// Check if input box of Delicious is not empty and spl_config is set higher than 0 before doing adding regex
if ( !empty( $spl_config['delicious'] ) AND isset( $spl_cur_user['delicious'] ) )
{
  $preg_array['delicious'] = array(
    'position'    => $spl_config['delicious'],
    'preg_match'  => !preg_match( '/[A-Za-z0-9]{3,20}$/', $spl_users['delicious'] ),
    'message'     => $lang_spl['bad delicious'],
  );
}

// Check if input box of Deviantart is not empty and spl_config is set higher than 0 before doing adding regex
if ( !empty( $spl_config['deviantart'] ) AND isset( $spl_users['deviantart'] ) )
{
  $preg_array['deviantart'] = array(
    'position'    => $spl_config['deviantart'],
    'preg_match'  => !preg_match( '/[A-Za-z0-9-]{3,20}$/', $spl_users['deviantart'] ),
    'message'     => $lang_spl['bad deviantart'],
  );
}

// Check if input box of Facebook is not empty and spl_config is set higher than 0 before doing adding regex
if ( !empty( $spl_config['facebook'] ) AND isset( $spl_users['facebook'] ) )
{
  $preg_array['facebook'] = array(
    'position'    => $spl_config['facebook'],
    'preg_match'  => !preg_match( '/[A-Za-z0-9\.]{5,50}$/', $spl_users['facebook'] ),
    'message'     => $lang_spl['bad facebook'],
  );
}

// Check if input box of GitHub is not empty and spl_config is set higher than 0 before doing adding regex
if ( !empty( $spl_config['github'] ) AND isset( $spl_users['github'] ) )
{
  $preg_array['github'] = array(
    'position'    => $spl_config['github'],
    'preg_match'  => !preg_match( '/[A-Za-z0-9\.]{3,50}$/', $spl_users['github'] ),
    'message'     => $lang_spl['bad github'],
  );
}

// Check if input box of Google+ is not empty and spl_config is set higher than 0 before doing adding regex
if ( !empty( $spl_config['google+'] ) AND isset( $spl_users['google+'] ) )
{
  $preg_array['google+'] = array(
    'position'    => $spl_config['google+'],
    'preg_match'  => preg_match( '%[^0-9]%', $spl_users['google+'] ),
    'message'     => $lang_spl['bad google+'],
  );
}

// Check if input box of Instagram is not empty and spl_config is set higher than 0 before doing adding regex
if ( !empty( $spl_config['instagram'] ) AND isset( $spl_users['instagram'] ) )
{
  $preg_array['instagram'] = array(
    'position'    => $spl_config['instagram'],
    'preg_match'  => !preg_match( '/[A-Za-z0-9_]{5,30}$/', $spl_users['instagram'] ),
    'message'     => $lang_spl['bad instagram'],
  );
}

// Check if input box of Pinterest is not empty and spl_config is set higher than 0 before doing adding regex
if ( !empty( $spl_config['pinterest'] ) AND isset( $spl_users['pinterest'] ) )
{
  $preg_array['pinterest'] = array(
    'position'    => $spl_config['pinterest'],
    'preg_match'  => !preg_match( '/[A-Za-z0-9]{3,15}$/', $spl_users['pinterest'] ),
    'message'     => $lang_spl['bad pinterest'],
  );
}

// Check if input box of Stumbleupon is not empty and spl_config is set higher than 0 before doing adding regex
if ( !empty( $spl_config['stumbleupon'] ) AND isset( $spl_users['stumbleupon'] ) )
{
  $preg_array['stumbleupon'] = array(
    'position'    => $spl_config['stumbleupon'],
    'preg_match'  => !preg_match( '/[A-Za-z0-9-]{1,15}$/', $spl_users['stumbleupon'] ),
    'message'     => $lang_spl['bad stumbleupon'],
  );
}

// Check if input box of Tumblr is not empty and spl_config is set higher than 0 before doing adding regex
if ( !empty( $spl_config['tumblr'] ) AND isset( $spl_users['tumblr'] ) )
{
  $preg_array['tumblr'] = array(
    'position'    => $spl_config['tumblr'],
    'preg_match'  => !preg_match( '/[A-Za-z0-9_]{3,32}$/', $spl_users['tumblr'] ),
    'message'     => $lang_spl['bad tumblr'],
  );
}

// Check if input box of Twitter is not empty and spl_config is set higher than 0 before doing adding regex
if ( !empty( $spl_config['twitter'] ) AND isset( $spl_users['twitter'] ) )
{
  $preg_array['twitter'] = array(
    'position'    => $spl_config['twitter'],
    'preg_match'  => !preg_match( '/[A-Za-z0-9_]{1,15}$/', $spl_users['twitter'] ),
    'message'     => $lang_spl['bad twitter'],
  );
}

// Check if input box of YouTube is not empty and spl_config is set higher than 0 before doing adding regex
if ( !empty( $spl_config['youtube'] ) AND isset( $spl_users['youtube'] ) )
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