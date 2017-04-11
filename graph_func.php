<?php

function scan_data($array)
{
    $arr = [];
    $i = 0;
    foreach ($array["Sheet1"] as $row)
        {
            if ($i != 0)
                {
                    $date = new DateTime($row[0]);
                    if (isset($arr[$date->format("d/m/Y")]))
                        $arr[$date->format("d/m/Y")] += 1;
                    else
                        $arr[$date->format("d/m/Y")] = 1;
                }
            $i++;
        }
    return ($arr);
}


function imagelinethick($image, $x1, $y1, $x2, $y2, $color, $thick = 1)
{
    if ($thick == 1) {
        return imageline($image, $x1, $y1, $x2, $y2, $color);
    }
    $t = $thick / 2 - 0.5;
    if ($x1 == $x2 || $y1 == $y2) {
        return imagefilledrectangle($image, round(min($x1, $x2) - $t), round(min($y1, $y2) - $t), round(max($x1, $x2) + $t), round(max($y1, $y2) + $t), $color);
    }
    $k = ($y2 - $y1) / ($x2 - $x1); 
    $a = $t / sqrt(1 + pow($k, 2));
    $points = array(
        round($x1 - (1+$k)*$a), round($y1 + (1-$k)*$a),
        round($x1 - (1-$k)*$a), round($y1 - (1+$k)*$a),
        round($x2 + (1+$k)*$a), round($y2 - (1-$k)*$a),
        round($x2 + (1-$k)*$a), round($y2 + (1+$k)*$a),
    );
    imagefilledpolygon($image, $points, 4, $color);
    return imagepolygon($image, $points, 4, $color);
}

function make_ladder_vertical($array)
{
    $i = 0;
    foreach ($array as $row)
        {
            if ($i < $row)
                $i = $row;
        }
    return $i;
}

