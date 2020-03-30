<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://sanjaywebexpert.com/
 * @since      1.0.0
 *
 * @package    Swe_Book_Management
 * @subpackage Swe_Book_Management/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Swe_Book_Management
 * @subpackage Swe_Book_Management/admin
 * @author     Sanjay Sharma <sanjayraghushrma@gmail.com>
 */
class Swe_Book_Management_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;
	private $table_activator;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		
		require_once SWE_BOOK_MANAGEMENT_PLUGIN_DIR. '/includes/class-swe-book-management-activator.php';
		$activator = new Swe_Book_Management_Activator();
		$this->table_activator = $activator;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Swe_Book_Management_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Swe_Book_Management_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/swe-book-management-admin.css', array(), $this->version, 'all' );
		wp_enqueue_style( 'bootstrap_css', plugin_dir_url( __FILE__ ) . 'css/bootstrap.min.css', array(), $this->version, 'all' );
		wp_enqueue_style( 'dataTable_css', plugin_dir_url( __FILE__ ) . 'css/jquery.dataTables.min.css', array(), $this->version, 'all' );
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Swe_Book_Management_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Swe_Book_Management_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		wp_enqueue_script( 'bootstrap_js', plugin_dir_url( __FILE__ ) . 'js/bootstrap.min.js', array( 'jquery' ), $this->version, true );
		wp_enqueue_script( 'dataTable_js_file', plugin_dir_url( __FILE__ ) . 'js/jquery.dataTables.min.js', array( 'jquery' ), $this->version, true );
		wp_enqueue_script( 'validation_js', plugin_dir_url( __FILE__ ) . 'js/jquery.validate.min.js', array( 'jquery' ), $this->version, true );
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/swe-book-management-admin.js', array( 'jquery' ), $this->version, true );
		
		/* Ajax Decleration */
		wp_localize_script( $this->plugin_name, 'create_book_self',
			array( 
				'ajaxurl' => admin_url( 'admin-ajax.php' ),
				'author_name' => 'sanjay 1',
			)
		);

	}
	
	public function book_management_menus_func(){
		add_menu_page("Book Dashboard", "Book Dashboard", "manage_options", "book-management-dashboard", array($this, "book_dashboard_menu_page_func"), "
		 dashicons-admin-plugins", 30);
		 
		add_submenu_page("book-management-dashboard", "Books Dashboard", "Books Dashboard", "manage_options", "book-management-dashboard", array($this, "book_dashboard_menu_page_func"));
		
		add_submenu_page("book-management-dashboard", "Add Book", "Add Book", "manage_options", "add-new-book", array($this, "add_book_page_func"));
		
		add_submenu_page("book-management-dashboard", "Book List", "Book List", "manage_options", "book-list", array($this, "book_list_page_func"));
		
		add_submenu_page("book-management-dashboard", "Add Book Self", "Add Book Self", "manage_options", "add-new-book-self", array($this, "add_book_self_page_func"));
		
		add_submenu_page("book-management-dashboard", "Book Self List", "Book Self List", "manage_options", "book-self-list", array($this, "book_self_list_page_func"));
	}
	function book_dashboard_menu_page_func(){
		ob_start();
		include_once(SWE_BOOK_MANAGEMENT_PLUGIN_DIR .'/admin/partials/swe-book-management-admin-dashboard.php'); 
		$template_content = ob_get_contents();
		ob_end_clean();
		echo $template_content;
	}
	function book_list_page_func(){
		ob_start();
		include_once(SWE_BOOK_MANAGEMENT_PLUGIN_DIR .'/admin/partials/swe-book-management-admin-book-list.php'); 
		$template_content = ob_get_contents();
		ob_end_clean();
		echo $template_content;
	}
	function add_book_page_func(){
		ob_start();
		include_once(SWE_BOOK_MANAGEMENT_PLUGIN_DIR .'/admin/partials/swe-book-management-admin-add-book.php'); 
		$template_content = ob_get_contents();
		ob_end_clean();
		echo  $template_content;
	}
	function add_book_self_page_func(){
		ob_start();
		include_once(SWE_BOOK_MANAGEMENT_PLUGIN_DIR .'/admin/partials/swe-book-management-admin-add-book-self.php'); 
		$template_content = ob_get_contents();
		ob_end_clean();
		echo  $template_content;
	}
	function book_self_list_page_func(){
		global $wpdb;
		
		$book_list_data = $wpdb->get_results("SELECT * FROM ".$this->table_activator->wp_tbl_book_shelf()." ");
		
		ob_start();
		include_once(SWE_BOOK_MANAGEMENT_PLUGIN_DIR .'/admin/partials/swe-book-management-admin-self-list.php'); 
		$template_content = ob_get_contents();
		ob_end_clean();
		echo $template_content;
	}
	
	
	
	function handle_admin_ajax_request(){
		global $wpdb;
		$param = isset($_REQUEST['param']) ? $_REQUEST['param'] : "";
		if(!empty($param)){
			
			if($param == "create_book_self"){
				$bootk_self_name = isset( $_REQUEST['bootk_self_name']) ? $_REQUEST['bootk_self_name'] : "";
				$self_capacity = isset( $_REQUEST['self_capacity']) ? $_REQUEST['self_capacity'] : "";
				$shelf_location = isset( $_REQUEST['shelf_location']) ? $_REQUEST['shelf_location'] : "";
				$status = isset( $_REQUEST['status']) ? $_REQUEST['status'] : "";
				$wpdb->insert($this->table_activator->wp_tbl_book_shelf(), array(
					"shelf_name" =>$bootk_self_name ,
					"capacity" =>$self_capacity,
					"shelf_location" =>$shelf_location,
					"status" =>$status,
				));
				if($wpdb->insert_id > 0){
					echo json_encode(array(
						"status" =>1,
						"message" =>"Book Self created successful",
					));
				}else{
					echo json_encode(array(
						"status" =>0,
						"message" =>"failed to create Book Self!",
					));
				} 
			}elseif($param == "delete_book_self"){
			    $book_self_id = isset( $_REQUEST['book_self_id']) ? $_REQUEST['book_self_id'] : "";
				$result = $wpdb->delete($this->table_activator->wp_tbl_book_shelf(), array('id' => $book_self_id), array( '%d' ));
				 if($result > 0){
					echo json_encode(array(
						"status" =>1,
						"message" =>"Book Self Deleted successful",
					));
				}else{
					echo json_encode(array(
						"status" =>0,
						"message" =>"failed to Delete Book Self!",
					));
				}
			}
		}
		die();
	}

}
