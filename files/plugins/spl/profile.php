<?php

if ( $pun_config['o_spl_show_in_profile'] == '1' AND ( $pun_config['o_spl_show_guest'] == '1' OR !$pun_user['is_guest'] ) )
{
  $target = ( $pun_config['o_spl_link_target'] ) ? ' target="_blank"' : '';

  $spl_array = array(
    'github' => array(
      'config'    =>  $pun_config['o_spl_github'],
      'username'  =>  pun_htmlspecialchars( ( $pun_config['o_censoring'] == '1' ) ? censor_words( $user['spl_github'] ) : $user['spl_github'] ),
      'url'       => 'https://github.com/'.pun_htmlspecialchars( ( $pun_config['o_censoring'] == '1' ) ? censor_words( $user['spl_github'] ) : $user['spl_github'] ),
      'lang'      =>  $lang_spl['github'],
      'icon'      =>  'GitHub.png',
    ),
    'facebook' => array(
      'config'    =>  $pun_config['o_spl_facebook'],
      'username'  =>  pun_htmlspecialchars( ( $pun_config['o_censoring'] == '1' ) ? censor_words( $user['spl_facebook'] ) : $user['spl_facebook'] ),
      'url'       => 'https://facebook.com/'.pun_htmlspecialchars( ( $pun_config['o_censoring'] == '1' ) ? censor_words( $user['spl_facebook'] ) : $user['spl_facebook'] ),
      'lang'      =>  $lang_spl['facebook'],
      'icon'      =>  'Facebook.png',
    ),
    'twitter' => array(
      'config'    =>  $pun_config['o_spl_twitter'],
      'username'  =>  pun_htmlspecialchars( ( $pun_config['o_censoring'] == '1' ) ? censor_words( $user['spl_twitter'] ) : $user['spl_twitter'] ),
      'url'       => 'https://twitter.com/'.pun_htmlspecialchars( ( $pun_config['o_censoring'] == '1' ) ? censor_words( $user['spl_twitter'] ) : $user['spl_twitter'] ),
      'lang'      =>  $lang_spl['twitter'],
      'icon'      =>  'Twitter.png',
    ),
    'youtube' => array(
      'config'    =>  $pun_config['o_spl_youtube'],
      'username'  =>  pun_htmlspecialchars( ( $pun_config['o_censoring'] == '1' ) ? censor_words( $user['spl_youtube'] ) : $user['spl_youtube'] ),
      'url'       => 'https://youtube.com/user/'.pun_htmlspecialchars( ( $pun_config['o_censoring'] == '1' ) ? censor_words( $user['spl_youtube'] ) : $user['spl_youtube'] ),
      'lang'      =>  $lang_spl['youtube'],
      'icon'      =>  'YouTube.png',
    ),
    'google+' => array(
      'config'    =>  $pun_config['o_spl_googleplus'],
      'username'  =>  pun_htmlspecialchars( ( $pun_config['o_censoring'] == '1' ) ? censor_words( $user['spl_googleplus'] ) : $user['spl_googleplus'] ),
      'url'       => 'https://profiles.google.com/'.pun_htmlspecialchars( ( $pun_config['o_censoring'] == '1' ) ? censor_words( $user['spl_googleplus'] ) : $user['spl_googleplus'] ).'/posts',
      'lang'      =>  $lang_spl['google+'],
      'icon'      =>  'Google+.png',
    ),
    'instagram' => array(
      'config'    =>  $pun_config['o_spl_instagram'],
      'username'  =>  pun_htmlspecialchars( ( $pun_config['o_censoring'] == '1' ) ? censor_words( $user['spl_instagram'] ) : $user['spl_instagram'] ),
      'url'       => 'http://instagram.com/'.pun_htmlspecialchars( ( $pun_config['o_censoring'] == '1' ) ? censor_words( $user['spl_instagram'] ) : $user['spl_instagram'] ),
      'lang'      =>  $lang_spl['instagram'],
      'icon'      =>  'Instagram.png',
    ),
  );

  // Here is where the magic is
  foreach ( $spl_array as $key )
  {
    if ( $key['config'] == '1' AND $key['username'] != '' )
    {
      $user_personal[] = '<dt>'.$key['lang'].'</dt>';

      if ( $pun_config['o_spl_use_icon'] == '1' )
      {
        $user_personal[] = '<dd><span><a href="'.$key['url'].'" title="'.$key['lang'].'" rel="nofollow"'.$target.'><img src="'.pun_htmlspecialchars( get_base_url( true ) ).'/img/spl/'.$key['icon'].'" width="16" height="16" alt="'.$key['lang'].'" /></a></span></dd>';
      }
      else
      {
        $user_personal[] = '<dd><span class="website"><a href="'.$key['url'].'" title="'.$key['lang'].'" rel="nofollow"'.$target.'>'.$key['username'].'</a></span></dd>';
      }
    }
  };
}
?>