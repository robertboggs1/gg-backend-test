<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       example.com
 * @since      1.0.0
 *
 * @package    Gg_Backend_Test
 * @subpackage Gg_Backend_Test/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Gg_Backend_Test
 * @subpackage Gg_Backend_Test/public
 * @author     Robert Boggs <robertboggs1@gmail.com>
 */
class Gg_Backend_Test_Public {

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

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		
		$check_video_page_exist = get_page_by_title('Wistia Test', 'OBJECT', 'page');
		// Check if the page already exists
		if(empty($check_video_page_exist)) {
			$page_id = wp_insert_post(
				array(
				'comment_status' => 'close',
				'ping_status'    => 'close',
				'post_author'    => 1,
				'post_title'     => ucwords('Wistia Test'),
				'post_name'      => 'wistia-test',
				'post_status'    => 'publish',
				'post_type'      => 'page'
				)
			);
		}

		
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Gg_Backend_Test_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Gg_Backend_Test_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		
		wp_enqueue_style( $this->plugin_name, '//cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Gg_Backend_Test_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Gg_Backend_Test_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/gg-backend-test-public.js', array( 'jquery' ), $this->version, false );
		wp_localize_script( 'gg-backend-test', 'siteData', array( 'ajaxUrl' => admin_url( 'admin-ajax.php' ), 'loginStatus' => is_user_logged_in ()) );
	}

	public function wistia_test_template( $template ) {
		if ( is_page( 'wistia-test' )  ) {
			return plugin_dir_path( __FILE__ ).'templates/wistia-test-template.php';	
		}
		return $template;
	}


	public function check_login_status() {
		if(is_user_logged_in()) {
			echo true;
		} else {
			echo false;
		}
		wp_die();
	}
	public function login_user() {
		$info = array();
		$info['user_login'] = $_POST['username'];
		$info['user_password'] = $_POST['password'];
		$info['remember'] = true;

		$user_signon = wp_signon( $info, false );
		if ( is_wp_error($user_signon) ){
			echo json_encode(array('loggedin'=>false, 'message'=>__('Wrong username or password.')));
		} else {
			echo json_encode(array('loggedin'=>true, 'message'=>__('Login successful')));
		}
		wp_die();
	}
}
