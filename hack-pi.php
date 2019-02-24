
<?php
require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-config.php' );
require($_SERVER['DOCUMENT_ROOT'] . '/wp-load.php');
global $wpdb;
echo 'Wifi credentials:' . file_get_contents("/home/pi/Wifi-credentials.txt");
?>
