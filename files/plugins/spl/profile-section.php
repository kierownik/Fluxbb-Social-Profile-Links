<?php

		$page_title = array(pun_htmlspecialchars($pun_config['o_board_title']), $lang_common['Profile'], 'Social Profile Links');
		define('PUN_ACTIVE_PAGE', 'profile');
		require PUN_ROOT.'header.php';

		generate_profile_menu('spl');

?>
	<div class="blockform">
		<h2><span><?php echo pun_htmlspecialchars($user['username']).' - Social Profile Links' ?></span></h2>
		<div class="box">
			<form id="profile3a" method="post" action="profile.php?section=spl&amp;id=<?php echo $id ?>">
				<div class="inform">
					<fieldset>
						<legend>Enter your usernames</legend>
						<div class="infldset">
							<input type="hidden" name="form_sent" value="1" />
							<label>Github<br /><input id="spl_github" type="text" name="form[spl_github]" value="<?php echo pun_htmlspecialchars($user['spl_github']) ?>" size="40" maxlength="75" placeholder="Username" /><br /></label>
							<label>Facebook<br /><input id="spl_facebook" type="text" name="form[spl_facebook]" value="<?php echo $user['spl_facebook'] ?>" size="40" maxlength="75" placeholder="Username" /><br /></label>
							<label>Twitter<br /><input id="spl_twitter" type="text" name="form[spl_twitter]" value="<?php echo pun_htmlspecialchars($user['spl_twitter']) ?>" size="40" maxlength="75" placeholder="Username" /><br /></label>
							<label>Youtube<br /><input id="spl_youtube" type="text" name="form[spl_youtube]" value="<?php echo pun_htmlspecialchars($user['spl_youtube']) ?>" size="40" maxlength="75" placeholder="Username" /><br /></label>
							<label>Google+<br /><input id="spl_googleplus" type="text" name="form[spl_googleplus]" value="<?php echo pun_htmlspecialchars($user['spl_googleplus']) ?>" size="40" maxlength="75" placeholder="google+ user id"/><br /></label>
						</div>
					</fieldset>
				</div>
				<p class="buttons"><input type="submit" name="update" value="<?php echo $lang_common['Submit'] ?>" /> <?php echo $lang_profile['Instructions'] ?></p>
			</form>
		</div>
	</div>