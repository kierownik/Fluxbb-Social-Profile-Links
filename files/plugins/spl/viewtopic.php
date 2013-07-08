<?php

/**
************************************************************************
*  Author: kierownik
*  Date: 2013-06-15
*  Description: Adds Social links to the profile and viewtopic pages
*               where users can add their usernames.
*  Copyright (C) Daniel Rokven ( rokven@gmail.com )
*  License: http://www.gnu.org/licenses/gpl.html GPL version 2 or higher
*
************************************************************************
**/

$spl_cur_user = unserialize( $cur_post['social_profile_links'] );
$spl_config   = isset( $spl_config ) ? $spl_config : unserialize( $pun_config['o_social_profile_links'] );

// Are there cache links to display, we display them instead of going through the array
if ( isset( $spl_cache_links[$cur_post['poster_id']] ) )
{
  $user_contacts[] = implode(' ', $spl_cache_links[$cur_post['poster_id']]);
}
elseif ( $spl_config['show_in_viewtopic'] == '1' AND ( $spl_config['show_guest'] == '1' OR !$pun_user['is_guest'] ) )
{
  $target = ( $spl_config['link_target'] ) ? ' target="_blank"' : '';

  // This is the array we are going to use to build our links
  $spl_links = array();

  if ( ( isset( $spl_config['care2'] ) AND $spl_config['care2'] != '0' ) AND isset( $spl_cur_user['care2'] ) )
  {
    // Set the spl_username for care2
    $spl_username = ( $pun_config['o_censoring'] == '1' ? pun_htmlspecialchars( censor_words( $spl_cur_user['care2'] ) ) : pun_htmlspecialchars( $spl_cur_user['care2'] ) );

    // Fill the spl_links array for care2
    $spl_links['care2'] = array(
      'position'  =>  $spl_config['care2'],
      'username'  =>  $spl_username,
      'url'       =>  'http://www.care2.com/c2c/people/profile.html?pid='.$spl_username,
      'lang'      =>  $lang_spl['care2'],
      'icon'      =>  'Care2.png',
    );
  }

  if ( ( isset( $spl_config['delicious'] ) AND $spl_config['delicious'] != '0' ) AND isset( $spl_cur_user['delicious'] ) )
  {
    // Set the spl_username for delicious
    $spl_username = ( $pun_config['o_censoring'] == '1' ? pun_htmlspecialchars( censor_words( $spl_cur_user['delicious'] ) ) : pun_htmlspecialchars( $spl_cur_user['delicious'] ) );

    // Fill the spl_links array for deviantart
    $spl_links['delicious'] = array(
      'position'  =>  $spl_config['delicious'],
      'username'  =>  $spl_username,
      'url'       =>  'http://delicious.com/'.$spl_username,
      'lang'      =>  $lang_spl['delicious'],
      'icon'      =>  'Delicious.png',
    );
  }

  if ( ( isset( $spl_config['deviantart'] ) AND $spl_config['deviantart'] != '0' ) AND isset( $spl_cur_user['deviantart'] ) )
  {
    // Set the spl_username for deviantart
    $spl_username = ( $pun_config['o_censoring'] == '1' ? pun_htmlspecialchars( censor_words( $spl_cur_user['deviantart'] ) ) : pun_htmlspecialchars( $spl_cur_user['deviantart'] ) );

    // Fill the spl_links array for deviantart
    $spl_links['deviantart'] = array(
      'position'  =>  $spl_config['deviantart'],
      'username'  =>  $spl_username,
      'url'       =>  'http://'.$spl_username.'.deviantart.com',
      'lang'      =>  $lang_spl['deviantart'],
      'icon'      =>  'Deviantart.png',
    );
  }

  if ( ( isset( $spl_config['facebook'] ) AND $spl_config['facebook'] != '0' ) AND isset( $spl_cur_user['facebook'] ) )
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

  if ( ( isset( $spl_config['github'] ) AND $spl_config['github'] != '0' ) AND isset( $spl_cur_user['github'] ) )
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

  if ( ( isset( $spl_config['google+'] ) AND $spl_config['google+'] != '0' ) AND isset( $spl_cur_user['google+'] ) )
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

  if ( ( isset( $spl_config['instagram'] ) AND $spl_config['instagram'] != '0' ) AND isset( $spl_cur_user['instagram'] ) )
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

  if ( ( isset( $spl_config['pinterest'] ) AND $spl_config['pinterest'] != '0' ) AND isset( $spl_cur_user['pinterest'] ) )
  {
    // Set the spl_username for pinterest
    $spl_username = ( $pun_config['o_censoring'] == '1' ? pun_htmlspecialchars( censor_words( $spl_cur_user['pinterest'] ) ) : pun_htmlspecialchars( $spl_cur_user['pinterest'] ) );

    // Fill the spl_links array for pinterest
    $spl_links['pinterest'] = array(
      'position'  =>  $spl_config['pinterest'],
      'username'  =>  $spl_username,
      'url'       =>  'http://pinterest.com/'.$spl_username,
      'lang'      =>  $lang_spl['pinterest'],
      'icon'      =>  'Pinterest.png',
    );
  }

  if ( ( isset( $spl_config['stumbleupon'] ) AND $spl_config['stumbleupon'] != '0' ) AND isset( $spl_cur_user['stumbleupon'] ) )
  {
    // Set the spl_username for stumbleupon
    $spl_username = ( $pun_config['o_censoring'] == '1' ? pun_htmlspecialchars( censor_words( $spl_cur_user['stumbleupon'] ) ) : pun_htmlspecialchars( $spl_cur_user['stumbleupon'] ) );

    // Fill the spl_links array for stumbleupon
    $spl_links['stumbleupon'] = array(
      'position'  =>  $spl_config['stumbleupon'],
      'username'  =>  $spl_username,
      'url'       =>  'http://www.stumbleupon.com/stumbler/'.$spl_username,
      'lang'      =>  $lang_spl['stumbleupon'],
      'icon'      =>  'Stumbleupon.png',
    );
  }

  if ( ( isset( $spl_config['tumblr'] ) AND $spl_config['tumblr'] != '0' ) AND isset( $spl_cur_user['tumblr'] ) )
  {
    // Set the spl_username for tumblr
    $spl_username = ( $pun_config['o_censoring'] == '1' ? pun_htmlspecialchars( censor_words( $spl_cur_user['tumblr'] ) ) : pun_htmlspecialchars( $spl_cur_user['tumblr'] ) );

    // Fill the spl_links array for tumblr
    $spl_links['tumblr'] = array(
      'position'  =>  $spl_config['tumblr'],
      'username'  =>  $spl_username,
      'url'       =>  'http://'.$spl_username.'.tumblr.com',
      'lang'      =>  $lang_spl['tumblr'],
      'icon'      =>  'Tumblr.png',
    );
  }

  if ( ( isset( $spl_config['twitter'] ) AND $spl_config['twitter'] != '0' ) AND isset( $spl_cur_user['twitter'] ) )
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

  if ( ( isset( $spl_config['youtube'] ) AND $spl_config['youtube'] != '0' ) AND isset( $spl_cur_user['youtube'] ) )
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

  // Set the cache link
  $spl_cache_links[$cur_post['poster_id']] = array();

  // If the user_contacts is not empty we need two new lines
  if ( !empty( $user_contacts ) )
  {
    $user_contacts[] = $spl_cache_links[$cur_post['poster_id']][] = '<br /><br />';
  }

  // Here is where the magic is
  array_multisort( $spl_links );
  foreach ( $spl_links as $key )
  {
    if ( $spl_config['use_icon'] == '1' )
    {
      $user_contacts[] = $spl_cache_links[$cur_post['poster_id']][] = '<span><a href="'.$key['url'].'" rel="nofollow" title="'.$key['lang'].'"'.$target.'><img src="'.pun_htmlspecialchars( get_base_url( TRUE ) ).'/img/spl/'.$key['icon'].'" width="16" height="16" alt="'.$key['lang'].'" /></a></span>';
    }
    else
    {
      $user_contacts[] = $spl_cache_links[$cur_post['poster_id']][] = '<span class="website"><a href="'.$key['url'].'" rel="nofollow" title="'.$key['lang'].'"'.$target.'>'.$key['lang'].'</a></span>';
    }
  }
}
?>