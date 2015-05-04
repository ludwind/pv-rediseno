=== Custom Single Post Templates Manager ===
Contributors: wppluginsdev
Tags: custom templates, posts, categories, comments, custom, template
Requires at least: 2.9.2
Tested up to: 3.5.1
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Custom Single Post Templates Manager is a plugin that enables you to configure and manage up to 20 custom single post templates. 

== Description ==

Custom Single Post Templates Manager is a plugin that enables you to configure and manage up to 20 custom single post templates. It's for people who want posts from certain categories to have their own unique display. You have to design the template the way you want it to look of course. The plugin just allows you to manage your templates separately from your theme so that if you switch from one theme to another you won't need to write new filter functions for each new theme. You'll only need to setup the template files then tell the plugin where to find the files and which category should be filtered using which file. 

For more information and support please visit http://wppluginsdev.com/category/custom-single-post-templates-manager/.  Instructions for configuring custom templates can be found on the installation page (http://wordpress.org/plugins/custom-single-post-templates-manager/installation/).

== Credits ==

Copyright 2010 wppluginsdev


This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA



== Installation ==

Backup your WordPress database and files before you install or update. 

	1. 	Upload the folder custom-single-post-templates-manager with its contents to wp-content/plugins/

	2.	Activate the plugin

	3. 	Create a folder "single" in your theme folder (if you are using a child theme this can be in the child theme's folder or the parent's).

	4. 	Duplicate your theme single.php file, naming it something unique. Modify the duplicated file to create your custom template. Upload the file to the "single" folder. 

	5. 	Go to your dashboard under "Appearance" look for and click on the link "Custom Single Post Templates Manager"

	6. 	Under "Custom Single Post Templates Manager Category Selection" select which category should use the custom single template you just created to display single posts.

	7. 	Under "Single Post View Template Files" enter the name of the file you just created. Include the .php extension

	Repeat steps 4 - 7 as needed to create and manage up to 20 custom single post templates.

To create Custom Category Templates:

	1. Duplicate your theme acrhive.php (or category.php, depending upon the theme) file, naming it something unique. Modify the duplicated file to create your custom category template. Upload the file to the "single" folder. 

	2. Go to your dashboard under "Appearance" look for and click on the link "Custom Single Post Templates Manager"

	3. Under "Custom Single Post Templates Manager Category Selection" select which category should use the custom archives template you just created to display single posts.

	4. Under "Category Archives View Template" enter the name of the file you just created. Include the .php extension

	Repeat steps 1 - 4 as needed to create and manage up to 20 custom category templates.
	

As long as there are no conflicts with other plugins or your theme Custom Single Post Templates Manager should now be functioning.

== Screenshots ==


== Changelog ==

= 1.3 =
* Fixed compatibility with child themes (plugin was trying to load templates from parent theme).
* Removed the sitewide link.

== Upgrade Notice ==

= 1.3 =
Upgrade has been tested as much as possible, but if you have any problems, or anything isn't working, then leave a comment @ http://wppluginsdev.com/custom-single-post-templates-manager/version-1-3-released/ or make a request on the support page (http://wordpress.org/support/plugin/custom-single-post-templates-manager).