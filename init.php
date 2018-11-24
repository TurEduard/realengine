<?php
@include_once (ROOT_DIR . '/data/config.php');

if ( !$config['version_id'] ) {
	if (!file_exists(ROOT_DIR . '/data/config.php') ) {
		header( "Location: ".str_replace(basename($_SERVER['PHP_SELF']),"admin/setup-config",$_SERVER['PHP_SELF']) );
		die ( "Engine not installed. Please login and run setup in admin panel" );
	} else die ( "Engine not installed. Please login and run setup in admin panel" );
}

define( CLASS_DIR , ROOT_DIR . '/classes');
require_once (CLASS_DIR . '/mysql.class.php');
require_once (ROOT_DIR . '/engine/functions.php');

$db = new db;

$_TIME = time();
$PHP_SELF = $config['http_url'] . "index.php";
$logged = false;
$user = array();
$metatags = array ( 'title' => $config['title'], 'description' => $config['description'], 'keywords' => $config['keywords'] );

if( !isset( $do ) AND isset($_REQUEST['do']) ) $do = totranslit ( $_REQUEST['do'] );
elseif( isset( $do ) ) $do = totranslit ( $do );
else $do = '';

$user_group = get_vars ( "usergroup" );
if (!is_array( $user_group )) {
	$user_group = array();
	$db->query( "SELECT * FROM " . PREFIX . "_usergroups ORDER BY id ASC" );

	while ( $row = $db->get_row () ) {
		$user_group[$row['id']] = array ();
		foreach ( $row as $key => $value ) {
			$user_group[$row['id']][$key] = stripslashes($value);
		}
	}
	set_vars( "usergroup", $user_group );
	$db->free();
}

$banned_info = get_vars ( "banned" );
if (!is_array ( $banned_info )) {
	$banned_info = array ();
	$db->query( "SELECT * FROM " . PREFIX . "_banned" );
	while ( $row = $db->get_row () ) {
		if ($row['users_id']) {
			$banned_info['id']['users_id'] = $row;
		} else {
			if (count( explode ( ".", $row['ip'] ) ) == 4 OR filter_var( $row['ip'] , FILTER_VALIDATE_IP, FILTER_FLAG_IPV6) OR strpos($row['ip'], ":") !== false )
				$banned_info['ip'][$row['ip']] = $row;
			elseif (strpos ( $row['ip'], "@" ) !== false)
				$banned_info['email'][$row['ip']] = $row;
			else $banned_info['name'][$row['ip']] = $row['ip'];
		}
	}
	set_vars ( "banned", $banned_info );
	$db->free();
}

if (!$logged) $user['group'] = 0;

if($logged) {
	set_cookie ( "newpm", $user['pm_unread'], 365 );
	if( !isset($_COOKIE['newpm']) ) $_COOKIE['newpm'] = 0;
	if( $user['pm_unread'] > intval( $_COOKIE['newpm'] )) {
		//include_once (ROOT_DIR . '/pm_alert.php');
	}
}

if ( isset($banned_info['ip']) ) $blockip = check_ip( $banned_info['ip'] );
else $blockip = false;

if(($logged AND $user['banned'] == "yes") OR $blockip) include_once (ROOT_DIR . '/banned.php');

include_once(CLASS_DIR . '/template.class.php');
$tpl = new Template();
define( TEMPLATE_DIR , $tpl->dir );

$tpl->load('main.tpl');

$metatags = <<<HTML
<meta charset="{$config['charset']}">
<title>{$metatags['title']}</title>
<meta name="description" content="{$metatags['description']}">
<meta name="keywords" content="{$metatags['keywords']}">
<meta name="generator" content="RealEngine v{$config['version']">
<link rel="search" type="application/opensearchdescription+xml" href="{$PHP_SELF}?do=opensearch" title="{$config['title']}">
HTML;

$tpl->set('{meta}', $metatags);

echo $tpl->compile();
?>