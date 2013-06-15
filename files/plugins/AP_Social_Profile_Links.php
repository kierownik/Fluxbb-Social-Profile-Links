<?php
/**
************************************************************************
*  Author: kierownik
*  Date: 2013-06-15
*  Description: Adds Social links to the profile and viewtopic pages
*               where users can add there usernames.
*  Copyright (C) Daniel Rokven (rokven@gmail.com)
*  License: http://www.gnu.org/licenses/gpl.html GPL version 2 or higher
*
************************************************************************
**/

// Make sure no one attempts to run this script "directly"
if ( !defined( 'PUN' ) ) {
  exit;
}

// Tell admin_loader.php that this is indeed a plugin and that it is loaded
define( 'PUN_PLUGIN_LOADED', 1 );

//
// The rest is up to you!
//
// this save's the guest options
if ( isset( $_POST['set_options'] ) )
{
  if ( $_POST['o_spl_prof_github'] != $pun_config['o_spl_prof_github'] )
  {
    $query= 'UPDATE `'.$db->prefix."config` SET `conf_value` = '".$_POST['o_spl_prof_github']."' WHERE `conf_name` = 'o_spl_prof_github'";

    $db->query($query) or error('Unable to update board config post '. print_r($db->error()),__FILE__, __LINE__, $db->error());

    $updated = true;
  }

  if ( $_POST['o_spl_view_github'] != $pun_config['o_spl_view_github'] )
  {
    $query= 'UPDATE `'.$db->prefix."config` SET `conf_value` = '".$_POST['o_spl_view_github']."' WHERE `conf_name` = 'o_spl_view_github'";

    $db->query($query) or error('Unable to update board config post '. print_r($db->error()),__FILE__, __LINE__, $db->error());

    $updated = true;
  }

  if ( $_POST['o_spl_icon_github'] != $pun_config['o_spl_icon_github'] )
  {
    $query= 'UPDATE `'.$db->prefix."config` SET `conf_value` = '".$_POST['o_spl_icon_github']."' WHERE `conf_name` = 'o_spl_icon_github'";

    $db->query($query) or error('Unable to update board config post '. print_r($db->error()),__FILE__, __LINE__, $db->error());

    $updated = true;
  }

  if ( $_POST['o_spl_prof_facebook'] != $pun_config['o_spl_prof_facebook'] )
  {
    $query = 'UPDATE `'.$db->prefix."config` SET `conf_value` = '".$_POST['o_spl_prof_facebook']."' WHERE `conf_name` = 'o_spl_prof_facebook'";

    $db->query($query) or error('Unable to update board config post '. print_r($db->error()),__FILE__, __LINE__, $db->error());

    $updated = true;
  }

  if ( $_POST['o_spl_view_facebook'] != $pun_config['o_spl_view_facebook'] )
  {
    $query = 'UPDATE `'.$db->prefix."config` SET `conf_value` = '".$_POST['o_spl_view_facebook']."' WHERE `conf_name` = 'o_spl_view_facebook'";

    $db->query($query) or error('Unable to update board config post '. print_r($db->error()),__FILE__, __LINE__, $db->error());

    $updated = true;
  }

  if ( $_POST['o_spl_icon_facebook'] != $pun_config['o_spl_icon_facebook'] )
  {
    $query = 'UPDATE `'.$db->prefix."config` SET `conf_value` = '".$_POST['o_spl_icon_facebook']."' WHERE `conf_name` = 'o_spl_icon_facebook'";

    $db->query($query) or error('Unable to update board config post '. print_r($db->error()),__FILE__, __LINE__, $db->error());

    $updated = true;
  }

  if ( $_POST['o_spl_prof_twitter'] != $pun_config['o_spl_prof_twitter'] )
  {
    $query = 'UPDATE `'.$db->prefix."config` SET `conf_value` = '".$_POST['o_spl_prof_twitter']."' WHERE `conf_name` = 'o_spl_prof_twitter'";

    $db->query($query) or error('Unable to update board config post '. print_r($db->error()),__FILE__, __LINE__, $db->error());

    $updated = true;
  }

  if ( $_POST['o_spl_view_twitter'] != $pun_config['o_spl_view_twitter'] )
  {
    $query = 'UPDATE `'.$db->prefix."config` SET `conf_value` = '".$_POST['o_spl_view_twitter']."' WHERE `conf_name` = 'o_spl_view_twitter'";

    $db->query($query) or error('Unable to update board config post '. print_r($db->error()),__FILE__, __LINE__, $db->error());

    $updated = true;
  }

  if ( $_POST['o_spl_icon_twitter'] != $pun_config['o_spl_icon_twitter'] )
  {
    $query = 'UPDATE `'.$db->prefix."config` SET `conf_value` = '".$_POST['o_spl_icon_twitter']."' WHERE `conf_name` = 'o_spl_icon_twitter'";

    $db->query($query) or error('Unable to update board config post '. print_r($db->error()),__FILE__, __LINE__, $db->error());

    $updated = true;
  }

  if ( $_POST['o_spl_prof_youtube'] != $pun_config['o_spl_prof_youtube'] )
  {
    $query = 'UPDATE `'.$db->prefix."config` SET `conf_value` = '".$_POST['o_spl_prof_youtube']."' WHERE `conf_name` = 'o_spl_prof_youtube'";
    
    $db->query($query) or error('Unable to update board config post  '. print_r($db->error()),__FILE__, __LINE__, $db->error());
    
    $updated = true;
  }

  if ( $_POST['o_spl_view_youtube'] != $pun_config['o_spl_view_youtube'] )
  {
    $query = 'UPDATE `'.$db->prefix."config` SET `conf_value` = '".$_POST['o_spl_view_youtube']."' WHERE `conf_name` = 'o_spl_view_youtube'";
    
    $db->query($query) or error('Unable to update board config post  '. print_r($db->error()),__FILE__, __LINE__, $db->error());
    
    $updated = true;
  }

  if ( $_POST['o_spl_icon_youtube'] != $pun_config['o_spl_icon_youtube'] )
  {
    $query = 'UPDATE `'.$db->prefix."config` SET `conf_value` = '".$_POST['o_spl_icon_youtube']."' WHERE `conf_name` = 'o_spl_icon_youtube'";
    
    $db->query($query) or error('Unable to update board config post  '. print_r($db->error()),__FILE__, __LINE__, $db->error());
    
    $updated = true;
  }

  if ( $_POST['o_spl_prof_googleplus'] != $pun_config['o_spl_prof_googleplus'] )
  {
    $query = 'UPDATE `'.$db->prefix."config` SET `conf_value` = '".$_POST['o_spl_prof_googleplus']."' WHERE `conf_name` = 'o_spl_prof_googleplus'";
    
    $db->query($query) or error('Unable to update board config post  '. print_r($db->error()),__FILE__, __LINE__, $db->error());
    
    $updated = true;
  }

  if ( $_POST['o_spl_view_googleplus'] != $pun_config['o_spl_view_googleplus'] )
  {
    $query = 'UPDATE `'.$db->prefix."config` SET `conf_value` = '".$_POST['o_spl_view_googleplus']."' WHERE `conf_name` = 'o_spl_view_googleplus'";
    
    $db->query($query) or error('Unable to update board config post  '. print_r($db->error()),__FILE__, __LINE__, $db->error());
    
    $updated = true;
  }

  if ( $_POST['o_spl_icon_googleplus'] != $pun_config['o_spl_icon_googleplus'] )
  {
    $query = 'UPDATE `'.$db->prefix."config` SET `conf_value` = '".$_POST['o_spl_icon_googleplus']."' WHERE `conf_name` = 'o_spl_icon_googleplus'";
    
    $db->query($query) or error('Unable to update board config post  '. print_r($db->error()),__FILE__, __LINE__, $db->error());
    
    $updated = true;
  }
  
  if ( $updated )
  { 
    // Regenerate the config cache
    require_once PUN_ROOT.'include/cache.php';
    generate_config_cache();
    redirect($_SERVER['REQUEST_URI'], 'Your data has been saved');
  }
} // end set_options

  // Display the admin navigation menu
  generate_admin_menu($plugin);

?>
<div id="exampleplugin" class="plugin blockform">
  <h2><span>Social Profile Links - V 0.1</span></h2>
  <div class="box">
    <div class="inbox">
      <p>This plugin is used to place links in the profile and/or viewtopic page of the user.</p>
    </div>
  </div>
</div>
<div class="blockform">
  <h2 class="block2"><span>Options</span></h2>
  <div class="box">
    <form id="spl" method="post" action="<?php echo $_SERVER['REQUEST_URI'] ?>">
    <div class="inform">
        <p class="submittop">
          <input type="submit" name="set_options" value="Save options"/>
        </p>
      <fieldset>
      <legend>Options</legend>
        <div class="infldset">
          <table class="aligntop" cellspacing="0">
            <tr>
            <td></td>
            <td>profile.php</td>
            <td>viewtopic.php</td>
            <td>Use Icon</td>
          </tr>
            <tr>
              <th scope="col">Github</th>
              <td>
                <input type="checkbox" name="o_spl_prof_github" value="1" 
                <?php
                  if ( $pun_config['o_spl_prof_github'] == '1' ) {
                    echo ' checked="checked"';
                  }
                ?> />
              </td>
              <td>
                <input type="checkbox" name="o_spl_view_github" value="1" 
                <?php
                  if ( $pun_config['o_spl_view_github'] == '1' ) {
                    echo ' checked="checked"';
                  }
                ?> />
              </td>
              <td>
                <input type="checkbox" name="o_spl_icon_github" value="1" 
                <?php
                  if ( $pun_config['o_spl_icon_github'] == '1' ) {
                    echo ' checked="checked"';
                  }
                ?> />
              </td>
            </tr>
            <tr>
              <th scope="col">Facebook</th>
              <td>
                <input type="checkbox" name="o_spl_prof_facebook" value="1" 
                <?php
                  if ( $pun_config['o_spl_prof_facebook'] == '1' ) {
                    echo ' checked="checked"';
                  }
                ?> />
              </td>
              <td>
                  <input type="checkbox" name="o_spl_view_facebook" value="1"
                <?php
                  if ( $pun_config['o_spl_view_facebook'] == '1' ) {
                    echo 'checked="checked"';
                  }
                ?> />
              </td>
              <td>
                  <input type="checkbox" name="o_spl_icon_facebook" value="1"
                <?php
                  if ( $pun_config['o_spl_icon_facebook'] == '1' ) {
                    echo 'checked="checked"';
                  }
                ?> />
              </td>
            </tr>
            <tr>
              <th scope="col">Twitter</th>
              <td>
                <input type="checkbox" name="o_spl_prof_twitter" value="1" 
                <?php
                  if ( $pun_config['o_spl_prof_twitter'] == '1' ) {
                    echo ' checked="checked"';
                  }
                ?> />
              </td>
              <td>
                <input type="checkbox" name="o_spl_view_twitter" value="1"
                <?php
                  if ( $pun_config['o_spl_view_twitter'] == '1' ) {
                    echo 'checked="checked"';
                  }
                ?> />
              </td>
              <td>
                <input type="checkbox" name="o_spl_icon_twitter" value="1"
                <?php
                  if ( $pun_config['o_spl_icon_twitter'] == '1' ) {
                    echo 'checked="checked"';
                  }
                ?> />
              </td>
            </tr>
            <tr>
              <th scope="col">Youtube</th>
              <td>
                <input type="checkbox" name="o_spl_prof_youtube" value="1" 
                <?php
                  if ( $pun_config['o_spl_prof_youtube'] == '1' ) {
                    echo ' checked="checked"';
                  }
                ?> />
              </td>
              <td>
                <input type="checkbox" name="o_spl_view_youtube" value="1"
                <?php
                  if ( $pun_config['o_spl_view_youtube'] == '1' ) {
                    echo 'checked="checked"';
                  }
                ?> />
              </td>
              <td>
                <input type="checkbox" name="o_spl_icon_youtube" value="1"
                <?php
                  if ( $pun_config['o_spl_icon_youtube'] == '1' ) {
                    echo 'checked="checked"';
                  }
                ?> />
              </td>
            </tr>
            <tr>
              <th scope="col">Google+</th>
              <td>
                <input type="checkbox" name="o_spl_prof_googleplus" value="1" 
                <?php
                  if ( $pun_config['o_spl_prof_googleplus'] == '1' ) {
                    echo ' checked="checked"';
                  }
                ?> />
              </td>
              <td>
                <input type="checkbox" name="o_spl_view_googleplus" value="1"
                <?php
                  if ( $pun_config['o_spl_view_googleplus'] == '1' ) {
                    echo 'checked="checked"';
                  }
                ?> />
              </td>
              <td>
                <input type="checkbox" name="o_spl_icon_googleplus" value="1"
                <?php
                  if ( $pun_config['o_spl_icon_googleplus'] == '1' ) {
                    echo 'checked="checked"';
                  }
                ?> />
              </td>
            </tr>
          </table>
        </div>	<!-- end class="infldset" -->
        </fieldset>
        <p class="submittop">
          <input type="submit" name="set_options" value="Save options"/>
        </p>
      </div>
    </form>
  </div>      <!-- end class="box" -->
</div>        <!-- end class="blockform" -->