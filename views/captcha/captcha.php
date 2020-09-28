<?php


session_start();
if ($_GET["type"] == "auto"):
    $rand = array("sum", "multiply", "default");
    $result = array_rand($rand, 1);
    $value = $rand[$result];


else:
    $value = $_GET["type"];
endif;
switch ($value):
    case "sum":
        $number1 = mt_rand(0, 50);
        $number2 = mt_rand(0, 50);
        $_SESSION["code"] = $number1 + $number2;;
        $code = $number1 . "+" . $number2 . "= ?";
        break;
    case "multiply":
        $number1 = mt_rand(1, 9);
        $number2 = mt_rand(1, 9);
        $_SESSION["code"] = $number1 * $number2;

        $code = $number1 . "*" . $number2 . "= ?";
        break;
    case "default":
        $code = substr(md5(mt_rand(0, 999999999)), 0, 6);
        $_SESSION["code"] = $code;
        break;

endswitch;


header('Content-type: image/png');

$image = imagecreate(140, 42);
$background = imagecolorallocate($image, 234, 242, 254);
$text_color = imagecolorallocate($image, 86, 89, 94);
$line_color = imagecolorallocate($image, 60, 119, 149);
$point_color = imagecolorallocate($image, 0, 0, 255);



for ($i = 0; $i < 700; $i++):
    imagesetpixel($image, rand() % 200 ,rand() % 100, $point_color);
endfor;



imagestring($image, 35, 40, 13, $code, $text_color);
imagepng($image);
imagedestroy($image);


?>
