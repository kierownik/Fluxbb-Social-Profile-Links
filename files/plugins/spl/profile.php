<?php

if ( $pun_config['o_spl_show_in_profile'] == '1' AND ( $pun_config['o_spl_show_guest'] == '1' OR !$pun_user['is_guest'] ) )
{
  // Load the social-profile-links.php language file
  require PUN_ROOT.'lang/'.$pun_user['language'].'/social-profile-links.php';

  if ( $user['spl_github'] != '' )
  {
    $target = ( $pun_config['o_spl_link_target'] ) ? ' target="_blank"' : '';

    $user['spl_github'] = pun_htmlspecialchars( ( $pun_config['o_censoring'] == '1' ) ? censor_words( $user['spl_github'] ) : $user['spl_github']);
    $user_personal[] = '<dt>'.$lang_spl['github'].'</dt>';
    
    if ( $pun_config['o_spl_use_icon'] == '1' )
    {
      $user_personal[] = '<dd><span><a href="https://github.com/'.$user['spl_github'].'" title="'.$lang_spl['github'].'" rel="nofollow"'.$target.'><img src="'.$pun_config['o_base_url'].'/img/spl/GitHub.png" alt="" /></a></span></dd>';
    }
    else
    {
      $user_personal[] = '<dd><span class="website"><a href="https://github.com/'.$user['spl_github'].'" title="'.$lang_spl['github'].'" rel="nofollow"'.$target.'>'.$user['spl_github'].'</a></span></dd>';
    }
  }

  if ( $user['spl_facebook'] != '' )
  {
    $target = ( $pun_config['o_spl_link_target'] ) ? ' target="_blank"' : '';

    $user['spl_facebook'] = pun_htmlspecialchars( ( $pun_config['o_censoring'] == '1' ) ? censor_words( $user['spl_facebook'] ) : $user['spl_facebook'] );
    $user_personal[] = '<dt>'.$lang_spl['facebook'].'</dt>';
    
    if ( $pun_config['o_spl_use_icon'] == '1' )
    {
      $user_personal[] = '<dd><span><a href="https://facebook.com/'.$user['spl_facebook'].'" title="'.$lang_spl['facebook'].'" rel="nofollow"'.$target.'><img src="'.$pun_config['o_base_url'].'/img/spl/Facebook.png" alt="" /></a></span></dd>';
    }
    else
    {
      $user_personal[] = '<dd><span class="website"><a href="https://facebook.com/'.$user['spl_facebook'].'" title="'.$lang_spl['facebook'].'" rel="nofollow"'.$target.'>'.$user['spl_facebook'].'</a></span></dd>';
    }
  }

  if ( $user['spl_twitter'] != '' )
  {
    $target = ( $pun_config['o_spl_link_target'] ) ? ' target="_blank"' : '';

    $user['spl_twitter'] = pun_htmlspecialchars( ( $pun_config['o_censoring'] == '1' ) ? censor_words($user['spl_twitter']) : $user['spl_twitter'] );
    $user_personal[] = '<dt>'.$lang_spl['twitter'].'</dt>';
    
    if ( $pun_config['o_spl_use_icon'] == '1' )
    {
      $user_personal[] = '<dd><span><a href="https://twitter.com/'.$user['spl_twitter'].'" title="'.$lang_spl['twitter'].'"rel="nofollow"'.$target.'><img src="'.$pun_config['o_base_url'].'/img/spl/Twitter.png" alt="" /></a></span></dd>';
    }
    else
    {
      $user_personal[] = '<dd><span class="website"><a href="https://twitter.com/'.$user['spl_twitter'].'" title="'.$lang_spl['twitter'].'"rel="nofollow"'.$target.'>'.$user['spl_twitter'].'</a></span></dd>';
    }
  }

  if ( $user['spl_youtube'] != '' )
  {
    $target = ( $pun_config['o_spl_link_target'] ) ? ' target="_blank"' : '';

    $user['spl_youtube'] = pun_htmlspecialchars( ( $pun_config['o_censoring'] == '1' ) ? censor_words( $user['spl_youtube']) : $user['spl_youtube'] );
    $user_personal[] = '<dt>'.$lang_spl['youtube'].'</dt>';
    
    if ( $pun_config['o_spl_use_icon'] == '1' )
    {
      $user_personal[] = '<dd><span><a href="https://youtube.com/user/'.$user['spl_youtube'].'" title="'.$lang_spl['youtube'].'"rel="nofollow"'.$target.'><img src="'.$pun_config['o_base_url'].'/img/spl/YouTube.png" alt="" /></a></span></dd>';
    }
    else
    {
      $user_personal[] = '<dd><span class="website"><a href="https://youtube.com/user/'.$user['spl_youtube'].'" title="'.$lang_spl['youtube'].'"rel="nofollow"'.$target.'>'.$user['spl_youtube'].'</a></span></dd>';
    }
  }

  if ( $user['spl_googleplus'] != '' )
  {
    $target = ( $pun_config['o_spl_link_target'] ) ? ' target="_blank"' : '';

    $user['spl_googleplus'] = pun_htmlspecialchars( ( $pun_config['o_censoring'] == '1' ) ? censor_words( $user['spl_googleplus'] ) : $user['spl_googleplus'] );
    $user_personal[] = '<dt>'.$lang_spl['google+'].'</dt>';
    
    if ( $pun_config['o_spl_use_icon'] == '1' )
    {
      $user_personal[] = '<dd><span><a href="https://plus.google.com/'.$user['spl_googleplus'].'/posts" title="'.$lang_spl['google+'].'" rel="nofollow"'.$target.'><img src="img/spl/Google+.png" alt="" /></a></span></dd>';
    }
    else
    {
      $user_personal[] = '<dd><span class="website"><a href="https://plus.google.com/'.$user['spl_googleplus'].'/posts" title="'.$lang_spl['google+'].'" rel="nofollow"'.$target.'>'.$user['spl_googleplus'].'</a></span></dd>';
    }
  }
}
?>