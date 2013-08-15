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

// Some info about your mod.
$mod_title      = 'Social Profile Links';
$mod_version    = '1.1.7';
$release_date   = '2013-06-16';
$author         = 'Dani?l Rokven';
$author_email   = 'rokven@gmail.com';

// Versions of FluxBB this mod was created for. A warning will be displayed, if versions do not match
$fluxbb_versions= array( '1.5.4', '1.5.3' );

// Set this to FALSE if you haven't implemented the restore function (see below)
$mod_restore  = TRUE;

// We want the complete error message if the script fails
if ( !defined( 'PUN_DEBUG' ) )
  define( 'PUN_DEBUG', 1 );

// This following function will be called when the user presses the "Install" button
function install()
{
  global $db, $db_type, $pun_config;

  // old install
  if ( isset( $pun_config['o_spl_github'] ) OR isset( $pun_config['o_spl_prof_github'] ) )
  {
    $spl_config = array(
      'care2'             => '0',
      'delicious'         => '0',
      'deviantart'        => '0',
      'facebook'          => ( !isset( $pun_config['o_spl_facebook'] ) ) ? '1' : $pun_config['o_spl_facebook'],
      'github'            => ( !isset( $pun_config['o_spl_github'] ) ) ? '1' : $pun_config['o_spl_github'],
      'google+'           => ( !isset( $pun_config['o_spl_googleplus'] ) ) ? '1' : $pun_config['o_spl_googleplus'],
      'instagram'         => ( !isset( $pun_config['o_spl_instagram'] ) ) ? '1' : $pun_config['o_spl_instagram'],
      'pinterest'         => '0',
      'stumbleupon'       => '0',
      'tumblr'            => '0',
      'twitter'           => ( !isset( $pun_config['o_spl_twitter'] ) ) ? '1' : $pun_config['o_spl_twitter'],
      'youtube'           => ( !isset( $pun_config['o_spl_youtube'] ) ) ? '1' : $pun_config['o_spl_youtube'],
      'use_icon'          => ( !isset( $pun_config['o_spl_use_icon'] ) ) ? '1' : $pun_config['o_spl_use_icon'],
      'show_in_profile'   => ( !isset( $pun_config['o_spl_show_in_profile'] ) ) ? '1' : $pun_config['o_spl_show_in_profile'],
      'show_in_viewtopic' => ( !isset( $pun_config['o_spl_show_in_viewtopic'] ) ) ? '1' : $pun_config['o_spl_show_in_viewtopic'],
      'show_guest'        => ( !isset( $pun_config['o_spl_show_guest'] ) ) ? '1' : $pun_config['o_spl_show_guest'],
      'link_target'       => ( !isset( $pun_config['o_spl_link_target'] ) ) ? '1' : $pun_config['o_spl_link_target'],
    );

    // Serialize the new config
    $spl_config = serialize( $spl_config );

    // Insert the new config in the new config field
    $db->query( "INSERT INTO ".$db->prefix."config (conf_name, conf_value) VALUES ( 'o_social_profile_links', '".$db->escape( $spl_config )."' ) " ) or error( 'Unable to add "o_social_profile_links" to config table', __FILE__, __LINE__, $db->error() );

    // Add the new social_profile_links field to the users table
    $allow_null = TRUE;
    $default_value = NULL;
    $after_field = 'yahoo';

    $db->add_field( 'users', 'social_profile_links', 'text', $allow_null, $default_value, $after_field ) or error( 'Unable to add column "social_profile_links" to table "users"', __FILE__, __LINE__, $db->error() );
    // End add the new social_profile_links field to the users table

    // Select all the non empty user fields to be moved to the new users field
    if ( $db->field_exists( 'users', 'spl_instagram', TRUE ) )
    {
      $instagram = TRUE;
      $result = $db->query( 'SELECT id, spl_github, spl_facebook, spl_twitter, spl_youtube, spl_googleplus, spl_instagram FROM '.$db->prefix.'users WHERE spl_github <> "" OR spl_facebook <> "" OR spl_twitter <> "" OR spl_youtube <> "" OR spl_googleplus <> "" OR spl_instagram <> ""' ) or error( 'Unable to fetch user list', __FILE__, __LINE__, $db->error() );
    }
    else
    {
      $instagram = FALSE;
      $result = $db->query( 'SELECT id, spl_github, spl_facebook, spl_twitter, spl_youtube, spl_googleplus FROM '.$db->prefix.'users WHERE spl_github <> "" OR spl_facebook <> "" OR spl_twitter <> "" OR spl_youtube <> "" OR spl_googleplus <> ""' ) or error( 'Unable to fetch user list', __FILE__, __LINE__, $db->error() );
    }
    // End select all the non empty user fields to be moved to the new users field

    $spl_users = array(
      'spl_github'      =>  'github',
      'spl_facebook'    =>  'facebook',
      'spl_twitter'     =>  'twitter',
      'spl_youtube'     =>  'youtube',
      'spl_googleplus'  =>  'google+',
      'spl_instagram'   =>  'instagram',
    );

    // Make an array of the old usernames so they can be moved to the new users field
    while ( $spl_user_data = $db->fetch_assoc( $result ) )
    {
      $temp_spl_user = array();

      foreach ( $spl_users AS $key => $value )
      {
        if ( $instagram AND $key == 'spl_instagram' )
        {
          if ( $spl_user_data[$key] != '' )
          {
            $temp_spl_user[$value] = $spl_user_data[$key];
          }
        }
        else
        {
          if ( $spl_user_data[$key] != '' )
          {
            $temp_spl_user[$value] = $spl_user_data[$key];
          }
        }
      }

      // If $temp_spl_user array is not empty we can save it to the database for that user
      if ( !empty( $temp_spl_user ) )
      {
        $spl_links = serialize( $temp_spl_user );
        $db->query( 'UPDATE `'.$db->prefix."users` SET `social_profile_links` = '".$db->escape ( $spl_links )."' WHERE `id` = '".$spl_user_data['id']."'" ) or error( 'Unable to update users', __FILE__, __LINE__, $db->error() );
      }
    }
    // End make an array of the old usernames so they can be moved to the new users field

    // Delete old stuff from V-0.1 to V-1.0.2
    $db->query( 'DELETE FROM '.$db->prefix.'config WHERE conf_name LIKE "o_spl_%"' ) or error( 'Unable to delete "o_spl_" from config table', __FILE__, __LINE__, $db->error() );

    foreach( $spl_users as $key => $value )
    {
      if ( $db->field_exists( 'users', ''.$key.'', true ) )
      {
        $db->drop_field( 'users', ''.$key.'', true ) or error( 'Unable to delete column "'.$key.'" from table "users"', __FILE__, __LINE__, $db->error() );
      }
    }
    // End delete old stuff from V-0.1 to V-1.0.2
  }
  elseif ( $db->field_exists( 'users', 'social_profile_links', true ) )
  {
    echo '<p style="text-align: center">This was not needed, open readme.txt and read <strong>notes 3</strong>, GOOD LUCK.</p>';
    exit;
  }
  else
  {
    // New install
    $spl_config = array(
      'care2'             => '10',
      'delicious'         => '20',
      'deviantart'        => '30',
      'facebook'          => '40',
      'github'            => '50',
      'google+'           => '60',
      'instagram'         => '70',
      'pinterest'         => '80',
      'stumbleupon'       => '90',
      'tumblr'            => '100',
      'twitter'           => '110',
      'youtube'           => '120',
      'use_icon'          => '1',
      'show_in_profile'   => '1',
      'show_in_viewtopic' => '1',
      'show_guest'        => '1',
      'link_target'       => '1',
    );

    $spl_config = serialize( $spl_config );

    $db->query( "INSERT INTO ".$db->prefix."config (conf_name, conf_value) VALUES ( 'o_social_profile_links', '".$db->escape( $spl_config )."' ) " ) or error( 'Unable to add "o_social_profile_links" to config table', __FILE__, __LINE__, $db->error() );

    // Add the new social_profile_links field to the users table
    $allow_null = TRUE;
    $default_value = NULL;
    $after_field = 'yahoo';

    $db->add_field( 'users', 'social_profile_links', 'text', $allow_null, $default_value, $after_field ) or error( 'Unable to add column "social_profile_links" to table "users"', __FILE__, __LINE__, $db->error() );
    // End new install
  }

    // Regenerate the config cache
    require_once PUN_ROOT.'include/cache.php';
    generate_config_cache();
}

// This following function will be called when the user presses the "Restore" button (only if $mod_restore is true (see above))
function restore()
{
  global $db, $db_type, $pun_config;

  // If o_spl_github exists we are dealing with an old install
  if ( isset( $pun_config['o_spl_github'] ) OR isset( $pun_config['o_spl_prof_github'] ) )
  {
    $db->query( 'DELETE FROM '.$db->prefix.'config WHERE conf_name LIKE "o_spl_%"' ) or error( 'Unable to delete "o_spl_" from config table', __FILE__, __LINE__, $db->error() );
  }
  // End if o_spl_github exists we are dealing with an old install

  if ( isset( $pun_config['o_social_profile_links'] ) )
  {
    $db->query( 'DELETE FROM '.$db->prefix.'config WHERE conf_name = "o_social_profile_links"' ) or error( 'Unable to delete "o_social_profile_links" from config table', __FILE__, __LINE__, $db->error() );
  }

  $spl_users = array(
    'social_profile_links'  => '',
    'spl_github'            => '',
    'spl_facebook'          => '',
    'spl_twitter'           => '',
    'spl_youtube'           => '',
    'spl_googleplus'        => '',
    'spl_instagram'         => '',
  );

  // If the fields exist we need to delete them
  foreach( $spl_users as $key => $value )
  {
    if ( $db->field_exists( 'users', ''.$key.'', TRUE ) )
    {
      $db->drop_field( 'users', ''.$key.'', TRUE ) or error( 'Unable to delete column "'.$key.'" from table "users"', __FILE__, __LINE__, $db->error() );;
    }
  }
  // End if the fields exist we need to delete them

    // Regenerate the config cache
    require_once PUN_ROOT.'include/cache.php';
    generate_config_cache();
}

/***********************************************************************/

// DO NOT EDIT ANYTHING BELOW THIS LINE!


// Circumvent maintenance mode
define( 'PUN_TURN_OFF_MAINT', 1 );
define( 'PUN_ROOT', './' );
require PUN_ROOT.'include/common.php';

// We want the complete error message if the script fails
if ( !defined('PUN_DEBUG' ) )
  define( 'PUN_DEBUG', 1 );

// Make sure we are running a FluxBB version that this mod works with
$version_warning = !in_array( $pun_config['o_cur_version'], $fluxbb_versions );

$style = ( isset( $pun_user ) ) ? $pun_user['style'] : $pun_config['o_default_style'];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" dir="ltr">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo pun_htmlspecialchars($mod_title) ?> installation</title>
<link rel="stylesheet" type="text/css" href="style/<?php echo $style.'.css' ?>" />
</head>
<body>

<div id="punwrap">
<div id="puninstall" class="pun" style="margin: 10% 20% auto 20%">

<?php

if ( isset( $_POST['form_sent'] ) )
{
  if ( isset( $_POST['install'] ) )
  {
    // Run the install function ( defined above )
    install();

?>
<div class="block">
  <h2><span>Installation successful</span></h2>
  <div class="box">
    <div class="inbox">
      <p>Your database has been successfully prepared for <?php echo pun_htmlspecialchars( $mod_title ) ?>. See readme.txt for further instructions.</p>
    </div>
  </div>
</div>
<?php

  }
  else
  {
    // Run the restore function ( defined above )
    restore();

?>
<div class="block">
  <h2><span>Restore successful</span></h2>
  <div class="box">
    <div class="inbox">
      <p>Your database has been successfully restored.</p>
    </div>
  </div>
</div>
<?php

  }
}
else
{

?>
<div class="blockform">
  <h2><span>Mod installation</span></h2>
  <div class="box">
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>?foo=bar">
      <div><input type="hidden" name="form_sent" value="1" /></div>
      <div class="inform">
        <p>This script will update your database to work with the following modification:</p>
        <p><strong>Mod title:</strong> <?php echo pun_htmlspecialchars( $mod_title.' '.$mod_version ) ?></p>
        <p><strong>Author:</strong> <?php echo pun_htmlspecialchars( $author ) ?> (<a href="mailto:<?php echo pun_htmlspecialchars( $author_email ) ?>"><?php echo pun_htmlspecialchars( $author_email ) ?></a>)</p>
        <p><strong>Disclaimer:</strong> Mods are not officially supported by FluxBB. Mods generally can't be uninstalled without running SQL queries manually against the database. Make backups of all data you deem necessary before installing.</p>
<?php if ( $mod_restore ): ?>
        <p>If you've previously installed this mod and would like to uninstall it, you can click the Restore button below to restore the database.</p>
<?php endif; ?>
<?php if ( $version_warning ): ?>
        <p style="color: #a00"><strong>Warning:</strong> The mod you are about to install was not made specifically to support your current version of FluxBB (<?php echo $pun_config['o_cur_version']; ?>). This mod supports FluxBB versions: <?php echo pun_htmlspecialchars( implode( ', ', $fluxbb_versions ) ); ?>. If you are uncertain about installing the mod due to this potential version conflict, contact the mod author.</p>
<?php endif; ?>
      </div>
      <p class="buttons"><input type="submit" name="install" value="Install" /><?php if ( $mod_restore ): ?><input type="submit" name="restore" value="Restore" /><?php endif; ?></p>
    </form>
  </div>
</div>
<?php

}

?>

</div>
</div>

</body>
</html>
<?php

// End the transaction
$db->end_transaction();

// Close the db connection ( and free up any result data )
$db->close();