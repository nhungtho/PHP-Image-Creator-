<?php
//Get the values from the form
$bg = $_GET['bg'];
$logo = $_GET['logo'];
$cpn = $_GET['cpn'];
$y3 = $_GET['y3'];
$y4 = $_GET['y4'];
$text = $_GET['text']; 
$cha = $_GET['cha'];
$exp = $_GET['exp'];
$font_size = $_GET['fontsize'];
//directory to save images
//$uploads_dir = 'uploadfile/';
//$filename = $uploads_dir.$cpn.".png"; //this saves the image inside uploadfile folder
// Basic font settings
$font ='MyriadPro-Cond.otf';
//$font_size = 9;
$font_color =  0x000000;
$angle = 0;
// Create image instances
$im = imagecreatefrompng("images/bg/$bg");
$src1 = imagecreatefromjpeg("images/logo/$logo");
$src2 = imagecreatefromjpeg("images/coupon/$cpn");

// Merge the stamp onto our photo with an opacity of 100% and position x = 0, y= 0 and 88 for coupon
imagecopymerge($im, $src1, 0, 0, 0, 0, imagesx($src1), imagesy($src1), 100);
imagecopymerge($im, $src2, 0, 70, 0, 0, imagesx($src2), imagesy($src2), 100);

// Get image Width and Height
$image_width = imagesx($im);  
$image_height = imagesy($im);

///////////////////////Disclaimer text------------
// Break it up into pieces 125 characters long
$lines = explode('|', wordwrap($text, $cha, '|'));

// Starting Y position
$y = 325;
// Loop through the lines and place them on the image
foreach ($lines as $line)
{
	// Get Bounding Box Size around the line
	$text_box = imagettfbbox($font_size,$angle,$font,$line);
	// Get your Text Width and Height
	$text_width = $text_box[2]-$text_box[0];
	$text_height = $text_box[7]-$text_box[1];
	// Calculate coordinates of the text
	$x = ($image_width/2) - ($text_width/2);
	//$y = $image_height - $text_height - 22 - $y3;
	//$y = ($image_height/2) - ($text_height/2);
	//write text on image
    imagettftext($im, $font_size, 0, $x, $y, $font_color, $font, $line);

    // Increment Y so the next line is below the previous line
    $y += 16;
}
///////////////////////Expiration text------------

$l1 = "Expires ".$exp;

//starting Y POSITION for this info
$y1 = 310+$y4;

	// Get Bounding Box Size around the line
	$text_box = imagettfbbox($font_size,$angle,$font,$l1);
	// Get your Text Width and Height
	$text_width = $text_box[2]-$text_box[0];
	$text_height = $text_box[7]-$text_box[1];
	// Calculate coordinates of the text
	$x1 = ($image_width/2) - ($text_width/2);
	//write text on image
    imagettftext($im, $font_size, 0, $x1, $y1, $font_color, $font, $l1);

// Set the content-type
header('Content-Type: image/jpeg');
//save file in directory
//imagepng($im,$filename,7);
imagejpeg($im);
imagedestroy($im);
?>