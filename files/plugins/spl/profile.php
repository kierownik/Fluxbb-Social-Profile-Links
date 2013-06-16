<?php
if (!$pun_user['is_guest'])
{
  // Load the social-profile-links.php language file
  require PUN_ROOT.'lang/'.$pun_user['language'].'/social-profile-links.php';

	if ($user['spl_github'] != '' AND $pun_config['o_spl_prof_github'] == '1')
	{
		$user['spl_github'] = pun_htmlspecialchars(($pun_config['o_censoring'] == '1') ? censor_words($user['spl_github']) : $user['spl_github']);
		$user_personal[] = '<dt>'.$lang_spl['github'].'</dt>';
		
		if ($pun_config['o_spl_icon_github'] == '1')
		{
			$user_personal[] = '<dd><span><a href="https://github.com/'.$user['spl_github'].'" rel="nofollow"><img src="'.$pun_config['o_base_url'].'/img/spl/GitHub.png" /></a></span></dd>';
		}
		else
		{
			$user_personal[] = '<dd><span class="website"><a href="https://github.com/'.$user['spl_github'].'" rel="nofollow">'.$user['spl_github'].'</a></span></dd>';
		}
	}

	if ($user['spl_facebook'] != '' AND $pun_config['o_spl_prof_facebook'] == '1')
	{
		$user['spl_facebook'] = pun_htmlspecialchars(($pun_config['o_censoring'] == '1') ? censor_words($user['spl_facebook']) : $user['spl_facebook']);
		$user_personal[] = '<dt>'.$lang_spl['facebook'].'</dt>';
		
		if ($pun_config['o_spl_icon_facebook'] == '1')
		{
			$user_personal[] = '<dd><span><a href="https://facebook.com/'.$user['spl_facebook'].'" rel="nofollow"><img src="'.$pun_config['o_base_url'].'/img/spl/Facebook.png" /></a></span></dd>';
		}
		else
		{
      $user_personal[] = '<dd><span class="website"><a href="https://facebook.com/'.$user['spl_facebook'].'" rel="nofollow">'.$user['spl_facebook'].'</a></span></dd>';
    }
	}

	if ($user['spl_twitter'] != '' AND $pun_config['o_spl_prof_twitter'] == '1')
	{
		$user['spl_twitter'] = pun_htmlspecialchars(($pun_config['o_censoring'] == '1') ? censor_words($user['spl_twitter']) : $user['spl_twitter']);
		$user_personal[] = '<dt>'.$lang_spl['twitter'].'</dt>';
		
		if ($pun_config['o_spl_icon_twitter'] == '1')
		{
			$user_personal[] = '<dd><span><a href="https://twitter.com/'.$user['spl_twitter'].'" rel="nofollow"><img src="'.$pun_config['o_base_url'].'/img/spl/Twitter.png" /></a></span></dd>';
		}
		else
		{
      $user_personal[] = '<dd><span class="website"><a href="https://twitter.com/'.$user['spl_twitter'].'" rel="nofollow">'.$user['spl_twitter'].'</a></span></dd>';
    }
	}

	if ($user['spl_youtube'] != '' AND $pun_config['o_spl_prof_youtube'] == '1')
	{
		$user['spl_youtube'] = pun_htmlspecialchars(($pun_config['o_censoring'] == '1') ? censor_words($user['spl_youtube']) : $user['spl_youtube']);
		$user_personal[] = '<dt>'.$lang_spl['youtube'].'</dt>';
		
		if ($pun_config['o_spl_icon_youtube'] == '1')
		{
			$user_personal[] = '<dd><span><a href="https://youtube.com/user/'.$user['spl_youtube'].'" rel="nofollow"><img src="'.$pun_config['o_base_url'].'/img/spl/YouTube.png" /></a></span></dd>';
		}
		else
		{
      $user_personal[] = '<dd><span class="website"><a href="https://youtube.com/user/'.$user['spl_youtube'].'" rel="nofollow">'.$user['spl_youtube'].'</a></span></dd>';
    }
	}

	if ($user['spl_googleplus'] != '' AND $pun_config['o_spl_prof_googleplus'] == '1')
	{
		$user['spl_googleplus'] = pun_htmlspecialchars(($pun_config['o_censoring'] == '1') ? censor_words($user['spl_googleplus']) : $user['spl_googleplus']);
		$user_personal[] = '<dt>'.$lang_spl['google+'].'</dt>';
		
		if ($pun_config['o_spl_icon_googleplus'] == '1')
		{
			$user_personal[] = '<dd><span><a href="https://plus.google.com/'.$user['spl_googleplus'].'/posts" rel="nofollow"><img src="img/spl/Google+.png" /></a></span></dd>';
		}
		else
		{
      $user_personal[] = '<dd><span class="website"><a href="https://plus.google.com/'.$user['spl_googleplus'].'/posts" rel="nofollow">'.$user['spl_googleplus'].'</a></span></dd>';
    }
	}
}
?>