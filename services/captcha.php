<?php
session_start();
function getRandomWord($len = 5) {     // function to get random number 

$word = array_merge(range('0', '9'), range('A', 'Z')); //Create an array containing a range of elements from "0" to "5":
                                                       //array_merge Merge two arrays into one array:

shuffle($word);                                         //Randomize the order of the elements in the array:

return substr(implode($word), 0, $len);                 //substr() Extract parts of a string:
                                                        //implode
}

$ranStr = getRandomWord();
$_SESSION["vercode"] = $ranStr;

$height = 35;                                          //CAPTCHA image height
$width = 150;                                          //CAPTCHA image width
$font_size = 24;                                       //CAPTCHA Font size

$image_p = imagecreate($width, $height);
$graybg = imagecolorallocate($image_p, 245, 245, 245);
$textcolor = imagecolorallocate($image_p, 34, 34, 34);

imagefttext($image_p, $font_size, -2, 15, 26, $textcolor, 
'fonts/mono.ttf', $ranStr);
imagepng($image_p);
?>