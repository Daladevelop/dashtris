<?php
/*
Plugin Name: Dashtris
Plugin URI: http://www.larsemil.se
Description: Add a tetris game to your wordpress dashboard when you are bored
Version: 1.0
Author: Emil Österlund, Christofer Oden
Author URI: http://www.larsemil.se
License: GPL2
	
	Copyright 2012  Emil Österlund  (email :emil@dalnix.se)

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


// Create the function to output the contents of our Dashboard Widget

function dashtris_widget() {
	// Display whatever it is you want to show
	echo '<canvas id="canvas" width="272" height="320" style="outline: 0px; border: 1px solid #000; margin-left: auto; margin-right: auto;}"></canvas>';
	echo '<p>Often as not i am sure you find your self sitting there, thinking about what to blog about. Yeah, well, know you can do something while doing that - DASHTRIS!. Dashtris is a Tetris-clone that gives you the opportunity waste time instead of blogging!</p>';
	echo '<button id="startgame" value="start">Start</button>';
} 

// Create the function use in the action hook

function add_dashtris_widget() {
	wp_add_dashboard_widget('dashtris_widget', 'Dashtris', 'dashtris_widget');	
} 

function add_dashtris_js()
{
	$plugindir = trailingslashit( get_bloginfo('wpurl') ).PLUGINDIR.'/'. dirname( plugin_basename(__FILE__) );
	if (is_admin() )
	{
		wp_enqueue_script('dashtrisclass', $plugindir.'/dashtris.js');
		wp_enqueue_script('dashtrisgame', $plugindir.'/letsgame.js');

	}
}


// Hook into the 'wp_dashboard_setup' action to register our other functions

add_action('wp_dashboard_setup', 'add_dashtris_widget' );
add_action('wp_print_scripts','add_dashtris_js');
?>
