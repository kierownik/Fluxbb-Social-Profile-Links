<?php

    $page_title = array(pun_htmlspecialchars($pun_config['o_board_title']), $lang_common['Profile'], 'Social Profile Links');
    define('PUN_ACTIVE_PAGE', 'profile');
    require PUN_ROOT.'header.php';

    generate_profile_menu('spl');

  // Load the social-profile-links.php language file
  require PUN_ROOT.'lang/'.$pun_user['language'].'/social-profile-links.php';

?>
  <div class="blockform">
    <h2><span><?php echo pun_htmlspecialchars($user['username']).' - Social Profile Links' ?></span></h2>
    <div class="box">
      <form id="profile3a" method="post" action="profile.php?section=spl&amp;id=<?php echo $id ?>">
        <div class="inform">
          <fieldset>
            <legend><?php echo $lang_spl['username of user id']; ?></legend>
            <div class="infldset">
              <input type="hidden" name="form_sent" value="1" />
            <?php
            if ($pun_config['o_spl_view_github'] == '1' OR $pun_config['o_spl_prof_github'] == '1')
            {
              echo '<label>'.$lang_spl['github'].'<br /><input id="spl_github" type="text" name="form[spl_github]" value="'.pun_htmlspecialchars($user['spl_github']).'" size="40" maxlength="75" placeholder="'.$lang_spl['username'].'" /><br /></label>';
            }

            if ($pun_config['o_spl_view_facebook'] == '1' OR $pun_config['o_spl_prof_facebook'] == '1')
            {
              echo '<label>'.$lang_spl['facebook'].'<br /><input id="spl_facebook" type="text" name="form[spl_facebook]" value="'.$user['spl_facebook'].'" size="40" maxlength="75" placeholder="'.$lang_spl['username'].'" /><br /></label>';
            }

            if ($pun_config['o_spl_view_twitter'] == '1' OR $pun_config['o_spl_prof_twitter'] == '1')
            {
              echo '<label>'.$lang_spl['twitter'].'<br /><input id="spl_twitter" type="text" name="form[spl_twitter]" value="'.pun_htmlspecialchars($user['spl_twitter']).'" size="40" maxlength="75" placeholder="'.$lang_spl['username'].'" /><br /></label>';
            }

            if ($pun_config['o_spl_view_youtube'] == '1' OR $pun_config['o_spl_prof_youtube'] == '1')
            {
              echo '<label>'.$lang_spl['youtube'].'<br /><input id="spl_youtube" type="text" name="form[spl_youtube]" value="'.pun_htmlspecialchars($user['spl_youtube']).'" size="40" maxlength="75" placeholder="'.$lang_spl['username'].'" /><br /></label>';
            }

            if ($pun_config['o_spl_view_googleplus'] == '1' OR $pun_config['o_spl_prof_googleplus'] == '1')
            {
              echo '<label>'.$lang_spl['google+'].'<br /><input id="spl_googleplus" type="text" name="form[spl_googleplus]" value="'.pun_htmlspecialchars($user['spl_googleplus']).'" size="40" maxlength="75" placeholder="'.$lang_spl['user id'].'"/><br /></label>';
            } ?>
            </div>
          </fieldset>
        </div>
        <p class="buttons"><input type="submit" name="update" value="<?php echo $lang_common['Submit'] ?>" /> <?php echo $lang_profile['Instructions'] ?></p>
      </form>
    </div>
  </div>