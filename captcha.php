<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

// Set the content type
header('Content-Type: image/png');

// Create an image
$image = imagecreate(120, 40);

// Check if GD is enabled
if (!$image) {
    die('GD Library not available!');
}

// Colors
$background_color = imagecolorallocate($image, 255, 255, 255);
$text_color = imagecolorallocate($image, 0, 0, 0);

// Generate random code
$captcha_code = rand(1000, 9999);
$_SESSION['captcha_code'] = $captcha_code;

// Add text to image
imagestring($image, 5, 35, 10, $captcha_code, $text_color);

// Output image
imagepng($image);
imagedestroy($image);
?>
