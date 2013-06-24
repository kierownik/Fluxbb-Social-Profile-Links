<?php

$spl_config = unserialize( $pun_config['o_social_profile_links'] );

  $spl_users = array(
    'github'      => ( $spl_config['github'] == '1' && isset( $_POST['form']['github'] ) ) ? pun_trim( $_POST['form']['github'] ) : '',
    'facebook'    => ( $spl_config['facebook'] == '1' && isset( $_POST['form']['facebook'] ) ) ? pun_trim( $_POST['form']['facebook'] ) : '',
    'youtube'     => ( $spl_config['youtube'] == '1' && isset( $_POST['form']['youtube'] ) ) ? pun_trim( $_POST['form']['youtube'] ) : '',
    'twitter'     => ( $spl_config['twitter'] == '1' && isset( $_POST['form']['twitter'] ) ) ? pun_trim( $_POST['form']['twitter'] ) : '',
    'googleplus'  => ( $spl_config['googleplus'] == '1' && isset( $_POST['form']['googleplus'] ) ) ? pun_trim( $_POST['form']['googleplus'] ) : '',
    'instagram'   => ( $spl_config['instagram'] == '1' && isset( $_POST['form']['instagram'] ) ) ? pun_trim( $_POST['form']['instagram'] ) : '',
  );

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
  if ( preg_match( '%[^0-9]%', $spl_users['googleplus'] ) )
    message( $lang_spl['bad google+'] );

  // If the instagram username is over 30 characters and contains anything other than alphanumeric or underscore it is invalid
  if ( preg_match( '/^[^A-Za-z0-9_]{5,30}$/', $spl_users['instagram'] ) )
    message( $lang_spl['bad instagram'] );