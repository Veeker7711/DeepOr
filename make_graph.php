<?php

require "graph_func.php";

session_start();

/* CONF THE GRAPH HERE */

$width = 1000; 
$height = 500;
$image = imagecreatetruecolor($width, $height);
$background_color = imagecolorallocate($image, 255, 255, 255);
$axes_color = imagecolorallocate($image, 122,255,208);
$font = imageloadfont('./04b.gdf');

/* ------------------- */

$array = $_SESSION['array'];

$black = imagecolorallocate($image, 0, 0, 0);
$white = imagecolorallocate($image, 255, 255, 255);

/* image drawn here  */

imagefill($image, 0, 0, $background_color);
$stats = scan_data($array);
$max_y = make_ladder_vertical($stats);
$ladder_y = $height / ($max_y + 2);
$nbr_date = count($stats);               
$ladder_x = $width / ($nbr_date + 1);


for ($i = 1; $i <= $max_y; $i++) /* Vertical graduation */
    {
        $ladder = $height - (($ladder_y * $i) + $ladder_y * 2);
        imagelinethick($image, $ladder_x-5, $ladder, $ladder_x+5, $ladder, $axes_color, 2);
        imagestring($image, $font, $ladder_x - 10, $ladder , $i, $black);
    }
$i = 0;
foreach ($stats as $key => $value)
    {
        
        $ladder = ($ladder_x * $i) + $ladder_x;
        imagelinethick($image, $ladder, $height-$ladder_y*2-5, $ladder, $height-$ladder_y*2+5, $axes_color, 2);
        imagestringup($image, $font, $ladder, $height-$ladder_y+25 , $key, $black);
        if ($i != 0)
            {
                $prev_point_y = $height - ($ladder_y * $stats[$tmp]+(2 * $ladder_y));
                $current_point_y = $height - ($ladder_y * $value +(2 * $ladder_y));
                imagelinethick($image, $ladder-$ladder_x, $prev_point_y, $ladder, $current_point_y, $axes_color, 2);
            }
        $tmp = $key;
        $i++;
    }

imagelinethick($image, $ladder_x, $height - $ladder_y * 2, $ladder_x, 0, $axes_color, 3);
imagelinethick($image, $ladder_x, $height - $ladder_y * 2, $width, $height-$ladder_y*2, $axes_color, 3);

/* -------------- */














header('Content-type: image/png');
imagepng($image);