<?php

  // Load the social-profile-links.php language file
  if ( file_exists( PUN_ROOT.'lang/'.$pun_user['language'].'/social-profile-links.php' ) )
    require PUN_ROOT.'lang/'.$pun_user['language'].'/social-profile-links.php';
  else
    require PUN_ROOT.'lang/English/social-profile-links.php';

  $form = array(
    'spl_github'      => $pun_config['o_spl_github'] == '1' && isset( $_POST['form']['spl_github'] ) ? pun_trim( $_POST['form']['spl_github'] ) : '',
    'spl_facebook'    => $pun_config['o_spl_facebook'] == '1' && isset( $_POST['form']['spl_facebook'] ) ? pun_trim( $_POST['form']['spl_facebook'] ) : '',
    'spl_youtube'     => $pun_config['o_spl_youtube'] == '1' && isset( $_POST['form']['spl_youtube'] ) ? pun_trim( $_POST['form']['spl_youtube'] ) : '',
    'spl_twitter'     => $pun_config['o_spl_twitter'] == '1' && isset( $_POST['form']['spl_twitter'] ) ? pun_trim( $_POST['form']['spl_twitter'] ) : '',
    'spl_googleplus'  => $pun_config['o_spl_googleplus'] == '1' && isset( $_POST['form']['spl_googleplus'] ) ? pun_trim( $_POST['form']['spl_googleplus'] ) : '',
    'spl_instagram'   => $pun_config['o_spl_instagram'] == '1' && isset( $_POST['form']['spl_instagram'] ) ? pun_trim( $_POST['form']['spl_instagram'] ) : '',
  );

  // If the GitHub username contains anything other than alphanumeric and period it's invalid
  if ( preg_match( '/[^A-Za-z0-9\.]{5,50}$/', $form['spl_github'] ) )
    message( $lang_spl['bad github'] );

  // If the Facebook username contains anything other than alphanumeric and period it's invalid
  if ( preg_match( '/[^A-Za-z0-9\.]{5,50}$/', $form['spl_facebook'] ) )
    message( $lang_spl['bad facebook'] );

  // If the Youtube username contains anything other than alphanumeric, underscore, dash, apostrophe, period it's invalid
  if ( preg_match( '/^[^A-Za-z0-9_\-.]{6,20}$/', $form['spl_youtube'] ) )
    message( $lang_spl['bad youtube'] );

  // If the Twitter username contains anything other than alphanumeric and dashes it's invalid
  if ( preg_match( '/^[^A-Za-z0-9_]{1,15}$/', $form['spl_twitter'] ) )
    message( $lang_spl['bad twitter'] );

  // If the Google+ user id contains anything other than digits it's invalid
  if ( preg_match( '%[^0-9]%', $form['spl_googleplus'] ) )
    message( $lang_spl['bad google+'] );

  // If the instagram username is over 30 characters and contains anything other than alphanumeric or underscore it is invalid
  if ( preg_match( '/^[^A-Za-z0-9_]{5,30}$/', $form['spl_instagram'] ) )
    message( $lang_spl['bad instagram'] );