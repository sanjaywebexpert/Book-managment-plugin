<?php

/**
 * Fired during plugin deactivation
 *
 * @link       http://sanjaywebexpert.com/
 * @since      1.0.0
 *
 * @package    Swe_Book_Management
 * @subpackage Swe_Book_Management/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Swe_Book_Management
 * @subpackage Swe_Book_Management/includes
 * @author     Sanjay Sharma <sanjayraghushrma@gmail.com>
 */
class Swe_Book_Management_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public function deactivate() {
		global $wpdb;
		//$wpdb->query("Drop table IF EXISTS `".$this->wp_tbl_books()."`");
		//$wpdb->query("Drop table IF EXISTS `".$this->wp_tbl_book_shelf()."`");
	}
	public function wp_tbl_books(){
		global $wpdb;
		return $wpdb->prefix.'tbl_books';
	}
	public function wp_tbl_book_shelf(){
		global $wpdb;
		return $wpdb->prefix.'tbl_book_shelf';
	}

}
