<?php session_start(); 
//code for captach verification
if ($_POST["vercode"] != $_SESSION["vercode"] OR $_SESSION["vercode"]=='')  {
    echo "<script>alert('Incorrect verification code');</script>" ;
  } 
$text = rand(10000,99999); 
$_SESSION["vercode"] = $text; 
$height = 50; 
$width = 100;   
$image_p = imagecreate($width, $height); 
$black = imagecolorallocate($image_p, 0, 0, 0); 
$white = imagecolorallocate($image_p, 255, 255, 255); 
$font_size = 14; 
imagestring($image_p, $font_size, 5, 5, $text, $white); 
imagejpeg($image_p, null, 80); 
?>

