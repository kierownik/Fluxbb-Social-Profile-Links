<?php
if (!$pun_user['is_guest'])
{
  $user_contacts[] = '<br /><br />';
  
  if ($pun_config['o_spl_view_github'] == '1' AND $cur_post['spl_github'] !='')
  {
    if ($pun_config['o_spl_icon_github'] == '1')
    {
      $user_contacts[] = '<span><a href="https://github.com/'.pun_htmlspecialchars($cur_post['spl_github']).'" rel="nofollow" title="Github"><img src="'.$pun_config['o_base_url'].'/img/spl/GitHub.png" /></a></span>';
    }
    else
    {
      $user_contacts[] = '<span class="website"><a href="https://github.com/'.pun_htmlspecialchars($cur_post['spl_github']).'" rel="nofollow">Github</a></span>';
    }
  }

  if ($pun_config['o_spl_view_facebook'] == '1' AND $cur_post['spl_facebook'] !='')
  {
    if ($pun_config['o_spl_icon_facebook'] == '1')
    {
      $user_contacts[] = '<span><a href="https://www.facebook.com/'.pun_htmlspecialchars($cur_post['spl_facebook']).'" rel="nofollow" title="Facebook"><img src="'.$pun_config['o_base_url'].'/img/spl/Facebook.png" /></a></span>';
    }
    else
    {
      $user_contacts[] = '<span class="website"><a href="https://www.facebook.com/'.pun_htmlspecialchars($cur_post['spl_facebook']).'" rel="nofollow">Facebook</a></span>';
    }
  }

  if ($pun_config['o_spl_view_twitter'] == '1' AND $cur_post['spl_twitter'] !='')
  {
    if ($pun_config['o_spl_icon_twitter'] == '1')
    {
      $user_contacts[] = '<span><a href="https://twitter.com/'.pun_htmlspecialchars($cur_post['spl_twitter']).'" rel="nofollow" title="Twitter"><img src="'.$pun_config['o_base_url'].'/img/spl/Twitter.png" /></a></span>';
    }
    else
    {
      $user_contacts[] = '<span class="website"><a href="https://twitter.com/'.pun_htmlspecialchars($cur_post['spl_twitter']).'" rel="nofollow">Twitter</a></span>';
    }
  }

  if ($pun_config['o_spl_view_youtube'] == '1' AND $cur_post['spl_youtube'] !='')
  {
    if ($pun_config['o_spl_icon_youtube'] == '1')
    {
      $user_contacts[] = '<span><a href="https://youtube.com/user/'.pun_htmlspecialchars($cur_post['spl_youtube']).'" rel="nofollow" title="YouTube"><img src="'.$pun_config['o_base_url'].'/img/spl/YouTube.png" /></a></span>';
    }
    else
    {
      $user_contacts[] = '<span class="website"><a href="https://youtube.com/user/'.pun_htmlspecialchars($cur_post['spl_youtube']).'" rel="nofollow">YouTube</a></span>';
    }
  }

  if ($pun_config['o_spl_view_googleplus'] == '1' AND $cur_post['spl_googleplus'] !='')
  {
    if ($pun_config['o_spl_icon_googleplus'] == '1')
    {
      $user_contacts[] = '<span><a href="https://profiles.google.com/'.pun_htmlspecialchars($cur_post['spl_googleplus']).'" rel="nofollow" title="Google+"><img src="'.$pun_config['o_base_url'].'/img/spl/Google+.png" /></a></span>';
    }
    else
    {
      $user_contacts[] = '<span class="website"><a href="https://profiles.google.com/'.pun_htmlspecialchars($cur_post['spl_googleplus']).'" rel="nofollow">Google+</a></span>';
    }
  }
}
?>