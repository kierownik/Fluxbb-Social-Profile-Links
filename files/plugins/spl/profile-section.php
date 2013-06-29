<?php

$page_title = array( pun_htmlspecialchars( $pun_config['o_board_title'] ), $lang_common['Profile'], $lang_spl['social profile links'] );
define( 'PUN_ACTIVE_PAGE', 'profile' );
require PUN_ROOT.'header.php';

generate_profile_menu( 'spl' );

$spl_user   = unserialize( $user['social_profile_links'] );
$spl_config = unserialize( $pun_config['o_social_profile_links'] );

// link options - github => 50 <- is maxlength
$link_options = array( 'github' => '50', 'facebook' => '50', 'youtube' => '20', 'twitter' => '15', 'google+' => '21', 'instagram' => '30' );
ksort( $link_options );
?>
  <div class="blockform">
    <h2><span><?php echo pun_htmlspecialchars( $user['username'] ).' - '. $lang_spl['social profile links'] ?></span></h2>
    <div class="box">
      <form id="profile3a" method="post" action="profile.php?section=spl&amp;id=<?php echo $id ?>">
        <div class="inform">
          <fieldset>
            <legend><?php echo $lang_spl['username of user id']; ?></legend>
            <div class="infldset">
              <input type="hidden" name="form_sent" value="1" />
            <?php
            foreach ( $link_options AS $key => $value)
            {
              if ( $spl_config[$key] == '1' )
              {
                if ( $key == 'google+' )
                {
                  $spl_user[$key] = isset( $spl_user[$key] ) ? pun_htmlspecialchars( $spl_user[$key] ) : '';
                  echo '<label>'.$lang_spl[$key].'<br /><input id="'.$key.'" type="text" name="form['.$key.']" value="'.$spl_user[$key].'" size="40" maxlength="'.$value.'" placeholder="'.$lang_spl['user id'].'" /><br /></label>';
                }
                else
                {
                  $spl_user[$key] = isset( $spl_user[$key] ) ? pun_htmlspecialchars( $spl_user[$key] ) : '';
                  echo '<label>'.$lang_spl[$key].'<br /><input id="'.$key.'" type="text" name="form['.$key.']" value="'.$spl_user[$key].'" size="40" maxlength="'.$value.'" placeholder="'.$lang_spl['username'].'" /><br /></label>';
                }
              }
            } ?>
            </div>
          </fieldset>
        </div>
        <p class="buttons"><input type="submit" name="update" value="<?php echo $lang_common['Submit'] ?>" /> <?php echo $lang_profile['Instructions'] ?></p>
      </form>
    </div>
  </div>