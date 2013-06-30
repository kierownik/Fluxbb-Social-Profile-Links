<?php

$spl_cur_user   = unserialize( $user['social_profile_links'] );
$spl_config     = unserialize( $pun_config['o_social_profile_links'] );

if ( $spl_config['show_in_profile'] == '1' AND count( $spl_cur_user ) AND ( $spl_config['show_guest'] == '1' OR !$pun_user['is_guest'] ) )
{
  $target = ( $spl_config['link_target'] ) ? ' target="_blank"' : '';

  // This is the array we are going to use to build our links
  $spl_links = array();

  if ( $spl_config['github'] != '0' AND isset( $spl_cur_user['github'] ) )
  {
    // Set the spl_username for github
    $spl_username = ( $pun_config['o_censoring'] == '1' ? pun_htmlspecialchars( censor_words( $spl_cur_user['github'] ) ) : pun_htmlspecialchars( $spl_cur_user['github'] ) );

    // Fill the spl_links array for github
    $spl_links['github'] = array(
      'position'  =>  $spl_config['github'],
      'username'  =>  $spl_username,
      'url'       =>  'https://github.com/'.$spl_username,
      'lang'      =>  $lang_spl['github'],
      'icon'      =>  'GitHub.png',
    );
  }

  if ( $spl_config['facebook'] != '0' AND isset( $spl_cur_user['facebook'] ) )
  {
    // Set the spl_username for facebook
    $spl_username = ( $pun_config['o_censoring'] == '1' ? pun_htmlspecialchars( censor_words( $spl_cur_user['facebook'] ) ) : pun_htmlspecialchars( $spl_cur_user['facebook'] ) );

    // Fill the spl_links array for facebook
    $spl_links['facebook'] = array(
      'position'  =>  $spl_config['facebook'],
      'username'  =>  $spl_username,
      'url'       =>  'https://facebook.com/'.$spl_username,
      'lang'      =>  $lang_spl['facebook'],
      'icon'      =>  'Facebook.png',
    );
  }

  if ( $spl_config['twitter'] != '0' AND isset( $spl_cur_user['twitter'] ) )
  {
    // Set the spl_username for twitter
    $spl_username = ( $pun_config['o_censoring'] == '1' ? pun_htmlspecialchars( censor_words( $spl_cur_user['twitter'] ) ) : pun_htmlspecialchars( $spl_cur_user['twitter'] ) );

    // Fill the spl_links array for twitter
    $spl_links['twitter'] = array(
      'position'  =>  $spl_config['twitter'],
      'username'  =>  $spl_username,
      'url'       =>  'https://twitter.com/'.$spl_username,
      'lang'      =>  $lang_spl['twitter'],
      'icon'      =>  'Twitter.png',
    );
  }

  if ( $spl_config['youtube'] != '0' AND isset( $spl_cur_user['youtube'] ) )
  {
    // Set the spl_username for youtube
    $spl_username = ( $pun_config['o_censoring'] == '1' ? pun_htmlspecialchars( censor_words( $spl_cur_user['youtube'] ) ) : pun_htmlspecialchars( $spl_cur_user['youtube'] ) );

    // Fill the spl_links array for youtube
    $spl_links['youtube'] = array(
      'position'  =>  $spl_config['youtube'],
      'username'  =>  $spl_username,
      'url'       =>  'https://youtube.com/user/'.$spl_username,
      'lang'      =>  $lang_spl['youtube'],
      'icon'      =>  'YouTube.png',
    );
  }

  if ( $spl_config['google+'] != '0' AND isset( $spl_cur_user['google+'] ) )
  {
    // Set the spl_username for google+
    $spl_username = ( $pun_config['o_censoring'] == '1' ? pun_htmlspecialchars( censor_words( $spl_cur_user['google+'] ) ) : pun_htmlspecialchars( $spl_cur_user['google+'] ) );

    // Fill the spl_links array for google+
    $spl_links['google+'] = array(
      'position'  =>  $spl_config['google+'],
      'username'  =>  $spl_username,
      'url'       =>  'https://profiles.google.com/'.$spl_username.'/posts',
      'lang'      =>  $lang_spl['google+'],
      'icon'      =>  'Google+.png',
    );
  }

  if ( $spl_config['instagram'] != '0' AND isset( $spl_cur_user['instagram'] ) )
  {
    // Set the spl_username for instagram
    $spl_username = ( $pun_config['o_censoring'] == '1' ? pun_htmlspecialchars( censor_words( $spl_cur_user['instagram'] ) ) : pun_htmlspecialchars( $spl_cur_user['instagram'] ) );

    // Fill the spl_links array for instagram
    $spl_links['instagram'] = array(
      'position'  =>  $spl_config['instagram'],
      'username'  =>  $spl_username,
      'url'       =>  'http://instagram.com/'.$spl_username,
      'lang'      =>  $lang_spl['instagram'],
      'icon'      =>  'Instagram.png',
    );
  }

  // Here is where the magic is
  array_multisort( $spl_links );
  foreach ( $spl_links as $key )
  {
    $user_personal[] = '<dt>'.$key['lang'].'</dt>';

    if ( $spl_config['use_icon'] == '1' )
    {
      $user_personal[] = '<dd><span><a href="'.$key['url'].'" title="'.$key['lang'].'" rel="nofollow"'.$target.'><img src="'.pun_htmlspecialchars( get_base_url( true ) ).'/img/spl/'.$key['icon'].'" width="16" height="16" alt="'.$key['lang'].'" /></a></span></dd>';
    }
    else
    {
      $user_personal[] = '<dd><span class="website"><a href="'.$key['url'].'" title="'.$key['lang'].'" rel="nofollow"'.$target.'>'.$key['username'].'</a></span></dd>';
    }
  };
}
?>