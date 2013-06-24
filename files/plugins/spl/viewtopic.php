<?php

if ( $pun_config['o_spl_show_in_viewtopic'] == '1' AND ( $pun_config['o_spl_show_guest'] == '1' OR !$pun_user['is_guest'] ) )
{
  // If there are links to display we need to add 2 empty newlines
  if ( !empty($user_contacts) AND ( $cur_post['spl_github'] != '' OR $cur_post['spl_facebook'] != '' OR $cur_post['spl_twitter'] != '' OR $cur_post['spl_youtube'] != '' OR $cur_post['spl_googleplus'] != '' ) )
  {
    $user_contacts[] = '<br /><br />';
  }

  $target = ( $pun_config['o_spl_link_target'] ) ? ' target="_blank"' : '';

  $spl_array = array(
    'github' => array(
      'config'    =>  $pun_config['o_spl_github'],
      'username'  =>  pun_htmlspecialchars( ( $pun_config['o_censoring'] == '1' ) ? censor_words( $cur_post['spl_github'] ) : $cur_post['spl_github'] ),
      'url'       => 'https://github.com/'.pun_htmlspecialchars( ( $pun_config['o_censoring'] == '1' ) ? censor_words( $cur_post['spl_github'] ) : $cur_post['spl_github'] ),
      'lang'      =>  $lang_spl['github'],
      'icon'      =>  'GitHub.png',
    ),
    'facebook' => array(
      'config'    =>  $pun_config['o_spl_facebook'],
      'username'  =>  pun_htmlspecialchars( ( $pun_config['o_censoring'] == '1' ) ? censor_words( $cur_post['spl_facebook'] ) : $cur_post['spl_facebook'] ),
      'url'       => 'https://facebook.com/'.pun_htmlspecialchars( ( $pun_config['o_censoring'] == '1' ) ? censor_words( $cur_post['spl_facebook'] ) : $cur_post['spl_facebook'] ),
      'lang'      =>  $lang_spl['facebook'],
      'icon'      =>  'Facebook.png',
    ),
    'twitter' => array(
      'config'    =>  $pun_config['o_spl_twitter'],
      'username'  =>  pun_htmlspecialchars( ( $pun_config['o_censoring'] == '1' ) ? censor_words( $cur_post['spl_twitter'] ) : $cur_post['spl_twitter'] ),
      'url'       => 'https://twitter.com/'.pun_htmlspecialchars( ( $pun_config['o_censoring'] == '1' ) ? censor_words( $cur_post['spl_twitter'] ) : $cur_post['spl_twitter'] ),
      'lang'      =>  $lang_spl['twitter'],
      'icon'      =>  'Twitter.png',
    ),
    'youtube' => array(
      'config'    =>  $pun_config['o_spl_youtube'],
      'username'  =>  pun_htmlspecialchars( ( $pun_config['o_censoring'] == '1' ) ? censor_words( $cur_post['spl_youtube'] ) : $cur_post['spl_youtube'] ),
      'url'       => 'https://youtube.com/user/'.pun_htmlspecialchars( ( $pun_config['o_censoring'] == '1' ) ? censor_words( $cur_post['spl_youtube'] ) : $cur_post['spl_youtube'] ),
      'lang'      =>  $lang_spl['youtube'],
      'icon'      =>  'YouTube.png',
    ),
    'google+' => array(
      'config'    =>  $pun_config['o_spl_googleplus'],
      'username'  =>  pun_htmlspecialchars( ( $pun_config['o_censoring'] == '1' ) ? censor_words( $cur_post['spl_googleplus'] ) : $cur_post['spl_googleplus'] ),
      'url'       => 'https://profiles.google.com/'.pun_htmlspecialchars( ( $pun_config['o_censoring'] == '1' ) ? censor_words( $cur_post['spl_googleplus'] ) : $cur_post['spl_googleplus'] ).'/posts',
      'lang'      =>  $lang_spl['google+'],
      'icon'      =>  'Google+.png',
    ),
    'instagram' => array(
      'config'    =>  $pun_config['o_spl_instagram'],
      'username'  =>  pun_htmlspecialchars( ( $pun_config['o_censoring'] == '1' ) ? censor_words( $cur_post['spl_instagram'] ) : $cur_post['spl_instagram'] ),
      'url'       => 'http://instagram.com/'.pun_htmlspecialchars( ( $pun_config['o_censoring'] == '1' ) ? censor_words( $cur_post['spl_instagram'] ) : $cur_post['spl_instagram'] ),
      'lang'      =>  $lang_spl['instagram'],
      'icon'      =>  'Instagram.png',
    ),
  );

  // Here is where the magic is
  foreach ( $spl_array as $key )
  {
    if ( $key['username'] != '' AND $pun_config['o_spl_use_icon'] == '1' AND $key['config'] == '1' )
    {
      $user_contacts[] = '<span><a href="'.$key['url'].'" rel="nofollow" title="'.$key['lang'].'"'.$target.'><img src="'.pun_htmlspecialchars( get_base_url( true ) ).'/img/spl/'.$key['icon'].'" width="16" height="16" alt="'.$key['lang'].'" /></a></span>';
    }
    elseif ($key['username'] != '' AND $pun_config['o_spl_use_icon'] == '0' AND $key['config'] == '1' )
    {
      $user_contacts[] = '<span class="website"><a href="'.$key['url'].'" rel="nofollow" title="'.$key['lang'].'"'.$target.'>'.$key['lang'].'</a></span>';
    }
  };
}
?>