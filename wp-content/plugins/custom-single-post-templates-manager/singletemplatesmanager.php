<?php
if(preg_match('#' . basename(__FILE__) . '#', $_SERVER['PHP_SELF'])) { die('You are not allowed to call this page directly.'); }
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/*
Plugin Name: Custom Single Post Templates Manager
Plugin URI: http://wppluginsdev.com
Description: Used to manage custom single post templates and related category as well as related comments. Use this plugin to manage your single post templates.
Version: 1.3
Author: wppluginsdev
Author URI: http://wppluginsdev.com
*/
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/*  Copyright 2010  wppluginsdev  (email : wpadmin@wppluginsdev.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if ( !defined('WP_CONTENT_DIR') )
	define( 'WP_CONTENT_DIR', ABSPATH . 'wp-content' ); // no trailing slash, full paths only - WP_CONTENT_URL is defined further down

if ( !defined('WP_CONTENT_URL') )
	define( 'WP_CONTENT_URL', get_option('siteurl') . '/wp-content'); // no trailing slash, full paths only - WP_CONTENT_URL is defined further down

$wpcontenturl=WP_CONTENT_URL;
$wpcontentdir=WP_CONTENT_DIR;



$singletemplates_plugin_path = WP_CONTENT_DIR.'/plugins/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__));
$singletemplates_plugin_url = WP_CONTENT_URL.'/plugins/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__));

$singletemplatesdb_version = "1.3";



////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Add actions and filters etc
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	add_action('init', 'singletemplatesinstall');
	add_action('admin_menu', 'singletemplates_launch');
/**
* Define a constant path to our single template folder
*/

define('SINGLE_PATH', get_template_directory() . '/single/');
/**
* Filter the single_template with our custom function
*/
add_filter('single_template', 'my_single_single_template');
add_filter('comments_template', 'my_single_comment_template');
add_filter('category_template', 'my_single_category_template');

/**
* Single template function which will choose our template
*/


function singletemplatesinstall()
{

	global $wpdb,$singletemplatesdb_version;

	$installed_ver = get_option( "singletemplatesdb_version" );


    	if(!isset($installed_ver) || empty($installed_ver)){add_option("singletemplatesdb_version", $singletemplatesdb_version);}
    	else{update_option("singletemplatesdb_version", $singletemplatesdb_version);}
}


function singletemplates_launch()
{
	global $singletemplates_plugin_path;
	add_theme_page('Custom Single Post Templates Manager', 'Custom Single Post Templates Manager', 'activate_plugins', basename(__FILE__), 'singletemplates_config_admin');

}


function singletemplates_home_screen()
{
	global $singletemplatesdb_version;
	echo "<h3 style=\"padding:10px;\">";
	_e("Thank you for using Custom Single Post Templates Manager plugin for WordPress","stmanager");
	echo "</h3><p>";
	_e("You are using version","stmanager");
	echo " <b>$singletemplatesdb_version</b> </p>";
	//singletemplates_config_admin();


}

// Handle Theme Options


// VARIABLES


$themename = "Single Templates";
$shortname = "singletemplates";
$yesnooptions=array("yes","no");

$options = array();

$thecatlist_A = get_categories('hide_empty=0');
$catdlist = array();

foreach ($thecatlist_A as $catforlist)
{

$thecatname=$catforlist->cat_name;
$thecatname=str_replace("&amp;","&",$thecatname);
	$catdlist[$catforlist->cat_ID] = $thecatname;
}

$categories_tmp = array_unshift($catdlist, "Select a category:");


$defoptions = array (

array(  "name" => "Custom Single Post Templates Manager Category Selection",
"type" => "titles"),


array("name" => "Single Template Category #1",
"id" => $shortname."_single_t_1",
"std" => "",
"type" => "select",
"options" => $catdlist),

array("name" => "Single Template Category #2",
"id" => $shortname."_single_t_2",
"std" => "",
"type" => "select",
"options" => $catdlist),

array("name" => "Single Template Category #3",
"id" => $shortname."_single_t_3",
"std" => "",
"type" => "select",
"options" => $catdlist),

array("name" => "Single Template Category #4",
"id" => $shortname."_single_t_4",
"std" => "",
"type" => "select",
"options" => $catdlist),

array("name" => "Single Template Category #5",
"id" => $shortname."_single_t_5",
"std" => "",
"type" => "select",
"options" => $catdlist),

array("name" => "Single Template Category #6",
"id" => $shortname."_single_t_6",
"std" => "",
"type" => "select",
"options" => $catdlist),


array("name" => "Single Template Category #7",
"id" => $shortname."_single_t_7",
"std" => "",
"type" => "select",
"options" => $catdlist),

array("name" => "Single Template Category #8",
"id" => $shortname."_single_t_8",
"std" => "",
"type" => "select",
"options" => $catdlist),

array("name" => "Single Template Category #9",
"id" => $shortname."_single_t_9",
"std" => "",
"type" => "select",
"options" => $catdlist),

array("name" => "Single Template Category #10",
"id" => $shortname."_single_t_10",
"std" => "",
"type" => "select",
"options" => $catdlist),

array("name" => "Single Template Category #11",
"id" => $shortname."_single_t_11",
"std" => "",
"type" => "select",
"options" => $catdlist),

array("name" => "Single Template Category #12",
"id" => $shortname."_single_t_12",
"std" => "",
"type" => "select",
"options" => $catdlist),

array("name" => "Single Template Category #13",
"id" => $shortname."_single_t_13",
"std" => "",
"type" => "select",
"options" => $catdlist),

array("name" => "Single Template Category #14",
"id" => $shortname."_single_t_14",
"std" => "",
"type" => "select",
"options" => $catdlist),

array("name" => "Single Template Category #15",
"id" => $shortname."_single_t_15",
"std" => "",
"type" => "select",
"options" => $catdlist),

array("name" => "Single Template Category #16",
"id" => $shortname."_single_t_16",
"std" => "",
"type" => "select",
"options" => $catdlist),


array("name" => "Single Template Category #17",
"id" => $shortname."_single_t_17",
"std" => "",
"type" => "select",
"options" => $catdlist),

array("name" => "Single Template Category #18",
"id" => $shortname."_single_t_18",
"std" => "",
"type" => "select",
"options" => $catdlist),

array("name" => "Single Template Category #19",
"id" => $shortname."_single_t_19",
"std" => "",
"type" => "select",
"options" => $catdlist),

array("name" => "Single Template Category #20",
"id" => $shortname."_single_t_20",
"std" => "",
"type" => "select",
"options" => $catdlist),


array(  "name" => "Single Post View Template Files",
"type" => "titles"),

array("name" => "Single Template Category #1 File ",
"id" => $shortname."_single_t_f_1",
"std" => "single_template_1.php",
"type" => "text"),

array("name" => "Single Template Category #2 File ",
"id" => $shortname."_single_t_f_2",
"std" => "single_template_2.php",
"type" => "text"),

array("name" => "Single Template Category #3 File ",
"id" => $shortname."_single_t_f_3",
"std" => "single_template_3.php",
"type" => "text"),

array("name" => "Single Template Category #4 File ",
"id" => $shortname."_single_t_f_4",
"std" => "single_template_4.php",
"type" => "text"),

array("name" => "Single Template Category #5 File ",
"id" => $shortname."_single_t_f_5",
"std" => "single_template_5.php",
"type" => "text"),

array("name" => "Single Template Category #6 File ",
"id" => $shortname."_single_t_f_6",
"std" => "single_template_6.php",
"type" => "text"),

array("name" => "Single Template Category #7 File ",
"id" => $shortname."_single_t_f_7",
"std" => "single_template_7.php",
"type" => "text"),

array("name" => "Single Template Category #8 File ",
"id" => $shortname."_single_t_f_8",
"std" => "single_template_8.php",
"type" => "text"),

array("name" => "Single Template Category #9 File ",
"id" => $shortname."_single_t_f_9",
"std" => "single_template_9.php",
"type" => "text"),

array("name" => "Single Template Category #10 File ",
"id" => $shortname."_single_t_f_10",
"std" => "single_template_10.php",
"type" => "text"),

array("name" => "Single Template Category #11 File ",
"id" => $shortname."_single_t_f_11",
"std" => "single_template_11.php",
"type" => "text"),

array("name" => "Single Template Category #12 File ",
"id" => $shortname."_single_t_f_12",
"std" => "single_template_12.php",
"type" => "text"),

array("name" => "Single Template Category #13 File ",
"id" => $shortname."_single_t_f_13",
"std" => "single_template_13.php",
"type" => "text"),

array("name" => "Single Template Category #14 File ",
"id" => $shortname."_single_t_f_14",
"std" => "single_template_14.php",
"type" => "text"),

array("name" => "Single Template Category #15 File ",
"id" => $shortname."_single_t_f_15",
"std" => "single_template_15.php",
"type" => "text"),

array("name" => "Single Template Category #16 File ",
"id" => $shortname."_single_t_f_16",
"std" => "single_template_16.php",
"type" => "text"),

array("name" => "Single Template Category #17 File ",
"id" => $shortname."_single_t_f_17",
"std" => "single_template_17.php",
"type" => "text"),

array("name" => "Single Template Category #18 File ",
"id" => $shortname."_single_t_f_18",
"std" => "single_template_18.php",
"type" => "text"),

array("name" => "Single Template Category #19 File ",
"id" => $shortname."_single_t_f_19",
"std" => "single_template_19.php",
"type" => "text"),

array("name" => "Single Template Category #20 File ",
"id" => $shortname."_single_t_f_20",
"std" => "single_template_20.php",
"type" => "text"),

array(  "name" => "Category Archives View Template",
"type" => "titles"),

array("name" => "Single Template Category #1 Category File ",
"id" => $shortname."_single_t_f_category_1",
"std" => "single_template_category_1.php",
"type" => "text"),

array("name" => "Single Template Category #2 Category File ",
"id" => $shortname."_single_t_f_category_2",
"std" => "single_template_category_2.php",
"type" => "text"),

array("name" => "Single Template Category #3 Category File ",
"id" => $shortname."_single_t_f_category_3",
"std" => "single_template_category_3.php",
"type" => "text"),

array("name" => "Single Template Category #4 Category File ",
"id" => $shortname."_single_t_f_category_4",
"std" => "single_template_category_4.php",
"type" => "text"),

array("name" => "Single Template Category #5 Category File ",
"id" => $shortname."_single_t_f_category_5",
"std" => "single_template_category_5.php",
"type" => "text"),

array("name" => "Single Template Category #6 Category File ",
"id" => $shortname."_single_t_f_category_6",
"std" => "single_template_category_6.php",
"type" => "text"),

array("name" => "Single Template Category #7 Category File ",
"id" => $shortname."_single_t_f_category_7",
"std" => "single_template_category_7.php",
"type" => "text"),

array("name" => "Single Template Category #8 Category File ",
"id" => $shortname."_single_t_f_category_8",
"std" => "single_template_category_8.php",
"type" => "text"),

array("name" => "Single Template Category #9 Category File ",
"id" => $shortname."_single_t_f_category_9",
"std" => "single_template_category_9.php",
"type" => "text"),

array("name" => "Single Template Category #10 Category File ",
"id" => $shortname."_single_t_f_category_10",
"std" => "single_template_category_10.php",
"type" => "text"),

array("name" => "Single Template Category #11 Category File ",
"id" => $shortname."_single_t_f_category_11",
"std" => "single_template_category_11.php",
"type" => "text"),

array("name" => "Single Template Category #12 Category File ",
"id" => $shortname."_single_t_f_category_12",
"std" => "single_template_category_12.php",
"type" => "text"),

array("name" => "Single Template Category #13 Category File ",
"id" => $shortname."_single_t_f_category_13",
"std" => "single_template_category_13.php",
"type" => "text"),

array("name" => "Single Template Category #14 Category File ",
"id" => $shortname."_single_t_f_category_14",
"std" => "single_template_category_14.php",
"type" => "text"),

array("name" => "Single Template Category #15 Category File ",
"id" => $shortname."_single_t_f_category_15",
"std" => "single_template_category_15.php",
"type" => "text"),

array("name" => "Single Template Category #16 Category File ",
"id" => $shortname."_single_t_f_category_16",
"std" => "single_template_category_16.php",
"type" => "text"),

array("name" => "Single Template Category #17 Category File ",
"id" => $shortname."_single_t_f_category_17",
"std" => "single_template_category_17.php",
"type" => "text"),

array("name" => "Single Template Category #18 Category File ",
"id" => $shortname."_single_t_f_category_18",
"std" => "single_template_category_18.php",
"type" => "text"),

array("name" => "Single Template Category #19 Category File ",
"id" => $shortname."_single_t_f_category_19",
"std" => "single_template_category_19.php",
"type" => "text"),

array("name" => "Single Template Category #20 Category File ",
"id" => $shortname."_single_t_f_category_20",
"std" => "single_template_category_20.php",
"type" => "text"),

array(  "name" => "Comments Page View Template Files",
"type" => "titles"),

array("name" => "Single Template Category #1 Comment File ",
"id" => $shortname."_single_t_f_comment_1",
"std" => "single_template_comment_1.php",
"type" => "text"),

array("name" => "Single Template Category #2 Comment File ",
"id" => $shortname."_single_t_f_comment_2",
"std" => "single_template_comment_2.php",
"type" => "text"),

array("name" => "Single Template Category #3 Comment File ",
"id" => $shortname."_single_t_f_comment_3",
"std" => "single_template_comment_3.php",
"type" => "text"),

array("name" => "Single Template Category #4 Comment File ",
"id" => $shortname."_single_t_f_comment_4",
"std" => "single_template_comment_4.php",
"type" => "text"),

array("name" => "Single Template Category #5 Comment File ",
"id" => $shortname."_single_t_f_comment_5",
"std" => "single_template_comment_5.php",
"type" => "text"),

array("name" => "Single Template Category #6 Comment File ",
"id" => $shortname."_single_t_f_comment_6",
"std" => "single_template_comment_6.php",
"type" => "text"),

array("name" => "Single Template Category #7 Comment File ",
"id" => $shortname."_single_t_f_comment_7",
"std" => "single_template_comment_7.php",
"type" => "text"),

array("name" => "Single Template Category #8 Comment File ",
"id" => $shortname."_single_t_f_comment_8",
"std" => "single_template_comment_8.php",
"type" => "text"),

array("name" => "Single Template Category #9 Comment File ",
"id" => $shortname."_single_t_f_comment_9",
"std" => "single_template_comment_9.php",
"type" => "text"),

array("name" => "Single Template Category #10 Comment File ",
"id" => $shortname."_single_t_f_comment_10",
"std" => "single_template_comment_10.php",
"type" => "text"),

array("name" => "Single Template Category #11 Comment File ",
"id" => $shortname."_single_t_f_comment_11",
"std" => "single_template_comment_11.php",
"type" => "text"),

array("name" => "Single Template Category #12 Comment File ",
"id" => $shortname."_single_t_f_comment_12",
"std" => "single_template_comment_12.php",
"type" => "text"),

array("name" => "Single Template Category #13 Comment File ",
"id" => $shortname."_single_t_f_comment_13",
"std" => "single_template_comment_13.php",
"type" => "text"),

array("name" => "Single Template Category #14 Comment File ",
"id" => $shortname."_single_t_f_comment_14",
"std" => "single_template_comment_14.php",
"type" => "text"),

array("name" => "Single Template Category #15 Comment File ",
"id" => $shortname."_single_t_f_comment_15",
"std" => "single_template_comment_15.php",
"type" => "text"),

array("name" => "Single Template Category #16 Comment File ",
"id" => $shortname."_single_t_f_comment_16",
"std" => "single_template_comment_16.php",
"type" => "text"),

array("name" => "Single Template Category #17 Comment File ",
"id" => $shortname."_single_t_f_comment_17",
"std" => "single_template_comment_17.php",
"type" => "text"),

array("name" => "Single Template Category #18 Comment File ",
"id" => $shortname."_single_t_f_comment_18",
"std" => "single_template_comment_18.php",
"type" => "text"),

array("name" => "Single Template Category #19 Comment File ",
"id" => $shortname."_single_t_f_comment_19",
"std" => "single_template_comment_19.php",
"type" => "text"),

array("name" => "Single Template Category #20 Comment File ",
"id" => $shortname."_single_t_f_comment_20",
"std" => "single_template_comment_20.php",
"type" => "text")

);

function singletemplates_add_admin() {
global $themename, $shortname, $defoptions;
	$mythemeoptions=$shortname.'_single_template_options';
	$mysavedthemeoptions=get_option($mythemeoptions);

		$options = $mysavedthemeoptions;

		if (!isset($options) || empty($options) || !is_array($options))
		{
			$options = $defoptions;

			foreach ($options as $optionvalue)
			{
				if(isset($optionvalue['id']) && !empty($optionvalue['id']))
				{
					$savedoptionvalue=get_option($optionvalue['id']);
					if(!isset($savedoptionvalue) || empty ($savedoptionvalue))
					{
						$savedoptionvalue=$optionvalue['std'];
					}

					$setmyoptions[]=array("name" => $optionvalue['name'],
					"id" => $optionvalue['id'],
					"std" => $savedoptionvalue,
					"type" => $optionvalue['type'],
					"options" => $optionvalue['options']);

					delete_option($optionvalue['id']);
				}
			}

			update_option($mythemeoptions,$setmyoptions);
		}

	if ( isset($_REQUEST['page']) && ($_REQUEST['page'] == basename(__FILE__) ) )
	{
		if( isset($_REQUEST['action']) && ( 'updateoptions' == $_REQUEST['action'] ))
		{
			$myoptionvalue='';

			foreach ($options as $optionvalue)
			{

				if(isset($optionvalue['id']) && !empty($optionvalue['id']))
				{
					if( isset( $_REQUEST[ $optionvalue['id'] ] ) )
					{
						$myoptionvalue = $_REQUEST[ $optionvalue['id'] ];
					}
				}

				if(!isset($optionvalue['options']) || empty($optionvalue['options']))
				{
					$optionvalue['options']='';
				}

				if(!isset($optionvalue['id']) || empty($optionvalue['id']))
				{
					$optionvalue['id']='';
				}

				if(!isset($optionvalue['std']) || empty($optionvalue['std'] ))
				{
					$optionvalue['std']='';
				}

				$myoptions[]=array("name" => $optionvalue['name'],
				"id" => $optionvalue['id'],
				"std" => $myoptionvalue,
				"type" => $optionvalue['type'],
				"options" => $optionvalue['options']);

			}
				update_option($mythemeoptions,$myoptions);
				$optionsupdated=true;

		}
		else if( isset($_REQUEST['action']) && ( 'reset' == $_REQUEST['action'] ))
		{
			update_option($mythemeoptions,$defoptions);
			$optionsreset=true;
		}
	}
}

function get_singletemplatesoptions()
{
	$mypsoptions=array();
	global $shortname;

	$pstandoptions=get_option($shortname.'_single_template_options');

	if(isset($pstandoptions) && !empty($pstandoptions))
	{
		foreach ($pstandoptions as $pstandoption)
		{
			if(isset($pstandoption['id']) && !empty($pstandoption['id']))
			{
				$mypsoptions[$pstandoption['id']]=$pstandoption['std'];
			}

		}
	}

	return $mypsoptions;
}

function singletemplates_check_for_options()
{
	global $shortname,$defoptions;
	$mythemeoptions=$shortname.'_single_template_options';
	$mysavedthemeoptions=get_option($mythemeoptions);

		$options = $mysavedthemeoptions;

		if (!isset($options) || empty($options) || !is_array($options))
		{
			$options = $defoptions;

			foreach ($options as $optionvalue)
			{
				if(!isset($optionvalue['id']) || empty($optionvalue['id']))
				{
					$optionvalue['id']='';
				}
				if(!isset($optionvalue['options']) || empty($optionvalue['options']))
				{
					$optionvalue['options']='';
				}
				if(!isset($optionvalue['std']) || empty($optionvalue['std']))
				{
					$optionvalue['std']='';
				}

					$setmyoptions[]=array("name" => $optionvalue['name'],
					"id" => $optionvalue['id'],
					"std" => $optionvalue['std'],
					"type" => $optionvalue['type'],
					"options" => $optionvalue['options']);

			}

			update_option($mythemeoptions,$setmyoptions);
		}
}

function singletemplates_reconcile_options()
{
	global $shortname,$defoptions;
	$mythemeoptions=$shortname.'_single_template_options';
	$singletemplatesOptions=get_singletemplatesoptions();

			$setmyoptions=array();


				foreach ($defoptions as $optionvalue)
				{

					if(!isset($optionvalue['id']) || empty($optionvalue['id']))
					{
						$optionvalue['id']='';
					}
					if(!isset($optionvalue['options']) || empty($optionvalue['options']))
					{
						$optionvalue['options']='';
					}
					if(!isset($optionvalue['name']) || empty($optionvalue['name']))
					{
						$optionvalue['name']='';
					}
					if(!isset($optionvalue['std']) || empty($optionvalue['std']))
					{
						$optionvalue['std']='';
					}


					if(isset($singletemplatesOptions[$optionvalue['id']]) && !empty($singletemplatesOptions[$optionvalue['id']]))
					{
						$savedoptionvalue=$singletemplatesOptions[$optionvalue['id']];
					}
					elseif(isset($optionvalue['std']) && !empty($optionvalue['std']))
					{
						$savedoptionvalue=$optionvalue['std'];
					}
					else
					{
						$savedoptionvalue='';
					}
					$setmyoptions[]=array("name" => $optionvalue['name'],
					"id" => $optionvalue['id'],
					"std" => $savedoptionvalue,
					"type" => $optionvalue['type'],
					"options" => $optionvalue['options']);
				}

				update_option($mythemeoptions,$setmyoptions);

}

function singletemplates_config_admin() {
global $themename, $shortname, $defoptions;
singletemplates_reconcile_options();




if( isset($_REQUEST['saved']) && !empty( $_REQUEST['saved'] )) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
if ( isset($_REQUEST['reset']) && !empty( $_REQUEST['reset'] )) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';
?>
		<?php $savedoptions = get_option($shortname.'_single_template_options');
		if (!isset($savedoptions) || empty($savedoptions) || !is_array($savedoptions))
		{
			$options = $defoptions;
		}
		else
		{
			$options=$savedoptions;
		}
				?>
<div class="wrap">
	<h2>Custom Single Post Templates Manager</h2>
<?php $singletemplatesOptions=get_singletemplatesOptions();?>
  	<?php global $singletemplatesdb_version;
	echo "<h3>";
	_e("Thank you for using Custom Single Post Templates Manager plugin for WordPress","stmanager");
	echo "</h3><p>";
	_e("You are using version","stmanager");
	echo " <b>$singletemplatesdb_version</b> </p>";?>
  <form method="post">
    <?php foreach ($options as $value) {

if ($value['type'] == "text") { ?>
    <div style="float: left; width: 880px; background-color:#E4F2FD; border-left: 1px solid #C2D6E6; border-right: 1px solid #C2D6E6;  border-bottom: 1px solid #C2D6E6; padding: 10px;">
      <div style="width: 200px; float: left;"><?php echo $value['name']; ?></div>
      <div style="width: 680px; float: left;">
        <input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" style="width: 400px;" type="<?php echo $value['type']; ?>" value="<?php if ( $singletemplatesOptions[ $value['id'] ] != "") { echo stripslashes($singletemplatesOptions[ $value['id'] ]); } else { echo $value['std']; } ?>" />
      </div>
    </div>
    <?php } elseif ($value['type'] == "text2") { ?>
    <div style="float: left; width: 880px; background-color:#E4F2FD; border-left: 1px solid #C2D6E6; border-right: 1px solid #C2D6E6;  border-bottom: 1px solid #C2D6E6; padding: 10px;">
      <div style="width: 200px; float: left;"><?php echo $value['name']; ?></div>
      <div style="width: 680px; float: left;">
        <textarea name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" style="width: 400px; height: 200px;" type="<?php echo $value['type']; ?>"><?php if ( $singletemplatesOptions[ $value['id'] ] != "") { echo stripslashes($singletemplatesOptions[ $value['id'] ]); } else { echo $value['std']; } ?>
</textarea>
      </div>
    </div>
    <?php } elseif ($value['type'] == "select") { ?>
    <div style="float: left; width: 880px; background-color:#E4F2FD; border-left: 1px solid #C2D6E6; border-right: 1px solid #C2D6E6;  border-bottom: 1px solid #C2D6E6; padding: 10px;">
      <div style="width: 200px; float: left;"><?php echo $value['name']; ?></div>
      <div style="width: 680px; float: left;">
        <select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" style="width: 400px;">
          <?php foreach ($value['options'] as $option) { ?>
          <option<?php if ( get_option( $value['id'] ) == $option) { echo ' selected="selected"'; } elseif ($option == $value['std']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option>
          <?php } ?>
        </select>
      </div>
    </div>
    <?php } elseif ($value['type'] == "titles") { ?>
    <div style="float: left; width: 870px; padding: 15px; background-color:#2583AD; border: 1px solid #2583AD; color: #fff; font-size: 16px; font-weight: bold; margin-top: 25px;"> <?php echo $value['name']; ?> </div>
    <?php
}
}
?>
    <div style="clear: both;"></div>
    <p style="float: left;" class="submit">
      <input name="save" type="submit" value="Save changes" />
      <input type="hidden" name="action" value="updateoptions" />
    </p>
  </form>
  <form method="post">
    <p style="float: left;" class="submit">
      <input name="reset" type="submit" value="Reset" />
      <input type="hidden" name="action" value="reset" />
    </p>
  </form>
  <?php
}



function singletemplates_wp_head() { ?>
  <?php }

add_action('wp_head', 'singletemplates_wp_head');
add_action('admin_menu', 'singletemplates_add_admin');


function my_single_single_template($single) {
	global $wp_query, $post, $shortname;

	$singletemplatesOptions=get_singletemplatesOptions();

	$mysingletcatsarr=array('1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20');

	foreach($mysingletcatsarr as $mysingletcat) {
		$the_st_catname=$singletemplatesOptions[$shortname.'_single_t_'.$mysingletcat];
		$the_st_catname=str_replace("&","&amp;",$the_st_catname);
		$the_st_postscat = get_cat_id($the_st_catname);

		$mysingletfilename=$singletemplatesOptions[$shortname.'_single_t_f_'.$mysingletcat];
		foreach((array)get_the_category() as $cat) {
			if(($cat->term_id == $the_st_postscat) || (cat_is_child_of($the_st_postscat,$cat->term_id))) {
				
				if(file_exists(SINGLE_PATH . $mysingletfilename)) {
					return SINGLE_PATH . $mysingletfilename;
				}

				if(file_exists(get_stylesheet_directory() . '/single/'. $mysingletfilename)) {
					return get_stylesheet_directory() . '/single/'.$mysingletfilename;
				}
			}
		}
	}
	return $single;
}


function my_single_comment_template($comment) {
	global $wp_query, $post,$shortname;

	$singletemplatesOptions=get_singletemplatesOptions();

	$mysingletcatsarr=array('1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20');

	foreach($mysingletcatsarr as $mysingletcat)
	{

		$the_st_catname=$singletemplatesOptions[$shortname.'_single_t_'.$mysingletcat];
		$the_st_catname=str_replace("&","&amp;",$the_st_catname);
		$the_st_postscat = get_cat_id($the_st_catname);

		$mysingletfilename=$singletemplatesOptions[$shortname.'_single_t_f_comment_'.$mysingletcat];

		foreach((array)get_the_category() as $cat) :

			if(($cat->term_id == $the_st_postscat) || (cat_is_child_of($the_st_postscat,$cat->term_id))):

			if(file_exists(SINGLE_PATH . $mysingletfilename)){
				return SINGLE_PATH . $mysingletfilename;}
			if(file_exists(get_stylesheet_directory() . '/single/'. $mysingletfilename)){
			return get_stylesheet_directory() . '/single/'.$mysingletfilename;}

			endif;

		endforeach;
	}

	return $comment;

}

function my_single_category_template($category) {
	global $wp_query, $post,$shortname;

	$singletemplatesOptions=get_singletemplatesOptions();

	$mysingletcatsarr=array('1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20');

	foreach($mysingletcatsarr as $mysingletcat)
	{

		$the_st_catname=$singletemplatesOptions[$shortname.'_single_t_'.$mysingletcat];
		$the_st_catname=str_replace("&","&amp;",$the_st_catname);
		$the_st_postscat = get_cat_id($the_st_catname);

		$mysingletfilename=$singletemplatesOptions[$shortname.'_single_t_f_category_'.$mysingletcat];

		foreach((array)get_the_category() as $cat) :

			if(($cat->term_id == $the_st_postscat) || (cat_is_child_of($the_st_postscat,$cat->term_id))):

			if(file_exists(SINGLE_PATH . $mysingletfilename)){
				return SINGLE_PATH . $mysingletfilename;}
			if(file_exists(get_stylesheet_directory() . '/single/'. $mysingletfilename)){
			return get_stylesheet_directory() . '/single/'.$mysingletfilename;}

			endif;

		endforeach;
	}

	return $category;

}


function cat_is_child_of($ancestor, $descendant){
  $ancestor = (string) $ancestor;
  $desc_id = (string) $descendant;
  $child_cats = get_term_children( (string) $ancestor, 'category');
  if($ancestor == $descendant){
    return true;
  }
  else if(!count($child_cats)){
    return false;
  }
  else{
    $is_child = false;
    foreach($child_cats as $cat_id){
      if($cat_id == $desc_id){
        $is_child = true;
        break;
      }
      else{
        $is_child = $is_child || cat_is_child_of($cat_id, $descendant);
      }
    }
    return $is_child;
  }
}

?>