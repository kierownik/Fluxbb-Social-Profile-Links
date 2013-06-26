<?php

$spl_cur_user   = unserialize( $user['social_profile_links'] );
$spl_config     = unserialize( $pun_config['o_social_profile_links'] );

if ( $spl_config['show_in_profile'] == '1' AND count( $spl_cur_user ) AND ( $spl_config['show_guest'] == '1' OR !$pun_user['is_guest'] ) )
{
  $target = ( $spl_config['link_target'] ) ? ' target="_blank"' : '';

  $spl_array = array(
    'github' => array(
      'config'    =>  $spl_config['github'],
      'username'  =>  isset( $spl_cur_user['github'] ) ? ( $pun_config['o_censoring'] == '1' ? pun_htmlspecialchars( censor_words( $spl_cur_user['github'] ) ) : pun_htmlspecialchars( $spl_cur_user['github'] ) ) : '',
      'url'       => 'https://github.com/'.( isset( $spl_cur_user['github'] ) ? ( $pun_config['o_censoring'] == '1' ? pun_htmlspecialchars( censor_words( $spl_cur_user['github'] ) ) : pun_htmlspecialchars( $spl_cur_user['github'] ) ) : '' ),
      'lang'      =>  $lang_spl['github'],
      'icon'      =>  'GitHub.png',
    ),
    'facebook' => array(
      'config'    =>  $spl_config['facebook'],
      'username'  =>  isset( $spl_cur_user['facebook'] ) ? ( $pun_config['o_censoring'] == '1' ? pun_htmlspecialchars( censor_words( $spl_cur_user['facebook'] ) ) : pun_htmlspecialchars( $spl_cur_user['facebook'] ) ) : '',
      'url'       => 'https://facebook.com/'.( isset( $spl_cur_user['facebook'] ) ? ( $pun_config['o_censoring'] == '1' ? pun_htmlspecialchars( censor_words( $spl_cur_user['facebook'] ) ) : pun_htmlspecialchars( $spl_cur_user['facebook'] ) ) : '' ),
      'lang'      =>  $lang_spl['facebook'],
      'icon'      =>  'Facebook.png',
    ),
    'twitter' => array(
      'config'    =>  $spl_config['twitter'],
      'username'  =>  isset( $spl_cur_user['twitter'] ) ? ( $pun_config['o_censoring'] == '1' ? pun_htmlspecialchars( censor_words( $spl_cur_user['twitter'] ) ) : pun_htmlspecialchars( $spl_cur_user['twitter'] ) ) : '',
      'url'       => 'https://twitter.com/'.( isset( $spl_cur_user['twitter'] ) ? ( $pun_config['o_censoring'] == '1' ? pun_htmlspecialchars( censor_words( $spl_cur_user['twitter'] ) ) : pun_htmlspecialchars( $spl_cur_user['twitter'] ) ) : '' ),
      'lang'      =>  $lang_spl['twitter'],
      'icon'      =>  'Twitter.png',
    ),
    'youtube' => array(
      'config'    =>  $spl_config['youtube'],
      'username'  =>  isset( $spl_cur_user['youtube'] ) ? ( $pun_config['o_censoring'] == '1' ? pun_htmlspecialchars( censor_words( $spl_cur_user['youtube'] ) ) : pun_htmlspecialchars( $spl_cur_user['youtube'] ) ) : '',
      'url'       => 'https://youtube.com/user/'.( isset( $spl_cur_user['youtube'] ) ? ( $pun_config['o_censoring'] == '1' ? pun_htmlspecialchars( censor_words( $spl_cur_user['youtube'] ) ) : pun_htmlspecialchars( $spl_cur_user['youtube'] ) ) : '' ),
      'lang'      =>  $lang_spl['youtube'],
      'icon'      =>  'YouTube.png',
    ),
    'google+' => array(
      'config'    =>  $spl_config['google+'],
      'username'  =>  isset( $spl_cur_user['google+'] ) ? ( $pun_config['o_censoring'] == '1' ? pun_htmlspecialchars( censor_words( $spl_cur_user['google+'] ) ) : pun_htmlspecialchars( $spl_cur_user['google+'] ) ) : '',
      'url'       => 'https://profiles.google.com/'.( isset( $spl_cur_user['google+'] ) ? ( $pun_config['o_censoring'] == '1' ? pun_htmlspecialchars( censor_words( $spl_cur_user['google+'] ) ) : pun_htmlspecialchars( $spl_cur_user['google+'] ) ) : '' ).'/posts',
      'lang'      =>  $lang_spl['google+'],
      'icon'      =>  'Google+.png',
    ),
    'instagram' => array(
      'config'    =>  $spl_config['instagram'],
      'username'  =>  isset( $spl_cur_user['instagram'] ) ? ( $pun_config['o_censoring'] == '1' ? pun_htmlspecialchars( censor_words( $spl_cur_user['instagram'] ) ) : pun_htmlspecialchars( $spl_cur_user['instagram'] ) ) : '',
      'url'       => 'http://instagram.com/'.( isset( $spl_cur_user['instagram'] ) ? ( $pun_config['o_censoring'] == '1' ? pun_htmlspecialchars( censor_words( $spl_cur_user['instagram'] ) ) : pun_htmlspecialchars( $spl_cur_user['instagram'] ) ) : '' ),
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

      if ( $spl_config['use_icon'] == '1' )
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