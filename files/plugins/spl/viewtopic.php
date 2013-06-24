<?php

$spl_cur_post = unserialize( $cur_post['social_profile_links'] );
$spl_config   = unserialize( $pun_config['o_social_profile_links'] );

if ( $spl_config['show_in_viewtopic'] == '1' AND ( $spl_config['show_guest'] == '1' OR !$pun_user['is_guest'] ) )
{
  // If there are links to display we need to add 2 empty newlines
  if ( !empty($user_contacts) AND ( $spl_cur_post['github'] != '' OR $spl_cur_post['facebook'] != '' OR $spl_cur_post['twitter'] != '' OR $spl_cur_post['youtube'] != '' OR $spl_cur_post['googleplus'] != '' OR $spl_cur_post['instagram'] != '' ) )
  {
    $target = ( $spl_config['link_target'] ) ? ' target="_blank"' : '';

    $spl_array = array(
      'github' => array(
        'config'    =>  $spl_config['github'],
        'username'  =>  pun_htmlspecialchars( ( $pun_config['o_censoring'] == '1' ) ? censor_words( $spl_cur_post['github'] ) : $spl_cur_post['github'] ),
        'url'       => 'https://github.com/'.pun_htmlspecialchars( ( $pun_config['o_censoring'] == '1' ) ? censor_words( $spl_cur_post['github'] ) : $spl_cur_post['github'] ),
        'lang'      =>  $lang_spl['github'],
        'icon'      =>  'GitHub.png',
      ),
      'facebook' => array(
        'config'    =>  $spl_config['facebook'],
        'username'  =>  pun_htmlspecialchars( ( $pun_config['o_censoring'] == '1' ) ? censor_words( $spl_cur_post['facebook'] ) : $spl_cur_post['facebook'] ),
        'url'       => 'https://facebook.com/'.pun_htmlspecialchars( ( $pun_config['o_censoring'] == '1' ) ? censor_words( $spl_cur_post['facebook'] ) : $spl_cur_post['facebook'] ),
        'lang'      =>  $lang_spl['facebook'],
        'icon'      =>  'Facebook.png',
      ),
      'twitter' => array(
        'config'    =>  $spl_config['twitter'],
        'username'  =>  pun_htmlspecialchars( ( $pun_config['o_censoring'] == '1' ) ? censor_words( $spl_cur_post['twitter'] ) : $spl_cur_post['twitter'] ),
        'url'       => 'https://twitter.com/'.pun_htmlspecialchars( ( $pun_config['o_censoring'] == '1' ) ? censor_words( $spl_cur_post['twitter'] ) : $spl_cur_post['twitter'] ),
        'lang'      =>  $lang_spl['twitter'],
        'icon'      =>  'Twitter.png',
      ),
      'youtube' => array(
        'config'    =>  $spl_config['youtube'],
        'username'  =>  pun_htmlspecialchars( ( $pun_config['o_censoring'] == '1' ) ? censor_words( $spl_cur_post['youtube'] ) : $spl_cur_post['youtube'] ),
        'url'       => 'https://youtube.com/user/'.pun_htmlspecialchars( ( $pun_config['o_censoring'] == '1' ) ? censor_words( $spl_cur_post['youtube'] ) : $spl_cur_post['youtube'] ),
        'lang'      =>  $lang_spl['youtube'],
        'icon'      =>  'YouTube.png',
      ),
      'googleplus' => array(
        'config'    =>  $spl_config['googleplus'],
        'username'  =>  pun_htmlspecialchars( ( $pun_config['o_censoring'] == '1' ) ? censor_words( $spl_cur_post['googleplus'] ) : $spl_cur_post['googleplus'] ),
        'url'       => 'https://profiles.google.com/'.pun_htmlspecialchars( ( $pun_config['o_censoring'] == '1' ) ? censor_words( $spl_cur_post['googleplus'] ) : $spl_cur_post['googleplus'] ).'/posts',
        'lang'      =>  $lang_spl['google+'],
        'icon'      =>  'Google+.png',
      ),
      'instagram' => array(
        'config'    =>  $spl_config['instagram'],
        'username'  =>  pun_htmlspecialchars( ( $pun_config['o_censoring'] == '1' ) ? censor_words( $spl_cur_post['instagram'] ) : $spl_cur_post['instagram'] ),
        'url'       => 'http://instagram.com/'.pun_htmlspecialchars( ( $pun_config['o_censoring'] == '1' ) ? censor_words( $spl_cur_post['instagram'] ) : $spl_cur_post['instagram'] ),
        'lang'      =>  $lang_spl['instagram'],
        'icon'      =>  'Instagram.png',
      ),
    );

    $user_contacts[] = '<br /><br />';

    // Here is where the magic is
    foreach ( $spl_array as $key )
    {
      if ( $key['username'] != '' AND $spl_config['use_icon'] == '1' AND $key['config'] == '1' )
      {
        $user_contacts[] = '<span><a href="'.$key['url'].'" rel="nofollow" title="'.$key['lang'].'"'.$target.'><img src="'.pun_htmlspecialchars( get_base_url( true ) ).'/img/spl/'.$key['icon'].'" width="16" height="16" alt="'.$key['lang'].'" /></a></span>';
      }
      elseif ( $key['username'] != '' AND $spl_config['use_icon'] == '0' AND $key['config'] == '1' )
      {
        $user_contacts[] = '<span class="website"><a href="'.$key['url'].'" rel="nofollow" title="'.$key['lang'].'"'.$target.'>'.$key['lang'].'</a></span>';
      }
    }
  }
}
?>