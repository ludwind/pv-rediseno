
<?php
require_once($path = get_home_path('wp-config.php'));
global $wpdb;
$table_name = $wpdb->prefix . "imlisteningto";
$wpdb->insert( $table_name, array( 'album' => $_POST['album'], 'artist' => $_POST['artist'] ) );
?>
