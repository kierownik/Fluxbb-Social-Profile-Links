##
##
##        Mod title:  Social Profile Links
##
##      Mod version:  1.3.7
##  Works on FluxBB:  1.5.4, 1.5.3
##     Release date:  2013-06-16
##           Author:  Daniel Rokven (rokven@gmail.com)
##
##      Description:  Adds Social links to the profile and viewtopic pages
##                    where users can add their usernames for, Care2, Deviantart, Facebook, GitHub,
##                    Google+, Instagram, Tubmlr, Twitter and YouTube.
##
##   Repository URL:  https://fluxbb.org/resources/mods/social-profile-links/
##
##   Affected files:  include/functions.php
##                    profile.php
##                    viewtopic.php
##
##       Affects DB:  Yes
##
##            Notes:  Thanks to quy [https://fluxbb.org/forums/profile.php?id=22] for helping
##
##   Plugin options:  All these options can be managed in the administration area
##                    Care2       - Enable / Disable
##                    Delicious   - Enable / Disable
##                    Deviantart  - Enable / Disable
##                    Facebook    - Enable / Disable
##                    Github      - Enable / Disable
##                    Google+     - Enable / Disable
##                    Instagram   - Enable / Disable
##                    Pinterest   - Enable / Disable
##                    Stumbleupon - Enable / Disable
##                    Tumblr      - Enable / Disable
##                    Twitter     - Enable / Disable
##                    YouTube     - Enable / Disable
##
##                    Show in users profile - Enable / Disable
##                    Show in viewtopic     - Enable / Disable
##                    Use icon              - Enable / Disable
##                    Show guests           - Enable / Disable
##                    Target                - Same window / New window/tab
##
##       DISCLAIMER:  Please note that "mods" are not officially supported by
##                    FluxBB. Installation of this modification is done at 
##                    your own risk. Backup your forum database and any and
##                    all applicable files before proceeding.
##
##          Notes 2:  If you do not use the lang/Dutch or lang/English then do not copie them
##
##          Notes 3:  If you update from v1.1.0 or v1.1.1 or v1.1.2 or v1.1.3 to v1.1.6, only copy
##                    the files, you do not have to do these steps below, and visit the
##                    administration and press save options and you are done. If you update from a
##                    version before v1.1.0 follow all the steps below.
##

#
#---------[ 1. UPLOAD ]-------------------------------------------------------
#

install_mod.php to /
files/ to /

#
#---------[ 2. RUN ]----------------------------------------------------------
#

install_mod.php

#
#---------[ 3. DELETE ]-------------------------------------------------------
#

install_mod.php

#
#---------[ 4. OPEN ]---------------------------------------------------------
#

include/functions.php

#
#---------[ 5. FIND (line: 510) ]---------------------------------------------
#

function generate_profile_menu($page = '')
{
	global $lang_profile, $pun_config, $pun_user, $id;

#
#---------[ 6. REPLACE WITH ]-------------------------------------------------
#

function generate_profile_menu($page = '')
{
	global $lang_profile, $pun_config, $pun_user, $id, $lang_spl;

#
#---------[ 7. FIND (line: 522) ]---------------------------------------------
#

					<li<?php if ($page == 'personal') echo ' class="isactive"'; ?>><a href="profile.php?section=personal&amp;id=<?php echo $id ?>"><?php echo $lang_profile['Section personal'] ?></a></li>

#
#---------[ 8. AFTER ADD ]---------------------------------------------------
#

					<li<?php if ($page == 'spl') echo ' class="isactive"'; ?>><a href="profile.php?section=spl&amp;id=<?php echo $id ?>"><?php echo $lang_spl['social profile links'] ?></a></li>

#
#---------[ 9. OPEN ]---------------------------------------------------------
#

profile.php

#
#---------[ 10. FIND (line: 810) ]--------------------------------------------
#

require PUN_ROOT.'lang/'.$pun_user['language'].'/profile.php';

#
#---------[ 11. AFTER, ADD ]--------------------------------------------------
#

if ( file_exists( PUN_ROOT.'plugins/spl/lang/'.$pun_user['language'].'/social-profile-links.php' ) )
  require PUN_ROOT.'plugins/spl/lang/'.$pun_user['language'].'/social-profile-links.php';
else
  require PUN_ROOT.'plugins/spl/lang/English/social-profile-links.php';

#
#---------[ 12. FIND (line: 814) ]--------------------------------------------
#

		case 'messaging':
		{
			$form = array(
				'jabber'		=> pun_trim($_POST['form']['jabber']),
				'icq'			=> pun_trim($_POST['form']['icq']),
				'msn'			=> pun_trim($_POST['form']['msn']),
				'aim'			=> pun_trim($_POST['form']['aim']),
				'yahoo'			=> pun_trim($_POST['form']['yahoo']),
			);

			// If the ICQ UIN contains anything other than digits it's invalid
			if (preg_match('%[^0-9]%', $form['icq']))
				message($lang_prof_reg['Bad ICQ']);

			break;
		}

#
#---------[ 13. AFTER, ADD ]--------------------------------------------------
#

    case 'spl':
    {
      include( PUN_ROOT.'plugins/spl/profile-case.php' );

      break;
    }

#
#---------[ 14. FIND (line: 1000) ]-------------------------------------------
#

$result = $db->query('SELECT u.username, u.email, u.title, u.realname, u.url, u.jabber, u.icq, u.msn, u.aim, u.yahoo,

#
#---------[ 15. REPLACE WITH ]------------------------------------------------
#

$result = $db->query('SELECT u.username, u.email, u.title, u.realname, u.url, u.jabber, u.icq, u.msn, u.aim, u.yahoo, u.social_profile_links,

#
#---------[ 16. Find (line: 1044 ]--------------------------------------------
#

	if ($user['url'] != '')
	{
		$user['url'] = pun_htmlspecialchars(($pun_config['o_censoring'] == '1') ? censor_words($user['url']) : $user['url']);
		$user_personal[] = '<dt>'.$lang_profile['Website'].'</dt>';
		$user_personal[] = '<dd><span class="website"><a href="'.$user['url'].'" rel="nofollow">'.$user['url'].'</a></span></dd>';
	}

#
#---------[ 17. AFTER, ADD ]--------------------------------------------------
#

    if ( $user['social_profile_links'] != '' )
      include( PUN_ROOT.'plugins/spl/profile.php' );

#
#---------[ 18. Find (line: 1500 ]--------------------------------------------
#

	else if ($section == 'personality')

#
#---------[ 19. BEFORE, ADD ]-------------------------------------------------
#

  else if ($section == 'spl')
  {
    include( PUN_ROOT.'plugins/spl/profile-section.php' );
  }

#
#---------[ 20. OPEN ]--------------------------------------------------------
#

viewtopic.php

#
#---------[ 21. FIND (line: 23) ]---------------------------------------------
#

// Load the viewtopic.php language file
require PUN_ROOT.'lang/'.$pun_user['language'].'/topic.php';

#
#---------[ 22. AFTER, ADD ]--------------------------------------------------
#

  // Load the social-profile-links.php language file
  if ( file_exists( PUN_ROOT.'plugins/spl/lang/'.$pun_user['language'].'/social-profile-links.php' ) )
    require PUN_ROOT.'plugins/spl/lang/'.$pun_user['language'].'/social-profile-links.php';
  else
    require PUN_ROOT.'plugins/spl/lang/English/social-profile-links.php';

#
#---------[ 23. FIND (line: 216) ]--------------------------------------------
#

$result = $db->query('SELECT u.email, u.title, u.url,

#
#---------[ 24. REPLACE WITH ]------------------------------------------------
#

$result = $db->query('SELECT u.email, u.title, u.url, u.social_profile_links,

#
#---------[ 25. FIND (line: 273) ]--------------------------------------------
#

			if ($cur_post['url'] != '')
			{
				if ($pun_config['o_censoring'] == '1')
					$cur_post['url'] = censor_words($cur_post['url']);

				$user_contacts[] = '<span class="website"><a href="'.pun_htmlspecialchars($cur_post['url']).'" rel="nofollow">'.$lang_topic['Website'].'</a></span>';
			}

#
#---------[ 26. AFTER, ADD ]--------------------------------------------------
#

    if ( $cur_post['social_profile_links'] != '' )
      include( PUN_ROOT.'plugins/spl/viewtopic.php' );

#
#---------[ 27. SAVE/UPLOAD ]-------------------------------------------------
#

#
#---------[ 28. GO TO ]-------------------------------------------------------
#

Go to the administration page where you can find the plugin options.