<?php

$page_title = array( pun_htmlspecialchars( $pun_config['o_board_title'] ), $lang_common['Profile'], $lang_spl['social profile links'] );
define( 'PUN_ACTIVE_PAGE', 'profile' );
require PUN_ROOT.'header.php';

generate_profile_menu( 'spl' );

$spl_user   = unserialize( $user['social_profile_links'] );
$spl_config = unserialize( $pun_config['o_social_profile_links'] );
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
            if ( $spl_config['github'] == '1' )
            {
              echo '<label>'.$lang_spl['github'].'<br /><input id="github" type="text" name="form[github]" value="'.pun_htmlspecialchars( $spl_user['github'] ).'" size="40" maxlength="50" placeholder="'.$lang_spl['username'].'" /><br /></label>';
            }

            if ( $spl_config['facebook'] == '1' )
            {
              echo '<label>'.$lang_spl['facebook'].'<br /><input id="facebook" type="text" name="form[facebook]" value="'.pun_htmlspecialchars( $spl_user['facebook'] ).'" size="40" maxlength="50" placeholder="'.$lang_spl['username'].'" /><br /></label>';
            }

            if ( $spl_config['twitter'] == '1' )
            {
              echo '<label>'.$lang_spl['twitter'].'<br /><input id="twitter" type="text" name="form[twitter]" value="'.pun_htmlspecialchars( $spl_user['twitter'] ).'" size="40" maxlength="15" placeholder="'.$lang_spl['username'].'" /><br /></label>';
            }

            if ( $spl_config['youtube'] == '1' )
            {
              echo '<label>'.$lang_spl['youtube'].'<br /><input id="youtube" type="text" name="form[youtube]" value="'.pun_htmlspecialchars( $spl_user['youtube'] ).'" size="40" maxlength="20" placeholder="'.$lang_spl['username'].'" /><br /></label>';
            }

            if ( $spl_config['googleplus'] == '1' )
            {
              echo '<label>'.$lang_spl['google+'].'<br /><input id="googleplus" type="text" name="form[googleplus]" value="'.pun_htmlspecialchars( $spl_user['googleplus'] ).'" size="40" maxlength="21" placeholder="'.$lang_spl['user id'].'"/><br /></label>';
            }

            if ( $spl_config['instagram'] == '1' )
            {
              echo '<label>'.$lang_spl['instagram'].'<br /><input id="instagram" type="text" name="form[instagram]" value="'.pun_htmlspecialchars( $spl_user['instagram'] ).'" size="40" maxlength="30" placeholder="'.$lang_spl['username'].'"/><br /></label>';
            } ?>
            </div>
          </fieldset>
        </div>
        <p class="buttons"><input type="submit" name="update" value="<?php echo $lang_common['Submit'] ?>" /> <?php echo $lang_profile['Instructions'] ?></p>
      </form>
    </div>
  </div>