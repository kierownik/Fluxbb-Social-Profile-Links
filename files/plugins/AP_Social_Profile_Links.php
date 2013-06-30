<?php

/**
************************************************************************
*  Author: kierownik
*  Date: 2013-06-15
*  Description: Adds Social links to the profile and viewtopic pages
*               where users can add their usernames.
*  Copyright (C) Daniel Rokven ( rokven@gmail.com )
*  License: http://www.gnu.org/licenses/gpl.html GPL version 2 or higher
*
************************************************************************
**/

// Make sure no one attempts to run this script "directly"
if ( !defined( 'PUN' ) )
{
  exit;
}

// Load the social-profile-links.php language file
if ( file_exists( PUN_ROOT.'lang/'.$pun_user['language'].'/social-profile-links.php' ) )
  require PUN_ROOT.'lang/'.$pun_user['language'].'/social-profile-links.php';
else
  require PUN_ROOT.'lang/English/social-profile-links.php';

// Tell admin_loader.php that this is indeed a plugin and that it is loaded
define( 'PUN_PLUGIN_LOADED', 1 );

// Plugin version
define('PLUGIN_VERSION', '1.1.0');

// Link options we use to show the checkboxes
$spl_config = unserialize( $pun_config['o_social_profile_links'] );
$link_options = array(
  'github'    =>  $spl_config['github'],
  'facebook'  =>  $spl_config['facebook'],
  'twitter'   =>  $spl_config['twitter'],
  'youtube'   =>  $spl_config['youtube'],
  'google+'   =>  $spl_config['google+'],
  'instagram' =>  $spl_config['instagram'],
);

//
// The rest is up to you!
//
if ( isset( $_POST['set_options'] ) )
{
  $updated = false;

  $spl_options = array(
    'github'            => !empty( $_POST['github'] ) ? intval( $_POST['github'] ) : '0',
    'facebook'          => !empty( $_POST['facebook'] ) ? intval( $_POST['facebook'] ) : '0',
    'twitter'           => !empty( $_POST['twitter'] ) ? intval( $_POST['twitter'] ) : '0',
    'youtube'           => !empty( $_POST['youtube'] ) ? intval( $_POST['youtube'] ) : '0',
    'google+'           => !empty( $_POST['google+'] ) ? intval( $_POST['google+'] ) : '0',
    'instagram'         => !empty( $_POST['instagram'] ) ? intval( $_POST['instagram'] ) : '0',
    'show_in_profile'   => isset( $_POST['show_in_profile'] ) ? '1' : '0',
    'show_in_viewtopic' => isset( $_POST['show_in_viewtopic'] ) ? '1' : '0',
    'use_icon'          => isset( $_POST['use_icon'] ) ? '1' : '0',
    'show_guest'        => isset( $_POST['show_guest'] ) ? '1' : '0',
    'link_target'       => pun_htmlspecialchars( $_POST['link_target'] ),
  );

  if ( serialize( $spl_options ) != $pun_config['o_social_profile_links'] )
  {
    $query= 'UPDATE `'.$db->prefix."config` SET `conf_value` = '".$db->escape( serialize( $spl_options ) )."' WHERE `conf_name` = 'o_social_profile_links'";

    $db->query( $query ) or error( 'Unable to update board config post '. print_r( $db->error() ),__FILE__, __LINE__, $db->error() );

    $updated = true;
  }

  if ( $updated )
  {
    // Regenerate the config cache
    require_once PUN_ROOT.'include/cache.php';
    generate_config_cache();
    redirect( $_SERVER['REQUEST_URI'], $lang_spl['data saved'] );
  }
} // end set_options

  // Display the admin navigation menu
  generate_admin_menu( $plugin );

  // We need all the config unserialized
  $spl_config = unserialize( $pun_config['o_social_profile_links'] );
?>
<div id="exampleplugin" class="plugin blockform">
  <h2><span><?php echo $lang_spl['social profile links'] ?> - v<?php echo PLUGIN_VERSION ?></span></h2>
  <div class="box">
    <div class="inbox">
      <p><?php echo $lang_spl['social profile links info'] ?></p>
    </div>
  </div>
</div>
<div class="blockform">
  <h2 class="block2"><span><?php echo $lang_spl['options'] ?></span></h2>
  <div class="box">
    <form id="spl" method="post" action="<?php echo $_SERVER['REQUEST_URI'] ?>">
    <div class="inform">
        <p class="submittop">
          <input type="submit" name="set_options" value="<?php echo $lang_spl['save options'] ?>"/>
        </p>
      <fieldset>
      <legend><?php echo $lang_spl['link options'] ?></legend>
      <?php
      $enabled = false;
      foreach( $link_options AS $key => $value )
      {
        $enabled = $enabled || ( $value !== '0' );
      }

      if ( $enabled )
      {
        ?>
        <div class="infldset">
          <table class="aligntop" cellspacing="0">
            <tr>
              <td><strong><?php echo $lang_spl['enabled links'] ?></strong></td>
            </tr>
          <?php
          array_multisort( $link_options );
          foreach ( $link_options AS $key => $value )
          {
            if ( $value != '0' )
            {
              ?>
              <tr>
                <th scope="col"><?php echo $lang_spl[$key] ?></th>
                <td>
                  <input type="text" name="<?php echo $key ?>" value="<?php echo $value ?>" />
                </td>
              </tr>
              <?php
            }
          }
          ?>
          </table>
        </div>  <!-- end class="infldset" -->
        <?php
      }

      $disabled = false;
      foreach( $link_options AS $key => $value )
      {
        $disabled = $disabled || ( $value == '0' );
      }

      if ( $enabled AND $disabled )
        echo '<br />';

      if ( $disabled )
      {
        ?>
        <div class="infldset">
          <table class="aligntop" cellspacing="0">
            <tr>
              <td><strong><?php echo $lang_spl['disabled links'] ?></strong></td>
            </tr>
          <?php
          foreach ( $link_options AS $key => $value )
          {
            if ( $value == '0' )
            {
              ?>
              <tr>
                <th scope="col"><?php echo $lang_spl[$key] ?></th>
                <td>
                  <input type="text" name="<?php echo $key ?>" value="<?php echo $value ?>" />
                </td>
              </tr>
              <?php
            }
          }
          ?>
          </table>
        </div>  <!-- end class="infldset" -->
        <?php
      }
      ?>
      </fieldset>
      <fieldset>
        <legend><?php echo $lang_spl['display options'] ?></legend>
        <div class="infldset">
          <table class="aligntop" cellspacing="0">
            <tr>
              <th scope="col"><?php echo $lang_spl['show in users profile'] ?></th>
              <td>
                <input type="checkbox" name="show_in_profile" value="1" 
                <?php
                  if ( $spl_config['show_in_profile'] == '1' )
                  {
                    echo ' checked="checked"';
                  }
                ?> />
              </td>
            </tr>
            <tr>
              <th scope="col"><?php echo $lang_spl['show in viewtopic'] ?></th>
              <td>
                <input type="checkbox" name="show_in_viewtopic" value="1" 
                <?php
                  if ( $spl_config['show_in_viewtopic'] == '1' )
                  {
                    echo ' checked="checked"';
                  }
                ?> />
              </td>
            </tr>
            <tr>
              <th scope="col"><?php echo $lang_spl['use icon'] ?></th>
              <td>
                <input type="checkbox" name="use_icon" value="1" 
                <?php
                  if ( $spl_config['use_icon'] == '1' )
                  {
                    echo ' checked="checked"';
                  }
                ?> />
              </td>
            </tr>
            <tr>
              <th scope="col"><?php echo $lang_spl['show guests'] ?></th>
              <td>
                <input type="checkbox" name="show_guest" value="1" 
                <?php
                  if ( $spl_config['show_guest'] == '1' )
                  {
                    echo ' checked="checked"';
                  }
                ?> /> <?php echo $lang_spl['show guests info'] ?>
              </td>
            </tr>
            <tr>
              <th scope="col"><?php echo $lang_spl['link target'] ?></th>
              <td>
              <select name="link_target">
              <?php
                if ( $spl_config['link_target'] == '1' )
                {
                  echo '<option value="1" selected="selected">'.$lang_spl['link target external'].'</option>';
                }
                else
                {
                  echo '<option value="1" >'.$lang_spl['link target external'].'</option>';
                }
                if ( $spl_config['link_target'] == '0' )
                {
                  echo '<option value="0" selected="selected">'.$lang_spl['link target internal'].'</option>';
                }
                else
                {
                  echo '<option value="0" >'.$lang_spl['link target internal'].'</option>';
                }
              ?>
              </select>
            </td>
          </tr>
        </table>
        </div>	<!-- end class="infldset" -->
        </fieldset>
        <p class="submittop">
          <input type="submit" name="set_options" value="<?php echo $lang_spl['save options'] ?>"/>
        </p>
      </div>
    </form>
  </div>      <!-- end class="box" -->
</div>        <!-- end class="blockform" -->