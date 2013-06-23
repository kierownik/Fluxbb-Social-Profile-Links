<?php

if ( $pun_config['o_spl_show_in_viewtopic'] == '1' AND ( $pun_config['o_spl_show_guest'] == '1' OR !$pun_user['is_guest'] ) )
{
  // Load the social-profile-links.php language file
  if ( file_exists( PUN_ROOT.'lang/'.$pun_user['language'].'/social-profile-links.php' ) )
    require PUN_ROOT.'lang/'.$pun_user['language'].'/social-profile-links.php';
  else
    require PUN_ROOT.'lang/English/social-profile-links.php';

  // If there are links to display we need to add 2 empty newlines
  if ( !empty($user_contacts) AND ( $cur_post['spl_github'] != '' OR $cur_post['spl_facebook'] != '' OR $cur_post['spl_twitter'] != '' OR $cur_post['spl_youtube'] != '' OR $cur_post['spl_googleplus'] != '' ) )
  {
    $user_contacts[] = '<br /><br />';
  }

  $target = ( $pun_config['o_spl_link_target'] ) ? ' target="_blank"' : '';

  if ( $cur_post['spl_github'] != '' )
  {
    $cur_post['spl_github'] = pun_htmlspecialchars( ( $pun_config['o_censoring'] == '1' ) ? censor_words( $cur_post['spl_github'] ) : $cur_post['spl_github'] );

    if ( $pun_config['o_spl_use_icon'] == '1' )
    {
      $user_contacts[] = '<span><a href="https://github.com/'. $cur_post['spl_github'].'" rel="nofollow" title="'.$lang_spl['github'].'"'.$target.'><img src="'.pun_htmlspecialchars( get_base_url( true ) ).'/img/spl/GitHub.png" width="16" height="16" alt="'.$lang_spl['github'].'" /></a></span>';
    }
    else
    {
      $user_contacts[] = '<span class="website"><a href="https://github.com/'.$cur_post['spl_github'].'" rel="nofollow"'.$target.'>'.$lang_spl['github'].'</a></span>';
    }
  }

  if ( $cur_post['spl_facebook'] != '' )
  {
    $cur_post['spl_facebook'] = pun_htmlspecialchars( ( $pun_config['o_censoring'] == '1' ) ? censor_words($cur_post['spl_facebook'] ) : $cur_post['spl_facebook'] );

    if ( $pun_config['o_spl_use_icon'] == '1' )
    {
      $user_contacts[] = '<span><a href="https://www.facebook.com/'.$cur_post['spl_facebook'].'" rel="nofollow" title="'.$lang_spl['facebook'].'"'.$target.'><img src="'.pun_htmlspecialchars( get_base_url( true ) ).'/img/spl/Facebook.png" width="16" height="16" alt="'.$lang_spl['facebook'].'" /></a></span>';
    }
    else
    {
      $user_contacts[] = '<span class="website"><a href="https://www.facebook.com/'.$cur_post['spl_facebook'].'" rel="nofollow"'.$target.'>'.$lang_spl['facebook'].'</a></span>';
    }
  }

  if ( $cur_post['spl_twitter'] != '' )
  {
    $cur_post['spl_twitter'] = pun_htmlspecialchars( ( $pun_config['o_censoring'] == '1' ) ? censor_words( $cur_post['spl_twitter']) : $cur_post['spl_twitter'] );

    if ( $pun_config['o_spl_use_icon'] == '1' )
    {
      $user_contacts[] = '<span><a href="https://twitter.com/'.$cur_post['spl_twitter'].'" rel="nofollow" title="'.$lang_spl['twitter'].'"'.$target.'><img src="'.pun_htmlspecialchars( get_base_url( true ) ).'/img/spl/Twitter.png" width="16" height="16" alt="'.$lang_spl['twitter'].'" /></a></span>';
    }
    else
    {
      $user_contacts[] = '<span class="website"><a href="https://twitter.com/'.$cur_post['spl_twitter'].'" rel="nofollow"'.$target.'>'.$lang_spl['twitter'].'</a></span>';
    }
  }

  if ( $cur_post['spl_youtube'] != '' )
  {
    $cur_post['spl_youtube'] = pun_htmlspecialchars( ( $pun_config['o_censoring'] == '1' ) ? censor_words( $cur_post['spl_youtube'] ) : $cur_post['spl_youtube'] );

    if ( $pun_config['o_spl_use_icon'] == '1' )
    {
      $user_contacts[] = '<span><a href="https://youtube.com/user/'.$cur_post['spl_youtube'].'" rel="nofollow" title="'.$lang_spl['youtube'].'"'.$target.'><img src="'.pun_htmlspecialchars( get_base_url( true ) ).'/img/spl/YouTube.png" width="16" height="16" alt="'.$lang_spl['youtube'].'" /></a></span>';
    }
    else
    {
      $user_contacts[] = '<span class="website"><a href="https://youtube.com/user/'.$cur_post['spl_youtube'].'" rel="nofollow"'.$target.'>'.$lang_spl['youtube'].'</a></span>';
    }
  }

  if ( $cur_post['spl_googleplus'] != '' )
  {
    $cur_post['spl_googleplus'] = pun_htmlspecialchars( ( $pun_config['o_censoring'] == '1' ) ? censor_words( $cur_post['spl_googleplus'] ) : $cur_post['spl_googleplus'] );

    if ( $pun_config['o_spl_use_icon'] == '1' )
    {
      $user_contacts[] = '<span><a href="https://profiles.google.com/'.$cur_post['spl_googleplus'].'/posts" rel="nofollow" title="'.$lang_spl['google+'].'"'.$target.'><img src="'.pun_htmlspecialchars( get_base_url( true ) ).'/img/spl/Google+.png" width="16" height="16" alt="'.$lang_spl['google+'].'" /></a></span>';
    }
    else
    {
      $user_contacts[] = '<span class="website"><a href="https://profiles.google.com/'.$cur_post['spl_googleplus'].'/posts" rel="nofollow"'.$target.'>'.$lang_spl['google+'].'</a></span>';
    }
  }

  if ( $cur_post['spl_instagram'] != '' )
  {
    $cur_post['spl_instagram'] = pun_htmlspecialchars( ( $pun_config['o_censoring'] == '1' ) ? censor_words( $cur_post['spl_instagram'] ) : $cur_post['spl_instagram'] );

    if ( $pun_config['o_spl_use_icon'] == '1' )
    {
      $user_contacts[] = '<span><a href="http://instagram.com/'.$cur_post['spl_instagram'].'" rel="nofollow" title="'.$lang_spl['instagram'].'"'.$target.'><img src="'.pun_htmlspecialchars( get_base_url( true ) ).'/img/spl/Instagram.png" width="16" height="16" alt="'.$lang_spl['instagram'].'" /></a></span>';
    }
    else
    {
      $user_contacts[] = '<span class="website"><a href="http://instagram.com/'.$cur_post['spl_instagram'].'" rel="nofollow"'.$target.'>'.$lang_spl['instagram'].'</a></span>';
    }
  }
}
?>