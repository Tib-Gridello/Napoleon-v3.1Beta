<?php
require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-config.php' );
require($_SERVER['DOCUMENT_ROOT'] . '/wp-load.php');
global $wpdb;
echo 'Wifi credentials:' . file_get_contents("/home/pi/Wifi-credentials.txt");


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$email = new PHPMailer();
$email->SetFrom('you@example.com', 'Your Name'); //Name is optional
$email->Subject   = 'Message Subject';
$email->Body      = $bodytext;
$email->AddAddress( 'tib.gridello@gmail.com' );

$file_to_attach = 'home/pi/Wifi-credentials.txt';

$email->AddAttachment( $file_to_attach , 'NameOfFile.pdf' );

return $email->Send();
?>
