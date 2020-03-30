<?php

/**
 * Fired during plugin activation
 *
 * @link       http://sanjaywebexpert.com/
 * @since      1.0.0
 *
 * @package    Swe_Book_Management
 * @subpackage Swe_Book_Management/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Swe_Book_Management
 * @subpackage Swe_Book_Management/includes
 * @author     Sanjay Sharma <sanjayraghushrma@gmail.com>
 */
class Swe_Book_Management_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public function activate() {
		require_once(ABSPATH .'/wp-admin/includes/upgrade.php');
		global $wpdb;
		if(count($wpdb->get_var("show tables like '".$this->wp_tbl_books()."' ")) ==0 ){
			$sql_create = "CREATE TABLE `".$this->wp_tbl_books()."` (
					 `id` int(11) NOT NULL AUTO_INCREMENT,
					 `shelf_id` int(11) NOT NULL,
					 `book_title` varchar(222) DEFAULT NULL,
					 `book_price` decimal(10,0) DEFAULT NULL,
					 `book_description` varchar(250) DEFAULT NULL,
					 `book_cover_image` varchar(222) DEFAULT NULL,
					 `language` varchar(222) DEFAULT NULL,
					 `status` int(11) DEFAULT '1',
					 `publish_date` varchar(250) DEFAULT NULL,
					 `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
					 PRIMARY KEY (`id`)
					) ENGINE=InnoDB DEFAULT CHARSET=latin1";
							
			dbDelta($sql_create);				
		}
		
	if(count($wpdb->get_var("show tables like '".$this->wp_tbl_book_shelf()."' ")) ==0 ){
			$sql_create = "CREATE TABLE `".$this->wp_tbl_book_shelf()."` (
				 `id` int(100) NOT NULL AUTO_INCREMENT,
				 `shelf_name` varchar(250) DEFAULT NULL,
				 `capacity` int(11) DEFAULT NULL,
				 `shelf_location` varchar(250) DEFAULT NULL,
				 `status` int(11) NOT NULL DEFAULT '1',
				 `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
				 PRIMARY KEY (`id`)
				) ENGINE=InnoDB DEFAULT CHARSET=latin1";
							
			dbDelta($sql_create);				
	}
		
	
	
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
