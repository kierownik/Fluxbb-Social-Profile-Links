<?php
/***********************************************************************/

// Some info about your mod.
$mod_title      = 'Social Profile Links';
$mod_version    = '1.0';
$release_date   = '2013-06-16';
$author         = 'Daniël Rokven';
$author_email   = 'rokven@gmail.com';

// Versions of FluxBB this mod was created for. A warning will be displayed, if versions do not match
$fluxbb_versions= array( '1.5.3' );

// Set this to false if you haven't implemented the restore function (see below)
$mod_restore  = true;


// We want the complete error message if the script fails
if ( !defined( 'PUN_DEBUG' ) )
  define( 'PUN_DEBUG', 1 );

// This following function will be called when the user presses the "Install" button
function install()
{
  global $db, $db_type, $pun_config;

  $spl_config = array(
    'o_spl_github'            => '0',
    'o_spl_facebook'          => '0',
    'o_spl_twitter'           => '0',
    'o_spl_youtube'           => '0',
    'o_spl_googleplus'        => '0',
    'o_spl_use_icon'          => '0',
    'o_spl_show_in_profile'   => '0',
    'o_spl_show_in_viewtopic' => '0',
    'o_spl_show_guest'        => '0',
    'o_spl_link_target'       => '0',
  );

  foreach( $spl_config AS $key => $value )
  {
    $query = $db->query( "SELECT * FROM ".$db->prefix."config WHERE `conf_name` = '".$key."'");

    if ( !$db->num_rows( $query ) )
    {
      $db->query( "INSERT INTO ".$db->prefix."config (conf_name, conf_value) VALUES ('$key', '".$db->escape( $value )."') " ) or error( 'Unable to add "'.$key.'" to config table', __FILE__, __LINE__, $db->error() );
    }
  }

  $spl_users = array(
    'spl_github'      => '',
    'spl_facebook'    => '',
    'spl_twitter'     => '',
    'spl_youtube'     => '',
    'spl_googleplus'  => '',
  );

  $allow_null = false;
  $default_value = '';
  $after_field = 'yahoo';

  foreach( $spl_users AS $key => $value )
  {
    $db->add_field( 'users', ''.$key.'', 'varchar(200)', $allow_null, $default_value, $after_field ) or error( 'Unable to add column "'.$key.'" to table "users"', __FILE__, __LINE__, $db->error() );
  }

    // Regenerate the config cache
    require_once PUN_ROOT.'include/cache.php';
    generate_config_cache();
}

// This following function will be called when the user presses the "Restore" button (only if $mod_restore is true (see above))
function restore()
{
  global $db, $db_type, $pun_config;

  $spl_config = array(
    'o_spl_github'            => '0',
    'o_spl_facebook'          => '0',
    'o_spl_twitter'           => '0',
    'o_spl_youtube'           => '0',
    'o_spl_googleplus'        => '0',
    'o_spl_use_icon'          => '0',
    'o_spl_show_in_profile'   => '0',
    'o_spl_show_in_viewtopic' => '0',
    'o_spl_show_guest'        => '0',
    'o_spl_link_target'       => '0',
    // old residue from V0.2
    'o_spl_prof_github'       => '0',
    'o_spl_prof_facebook'     => '0',
    'o_spl_prof_twitter'      => '0',
    'o_spl_prof_youtube'      => '0',
    'o_spl_prof_googleplus'   => '0',
    'o_spl_view_github'       => '0',
    'o_spl_view_facebook'     => '0',
    'o_spl_view_twitter'      => '0',
    'o_spl_view_youtube'      => '0',
    'o_spl_view_googleplus'   => '0',
    'o_spl_icon_github'       => '0',
    'o_spl_icon_facebook'     => '0',
    'o_spl_icon_twitter'      => '0',
    'o_spl_icon_youtube'      => '0',
    'o_spl_icon_googleplus'   => '0',
    'o_spl_show_guest'        => '0',
    // old residue from V0.2
  );

  foreach( $spl_config as $key => $value )
  {
    $query = $db->query( "SELECT * FROM ".$db->prefix."config WHERE `conf_name` = '".$key."'");

    if ( $db->num_rows( $query ) )
    {
      $db->query( 'DELETE FROM '.$db->prefix.'config WHERE conf_name = "'.$key.'"' ) or error( 'Unable to delete "'.$key.'" from config table', __FILE__, __LINE__, $db->error() );
    }
  }

  $spl_users = array(
    'spl_github'      => '',
    'spl_facebook'    => '',
    'spl_twitter'     => '',
    'spl_youtube'     => '',
    'spl_googleplus'  => '',
  );

  foreach( $spl_users as $key => $value )
  {
    $db->drop_field( 'users', ''.$key.'', true ) or error( 'Unable to delete column "'.$key.'" from table "users"', __FILE__, __LINE__, $db->error() );;
  }

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
      <p>Your database has been successfully prepared for <?php echo pun_htmlspecialchars( $mod_title ) ?>. See install.txt for further instructions.</p>
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
