<?php

header('Content-type: image/png');

$image = new Imagick(__DIR__ . DIRECTORY_SEPARATOR . 'img.jfif');

$image->adaptiveBlurImage(20, 5);

echo $image;