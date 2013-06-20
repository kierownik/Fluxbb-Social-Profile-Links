<?php

if ( $pun_config['o_spl_show_guest'] == '1' OR !$pun_user['is_guest'] )
{
  // Load the social-profile-links.php language file
  require PUN_ROOT.'lang/'.$pun_user['language'].'/social-profile-links.php';

  // If there are links to display we need to add 2 empty newlines
  if ( $pun_config['o_spl_view_github'] == '1' OR $pun_config['o_spl_view_facebook'] == '1' OR $pun_config['o_spl_view_twitter'] == '1' OR $pun_config['o_spl_view_youtube'] == '1' OR $pun_config['o_spl_view_googleplus'] == '1')
  {
    $user_contacts[] = '<br /><br />';
  }

  if ( $pun_config['o_spl_view_github'] == '1' AND $cur_post['spl_github'] !='' )
  {
    $cur_post['spl_github'] = pun_htmlspecialchars( ( $pun_config['o_censoring'] == '1' ) ? censor_words( $cur_post['spl_github'] ) : $cur_post['spl_github'] );

    if ( $pun_config['o_spl_icon_github'] == '1' )
    {
      $user_contacts[] = '<span><a href="https://github.com/'. $cur_post['spl_github'].'" rel="nofollow" title="'.$lang_spl['github'].'"><img src="'.$pun_config['o_base_url'].'/img/spl/GitHub.png" alt="" /></a></span>';
    }
    else
    {
      $user_contacts[] = '<span class="website"><a href="https://github.com/'.$cur_post['spl_github'].'" rel="nofollow">'.$lang_spl['github'].'</a></span>';
    }
  }

  if ( $pun_config['o_spl_view_facebook'] == '1' AND $cur_post['spl_facebook'] !='' )
  {
    $cur_post['spl_facebook'] = pun_htmlspecialchars( ( $pun_config['o_censoring'] == '1' ) ? censor_words($cur_post['spl_facebook'] ) : $cur_post['spl_facebook'] );

    if ( $pun_config['o_spl_icon_facebook'] == '1' )
    {
      $user_contacts[] = '<span><a href="https://www.facebook.com/'.$cur_post['spl_facebook'].'" rel="nofollow" title="'.$lang_spl['facebook'].'"><img src="'.$pun_config['o_base_url'].'/img/spl/Facebook.png" alt="" /></a></span>';
    }
    else
    {
      $user_contacts[] = '<span class="website"><a href="https://www.facebook.com/'.$cur_post['spl_facebook'].'" rel="nofollow">'.$lang_spl['facebook'].'</a></span>';
    }
  }

  if ( $pun_config['o_spl_view_twitter'] == '1' AND $cur_post['spl_twitter'] !='' )
  {
    $cur_post['spl_twitter'] = pun_htmlspecialchars( ( $pun_config['o_censoring'] == '1' ) ? censor_words( $cur_post['spl_twitter']) : $cur_post['spl_twitter'] );

    if ( $pun_config['o_spl_icon_twitter'] == '1' )
    {
      $user_contacts[] = '<span><a href="https://twitter.com/'.$cur_post['spl_twitter'].'" rel="nofollow" title="'.$lang_spl['twitter'].'"><img src="'.$pun_config['o_base_url'].'/img/spl/Twitter.png" alt="" /></a></span>';
    }
    else
    {
      $user_contacts[] = '<span class="website"><a href="https://twitter.com/'.$cur_post['spl_twitter'].'" rel="nofollow">'.$lang_spl['twitter'].'</a></span>';
    }
  }

  if ( $pun_config['o_spl_view_youtube'] == '1' AND $cur_post['spl_youtube'] !='' )
  {
    $cur_post['spl_youtube'] = pun_htmlspecialchars( ( $pun_config['o_censoring'] == '1' ) ? censor_words( $cur_post['spl_youtube'] ) : $cur_post['spl_youtube'] );

    if ( $pun_config['o_spl_icon_youtube'] == '1' )
    {
      $user_contacts[] = '<span><a href="https://youtube.com/user/'.$cur_post['spl_youtube'].'" rel="nofollow" title="'.$lang_spl['youtube'].'"><img src="'.$pun_config['o_base_url'].'/img/spl/YouTube.png" alt="" /></a></span>';
    }
    else
    {
      $user_contacts[] = '<span class="website"><a href="https://youtube.com/user/'.$cur_post['spl_youtube'].'" rel="nofollow">'.$lang_spl['youtube'].'</a></span>';
    }
  }

  if ( $pun_config['o_spl_view_googleplus'] == '1' AND $cur_post['spl_googleplus'] !='' )
  {
    $cur_post['spl_googleplus'] = pun_htmlspecialchars( ( $pun_config['o_censoring'] == '1' ) ? censor_words( $cur_post['spl_googleplus'] ) : $cur_post['spl_googleplus'] );

    if ( $pun_config['o_spl_icon_googleplus'] == '1' )
    {
      $user_contacts[] = '<span><a href="https://profiles.google.com/'.$cur_post['spl_googleplus'].'" rel="nofollow" title="'.$lang_spl['google+'].'"><img src="'.$pun_config['o_base_url'].'/img/spl/Google+.png" alt="" /></a></span>';
    }
    else
    {
      $user_contacts[] = '<span class="website"><a href="https://profiles.google.com/'.$cur_post['spl_googleplus'].'" rel="nofollow">'.$lang_spl['google+'].'</a></span>';
    }
  }
}
?>