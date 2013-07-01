<?php

$page_title = array( pun_htmlspecialchars( $pun_config['o_board_title'] ), $lang_common['Profile'], $lang_spl['social profile links'] );
define( 'PUN_ACTIVE_PAGE', 'profile' );
require PUN_ROOT.'header.php';

generate_profile_menu( 'spl' );

$spl_user   = unserialize( $user['social_profile_links'] );
$spl_config = unserialize( $pun_config['o_social_profile_links'] );

// $link_options is used to build the input boxes
$link_options = array();

if ( !empty( $spl_config['github'] ) AND $spl_config['github'] != '0' )
{
  $link_options['github'] = array(
    'position'  =>  $spl_config['github'],
    'maxlength' =>  '50'
  );
}

if ( !empty( $spl_config['facebook'] ) AND $spl_config['facebook'] != '0' )
{
  $link_options['facebook'] = array(
    'position'  =>  $spl_config['facebook'],
    'maxlength' =>  '50'
  );
}

if ( !empty( $spl_config['youtube'] ) AND $spl_config['youtube'] != '0' )
{
  $link_options['youtube'] = array(
    'position'  =>  $spl_config['youtube'],
    'maxlength' =>  '20'
  );
}

if ( !empty( $spl_config['twitter'] ) AND $spl_config['twitter'] != '0' )
{
  $link_options['twitter'] = array(
    'position'  =>  $spl_config['twitter'],
    'maxlength' =>  '15'
  );
}

if ( !empty( $spl_config['google+'] ) AND $spl_config['google+'] != '0' )
{
  $link_options['google+'] = array(
    'position'  =>  $spl_config['google+'],
    'maxlength' =>  '21'
  );
}

if ( !empty( $spl_config['instagram'] ) AND $spl_config['instagram'] != '0' )
{
  $link_options['instagram'] = array(
    'position'  =>  $spl_config['instagram'],
    'maxlength' =>  '30'
  );
}

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
              array_multisort( $link_options );
              foreach ( $link_options AS $key => $value )
              {
                $spl_user[$key] = isset( $spl_user[$key] ) ? pun_htmlspecialchars( $spl_user[$key] ) : '';

                if ( $key == 'google+' )
                {
                  echo '<label>'.$lang_spl[$key].'<br /><input id="'.$key.'" type="text" name="form['.$key.']" value="'.$spl_user[$key].'" size="40" maxlength="'.$value['maxlength'].'" placeholder="'.$lang_spl['user id'].'" /><br /></label>';
                }
                else
                {
                  echo '<label>'.$lang_spl[$key].'<br /><input id="'.$key.'" type="text" name="form['.$key.']" value="'.$spl_user[$key].'" size="40" maxlength="'.$value['maxlength'].'" placeholder="'.$lang_spl['username'].'" /><br /></label>';
                }
              }
              ?>
            </div>
          </fieldset>
        </div>
        <p class="buttons">
          <input type="submit" name="update" value="<?php echo $lang_common['Submit'] ?>" /> <?php echo $lang_profile['Instructions'] ?>
        </p>
      </form>
    </div>
  </div>