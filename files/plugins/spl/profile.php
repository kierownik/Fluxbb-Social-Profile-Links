<?php

if ( $pun_config['o_spl_show_in_profile'] == '1' AND ( $pun_config['o_spl_show_guest'] == '1' OR !$pun_user['is_guest'] ) )
{
  // Load the social-profile-links.php language file
  if ( file_exists( PUN_ROOT.'lang/'.$pun_user['language'].'/social-profile-links.php' ) )
    require PUN_ROOT.'lang/'.$pun_user['language'].'/social-profile-links.php';
  else
    require PUN_ROOT.'lang/English/social-profile-links.php';

  $target = ( $pun_config['o_spl_link_target'] ) ? ' target="_blank"' : '';

  if ( $user['spl_github'] != '' )
  {
    $user['spl_github'] = pun_htmlspecialchars( ( $pun_config['o_censoring'] == '1' ) ? censor_words( $user['spl_github'] ) : $user['spl_github']);
    $user_personal[] = '<dt>'.$lang_spl['github'].'</dt>';

    if ( $pun_config['o_spl_use_icon'] == '1' )
    {
      $user_personal[] = '<dd><span><a href="https://github.com/'.$user['spl_github'].'" title="'.$lang_spl['github'].'" rel="nofollow"'.$target.'><img src="'.pun_htmlspecialchars( get_base_url( true ) ).'/img/spl/GitHub.png" width="16" height="16" alt="'.$lang_spl['github'].'" /></a></span></dd>';
    }
    else
    {
      $user_personal[] = '<dd><span class="website"><a href="https://github.com/'.$user['spl_github'].'" title="'.$lang_spl['github'].'" rel="nofollow"'.$target.'>'.$user['spl_github'].'</a></span></dd>';
    }
  }

  if ( $user['spl_facebook'] != '' )
  {
    $user['spl_facebook'] = pun_htmlspecialchars( ( $pun_config['o_censoring'] == '1' ) ? censor_words( $user['spl_facebook'] ) : $user['spl_facebook'] );
    $user_personal[] = '<dt>'.$lang_spl['facebook'].'</dt>';

    if ( $pun_config['o_spl_use_icon'] == '1' )
    {
      $user_personal[] = '<dd><span><a href="https://facebook.com/'.$user['spl_facebook'].'" title="'.$lang_spl['facebook'].'" rel="nofollow"'.$target.'><img src="'.pun_htmlspecialchars( get_base_url( true ) ).'/img/spl/Facebook.png" width="16" height="16" alt="'.$lang_spl['facebook'].'" /></a></span></dd>';
    }
    else
    {
      $user_personal[] = '<dd><span class="website"><a href="https://facebook.com/'.$user['spl_facebook'].'" title="'.$lang_spl['facebook'].'" rel="nofollow"'.$target.'>'.$user['spl_facebook'].'</a></span></dd>';
    }
  }

  if ( $user['spl_twitter'] != '' )
  {
    $user['spl_twitter'] = pun_htmlspecialchars( ( $pun_config['o_censoring'] == '1' ) ? censor_words($user['spl_twitter']) : $user['spl_twitter'] );
    $user_personal[] = '<dt>'.$lang_spl['twitter'].'</dt>';

    if ( $pun_config['o_spl_use_icon'] == '1' )
    {
      $user_personal[] = '<dd><span><a href="https://twitter.com/'.$user['spl_twitter'].'" title="'.$lang_spl['twitter'].'" rel="nofollow"'.$target.'><img src="'.pun_htmlspecialchars( get_base_url( true ) ).'/img/spl/Twitter.png" width="16" height="16" alt="'.$lang_spl['twitter'].'" /></a></span></dd>';
    }
    else
    {
      $user_personal[] = '<dd><span class="website"><a href="https://twitter.com/'.$user['spl_twitter'].'" title="'.$lang_spl['twitter'].'" rel="nofollow"'.$target.'>'.$user['spl_twitter'].'</a></span></dd>';
    }
  }

  if ( $user['spl_youtube'] != '' )
  {
    $user['spl_youtube'] = pun_htmlspecialchars( ( $pun_config['o_censoring'] == '1' ) ? censor_words( $user['spl_youtube']) : $user['spl_youtube'] );
    $user_personal[] = '<dt>'.$lang_spl['youtube'].'</dt>';

    if ( $pun_config['o_spl_use_icon'] == '1' )
    {
      $user_personal[] = '<dd><span><a href="https://youtube.com/user/'.$user['spl_youtube'].'" title="'.$lang_spl['youtube'].'" rel="nofollow"'.$target.'><img src="'.pun_htmlspecialchars( get_base_url( true ) ).'/img/spl/YouTube.png" width="16" height="16" alt="'.$lang_spl['youtube'].'" /></a></span></dd>';
    }
    else
    {
      $user_personal[] = '<dd><span class="website"><a href="https://youtube.com/user/'.$user['spl_youtube'].'" title="'.$lang_spl['youtube'].'" rel="nofollow"'.$target.'>'.$user['spl_youtube'].'</a></span></dd>';
    }
  }

  if ( $user['spl_googleplus'] != '' )
  {
    $user['spl_googleplus'] = pun_htmlspecialchars( ( $pun_config['o_censoring'] == '1' ) ? censor_words( $user['spl_googleplus'] ) : $user['spl_googleplus'] );
    $user_personal[] = '<dt>'.$lang_spl['google+'].'</dt>';

    if ( $pun_config['o_spl_use_icon'] == '1' )
    {
      $user_personal[] = '<dd><span><a href="https://profiles.google.com/'.$user['spl_googleplus'].'/posts" title="'.$lang_spl['google+'].'" rel="nofollow"'.$target.'><img src="'.pun_htmlspecialchars( get_base_url( true ) ).'/img/spl/Google+.png" width="16" height="16" alt="'.$lang_spl['google+'].'" /></a></span></dd>';
    }
    else
    {
      $user_personal[] = '<dd><span class="website"><a href="https://profiles.google.com/'.$user['spl_googleplus'].'/posts" title="'.$lang_spl['google+'].'" rel="nofollow"'.$target.'>'.$user['spl_googleplus'].'</a></span></dd>';
    }
  }

  if ( $user['spl_instagram'] != '' )
  {
    $user['spl_instagram'] = pun_htmlspecialchars( ( $pun_config['o_censoring'] == '1' ) ? censor_words( $user['spl_instagram'] ) : $user['spl_instagram'] );
    $user_personal[] = '<dt>'.$lang_spl['instagram'].'</dt>';

    if ( $pun_config['o_spl_use_icon'] == '1' )
    {
      $user_personal[] = '<dd><span><a href="http://instagram.com/'.$user['spl_instagram'].'" title="'.$lang_spl['instagram'].'" rel="nofollow"'.$target.'><img src="'.pun_htmlspecialchars( get_base_url( true ) ).'/img/spl/Instagram.png" width="16" height="16" alt="'.$lang_spl['instagram'].'" /></a></span></dd>';
    }
    else
    {
      $user_personal[] = '<dd><span class="website"><a href="http://instagram.com/'.$user['spl_instagram'].'" title="'.$lang_spl['instagram'].'" rel="nofollow"'.$target.'>'.$user['spl_instagram'].'</a></span></dd>';
    }
  }
}
?>