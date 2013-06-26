<?php

$spl_cur_post = ( $cur_post['social_profile_links'] != '') ? unserialize( $cur_post['social_profile_links'] ) : array();
$spl_config   = unserialize( $pun_config['o_social_profile_links'] );

// Are there cache links to display, we display them instead of going through the array
if ( isset( $spl_cache_links[$cur_post['poster_id']] ) )
{
  if ( !empty( $user_contacts ) )
  {
    $user_contacts[] = '<br /><br />';
  }
  $user_contacts[] = $spl_cache_links[$cur_post['poster_id']];
}
elseif ( $spl_config['show_in_viewtopic'] == '1' AND count( $spl_cur_post ) AND ( $spl_config['show_guest'] == '1' OR !$pun_user['is_guest'] ) )
{
  $target = ( $spl_config['link_target'] ) ? ' target="_blank"' : '';

  $spl_array = array(
    'github' => array(
      'config'    =>  $spl_config['github'],
      'username'  =>  isset( $spl_cur_post['github'] ) ? ( $pun_config['o_censoring'] == '1' ? pun_htmlspecialchars( censor_words( $spl_cur_post['github'] ) ) : pun_htmlspecialchars( $spl_cur_post['github'] ) ) : '',
      'url'       => 'https://github.com/'.( isset( $spl_cur_post['github'] ) ? ( $pun_config['o_censoring'] == '1' ? pun_htmlspecialchars( censor_words( $spl_cur_post['github'] ) ) : pun_htmlspecialchars( $spl_cur_post['github'] ) ) : '' ),
      'lang'      =>  $lang_spl['github'],
      'icon'      =>  'GitHub.png',
    ),
    'facebook' => array(
      'config'    =>  $spl_config['facebook'],
      'username'  =>  isset( $spl_cur_post['facebook'] ) ? ( $pun_config['o_censoring'] == '1' ? pun_htmlspecialchars( censor_words( $spl_cur_post['facebook'] ) ) : pun_htmlspecialchars( $spl_cur_post['facebook'] ) ) : '',
      'url'       => 'https://facebook.com/'.( isset( $spl_cur_post['facebook'] ) ? ( $pun_config['o_censoring'] == '1' ? pun_htmlspecialchars( censor_words( $spl_cur_post['facebook'] ) ) : pun_htmlspecialchars( $spl_cur_post['facebook'] ) ) : '' ),
      'lang'      =>  $lang_spl['facebook'],
      'icon'      =>  'Facebook.png',
    ),
    'twitter' => array(
      'config'    =>  $spl_config['twitter'],
      'username'  =>  isset( $spl_cur_post['twitter'] ) ? ( $pun_config['o_censoring'] == '1' ? pun_htmlspecialchars( censor_words( $spl_cur_post['twitter'] ) ) : pun_htmlspecialchars( $spl_cur_post['twitter'] ) ) : '',
      'url'       => 'https://twitter.com/'.( isset( $spl_cur_post['twitter'] ) ? ( $pun_config['o_censoring'] == '1' ? pun_htmlspecialchars( censor_words( $spl_cur_post['twitter'] ) ) : pun_htmlspecialchars( $spl_cur_post['twitter'] ) ) : '' ),
      'lang'      =>  $lang_spl['twitter'],
      'icon'      =>  'Twitter.png',
    ),
    'youtube' => array(
      'config'    =>  $spl_config['youtube'],
      'username'  =>  isset( $spl_cur_post['youtube'] ) ? ( $pun_config['o_censoring'] == '1' ? pun_htmlspecialchars( censor_words( $spl_cur_post['youtube'] ) ) : pun_htmlspecialchars( $spl_cur_post['youtube'] ) ) : '',
      'url'       => 'https://youtube.com/user/'.( isset( $spl_cur_post['youtube'] ) ? ( $pun_config['o_censoring'] == '1' ? pun_htmlspecialchars( censor_words( $spl_cur_post['youtube'] ) ) : pun_htmlspecialchars( $spl_cur_post['youtube'] ) ) : '' ),
      'lang'      =>  $lang_spl['youtube'],
      'icon'      =>  'YouTube.png',
    ),
    'google+' => array(
      'config'    =>  $spl_config['google+'],
      'username'  =>  isset( $spl_cur_post['google+'] ) ? ( $pun_config['o_censoring'] == '1' ? pun_htmlspecialchars( censor_words( $spl_cur_post['google+'] ) ) : pun_htmlspecialchars( $spl_cur_post['google+'] ) ) : '',
      'url'       => 'https://profiles.google.com/'.( isset( $spl_cur_post['google+'] ) ? ( $pun_config['o_censoring'] == '1' ? pun_htmlspecialchars( censor_words( $spl_cur_post['google+'] ) ) : pun_htmlspecialchars( $spl_cur_post['google+'] ) ) : '' ).'/posts',
      'lang'      =>  $lang_spl['google+'],
      'icon'      =>  'Google+.png',
    ),
    'instagram' => array(
      'config'    =>  $spl_config['instagram'],
      'username'  =>  isset( $spl_cur_post['instagram'] ) ? ( $pun_config['o_censoring'] == '1' ? pun_htmlspecialchars( censor_words( $spl_cur_post['instagram'] ) ) : pun_htmlspecialchars( $spl_cur_post['instagram'] ) ) : '',
      'url'       => 'http://instagram.com/'.( isset( $spl_cur_post['instagram'] ) ? ( $pun_config['o_censoring'] == '1' ? pun_htmlspecialchars( censor_words( $spl_cur_post['instagram'] ) ) : pun_htmlspecialchars( $spl_cur_post['instagram'] ) ) : '' ),
      'lang'      =>  $lang_spl['instagram'],
      'icon'      =>  'Instagram.png',
    ),
  );

  if ( !empty( $user_contacts ) )
  {
    $user_contacts[] = '<br /><br />';
  }

  // Set the cache link
  $spl_cache_links[$cur_post['poster_id']] = '';

  // Here is where the magic is
  foreach ( $spl_array as $key )
  {
    if ( $key['username'] != '' AND $key['config'] == '1' )
    {
      if ( $spl_config['use_icon'] == '1' )
      {
        // add link and icon to the cache link
        $spl_cache_links[$cur_post['poster_id']] .= '<span><a href="'.$key['url'].'" rel="nofollow" title="'.$key['lang'].'"'.$target.'><img src="'.pun_htmlspecialchars( get_base_url( true ) ).'/img/spl/'.$key['icon'].'" width="16" height="16" alt="'.$key['lang'].'" /></a></span> ';

        $user_contacts[] = '<span><a href="'.$key['url'].'" rel="nofollow" title="'.$key['lang'].'"'.$target.'><img src="'.pun_htmlspecialchars( get_base_url( true ) ).'/img/spl/'.$key['icon'].'" width="16" height="16" alt="'.$key['lang'].'" /></a></span>';
      }
      else
      {
        // add link to the cache link
        $spl_cache_links[$cur_post['poster_id']] .= '<span class="website"><a href="'.$key['url'].'" rel="nofollow" title="'.$key['lang'].'"'.$target.'>'.$key['lang'].'</a></span> ';

        $user_contacts[] = '<span class="website"><a href="'.$key['url'].'" rel="nofollow" title="'.$key['lang'].'"'.$target.'>'.$key['lang'].'</a></span>';
      }
    }
  }
}
?>