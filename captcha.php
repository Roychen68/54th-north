<?php
session_start();
header('Content-type: image/jpeg');
$_SESSION["captcha"] = str_shuffle(strtoupper(chr(rand(65,90)).rand(100,999)));

$width = 40;
$height = 120;
$image = imagecreatetruecolor($width, $height);

$bg = imagecolorallocate($image, 240, 240, 240);
$text = imagecolorallocate($image, 50, 50, 50);

for($i = 0; $i < 5; $i++) {
    $line = imagecolorallocate($image, rand(0, 255), rand(0, 255), rand(0, 255));
    imageline(
        $image,
        rand(0,$width),
        rand(0,$height),
        rand(0,$width),
        rand(0,$height),
        $line
    );
}

for($i = 0; $i < 5; $i++) {
    $dot = imagecolorallocate($image, rand(0, 255), rand(0, 255), rand(0, 255));
    imagesetpixel($image, rand(0, $width), rand(0, $height), $dot);
}

imagestring($image, 5, 30, 12, $_SESSION["captcha"], $text);
imagepng($image);
imagedestroy($image);