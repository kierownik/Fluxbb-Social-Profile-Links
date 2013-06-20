<?php

  // Load the social-profile-links.php language file
  require PUN_ROOT.'lang/'.$pun_user['language'].'/social-profile-links.php';

  $page_title = array( pun_htmlspecialchars( $pun_config['o_board_title'] ), $lang_common['Profile'], $lang_spl['social profile links'] );
  define( 'PUN_ACTIVE_PAGE', 'profile' );
  require PUN_ROOT.'header.php';

  generate_profile_menu( 'spl' );

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
            if ( $pun_config['o_spl_github'] == '1' OR $pun_config['o_spl_show_in_profile'] == '1' OR $pun_config['o_spl_show_in_viewtopic'] == '1' )
            {
              echo '<label>'.$lang_spl['github'].'<br /><input id="spl_github" type="text" name="form[spl_github]" value="'.pun_htmlspecialchars( $user['spl_github'] ).'" size="40" maxlength="50" placeholder="'.$lang_spl['username'].'" /><br /></label>';
            }

            if ( $pun_config['o_spl_facebook'] == '1' OR $pun_config['o_spl_show_in_profile'] == '1' OR $pun_config['o_spl_show_in_viewtopic'] == '1' )
            {
              echo '<label>'.$lang_spl['facebook'].'<br /><input id="spl_facebook" type="text" name="form[spl_facebook]" value="'.pun_htmlspecialchars( $user['spl_facebook'] ).'" size="40" maxlength="50" placeholder="'.$lang_spl['username'].'" /><br /></label>';
            }

            if ( $pun_config['o_spl_twitter'] == '1' OR $pun_config['o_spl_show_in_profile'] == '1' OR $pun_config['o_spl_show_in_viewtopic'] == '1' )
            {
              echo '<label>'.$lang_spl['twitter'].'<br /><input id="spl_twitter" type="text" name="form[spl_twitter]" value="'.pun_htmlspecialchars( $user['spl_twitter'] ).'" size="40" maxlength="15" placeholder="'.$lang_spl['username'].'" /><br /></label>';
            }

            if ( $pun_config['o_spl_youtube'] == '1' OR $pun_config['o_spl_show_in_profile'] == '1' OR $pun_config['o_spl_show_in_viewtopic'] == '1' )
            {
              echo '<label>'.$lang_spl['youtube'].'<br /><input id="spl_youtube" type="text" name="form[spl_youtube]" value="'.pun_htmlspecialchars( $user['spl_youtube'] ).'" size="40" maxlength="20" placeholder="'.$lang_spl['username'].'" /><br /></label>';
            }

            if ( $pun_config['o_spl_googleplus'] == '1' OR $pun_config['o_spl_show_in_profile'] == '1' OR $pun_config['o_spl_show_in_viewtopic'] == '1' )
            {
              echo '<label>'.$lang_spl['google+'].'<br /><input id="spl_googleplus" type="text" name="form[spl_googleplus]" value="'.pun_htmlspecialchars( $user['spl_googleplus'] ).'" size="40" maxlength="21" placeholder="'.$lang_spl['user id'].'"/><br /></label>';
            } ?>
            </div>
          </fieldset>
        </div>
        <p class="buttons"><input type="submit" name="update" value="<?php echo $lang_common['Submit'] ?>" /> <?php echo $lang_profile['Instructions'] ?></p>
      </form>
    </div>
  </div>